<?php
require_once 'config.php';

class BancoDeDados {
    private $pdo;

    public function __construct(){
        $this->conecta();
    }

    private function conecta(): void{
        // CONECTA COM O BANCO DE DADOS 'CADASTRO'
        $config = new Config();

        try {
            $this->pdo = new PDO($config->db, $config->user, $config->password);
        } catch (PDOException $objErro) {
            echo 'SGBD Indisponivel: ' . $objErro -> getMessage();
            exit();
        }
    }

    public function consultaTodosProdutos(): array {
        // Listar a consulta
        $sql = "SELECT * FROM produto";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function realizaLogin(string $login, string $senha) : array {
        // TODO: terminar de implementar o código que consulta a tabela cadastro procurando por um registro pelo login e senha
        //login.
    }
    
}
