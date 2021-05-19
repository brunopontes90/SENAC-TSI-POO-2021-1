<?php
ini_set('display_errors', 1); //mostra os erros, em produção coloque 0
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Config {
    public $db = 'mysql:host=localhost;dbname=SENAC_TSI_POO_2021_1';//'sqlsrv:Server=localhost\\SQLEXPRESS;Database=SENAC_TSI_POO_2021_1';//localhost na maioria dos PCs dos alunos
    public $user = 'root';
    public $password = '';
}