<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/../phpscript/escape.php';
  require_once dirname(__FILE__) . '/../phpscript/dbconnect.php';
  session_start();
  // セッション情報があるか確認
  if (!isset($_SESSION['join'])) {
    header('Location: index.php');
    exit();
  }
  // 登録処理のプログラム
  if (!empty($_POST)) {
    $statement = $db->prepare('INSERT INTO users SET name=?, email=?, password=?, picture=?, created=NOW()');
    echo $ret = $statement->execute(array(
      $_SESSION['join']['name'],
      $_SESSION['join']['email'],
      sha1($_SESSION['join']['password']),
      $_SESSION['join']['image']
    ));
    unset($_SESSION['join']);

    header('Location: thanks.php');
    exit();
  }
?>
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
      <form name="" action="" method="post">
        <input type="hidden" name="action" value="submit">
        <dt>ニックネーム</dt>
        <dd>
          <?php echo escape($_SESSION['join']['name']) ?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
          <?php echo escape($_SESSION['join']['email']) ?>
        </dd>
        <dt>パスワード</dt>
        <dd>
          表示されません
        </dd>
        <dt>プロフィール画像</dt>
        <dd>
          <img src="<?php echo escape($_SESSION['join']['image'])?>" style="width:100px" alt="こんにちは">
        </dd>
        <p><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a></p>
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
