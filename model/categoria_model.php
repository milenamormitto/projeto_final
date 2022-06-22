<?php
    class CategoriaModel{

        function __construct($conexao){
            $this->conexao = $conexao;
        }

        function inserir($nome){
            $sql = "INSERT INTO categoria (nome) values (?)";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("s", $nome);
            return $comando->execute();
        } 

        function excluir($id){
            $sql = "DELETE FROM categoria WHERE idcategoria = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            return $comando->execute();
        } 

        function atualizar($nome, $id){
            $sql = "UPDATE categoria SET nome=? WHERE idcategoria=?";
            $comando = $this->conexao->prepare($sql); 
            $comando->bind_param("si", $nome, $id);
            return $comando->execute();
        } 

        function buscarTodos(){
            $sql = "SELECT*FROM categoria";
            $comando = $this->conexao->prepare($sql);
            if($comando->execute()){
            return $resultado->fetch_all(MYSQLI_ASSOC);
            }
            return null;
        } 

        } 

?>