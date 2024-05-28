import firebase_admin
from firebase_admin import credentials, db

# Inicializar Firebase
cred = credentials.Certificate('C:/Users/eCore/Documents/school/proy/Sistema-de-Login-con-Reconocimiento-Facial-main/esp32-5e9a7-firebase-adminsdk-zrjn2-997c617a44.json')
firebase_admin.initialize_app(cred, {
    'databaseURL': 'https://esp32-5e9a7-default-rtdb.firebaseio.com'
})

# Obtener una referencia a la base de datos
ref = db.reference('face_recognition')

# Obtener los últimos 10 registros de la base de datos
last_10_records = ref.order_by_key().limit_to_last(15).get()

# Mostrar los registros obtenidos
for key, record in last_10_records.items():
    if isinstance(record, dict):  # Verificar si record es un diccionario
        print(f"Nombre: {record.get('name', 'No disponible')}, Estado: {record.get('status', 'No disponible')}, Timestamp: {record.get('timestamp', 'No disponible')}")
    else:
        print("El registro no tiene el formato esperado.")
