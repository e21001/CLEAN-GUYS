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
          <p>ここにニックネーム</p>
        </div>
        <div class="control">
          <p>メールアドレス</p>
          <p>ここにメールアドレス</p>
        </div>
        <div class="control">
          <p>パスワード</p>
          <p>【表示されません】</p>
        </div>
        <div class="control">
          <p>プロフィール画像</p>
          <p>【表示されません】</p>
        </div>
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
