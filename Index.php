<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Jogo de Memória</title>
    <!-- Inclua aqui seus estilos CSS se necessário -->
</head>
<body>



<?php
include_once 'php/JogoMemoria.php';

$seuJogo = new JogoMemoria();


if (isset($_POST['carta1']) && isset($_POST['carta2'])) {
    $posicaoCarta1 = (int)$_POST['carta1'];
    $posicaoCarta2 = (int)$_POST['carta2'];
    $seuJogo->analisar($posicaoCarta1, $posicaoCarta2);
}


$seuJogo->gerarHtmlJogo();
?>

<?php echo $seuJogo->getHtml(); ?>

<?php echo $seuJogo->gethtmlPontos(); ?>


</body>
</html>
