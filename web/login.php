<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/phpscript/login/login.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CLEAN GUYS ~ビーチクリーン募集掲示板~</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="cleanguys.css">
</head>
<body>
  <div class="container">
    <header>
      <h1><img class="header-logo" src="img/logo.png" alt="CLEAN GUYSロゴ"></h1>
    </header>
    <main>
      <div id="popup" class="login-popup registration-form show">
        <div class="content">
          <h2>ログイン</h2>
          <p>メールアドレスとパスワードを入力してログインしてください。</p>
          <p>アカウントをお持ちでない方はこちらからどうぞ。</p>
          <p>&raquo;<a href="join/index.php">アカウント作成</a></p>
          <form class="popup-form" action="" method="post">
            <div class="control">
              <label for="mymail">メールアドレス</label>
              <input id="mymail" type="email" name="email" value="">
              <?php if ($error['login'] === 'blank'): ?>
                <p class="error" style="color:red;">* メールアドレスとパスワードをご記入ください</p>
              <?php endif ?>
              <?php if ($error['login'] === 'failed'): ?>
                <p class="error" style="color:red;">* ログインに失敗しました。正しくご記入ください。</p>
              <?php endif ?>
            </div>
            <div class="control">
              <label for="mypassword">パスワード</label>
              <input id="mypassword" type="password" name="password" value="">
            </div>
            <div class="control">
              <button type="submit" name="operation" style="color:#fff">ログインする</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer>
      <p><small>&copy; 2021 CLEAN GUYS</small></p>
    </footer>
  </div>
</body>
</html>
