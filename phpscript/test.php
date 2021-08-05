<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/escape.php';
  require_once dirname(__FILE__) . '/fileupload.php';
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
  // 画像アップロード
  list($result, $message) = validate();
  if ($result !== true) {
    echo '[Error]', $message;
    return;
  }
  $destinationPath = generateDestinationPath();
  $moved = move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
  if ($moved !== true) {
    echo 'アップロード中にエラーが発生しました。';
    return;
  }
  if (empty($error)) {
    $_SESSION['join'] = $_POST;
    $_SESSION['join']['image'] = $destinationPath;
    header('Location: check.php');
    exit();
  }
}
// 書き直し
if ($_REQUEST['action'] === 'rewrite') {
  $_POST = $_SESSION['join'];
  $error['rewrite'] = true;
}
