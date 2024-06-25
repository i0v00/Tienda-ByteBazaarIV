<?php
class ClientesModel extends Mysql{
    public $id, $ruc, $extci, $nombre, $telefono, $direccion, $membresia;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectClientes()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectClientesInactivos()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $ruc)
    {
        $this->ruc = $ruc;
        $sql = "SELECT * FROM clientes WHERE ruc = $this->ruc AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }

    public function insertarClientes(String $ruc,  String $extci, String $nombre, String $telefono, String $direccion, String $membresia)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->extci = $extci;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->membresia = $membresia;
        $sql = "SELECT * FROM clientes WHERE ruc = '{$this->ruc}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO clientes(ruc, extci, nombre, telefono, direccion, membresia) VALUES (?,?,?,?,?,?)";
            $data = array($this->ruc, $this->extci, $this->nombre, $this->telefono, $this->direccion, $this->membresia);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    
    public function editarClientes(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM clientes WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarClientes(String $ruc, string $extci, string $nombre, string $telefono, string $direccion, string $membresia, int $id)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->extci = $extci;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->membresia = $membresia;
        $this->id = $id;
        $query = "UPDATE clientes SET ruc=?, extci=?, nombre=?, telefono=?, direccion=?, membresia=? WHERE id=?";
        $data = array($this->ruc, $this->extci, $this->nombre, $this->telefono, $this->direccion, $this->membresia, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>