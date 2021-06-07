<?php
require_once 'config.php';

class BancoDeDados {
    private $pdo;
    private $login;

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


    // TODO: remover esse metodo
    public function pegaPDO(): PDO {
        return $this->pdo;
    }

    public function consultaTodosProdutos(): array {
        // Listar a consulta
        $sql = "SELECT * FROM produto";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function consultaUsuario(string $login, string $senha) : array {
        // TODO: terminar de implementar o código que consulta a tabela cadastro procurando por um registro pelo login e senha
        //login.
        $dados = $this->pdo->prepare("SELECT id, nome, admin FROM cadastro WHERE email = :email AND senha = :senha");
        $dados->bindparam(':email', $login);
        $dados->bindparam(':senha', $senha);
        $dados->execute();

        // pega todas as linhas em forma de array
        return $dados->fetchAll(PDO::FETCH_CLASS);
    }

    public function editaUsuario(): array{
        $dados = $this->pdo->prepare("SELECT id, email, nome, endereco, complemento, cidade, estado, cep FROM cadastro WHERE id = " . $sessao['id']);
    }
}
