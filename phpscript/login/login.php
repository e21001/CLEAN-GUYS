<?php
  require_once dirname(__FILE__) . '/../escape.php';
  require_once dirname(__FILE__) . '/../dbconnect.php';
  session_start();

  if ($_COOKIE['email'] != '') {
    $_POST['email'] = $_COOKIE['email'];
    $_POST['password'] = $_COOKIE['password'];
    $_POST['save'] = 'on';
  }

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

        // ログイン情報を記録する
        if ($_POST['save'] === 'on') {
          setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 14);
          setcookie('password', $_POST['password'], time() + 60 * 60 * 24 * 14);
        }

        header('Location: index.php');
        exit();
      } else {
        $error['login'] = 'failed';
      }
    } else {
      $error['login'] = 'blank';
    }
  }
