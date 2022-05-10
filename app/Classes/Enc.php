<?php

namespace App\Classes;

class Enc
{

    public function encriptar($valor)
    {
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', 'MXrTiOSoWdLjcNNV1vnpfs2pQ0BsJ6lZ', OPENSSL_RAW_DATA, 'JyrZWfRlh2W3zpF6'));
    }

    public function desencriptar($valor_encriptado)
    {
        // Verificar se a Hash é válida

        if (strlen($valor_encriptado) % 2 != 0) {
            return null;
        }

        return openssl_decrypt(hex2bin($valor_encriptado), 'aes-256-cbc', 'MXrTiOSoWdLjcNNV1vnpfs2pQ0BsJ6lZ', OPENSSL_RAW_DATA, 'JyrZWfRlh2W3zpF6');

    }
}
