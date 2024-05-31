<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, 'index');
    }
    public function registrar()
    {
        // Verifica Que no contengan campos vacios
        if (empty($_POST['title']) || empty($_POST['start']) || empty($_POST['time_start']) || empty($_POST['time_end']) || empty($_POST['color'])){
            $mensaje = array('msg' => 'Todos los campos son requeridos', 'Estado' => false , 'tipo' => 'warmimg');
        }else{

            //Recolecta los datos para enviar mensajes de alertas

            $evento = $_POST['title'];
            $start = $_POST['start'];
            $time_start = $_POST['time_start'];
            $time_end = $_POST['time_end'];
            $color = $_POST['color'];
            $id = $_POST['id'];
            if ($id == '') {
                $respuesta = $this->model->registrar($evento, $start, $time_start, $time_end, $color);
                if ($respuesta == 1) {
                    $mensaje = array('msg' => 'Reserva registrado', 'Estado' => true , 'tipo' => 'success');
                } else {
                    $mensaje = array('msg' => 'Error al registrar la reserva', 'Estado' => false , 'tipo' => 'error');
                };
            }else{
                $respuesta = $this->model->modificar($evento, $start, $time_start, $time_end, $color, $id);
                if ($respuesta == 1) {
                    $mensaje = array('msg' => 'Reserva modificar', 'Estado' => true , 'tipo' => 'success');
                } else {
                    $mensaje = array('msg' => 'Error al modificar la reserva', 'Estado' => false , 'tipo' => 'error');
                };
            }

            // Imprime el mensaje que de la accion

            echo json_encode($mensaje);
            die();

        }
    }
    public function listar()
    {
        $data = $this->model->listarEventos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Mensajes de de avisos al intentar eliminar

    public function eliminar($id)
    {
        $data = $this->model->eliminar($id);
        if ($data == 1) {
            $mensaje = array('msg' => 'Reserva eleminado', 'Estado' => true , 'tipo' => 'success');
        } else {
            $mensaje = array('msg' => 'Error al eliminar la reserva', 'Estado' => false , 'tipo' => 'error');
        };
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Mensajes de de avisos al mover un registro de sala

    public function drop()
    {
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
        $data = $this->model->drop($fecha, $id);
        if ($data == 1) {
            $mensaje = array('msg' => 'Reserva modificada', 'Estado' => true , 'tipo' => 'success');
        } else {
            $mensaje = array('msg' => 'Error al modificar la reserva', 'Estado' => false , 'tipo' => 'error');
        };

        // Se envia el mensaje y utiliza unicode para que no se encuentren problemas con las letras

        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
}

