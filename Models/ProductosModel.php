<?php
class ProductosModel extends Mysql{
    public $id, $codigo, $nombre, $plataforma, $cantidad, $precio, $preciov, $impuesto, $moneda;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectProductos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProductosInactivos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarProductos(String $codigo, string $nombre, string $plataforma, string $precio, string $moneda)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->plataforma = $plataforma;
        $this->precio = $precio;
        $this->moneda = $moneda;
        $this->preciov = $precio+($precio*(3/100));
        $sql = "SELECT * FROM productos WHERE codigo = '{$this->codigo}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO productos(codigo, nombre, plataforma, precio, preciov, moneda) VALUES (?,?,?,?,?,?)";
            $data = array($this->codigo, $this->nombre, $this->plataforma, $this->precio, $this->preciov, $this->moneda);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarProductos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM productos WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarProductos(String $codigo, string $nombre, string $plataforma, string $cantidad, string $precio, string $impuesto, string $moneda, int $id)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->plataforma = $plataforma;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->preciov = $precio+($precio*($impuesto/100));
        $this->moneda = $moneda;
        $this->impuesto = $impuesto;
        $this->id = $id;
        $query = "UPDATE productos SET codigo=?, nombre=?, plataforma=?, cantidad=?, precio=?, preciov=?, moneda=?, impuesto=? WHERE id=?";
        $data = array($this->codigo, $this->nombre, $this->plataforma, $this->cantidad, $this->precio, $this->preciov, $this->moneda, $this->impuesto, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>