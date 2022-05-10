<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;

class Logger
{

    public function log($level, $message)
    {
        // Tenta Adicionar uma Menssagem a Identificação do Usuário Ativo
        if (session()->has('usuario')) {
            $message = '['.session('usuario')->usuario.'] - ' . $message;
        } else {
            $message = '[N/A] - ' . $message;
        }

        // Registra uma Entrada nos Logs
        Log::channel('main')->$level($message);
    }
}
