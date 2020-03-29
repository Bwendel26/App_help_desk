<?php
   session_start();

   //verifica autenticacao
   $usuario_autenticado = false;

   $usuarios_app = [
      ['email' => 'adm@teste.com', 'senha' => '123456'],
      ['email' => 'user@teste.com', 'senha' => 'abcd'],
   ];

   foreach($usuarios_app as $user) {
      if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
         $usuario_autenticado = true;
      }
   }

   if($usuario_autenticado) {
      echo 'Usuário autenticado';
      $_SESSION['autenticado'] = 'SIM';
      header('Location: home.php');
   } else {
      $_SESSION['autenticado'] = 'NAO';
      header('Location: index.php?login=erro'); //redireciona para pagina indicada no Location
   }
?>