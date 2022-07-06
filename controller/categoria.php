<?php

    require "model/CategoriaModel.php";
    require "controller/Controller.php";

    class Categoria extends Controller{
        function __construct(){
            $this->model = new CategoriaModel();
        }

        function index(){
            $categorias = $this->model->buscarTodos();
            $this->load_template("categoria/listagem.php", $categorias);
            include "view/template/cabecalho.php";
            include "view/template/footer.php";
            include "view/template/menu.php";
            include "view/categoria/listagem.php";
        }
        function inserir(){

        }
        function excluir($id){
            $this->model->exluir($id);
        }
    }


    //$model->inserir("Produto de Limpeza");
    //$model->excluir("1");
    //$model->atualizar("Smartphone", 1);
    


?>