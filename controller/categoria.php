<?php

    require "model/CategoriaModel.php";
    require "controller/Controller.php";

    class Categoria extends Controller{
        function __construct(){
            $this->model = new CategoriaModel();
        }

        function index(){
            $categorias = $this->load_template("categoria/listagem.php", $categorias);
            $this->load_template("categoria/listagem.php");
        }
        function inserir(){

        }
    }


    //$model->inserir("Produto de Limpeza");
    //$model->excluir("1");
    //$model->atualizar("Smartphone", 1);
    


?>