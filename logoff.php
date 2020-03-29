<?php

   session_start();

   // print_r($_SESSION);
   //remover indices do array de sessao
   //unset() remove indices de qqr array

   //destruir a variavel de sessao
   //session_destroy() remove todos os indices.

   session_destroy(); //efeitos após nova requisição
   header('Location:index.php')
?>