<?php

require_once "model/UsuarioModel.php";

class Restrito
{

    function __construct()
    {
        $this->usuario = new UsuarioModel();
    }

    function login($id)
    {
        include "view/template/cabecalho.php";
        include "view/restrito/form.php";
        include "view/template/rodape.php";
    }

    function logout()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ?c=restrito&m=login');
    }

    function entrar()
    {
        if (isset($_POST['login']) && isset($_POST['senha'])) {
            $usuario = $this->usuario->buscarPorLogin($_POST['login']);
            if (password_verify($_POST['senha'], $usuario['senha'])) {
                session_start();
                $_SESSION['usuario'] = $usuario['login'];
                header('Location: ?c=categoria');
            } else {
                header('Location: ?c=restrito&m=login');
            }
        }
    }
}

    //$model->inserir("Produto de Limpeza"); //inserir dados
    //$model->excluir(1); //exclui dados
    //$model->atualizar("Smartphone", 2); //atulixa os dados
    //var_dump($model->buscarTodos()); //busca todos itens
    //var_dump($model->buscarPorId(2)); // busca algum item pelo seu ID