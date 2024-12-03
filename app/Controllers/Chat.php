<?php

namespace App\Controllers;

class Chat extends BaseController {
    public function index() {
        return view('chat_view');  // Asegúrate de que el nombre de la vista sea correcto
    }
}
