<?php

    require "../model/CategoriaModel.php";

    class Categoria{
        function __construct(){
            $this->model = new CategoriaModel();
        }
        function index(){
            var_dump($this->model->buscarTodos(1));
        }
        function inserir(){
            echo "Testando função inserir";
        }
    }


    //$model->inserir("Produto de Limpeza");
    //$model->excluir("1");
    //$model->atualizar("Smartphone", 1);
    


?>