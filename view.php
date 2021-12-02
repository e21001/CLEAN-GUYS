<?php
  session_start();
  require_once dirname(__FILE__) . '/phpscript/escape.php';
  require_once dirname(__FILE__) . '/phpscript/dbconnect.php';

  if (empty($_REQUEST['id'])) {
    header('Location: post.php');
  }
  // 投稿を取得する
  $posts = $db->prepare('SELECT u.name, u.picture, p.* FROM users u, posts p WHERE u.id=p.user_id AND p.id=? ORDER BY p.created DESC');
  $posts->execute(array($_REQUEST['id']));
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
  <link rel="stylesheet" href="./cleanguys.css">
</head>
<body>
  <div class="container">
    <header>
      <h1><img class="header-logo" src="img/logo.png" alt="CLEAN GUYSロゴ"></h1>
    </header>
    <main class="post-page">
      <article class="">
        <?php if ($post = $posts->fetch()): ?>
          <div class="display-posts view-display-posts">
            <img class="posted-image view-posted-image" src="<?php echo escape($post['posted_picture']) ?>" alt="picture">
            <div class="posted-details">
              <p class="letter view-letter"><?php echo makeLink(escape($post['message'])) ?></p>
              <p class="day view-day"><?php echo substr(escape($post['created']), 0, 16) ?></p>
              <div class="user-info view-user-info">
                <img class="user-pic" src="./join/<?php echo escape($post['picture']) ?>" alt="user-picture">
                <p class="user-name"><?php echo escape($post['name']) ?></p>
              </div>
            </div>
          </div>
        <?php else: ?>
          <p>その投稿は削除されたか、URLが間違っています。</p>
        <?php endif ?>
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
