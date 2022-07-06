<?php
    require "config/Conexao.php";
    class CategoriaModel{

        function __construct(){
            $this->conexao = Conexao::getConnection();
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
            $sql = "SELECT * FROM categoria";
            $result = $this->conexao->prepare($sql);
            if($result->execute()){
                $result = $result->get_result();
                $result = $result->fetch_all(MYSQLI_ASSOC);
            }
            return $result;
        } 

        function buscarPorId($id){
            $sql = "SELECT * FROM categoria WHERE idcategoria = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            if($comando->execute()){
            $resultado = $comando->get_result();
            
            }
            return null;
        } 


        } 
    $model = new CategoriaModel();

?>