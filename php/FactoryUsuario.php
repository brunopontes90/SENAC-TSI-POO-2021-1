<?php

class FactoryUsuario{
    static function criarUsuario(){
        switch($tipo){
            case "Administrador":
                return new Administrador;
                break;
            case "Usuario":
                return new Usuario;
        }
    }
}