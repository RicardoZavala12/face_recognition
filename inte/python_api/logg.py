from flask import Flask, request, jsonify
import requests

app = Flask(__name__)

FIREBASE_URL = 'https://esp32-5e9a7-default-rtdb.firebaseio.com/'

@app.route('/api/admins', methods=['GET'])
def get_admins():
    response = requests.get(FIREBASE_URL + 'admin.json')
    return jsonify(response.json())

#ENVIAR
@app.route('/api/admins', methods=['POST'])
def create_admin():
    data = request.json
    response = requests.post(FIREBASE_URL + 'admin.json', json=data)
    return jsonify(response.json())

@app.route('/api/admins/<id>', methods=['PUT'])
def update_admin(id):
    data = request.json
    response = requests.put(FIREBASE_URL + f'admin/{id}.json', json=data)
    return jsonify(response.json())

@app.route('/api/admins/<id>', methods=['DELETE'])
def delete_admin(id):
    response = requests.delete(FIREBASE_URL + f'admin/{id}.json')
    return jsonify(response.json())

#USUSARIOS
@app.route('/api/usuario', methods=['GET'])
def get_usuario():
    response = requests.get(FIREBASE_URL + 'usuario.json')
    return jsonify(response.json())

#ENVIAR
@app.route('/api/usuario', methods=['POST'])
def create_usuario():
    data = request.json
    response = requests.post(FIREBASE_URL + 'usuario.json', json=data)
    return jsonify(response.json())

@app.route('/api/usuario/<id>', methods=['PUT'])
def update_usuario(id):
    data = request.json
    response = requests.put(FIREBASE_URL + f'usuario/{id}.json', json=data)
    return jsonify(response.json())

@app.route('/api/usuario/<id>', methods=['DELETE'])
def delete_usuario(id):
    response = requests.delete(FIREBASE_URL + f'usuario/{id}.json')
    return jsonify(response.json())

#LOGS_FIREBASE
@app.route('/api/face_recognition', methods=['GET'])
def get_face_recognition():
    response = requests.get(FIREBASE_URL + 'face_recognition.json')
    return jsonify(response.json())

if __name__ == '__main__':
    app.run(debug=True)
# EJECUTAR CON "python logg.py"
