<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this ->views->getView($this, 'index');
    }
    public function registrar()
    {
        if (empty($_POST['title']) || empty($_POST['start']) || empty($_POST['color'])){
            $mensaje = array('msg' => 'Todos los campos son requeridos', 'Estado' => false , 'tipo' => 'warmimg');
        }else{
            $evento = $_POST['title'];
            $start = $_POST['start'];
            $color = $_POST['color'];
            $respuesta = $this->model->registrar($evento,$start,$color);
            if ($respuesta == 1) {
                $mensaje = array('msg' => 'Evento registrado', 'Estado' => true , 'tipo' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al registrar el evento', 'Estado' => false , 'tipo' => 'error');
            };
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
}

