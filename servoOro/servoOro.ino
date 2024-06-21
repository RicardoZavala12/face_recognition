#include <Servo.h>

const int pinValido = 12;
const int pinInvalido = 13;
const int servoPin = 11;
String status = "";
Servo myservo;  // Crear un objeto Servo

void setup() {
  Serial.begin(9600);
  pinMode(pinValido, OUTPUT);
  pinMode(pinInvalido, OUTPUT);
  myservo.attach(servoPin);  // Conectar el servomotor al pin 11
  myservo.write(0);  // Inicializar el servomotor a la posición 0 grados
}

void loop() {
  if (Serial.available() > 0) {
    status = Serial.readStringUntil('\n');
    status.trim();  // Eliminar cualquier espacio en blanco extra

    if (status == "VALIDO") {
      digitalWrite(pinValido, HIGH);
      digitalWrite(pinInvalido, LOW);
      myservo.write(180);  // Girar el servomotor a 180 grados (ajustar según el movimiento deseado)
      delay(2000);  // Mantener el LED encendido y el servo en posición por 5 segundos
      digitalWrite(pinValido, LOW);  // Apagar el LED después de 5 segundos
    } else if (status == "INVALIDO") {
      digitalWrite(pinValido, LOW);
      digitalWrite(pinInvalido, HIGH);
      myservo.write(0);  // Devolver el servomotor a la posición 0 grados
      delay(2000);  // Mantener el LED encendido por 5 segundos
      digitalWrite(pinInvalido, LOW);  // Apagar el LED después de 5 segundos
    }
  }
}
