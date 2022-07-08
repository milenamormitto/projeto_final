<?php
require "model/CategoriaModel.php";


class Categoria
{

    function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?c=restrito&m=login');
        }
        $this->model = new CategoriaModel();
    }

    function index()
    {
        $categorias = $this->model->buscarTodos();
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/categoria/listagem.php";
        include "view/template/rodape.php";
    }

    function add()
    {
        $categorias = $this->model->buscarTodos();
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/categoria/form.php";
        include "view/template/rodape.php";
    }

    function excluir($id)
    {
        $this->model->excluir($id);
        header('Location: ?c=categoria');
    }

    function salvar()
    {
        if (isset($_POST['categoria'])  && !empty($_POST['categoria'])) {

            if (empty($_POST['idcategoria'])) {
                $this->model->inserir($_POST['categoria']);
            } else {
                $this->model->atualizar($_POST['categoria'], $_POST['idcategoria']);
            }
            header('Location: ?c=categoria');
        } else {
            echo "Ocorreu um erro, pois o campo não foi preenchido";
        }
    }

    function editar($id)
    {
        $categorias = $this->model->buscarTodos();
        $categoria = $this->model->buscarPorId($id);
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/categoria/form.php";
        include "view/template/rodape.php";
    }
}
    

    //$model->inserir("Produto de Limpeza"); //inserir dados
    //$model->excluir(1); //exclui dados
    //$model->atualizar("Smartphone", 2); //atulixa os dados
    //var_dump($model->buscarTodos()); //busca todos itens
    //var_dump($model->buscarPorId(2)); // busca algum item pelo seu ID