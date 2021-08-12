<?php
  require_once dirname(__FILE__) . '/../escape.php';
  require_once dirname(__FILE__) . '/../dbconnect.php';
  session_start();

  if (!empty($_POST)) {
    // ログインの処理
    if ($_POST['email'] != '' && $_POST['password'] != '') {
      $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
      $login->execute(array(
        $_POST['email'],
        sha1($_POST['password'])
      ));
      $user = $login->fetch();

      if ($user) {
        // ログイン成功
        $_SESSION['id'] = $user['id'];
        $_SESSION['time'] = time();

        header('Location: post.php');
        exit();
      } else {
        $error['login'] = 'failed';
      }
    } else {
      $error['login'] = 'blank';
    }
  }
