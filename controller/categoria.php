<?php
    require "../conexao.php";
    require "../model/categoria_model.php";
    $model = new CategoriaModel($con);

    $model->inserir("Produto de Limpeza");
    $model->excluir("1");
    $model->atualizar("Smartphone", 1);
    var_dump($model->buscarTodos());


?>