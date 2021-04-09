<?php

    class Sessao {
        //inicia a sessao
        public function iniciarSessao() {
            session_start(); //precisa para validar o codigo abaixo
        }

        public function pegaNomeUser() : string {
            return $_SESSION['login'];
        }

        public function pegaSenhaUser(): string {
            return $_SESSION['senha'];
        }

        public function armazenaInformacoes(string $login, int $id, bool $admin) : void {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id;
            $_SESSION['admin'] = $admin;
        }

        // verifica se esta logado se não, redireciona para o index
        public function redirecionaSeNaoTiverLogado() : void {
            if (!$this->estaLogado()) { //se nao estiver logado, retorna para 'index.php'
                header('Location: ./index.php'); // usado '/' para voltar ao 'index.php', ou pode usar 'index.php' direto
            }
        }

        // verifica se esta logado
        public function estaLogado() : bool {
            return isset($_SESSION['login']);
        }
        

        // DRY - Dont Repeat Yourself
        // verifica se esta logado e é admin
        public function ehAdmin() : bool {
            if ($this->estaLogado() && $_SESSION['admin'] == 1) {
                return true;
            }else {
                return false;
            }
        }
    }