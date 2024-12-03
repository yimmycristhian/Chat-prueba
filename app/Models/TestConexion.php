<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class TestConexion extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll();

        echo "<pre>";
        print_r($usuarios);
        echo "</pre>";
    }
}
