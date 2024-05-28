import firebase_admin
from firebase_admin import credentials, db
import serial
import time

# Inicializar Firebase
cred = credentials.Certificate('C:/Users/eCore/Documents/school/proy/Sistema-de-Login-con-Reconocimiento-Facial-main/esp32-5e9a7-firebase-adminsdk-zrjn2-997c617a44.json')
firebase_admin.initialize_app(cred, {
    'databaseURL': 'https://esp32-5e9a7-default-rtdb.firebaseio.com'
})

while True:
    # Obtener una referencia a la base de datos
    ref = db.reference('face_recognition')

    # Obtener los últimos 15 registros de la base de datos
    last_15_records = ref.order_by_key().limit_to_last(1).get()

    # Mostrar los registros obtenidos
    for key, record in last_15_records.items():
        if isinstance(record, dict):  # Verificar si record es un diccionario
            print(f"Nombre: {record.get('name', 'No disponible')}, Estado: {record.get('status', 'No disponible')}, Timestamp: {record.get('timestamp', 'No disponible')}")

            # Enviar datos al Arduino
            ser = serial.Serial('COM14', 9600)  # Cambia 'COM3' al puerto serial correcto para tu Arduino
            time.sleep(2)  # Esperar a que el Arduino se reinicie
            data = f"{record.get('status', 'No disponible')}\n"
            ser.write(data.encode())
            ser.close()
        else:
            print("El registro no tiene el formato esperado.")

    # Esperar 5 segundos antes de la siguiente iteración
    time.sleep(2)
