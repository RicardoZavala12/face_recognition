#include <Servo.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <Keypad.h>

// Definiciones de los pines
const int pinValido = 12;
const int pinInvalido = 13;
const int servoPin = 11;
String status = "";
Servo myservo;  // Crear un objeto Servo

// Definiciones de la pantalla OLED
#define SCREEN_WIDTH 128
#define SCREEN_HEIGHT 64
#define OLED_RESET -1  // Reset pin # (or -1 if sharing Arduino reset pin)
#define SCREEN_ADDRESS 0x3C  // Dirección I2C de la pantalla SSD1306

Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, OLED_RESET);

// Definiciones del teclado
const byte ROWS = 4; // Cuatro filas
const byte COLS = 4; // Cuatro columnas

// Definimos los símbolos en el teclado
char keys[ROWS][COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

// Conexiones de pines del teclado a las entradas del Arduino
byte rowPins[ROWS] = {9, 8, 7, 6}; // Conectado a las filas del teclado
byte colPins[COLS] = {5, 4, 3, 2}; // Conectado a las columnas del teclado

// Creamos una instancia de la clase Keypad
Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);

char enteredKey[11]; // Almacena la clave ingresada (10 números + null terminator)
byte keyIndex = 0; // Índice para la posición en enteredKey
const char predefinedKey[] = "1234567890"; // Clave predefinida

// Declaración de funciones
void drawCheckmark();
void drawX();
void resetDisplay();

void setup() {
  Serial.begin(9600);
  pinMode(pinValido, OUTPUT);
  pinMode(pinInvalido, OUTPUT);
  myservo.attach(servoPin);  // Conectar el servomotor al pin 11
  myservo.write(0);  // Inicializar el servomotor a la posición 0 grados

  // Inicializa la pantalla
  if (!display.begin(SSD1306_SWITCHCAPVCC, SCREEN_ADDRESS)) {
    Serial.println(F("SSD1306 allocation failed"));
    for (;;);
  }

  // Limpia el buffer
  display.clearDisplay();
  display.display();

  Serial.println("Ingrese la clave de 10 números:");
}

void loop() {
  if (Serial.available() > 0) {
    status = Serial.readStringUntil('\n');
    status.trim();  // Eliminar cualquier espacio en blanco extra

    if (status == "VALIDO") {
      activateValid();
    } else if (status == "INVALIDO") {
      activateInvalid();
    }
  } else {
    resetDisplay();  // Apagar la pantalla y los LEDs cuando no se reciba ningún dato
  }

  char key = keypad.getKey(); // Lee la tecla presionada

  if (key) {
    if (keyIndex < 10) {
      if (isdigit(key)) { // Solo procesa si es un dígito (0-9)
        enteredKey[keyIndex] = key;
        keyIndex++;
        Serial.print(key); // Muestra el dígito ingresado
      }
    }
    if (keyIndex == 10) {
      enteredKey[keyIndex] = '\0'; // Agrega el terminador null
      Serial.println(); // Nueva línea en el monitor serial
      Serial.print("Clave ingresada: ");
      Serial.println(enteredKey); // Muestra la clave completa

      if (strcmp(enteredKey, predefinedKey) == 0) {
        activateValid();
      } else {
        activateInvalid();
      }

      keyIndex = 0; // Reinicia el índice para la próxima clave
      memset(enteredKey, 0, sizeof(enteredKey)); // Limpia el buffer
    }
  }
}

void activateValid() {
  digitalWrite(pinValido, HIGH);
  digitalWrite(pinInvalido, LOW);
  myservo.write(180);  // Girar el servomotor a 180 grados (ajustar según el movimiento deseado)
  
  // Mostrar "VALIDO" en la pantalla con una palomita
  display.clearDisplay();
  display.setTextSize(2);
  display.setTextColor(SSD1306_WHITE);
  display.setCursor(0, 0);
  display.print("VALIDO");
  drawCheckmark();  // Dibujar la palomita en la pantalla
  display.display();

  delay(6000);  // Mantener el LED encendido y el servo en posición por 6 segundos
  digitalWrite(pinValido, LOW);  // Apagar el LED después de 6 segundos
  myservo.write(0);  // Devolver el servomotor a la posición 0 grados
  resetDisplay();  // Apagar la pantalla y los LEDs
}

void activateInvalid() {
  digitalWrite(pinValido, LOW);
  digitalWrite(pinInvalido, HIGH);
  myservo.write(0);  // Devolver el servomotor a la posición 0 grados

  // Mostrar "INVALIDO" en la pantalla con una "X"
  display.clearDisplay();
  display.setTextSize(2);
  display.setTextColor(SSD1306_WHITE);
  display.setCursor(0, 0);
  display.print("INVALIDO");
  drawX();  // Dibujar la "X" en la pantalla  
  display.display();
  delay(3000);  // Mantener el LED encendido por 3 segundos
  digitalWrite(pinInvalido, LOW);  // Apagar el LED después de 3 segundos
  resetDisplay();  // Apagar la pantalla y los LEDs
}

void resetDisplay() {
  display.clearDisplay();
  display.display();
  digitalWrite(pinValido, LOW);
  digitalWrite(pinInvalido, LOW);
}

void drawCheckmark() {
  // Coordenadas de la palomita
  int x0 = 20, y0 = 40;
  int x1 = 50, y1 = 60;
  int x2 = 110, y2 = 10;

  // Dibuja la palomita más gruesa y centrada
  for (int i = -5; i <= 5; i++) { // Ajusta el grosor de la línea cambiando los valores de i
    display.drawLine(x0 + i, y0, x1 + i, y1, SSD1306_WHITE);
    display.drawLine(x1 + i, y1, x2 + i, y2, SSD1306_WHITE);
  }
}

void drawX() {
  // Coordenadas de la "X"
  int x0 = 20, y0 = 10;
  int x1 = 108, y1 = 54;
  int x2 = 20, y2 = 54;
  int x3 = 108, y3 = 10;

  // Dibuja la "X" más gruesa y centrada
  for (int i = -5; i <= 5; i++) { // Ajusta el grosor de la línea cambiando los valores de i
    display.drawLine(x0 + i, y0, x1 + i, y1, SSD1306_WHITE);
    display.drawLine(x2 + i, y2, x3 + i, y3, SSD1306_WHITE);
  }
}
