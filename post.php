<?php
  session_start();
  require_once dirname(__FILE__) . '/phpscript/test2.php';

  if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    // ログインしている
    $_SESSION['time'] = time();

    $users = $db->prepare('SELECT * FROM users WHERE id=?');
    $users->execute(array($_SESSION['id']));
    $user = $users->fetch();
  } else {
    // ログインしていない
    header('Location: cleanguys.php');
  }

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
      <h2><?php echo escape($user['name']) ?>さん、こんにちは！</h2>
      <form class="" name="post" action="" method="post" enctype="multipart/form-data">
        <dl>
          <dt>投稿はこちらから！</dt>
          <dd>
            <textarea name="postedMessage" rows="8" cols="80"></textarea>
            <?php if ($error['postedMessage'] === 'blank'): ?>
              <p class="error" style="color:red;">* メッセージ欄が空白です</p>
            <?php endif ?>
          </dd>
          <dt>写真など</dt>
          <dd>
            <input type="file" name="postedImage" value="">
            <?php if (!empty($error)): ?>
              <p class="error" style="color:red;">* 恐れ入りますが、画像を改めて指定してください。</p>
            <?php endif ?>
          </dd>
          <dt>ジャンル</dt>
          <dd>
            <select class="" name="category">
              <option value="1">募集</option>
              <option value="2">報告</option>
              <option value="3">情報</option>
            </select>
            <?php if ($error['category'] === 'blank'): ?>
              <p class="error" style="color:red;">* ジャンルを選択してください</p>
            <?php endif ?>
          </dd>
        </dl>
        <div class="">
          <button type="submit" name="">投稿する</button>
        </div>
      </form>
      <?php echo var_dump($_GET['post']) ?>
    </main>
    <footer>
      <p><small>&copy; 2021 CLEAN GUYS</small></p>
    </footer>
  </div>
</body>
</html>
