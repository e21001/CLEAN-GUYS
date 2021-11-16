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
    <main class="post-page">
      <article class="">
        <h2><?php echo escape($user['name']) ?>さん、こんにちは！</h2>
        <h3 class="post-form-here">投稿はこちらから！</h3>
        <form class="post-form"  action="" method="post" enctype="multipart/form-data">
          <dl class="post-dl">
            <dt class="guide">写真など</dt>
            <dd>
              <input type="file" name="postedImage" value="">
            </dd>
            <dt class="guide">ジャンル</dt>
            <dd class="genre">
              <select class="" name="posted[category]">
                <option value="1">募集</option>
                <option value="2">報告</option>
                <option value="3">情報</option>
              </select>
            </dd>
            <dd>
              <textarea name="posted[postedMessage]" rows="3" cols="50"></textarea>
            </dd>
          </dl>
          <input type="submit" name="operation" value="投稿する">
        </form>
        <div class="display-posts">
          <img src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">something posted some lettter some lettter some lettter some lettter lettter lettter lettter lettter lettter lettter lettter lettter lettter</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
        <div class="display-posts">
          <img src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">something posted some lettter some lettter some lettter some lettter lettter lettter lettter lettter lettter lettter lettter lettter lettter</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
        <div class="display-posts">
          <img src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">something posted some lettter some lettter some lettter some lettter lettter lettter lettter lettter lettter lettter lettter lettter lettter</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
        <div class="display-posts">
          <img src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">something posted some lettter some lettter some lettter some lettter lettter lettter lettter lettter lettter lettter lettter lettter lettter</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
        <div class="display-posts">
          <img src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">something posted some lettter some lettter some lettter some lettter lettter lettter lettter lettter lettter lettter lettter lettter lettter</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
      </article>
      <aside class="">
        <h1>ジャンル別投稿</h1>
        <ul class="sub-menu">
          <li><a href="">募集</a></li>
          <li><a href="">情報</a></li>
          <li><a href="">報告</a></li>
          <li><a href="user-info.php">お知らせ</a></li>
        </ul>
        <h4 class="sub-title">このサイトについて</h3>
        <p>
          あああああああああああああああああああああああああああああああああああああああ
        </p>
      </aside>
    </main>
    <footer>
      <p><small>&copy; 2021 CLEAN GUYS</small></p>
    </footer>
  </div>
</body>
</html>
