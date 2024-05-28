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
            $respuesta = $this->model->registrar($evento,$fecha,$color);
            echo $respuesta;
        }
    }
}
