<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/escape.php';
  session_start();
  ini_set('error_reporting', 'E_ALL & ~E_NOTICE');

// エラー項目の確認
if (!empty($_POST)) {
  if ($_POST['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($_POST['email'] === '') {
    $error['email'] = 'blank';
  }
  if (strlen($_POST['password']) < 4) {
    $error['password'] = 'length';
  }
  if ($_POST['password'] === '') {
    $error['password'] = 'blank';
  }
  if (empty($error)) {
    $_SESSION['join'] = $_POST;
    header('Location: check.php');
    exit();
  }
}
