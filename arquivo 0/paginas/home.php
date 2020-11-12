<?php
    //verificando se a variavel existente

    if(!isset($pagina)){
        
        exit;

    }
?>
<h1>Produtos em Destaque:</h1>

<div class="row">
    
    <?php
        // selecionando os itens da tabela produtos do BD
        //limitando a quantidade em 6
        //trazendo de forma randomica 
        $sql = "select * from produto order by rand() limit 6";

        $result = mysqli_query($con, $sql);

        //separando os dados por linha
        while ($dados = mysqli_fetch_array( $result )) {
            //separar
            $id = $dados["id"];
            $produto = $dados["produto"];
            $imagem = $dados["imagem"];
            $valor = $dados["valor"];
            $promo = $dados["promo"];

            if(empty ($promo)){
                //formatando a numeração
                $valor = "R$ ".number_format($valor,2,",",".");
                $de="";
            }else{
                $de = "De R$ ".number_format($valor,2,",",".");
                $valor = "Por R$ ".number_format($promo,2,",",".");
            }

           echo "<div class = 'col-12 col-md-4 text-center'>
                <img src='produtos/{$imagem}' alt='{$produto}' class='w-100'>
                <h2>{$produto}</h2>
                <p class='de'>{$de}</p>
                <p class='valor'>{$valor}</p>
                <p>
                    <a href='index.php?pagina=produto&id={$id}' class='btn btn-success btn-lg w-100'>
                    Detalhes
                    </a>            
            </div>";

        }

    ?>
</div>