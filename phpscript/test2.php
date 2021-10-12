<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/escape.php';
  require_once dirname(__FILE__) . '/fileupload2.php';
  require_once dirname(__FILE__) . '/dbconnect.php';
  session_start();
  ini_set('error_reporting', 'E_ALL & ~E_NOTICE');
  // エラー項目の確認
  if (!empty($_POST['posted'])) {
    if ($_FILES['postedImage'] !== ' ') {
      // 画像アップロード
      list($result, $message) = validate();
      if ($result !== true) {
        echo '[Error]', $message;
        return;
      }
      $destinationPath = generateDestinationPath();
      $moved = move_uploaded_file($_FILES['postedImage']['tmp_name'], $destinationPath);
      if ($moved !== true) {
        echo 'アップロード中にエラーが発生しました。';
        return;
      }
      // 投稿を記録する
      if (empty($error)) {
        $postedMessage = $db->prepare('INSERT INTO posts SET message=?, user_id=?, picture=?, category_id=?, created=NOW()');
        $postedMessage->execute(array(
          $_POST['posted']['postedMessage'],
          $user['id'],
          $destinationPath,
          $_POST['posted']['category']
        ));
        header('Location: post.php');
        exit();
      }
    }
  }
