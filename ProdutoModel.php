<?php

require_once "config/Conexao.php";
class ProdutoModel
{
    function __construct()
    {
        $this->conexao = Conexao::getConnection();
    }

    function inserir($nome, $descricao, $preco, $marca, $foto, $idCategoria)
    {
        $sql = "INSERT INTO produto (nome, descricao, preco, marca, foto, categoria_idCategoria) values (?, ?, ?, ?, ?, ?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("ssdssi", $nome, $descricao, $preco, $marca, $foto, $idCategoria);
        return $comando->execute();
    }

    function excluir($id)
    {
        $sql = "DELETE FROM produto WHERE idProduto = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        return $comando->execute();
    }

    function atualizar($id, $nome, $descricao, $preco, $marca, $foto, $idCategoria)
    {
        $sql = "UPDATE produto SET nome = ?, descricao = ?, preco = ?, marca = ?, foto = ?, categoria_idCategoria = ? WHERE idProduto = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("ssdssii", $nome, $descricao, $preco, $marca, $foto, $idCategoria, $id);
        return $comando->execute();
    }

    function buscarTodos()
    {
        $sql = "SELECT * FROM produto";
        $comando = $this->conexao->prepare($sql);
        if ($comando->execute()) {
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    function buscarPorId($id)
    {
        $sql = "SELECT * FROM produto WHERE idProduto = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        if ($comando->execute()) {
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }

    function buscarPorCategoria($idcategoria)
    {
        $sql = "SELECT * FROM produto WHERE categoria_idCategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $idcategoria);
        if ($comando->execute()) {
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    function buscarPorLikeNome($nome)
    {
        $nome = "%$nome%";
        $sql = "SELECT * FROM produto WHERE nome like ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("s", $nome);
        if ($comando->execute()) {
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
}
