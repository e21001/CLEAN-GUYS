<?php
declare(strict_types=1);
require_once dirname(__FILE__) . '/../phpscript/test.php';
session_start();
ini_set('error_reporting', 'E_ALL & ~E_NOTICE');
// セッション情報があるか確認
if (!isset($_SESSION['join'])) {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>確認画面</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="../cleanguys.css">
</head>
<body>
  <div class="container">
    <header>
      <h1><img class="header-logo" src="../img/logo.png" alt="CLEAN GUYSロゴ"></h1>
    </header>
    <div class="registration-form">
      <h2>入力内容の確認</h2>
      <p>記入した内容を確認して、「登録する」ボタンをクリックしてください。</p>
      <form　action="" method="post" enctype="multipart/form-data">
        <div class="control">
          <p>ニックネーム</p>
          <p><?php echo escape($_SESSION['join']['name']) ?></p>
        </div>
        <div class="control">
          <p>メールアドレス</p>
          <p><?php echo escape($_SESSION['join']['email']) ?></p>
        </div>
        <div class="control">
          <p>パスワード</p>
          <p>【表示されません】</p>
        </div>
        <div class="control">
          <p>プロフィール画像</p>
          <p><img src="<?php echo escape($_SESSION['join']['image'])?>" style="width:100px" alt="こんにちは"></p>
        </div>
        <p><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a></p>
        <div class="control">
          <button type="submit" name="operation" style="color:#fff">登録する</button>
        </div>
      </form>
    </div>
    <footer>
      <p><small>&copy; 2021 CLEAN GUYS</small></p>
    </footer>
  </div>
</body>
</html>
