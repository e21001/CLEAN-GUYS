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
      <div class="log-out"><a href="logout.php">ログアウト</a></div>
    </header>
    <main class="post-page">
      <article class="">
        <div class="display-posts">
          <img class="posted-image" src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">まずは投稿してみよう！<br>CLEAN　GUYS (運営スタッフ)　より</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
        <div class="display-posts">
          <img class="posted-image" src="./postedImage/someone.JPG" alt="picture">
          <div class="posted-details">
            <p class="letter">CLEAN GUYS ~ビーチクリーン募集掲示板~ サイト完成しました！<br>よろしくお願いします！<br>CLEAN　GUYS (運営スタッフ)　より</p>
            <p class="day">2021-11-11 18:35</p>
          </div>
        </div>
      </article>
      <aside class="">
        <h1>カテゴリー</h1>
        <ul class="sub-menu">
          <li><a href="post.php">全ての投稿</a></li>
          <li><a href="member.php">募集</a></li>
          <li><a href="information.php">情報</a></li>
          <li><a href="report.php">報告</a></li>
          <li><a href="user-info.php">お知らせ</a></li>
          <li class="res-log-out"><a href="logout.php">ログアウト</a></li>
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
