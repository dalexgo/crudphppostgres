<?php
require_once("Conexion.php");
require_once("Interface_Animal.php");

class Animal implements Interface_Animal
{
	private $con;
    private $id;
    private $nombre;
    private $edad;

	public function __construct(Conexion $db)
	{
		$this->con = new $db;
	}

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

	//insertamos usuarios en una tabla con postgreSql
	public function save()
	{
		try{
			$query = $this->con->prepare('INSERT INTO animal (nombre, edad) values (?,?)');
            $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
			$query->bindParam(2, $this->edad, PDO::PARAM_STR);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
	}

    public function update()
	{
		try{
			$query = $this->con->prepare('UPDATE animal SET nombre = ?, edad = ? WHERE id = ?');
			$query->bindParam(1, $this->nombre, PDO::PARAM_STR);
			$query->bindParam(2, $this->edad, PDO::PARAM_STR);
            $query->bindParam(3, $this->id, PDO::PARAM_INT);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
	}

	//obtenemos usuarios de una tabla con postgreSql
	public function get()
	{
		try{
            if(is_int($this->id))
            {
                $query = $this->con->prepare('SELECT * FROM animal WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
    			$this->con->close();
    			return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM animal');
    			$query->execute();
    			$this->con->close();
    			return $query->fetchAll(PDO::FETCH_OBJ);
            }
		}
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
	}

    public function delete()
    {
        try{
            $query = $this->con->prepare('DELETE FROM animal WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }

    public static function baseurl()
    {
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/php/crudpgsql/";
    }

    public function checkanimal($animal)
    {
        if( ! $animal )
        {
            header("Location:" . animal::baseurl() . "app/list.php");
        }
    }
}