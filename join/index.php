<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/../phpscript/test.php';
  session_start();
  ini_set('error_reporting', 'E_ALL & ~E_NOTICE');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CLEAN GUYS ~会員登録~</title>
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
      <h2>アカウント作成</h2>
      <p>アカウントを作成するには、次のフォームに必要事項をご記入ください。</p>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="control">
          <label for="myname">ニックネーム<span class="required">必須</span></label>
          <input id="myname" type="text" name="name" value="">
          <?php if ($error['name'] === 'blank'): ?>
            <p class="error" style="color:red;">* ニックネームを入力してください</p>
          <?php endif ?>
        </div>
        <div class="control">
          <label for="mymail">メールアドレス<span class="required">必須</span></label>
          <input id="mymail" type="email" name="email" value="">
          <?php if ($error['email'] === 'blank'): ?>
            <p class="error" style="color:red;">* メールアドレスを入力してください</p>
          <?php endif ?>
          <?php if ($error['email'] === 'duplicate'): ?>
            <p class="error" style="color:red;">* 指定されたメールアドレスはすでに登録されています</p>
          <?php endif ?>
        </div>
        <div class="control">
          <label for="mypassword">パスワード<span class="required">必須</span></label>
          <input id="mypassword" type="password" name="password" value="">
          <?php if ($error['password'] === 'blank'): ?>
            <p class="error" style="color:red;">* パスワードを入力してください</p>
          <?php endif ?>
          <?php if ($error['password'] === 'length'): ?>
            <p class="error" style="color:red;">* パスワードは4文字以上で入力してください</p>
          <?php endif ?>
        </div>
        <div class="control">
          <label for="myimage">プロフィール画像<span class="required">必須</span></label>
          <input id="myimage" type="file" name="image" value="">
          <?php if (!empty($error)): ?>
            <p class="error" style="color:red;">* 恐れ入りますが、画像を改めて指定してください。</p>
          <?php endif ?>
        </div>
        <div class="control">
          <button type="submit" name="operation" style="color:#fff">入力内容を確認する</button>
        </div>
      </form>
    </div>
    <footer>
      <p><small>&copy; 2021 CLEAN GUYS</small></p>
    </footer>
  </div>
</body>
</html>
