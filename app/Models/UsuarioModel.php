<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuarios';
    protected $allowedFields = ['usuario', 'password', 'email', 'rol_id'];

    // Método para buscar un usuario por su nombre de usuario
    public function getUserByUsername($username)
    {
        return $this->where('usuario', $username)->first();
    }
}
