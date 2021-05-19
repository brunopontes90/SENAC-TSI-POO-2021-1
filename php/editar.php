<?php

require_once '../db/db.php';
$banco = new BancoDeDados;

require_once '../php/sessao.php';
$sessao = new Sessao();
$sessao->iniciarSessao();

// Listar a consulta
// $result = array();
// $sql = "SELECT id, email, nome, endereco, complemento, cidade, estado, cep FROM cadastro WHERE id = " . $_SESSION['id'];
$banco->consultaUsuario();


// executa a query e pega o resultado como array
$result = $banco->query($sql)->fetchAll();
 
// pega o primeiro registro do array
$row = $result[0];

// inclue o form html
include '../html/editar.php';