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
  // ページング
  $page = $_REQUEST['page'];
  if ($page === '') {
    $page = 1;
  }
  $page = max($page, 1);
  // 最終ページを取得する
  $counts = $db->query('SELECT COUNT(*) AS cnt FROM posts WHERE posts.category_id=2');
  $cnt = $counts->fetch();
  $maxPage = ceil($cnt['cnt'] / 10);
  $page = min($page, $maxPage);

  $start = ($page - 1) * 10;
  // 投稿を取得する
  $posts = $db->prepare('SELECT u.name, u.picture, p.* FROM users u, posts p WHERE u.id=p.user_id AND p.category_id=2 ORDER BY p.created DESC LIMIT ?, 10');
  $posts->bindParam(1, $start, PDO::PARAM_INT);
  $posts->execute();
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
        <?php foreach ($posts as $post): ?>
          <div class="display-posts">
            <img class="posted-image" src="<?php echo escape($post['posted_picture']) ?>" alt="picture">
            <div class="posted-details">
              <?php if ((mb_strlen($post['message']) > 20)) : ?>
                <p class="letter"><a href="./view.php?id=<?php echo $post['id'] ?>"><?php echo mb_substr((makeLink(escape($post['message']))), 0, 20) ?>...</a></p>
              <?php else: ?>
                <p class="letter"><a href="./view.php?id=<?php echo $post['id'] ?>"><?php echo makeLink(escape($post['message'])) ?></a></p>
              <?php endif ?>
              <p class="day">
                <a href="./view.php?id=<?php echo $post['id'] ?>"><?php echo substr(escape($post['created']), 0, 16) ?></a>
              </p>
              <div class="user-info">
                <img class="user-pic" src="./join/<?php echo escape($post['picture']) ?>" alt="user-picture">
                <p class="user-name">投稿者：<?php echo escape($post['name']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <ul class="paging">
          <?php if ($page > 1): ?>
            <li><a href="report.php?page=<?php print($page - 1) ?>">前のページへ</a></li>
          <?php else: ?>
            <li>前のページへ</li>
          <?php endif ?>
          <?php if ($page < $maxPage): ?>
            <li><a href="report.php?page=<?php print($page + 1) ?>">次のページへ</a></li>
          <?php else: ?>
            <li>次のページへ</li>
          <?php endif ?>
        </ul>
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
