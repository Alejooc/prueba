<?php
   require_once (__DIR__."/autoload.php");

 class usuario extends conexion{
    private $nombre;
    private $email;
    private $sexo;
    private $area;
    private $descripcion;
    private $boletin;
    private $rol;
    private $conexion;


    public function __construct() {
       $this->conexion= new conexion();
    }

    public function insertarUsuario($nombre,$email,$sexo,$area,$boletin,$descripcion) 
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->sexo = $sexo;
        $this->area = $area;
        $this->descripcion = $descripcion;
        $this->boletin = $boletin;
/*         $this->rol = $rol;
 */
        $sql = "INSERT INTO empleados(nombre,email,sexo,area_id,boletin,descripcion) VALUES(?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData= array($this->nombre,$this->email,$this->sexo,$this->area,$this->boletin,$this->descripcion);
        $resInsert = $insert->execute($arrData);
        $idInsert= $this->conexion->lastInsertId();
        return $idInsert;
    }
    public function insertarRolUsuario($id,$rol) 
    {
      
        for ($i=0; $i < count($rol); $i++) { 
           
            $sql = "INSERT INTO empleado_rol(empleado_id,rol_id) VALUES(?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData= array($id,$rol[$i]);
            $resInsert = $insert->execute($arrData);
            if ($resInsert) {
                echo "inserto";
            }
            
        }
        
    }
    public function updateUsuario($nombre,$email,$sexo,$area,$boletin,$descripcion,$id) 
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->sexo = $sexo;
        $this->area = $area;
        $this->descripcion = $descripcion;
        $this->boletin = $boletin;
/*         $this->rol = $rol;
 */
        $sql = "UPDATE empleados SET nombre=?,email=?,sexo=?,area_id=?,boletin=?,descripcion=? WHERE id=$id";
        $update = $this->conexion->prepare($sql);
        $arrData= array($this->nombre,$this->email,$this->sexo,$this->area,$this->descripcion,$this->boletin);
        $resUpdate = $update->execute($arrData);
        return $resUpdate;
    }
    public function updateRol($id) 
    {
        $this->id= $id;
        $sql = "DELETE FROM empleado_rol WHERE empleado_id=$id";
        $execute = $this->conexion->query($sql);
        return $execute;
    }
    public function getUsuarios() 
    {

        $sql = "SELECT e.id,e.nombre,e.email,e.sexo,e.area_id,e.boletin,e.descripcion, a.nombre as 'area' FROM empleados e INNER JOIN  areas a on a.id = e.area_id ORDER BY id desc";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function getUsuario($id) 
    {

        $sql = "SELECT e.id,e.nombre,e.email,e.sexo,e.area_id,e.boletin,e.descripcion, a.nombre
         as 'area', em.rol_id as 'rol' FROM empleados e INNER JOIN  areas a on a.id = e.area_id 
        JOIN  empleado_rol em on e.id = em.empleado_id where e.id = $id";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function delUsuarios($id) 
    {
        $sql = "DELETE FROM empleados WHERE id=$id";
        $execute = $this->conexion->query($sql);
        return $execute;
    }

    public function getAreas() 
    {

        $sql = "SELECT * FROM areas";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function getRoles() 
    {

        $sql = "SELECT * FROM roles";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function getRolesU($id) 
    {

        $sql = "SELECT * FROM empleado_rol where empleado_id = $id";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
 }
?>