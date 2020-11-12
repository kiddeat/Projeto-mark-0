<?php
    //verificando se a variavel existente

    if(!isset($pagina)){
        
        exit;

    }
    //corrigindo possiveis problemas do GET
    $id= trim($_GET["id"] ?? "");
    $id = (int)$id;

$sql = "SELECT * FROM produto where id = {$id} limit 1";
$result = mysqli_query($con,$sql);
$dados = mysqli_fatch_array($result);

$id = $dados["id"];
$produto = $dados["produto"];
$valor = $dados["valor"];
$promo = $dados["promo"];
$descricao = $dados["descricao"];
$image = $dados["image"];

?>

