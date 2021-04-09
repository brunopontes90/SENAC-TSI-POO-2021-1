<?php

require_once '../db/db.php';
require_once 'sessao.php';
$banco = new BancoDeDados();
$sessao = new Sessao();

if($sessao->estaLogado()){ //caso o user estiver logado no sistema

    include 'pag.php';

}else if(isset($_POST['entrar'])){ //caso o user tenha acabado de preencher o form de login

    // Faz o select no banco verificando se o login e senha informados existem

    // Faz o select no banco verificando se o login e senha informados existem
    // $query = $banco->prepare("SELECT id, nome, admin FROM cadastro WHERE email = :email AND senha = :senha");
    // $query->bindparam(':email', $_POST['login']);
    // $query->bindparam(':senha', $_POST['senha']);
    // $query->execute();
    
    // // pega todas as linhas em forma de array
    // $result = $query->fetchAll(PDO::FETCH_CLASS);
    
    // Verifica se existe 1 elemento dentro do array
    $dadosDoUsuario = $banco->consultaUsuario($_POST['login'], $_POST['senha']);
    if (count($dadosDoUsuario) == 1) {

        // session_start();
        $sessao->iniciarSessao();

        //Cria vetor no SESSION para o login do user e verifica se existe esse login nas outras paginas
        $sessao->armazenaInformacoes($dadosDoUsuario[0]->nome, $dadosDoUsuario[0]->id, $dadosDoUsuario[0]->admin);
        
        // redireciona para a home
        header('Location: /index.php');
    }else{
        $msg = 'Credenciais invalidas, tente novamente';
        include '../html/login.php'; //se nao estiver entra no form
    }
}else { //Caso o user tenha entrado pela 1° vez no site

    include '../html/login.php'; //se nao estiver entra no form
}