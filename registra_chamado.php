<?php

//Montagem do texto
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

//implode ('#', $_POST); transfrma array em string 
$texto = $titulo . '#' . $categoria . '#' .  $descricao . PHP_EOL;


//Abrindo o arquivo
$arquivo = fopen('arquivo.hd', 'a'); //le o arquivo indicado, se n existir ele cria..
//parametro 'a' abre o arquivo para escrita..

//escrevendo
fwrite($arquivo, $texto); //escreve dentro do arqv
//fechando o arquivo
fclose($arquivo); //deve-ser fechar o arqv ao final das instrucoes
   // echo $texto;


header('Location:home.php?chamado=feito');
?>