import cv2
import face_recognition
import os
import serial

# Configurar la comunicación serial con la ESP32
ser = serial.Serial('COM9', 115200)  # Reemplaza '/dev/ttyUSB0' por el puerto correcto de tu ESP32

# Ruta de la carpeta que contiene las imágenes de las personas (base de datos)
folder_path = 'base_de_datos'

# Obtener las imágenes y nombres de las personas de la base de datos
def obtener_imagenes_base_datos(folder_path):
    images = []
    person_names = []
    for filename in os.listdir(folder_path):
        if filename.endswith('.jpg') or filename.endswith('.png') or filename.endswith('.jpeg'):
            image_path = os.path.join(folder_path, filename)
            person_name = os.path.splitext(filename)[0]
            images.append(face_recognition.load_image_file(image_path))
            person_names.append(person_name)
    return images, person_names

# Crear la base de datos de caras
images, person_names = obtener_imagenes_base_datos(folder_path)
person_encodings = [face_recognition.face_encodings(img)[0] for img in images]

# Inicializar la webcam
cap = cv2.VideoCapture(0)

while True:
    ret, frame = cap.read()
    rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

    # Encontrar todas las caras en el frame actual
    face_locations = face_recognition.face_locations(rgb_frame)
    face_encodings = face_recognition.face_encodings(rgb_frame, face_locations)

    # Comparar cada cara detectada con las caras de la base de datos
    for face_encoding in face_encodings:
        matches = face_recognition.compare_faces(person_encodings, face_encoding)
        name = "Desconocido"

        # Si encontramos una coincidencia con alguna cara de la base de datos, obtenemos el nombre de la persona
        if True in matches:
            match_index = matches.index(True)
            name = person_names[match_index]

            # Enviar comando a la ESP32 para encender el LED
            ser.write(b'1')  # '1' es un ejemplo de comando para encender el LED

            # Dibujar un rectángulo y el nombre de la persona en el frame
            top, right, bottom, left = face_locations[0]
            cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 2)
            cv2.putText(frame, name, (left + 6, bottom - 6), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 1)
        else:
            # Enviar comando a la ESP32 para apagar el LED
            ser.write(b'0')  # '0' es un ejemplo de comando para apagar el LED

    # Mostrar el frame con el reconocimiento facial
    cv2.imshow('Reconocimiento Facial', frame)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
