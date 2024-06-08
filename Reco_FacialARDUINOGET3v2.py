import firebase_admin
from firebase_admin import credentials, db
import serial
import time

# Inicializar Firebase
cred = credentials.Certificate('C:/Users/eCore/Documents/school/proy/Sistema-de-Acceso-con-Reconocimiento-Facial/esp32-5e9a7-firebase-adminsdk-zrjn2-997c617a44.json')
firebase_admin.initialize_app(cred, {
    'databaseURL': 'https://esp32-5e9a7-default-rtdb.firebaseio.com'
})

# Inicializar la conexión serial con Arduino
ser = serial.Serial('COM14', 9600)  # Cambia 'COM14' al puerto serial correcto para tu Arduino
time.sleep(5)  # Esperar a que el Arduino se reinicie

# Variables para almacenar el último registro procesado y el último nombre
last_record = None
last_name = None

while True:
    # Obtener una referencia a la base de datos
    ref = db.reference('face_recognition')

    # Obtener el registro más reciente de la base de datos
    most_recent_record = ref.order_by_key().limit_to_last(1).get()

    # Mostrar el registro obtenido si es nuevo
    for key, record in most_recent_record.items():
        if record != last_record:
            if isinstance(record, dict):  # Verificar si record es un diccionario
                current_name = record.get('name', 'No disponible')
                current_status = record.get('status', 'No disponible')

                # Verificar condiciones antes de procesar el registro
                if current_status == "INVALIDO" or (current_status == "VALIDO" and current_name != last_name):
                    print(f"Nombre: {current_name}, Estado: {current_status}, Timestamp: {record.get('timestamp', 'No disponible')}")

                    # Enviar datos al Arduino
                    data = f"{current_status}\n"
                    ser.write(data.encode())

                    # Actualizar el último registro procesado y el último nombre
                    last_record = record
                    if current_status == "VALIDO":
                        last_name = current_name

            else:
                print("El registro no tiene el formato esperado.")

    # Esperar 2 segundos antes de la siguiente iteración
    time.sleep(2)
