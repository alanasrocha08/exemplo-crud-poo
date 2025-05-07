<?php
require_once "conecta.php";

function listarFabricantes($conexao):array {
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

function inserirFabricante(PDO $conexao, string $nomeDoFabricante):void {

    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try{
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro){
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function listarUmFabricante(PDO $conexao, int $idFabricante):array {
    $sql = "SELECT * FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar fabricante: ".$erro->getMessage());
    }
}

function atualizarFabricante($conexao, $idFabricante, $nomeDoFabricante) :void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar fabricante: " . $erro->getMessage());
    }
}

function excluirFabricante($conexao, $idFabricante):void{
    $sql = "DELETE FROM fabricantes WHERE id = :id";

    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir fabricante: ".$erro->getMessage());
    }
}


