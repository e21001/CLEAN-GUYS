<?php
  session_start();
  require_once dirname(__FILE__) . '/phpscript/escape.php';
  require_once dirname(__FILE__) . '/phpscript/dbconnect.php';

  // ユーザー情報の取得
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
  // 投稿を取得する
  $posts = $db->prepare('SELECT u.name, u.picture, p.* FROM users u, posts p WHERE u.id=p.user_id AND p.id=? ORDER BY p.created DESC');
  $posts->execute(array($_REQUEST['id']));
  // 返信を取得する
  $reps = $db->prepare("SELECT u.name, u.picture, r.* FROM users u, replies r WHERE u.id=r.user_id AND r.reply_post_id=? ORDER BY r.created DESC");
  $reps->execute(array($_REQUEST['id']));
  // 返信を記録する
  if (!empty($_POST['reply'])) {
    if ($_POST['reply']['message'] !== '') {
      $reply_message = $db->prepare('INSERT INTO replies SET user_id=?, message=?, reply_post_id=?, created=NOW()');
      $reply_message->execute(array(
        $user['id'],
        $_POST['reply']['message'],
        substr($_SERVER['REQUEST_URI'], -2)
      ));
      $id = substr($_SERVER['REQUEST_URI'], -2);
      $url = "view.php?id=" . $id;
      header('Location:' . $url);
      exit();
    }
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
        <form class="reply-form" action="" method="post">
          <textarea class="reply-message" name="reply[message]" rows="8" cols="80"></textarea>
          <input class="submit-btn" type="submit" name="operation" value="返信する">
        </form>
        <?php foreach ($reps as $rep): ?>
          <div class="replies">
            <img class="rep-image user-pic" src="./join/<?php echo escape($rep['picture']) ?>" alt="プロフィール画像">
            <div class="rep-contents">
              <p class="rep-name">
                (<?php echo escape($rep['name']) ?>)
                <?php if ($_SESSION['id'] === $rep['user_id']): ?>
                  <a href="delete_rep.php?id=<?php echo $rep['id'] ?>" style="color:#f33;">【削除】</a>
                <?php endif ?>
              </p>
              <p class="rep-message"><?php echo makeLink(escape($rep['message'])) ?></p>
              <p class="rep-day" style="color:#6a6964;"><?php echo substr(escape($rep['created']), 0, 16) ?></p>
            </div>
          </div>
        <?php endforeach ?>
      </article>
      <aside class="">
        <h1>カテゴリー</h1>
        <ul class="sub-menu">
          <li><a href="post.php">全ての投稿</a></li>
          <li><a href="member.php">募集</a></li>
          <li><a href="information.php">情報</a></li>
          <li><a href="report.php">報告</a></li>
          <li><a href="user-info.php">お知らせ</a></li>
          <li><a href="">お問い合わせ</a></li>
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
