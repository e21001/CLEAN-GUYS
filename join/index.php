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
        </div>
        <div class="control">
          <label for="mymail">メールアドレス<span class="required">必須</span></label>
          <input id="mymail" type="email" name="email" value="">
        </div>
        <div class="control">
          <label for="mypassword">パスワード<span class="required">必須</span></label>
          <input id="mypassword" type="password" name="password" value="">
        </div>
        <div class="control">
          <label for="myprofile">プロフィール画像<span class="required">必須</span></label>
          <input id="myprofile" type="file" name="profile" value="">
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
