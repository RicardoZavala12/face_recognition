<?php
require_once './models/Usuario.php';

class UsuarioController {
    public function index() {
        $usuarios = Usuario::getAll();
        require './views/usuario/usuario_list.php';
    }

    public function create() {
        require './views/usuario/usuario_create.php';
    }

    public function store() {
        // Verificar si se ha enviado el formulario y si el archivo se ha subido sin errores
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] == 0) {
            $nombre = $_POST['nombre'];
            $fotografia = $_FILES['fotografia'];
            
            // Ruta de la carpeta donde se guardará la imagen
            $target_dir = "C:/Users/eCore/Documents/school/proy/Sistema-de-Acceso-con-Reconocimiento-Facial/base_de_datos/";
            
            // Extensiones permitidas
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $file_extension = strtolower(pathinfo($fotografia['name'], PATHINFO_EXTENSION));

            // Validar la extensión del archivo
            if (in_array($file_extension, $allowed_extensions)) {
                $target_file = $target_dir . $nombre . "." . $file_extension;

                // Mover el archivo subido a la carpeta destino
                if (move_uploaded_file($fotografia['tmp_name'], $target_file)) {
                    // Añadir la fecha y hora del sistema al array $_POST
                    $_POST['fecha_registro'] = date('Y-m-d H:i:s');
                    
                    // Guardar los datos del formulario en la base de datos
                    Usuario::create($_POST);
                    header('Location: index.php?controller=usuario&action=index');
                } else {
                    // Error al mover el archivo
                    $error_message = "Lo siento, hubo un error al subir tu archivo.";
                    header('Location: index.php?controller=usuario&action=create&error=' . urlencode($error_message));
                }
            } else {
                // Formato de archivo no permitido
                $error_message = "Formato de la imagen inválido. Intente con estos formatos: jpg, jpeg o png.";
                header('Location: index.php?controller=usuario&action=create&error=' . urlencode($error_message));
            }
        } else {
            // No se ha subido ningún archivo o hubo un error en la subida
            $error_message = "No se ha subido ningún archivo o hubo un error en la subida.";
            header('Location: index.php?controller=usuario&action=create&error=' . urlencode($error_message));
        }
    }

    public function edit($id) {
        $usuarios = Usuario::getAll();
        $usuario = $usuarios[$id];
        require './views/usuario/usuario_edit.php';
    }

    public function update($id) {
        Usuario::update($id, $_POST);
        header('Location: index.php?controller=usuario&action=index');
    }

    public function destroy($id) {
        Usuario::delete($id);
        header('Location: index.php?controller=usuario&action=index');
    }
}
?>
