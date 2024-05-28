import serial
import time

# Establecer conexión serial
ser = serial.Serial('COM14', 9600)  # Reemplaza 'COMX' con el puerto serial correcto

# Esperar un breve tiempo para que Arduino se inicialice
time.sleep(2)

# Enviar datos a Arduino
data_to_send = "Hello Arduino!\n"  # Agrega '\n' al final para indicar el final de línea
ser.write(data_to_send.encode())

# Leer mensaje de confirmación desde Arduino
confirmation_message = ser.readline().decode().strip()
print(confirmation_message)

# Cerrar la conexión serial
ser.close()
