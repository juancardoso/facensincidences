<?php

class ApiTeste extends CI_Controller {

    public function index(){
        $valid_passwords = array ("juan" => "testando123#*!");
        $valid_users = array_keys($valid_passwords);
        
        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];

        $validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

        if (!$validated) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            die ("Not authorized");
        }

        $json["cep"]         = "0000-000";
        $json["logradouro"]  = "Rua dos paralelepípedos";
        $json["complemento"] = "Predio x4";
        $json["bairro"]      = "São Gonçalo";
        $json["localidade"]  = "S\u00e3o Paulo";
        $json["uf"]          = "SP";
        $json["unidade"]     = "12344321";
        $json["ibge"]        = "123456789";
        $json["gia"]         = "123456789";

        echo json_encode($json);
    }
}