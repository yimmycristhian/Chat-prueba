<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        try {
            // Conectarse a la base de datos
            $db = Database::connect();
            
            // Intentar una consulta simple
            $query = $db->query("SHOW TABLES");
            $result = $query->getResult();

            if ($result) {
                echo "Conexión a la base de datos exitosa. Tablas encontradas:";
                echo "<pre>";
                print_r($result); // Muestra las tablas de la base de datos
                echo "</pre>";
            } else {
                echo "Conexión a la base de datos exitosa, pero no se encontraron tablas.";
            }
        } catch (\Exception $e) {
            // Mostrar error si no puede conectarse a la base de datos
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        }
    }
}
