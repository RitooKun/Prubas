<?php
class HomeModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($evento, $fecha, $time_start, $time_end, $color)
    {
        $sql = "INSERT INTO registros (title, start, time_start, time_end, color) VALUES(?,?,?,?,?)";
        $array = array($evento, $fecha, $time_start, $time_end, $color);
        $data = $this->save($sql, $array);
        if ( $data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function modificar($evento, $fecha, $time_start, $time_end, $color, $id)
    {
        $sql = "UPDATE registros SET title=?, start=?, time_start=?, time_end=?, color=? WHERE id=?";
        $array = array($evento, $fecha, $time_start, $time_end, $color, $id);
        $data = $this->save($sql, $array);
        if ( $data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM registros WHERE id=?";
        $array = array($id);
        $data = $this->save($sql, $array);
        if ( $data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function drop($fecha, $id)
    {
        $sql = "UPDATE registros SET start=? WHERE id=?";
        $array = array($fecha, $id);
        $data = $this->save($sql, $array);
        if ( $data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function listarEventos()
    {
        $sql = "SELECT * FROM registros";
        return $this->selectAll($sql);
    }
}

?>