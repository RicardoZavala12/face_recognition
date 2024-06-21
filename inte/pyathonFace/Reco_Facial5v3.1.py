import cv2
import face_recognition
import os
from datetime import datetime
import time
import firebase_admin
from firebase_admin import credentials, db

# Inicializar Firebase
cred = credentials.Certificate('C:/Users/eCore/Documents/school/proy/Sistema-de-Acceso-con-Reconocimiento-Facial/esp32-5e9a7-firebase-adminsdk-zrjn2-997c617a44.json')
firebase_admin.initialize_app(cred, {
    'databaseURL': 'https://esp32-5e9a7-default-rtdb.firebaseio.com'
})

# Ruta de la carpeta que contiene las imágenes de las personas (base de datos)
folder_path = 'base_de_datos'

# Obtener las imágenes y nombres de las personas de la base de datos
images = []
person_names = []
for filename in os.listdir(folder_path):
    if filename.endswith('.jpg') or filename.endswith('.png') or filename.endswith('.jpeg'):
        image_path = os.path.join(folder_path, filename)
        person_name = os.path.splitext(filename)[0]
        images.append(face_recognition.load_image_file(image_path))
        person_names.append(person_name)

# Crear la base de datos de caras
person_encodings = [face_recognition.face_encodings(img)[0] for img in images]

# Inicializar la webcam
cap = cv2.VideoCapture(0)

# Definir el intervalo de tiempo en segundos
intervalo_tiempo = 4  # Por ejemplo, enviar datos cada 10 segundos

tiempo_anterior = time.time()  # Obtener el tiempo actual

while True:
    ret, frame = cap.read()
    rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

    # Encontrar todas las caras en el frame actual
    face_locations = face_recognition.face_locations(rgb_frame)
    face_encodings = face_recognition.face_encodings(rgb_frame, face_locations)

    # Inicializar variables para nombre y estado
    nombre_detectado = False

    # Comparar cada cara detectada con las caras de la base de datos
    for face_encoding, (top, right, bottom, left) in zip(face_encodings, face_locations):
        matches = face_recognition.compare_faces(person_encodings, face_encoding)
        name = "Desconocido"
        status = "INVALIDO"

        # Si encontramos una coincidencia con alguna cara de la base de datos, obtenemos el nombre de la persona
        if True in matches:
            match_index = matches.index(True)
            name = person_names[match_index]
            status = "VALIDO"
        
        # Marcar que se detectó una cara
        nombre_detectado = True

        # Definir el color del rectángulo basado en si se conoce o no la cara
        color = (0, 255, 0)  # Verde por defecto
        if name == "Desconocido":
            color = (0, 0, 255)  # Cambiar a rojo si es desconocido

        # Dibujar un rectángulo y el nombre de la persona en el frame
        cv2.rectangle(frame, (left, top), (right, bottom), color, 2)
        cv2.putText(frame, name, (left + 6, bottom - 6), cv2.FONT_HERSHEY_SIMPLEX, 0.5, color, 1)

    tiempo_actual = time.time()  # Obtener el tiempo actual

    # Verificar si ha pasado el intervalo de tiempo y si se detectó una cara
    if tiempo_actual - tiempo_anterior >= intervalo_tiempo and nombre_detectado:
        # Enviar datos a Firebase
        data = {
            'name': name,
            'status': status,
            'timestamp': datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        }
        db.reference('face_recognition').push(data)

        # Actualizar el tiempo anterior
        tiempo_anterior = tiempo_actual

        # Si el estado es "INVALIDO", pausar el escaneo por 15 segundos
        if status == "INVALIDO":
            time.sleep(15)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv
