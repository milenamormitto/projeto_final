<?php
require_once "model/UsuarioModel.php";


class Usuario
{

    function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?c=restrito&m=login');
        }
        $this->model = new UsuarioModel();
    }

    function index()
    {
        $usuarios = $this->model->buscarTodos();
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/listagem.php";
        include "view/template/rodape.php";
    }

    function add()
    {
        $categorias = $this->model->buscarTodos();
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/form.php";
        include "view/template/rodape.php";
    }

    function excluir($id)
    {
        $this->model->excluir($id);
        header('Location: ?c=usuario');
    }

    function salvar()
    {
        if (isset($_POST['login'])  && !empty($_POST['login']) && !empty($_POST['senha'])) {

            if (empty($_POST['idusuario'])) {

                if (!$this->model->buscarPorLogin($_POST['login'])) {
                    $this->model->inserir($_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
                } else {
                    echo "Ocorreu um erro, pois o Usuario ja existe";
                    die();
                }
            } else {
                $this->model->atualizar($_POST['idusuario'], $_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
            }
            header('Location: ?c=usuario');
        } else {
            echo "Ocorreu um erro, pois os dados não foram compreendidos";
        }
    }

    function editar($id)
    {
        $categorias = $this->model->buscarTodos();
        $usuario = $this->model->buscarPorId($id);
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/form.php";
        include "view/template/rodape.php";
    }
}
    

    //$model->inserir("Produto de Limpeza"); //inserir dados
    //$model->excluir(1); //exclui dados
    //$model->atualizar("Smartphone", 2); //atulixa os dados
    //var_dump($model->buscarTodos()); //busca todos itens
    //var_dump($model->buscarPorId(2)); // busca algum item pelo seu ID