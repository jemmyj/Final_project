<?php

class Conectar
{
    protected $dbh;

    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:host=127.0.0.1;port=3307;dbname=SNK&VAN", "root", ""); // LOCAL
            return $conectar;
        } catch (Exception $e) {
            echo "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
