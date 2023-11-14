<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Memória</title>
    
</head>
<body>



<?php
include_once 'php/JogoMemoria.php';

$jogo = new JogoMemoria();


if (isset($_POST['carta1']) && isset($_POST['carta2'])) {
    $posicaoCarta1 = (int)$_POST['carta1'];
    $posicaoCarta2 = (int)$_POST['carta2'];
    $jogo->analisar($posicaoCarta1, $posicaoCarta2);
}


$jogo->gerarHtmlJogo();
?>

<?php echo $jogo->getHtml(); ?>

<?php echo $jogo->gethtmlPontos(); ?>


</body>
</html>
