<?php

class ApiTesteSA extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
    }

    public function index(){
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