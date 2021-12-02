<?php
  session_start();
  require_once dirname(__FILE__) . '/phpscript/dbconnect.php';

  if (isset($_SESSION['id'])) {
    $rep_id = $_REQUEST['id'];

    // 投稿を検査する
    $rep_messages = $db->prepare('SELECT * FROM replies WHERE id=?');
    $rep_messages->execute(array($rep_id));
    $rep_message = $rep_messages->fetch();

    if ($rep_message['user_id'] === $_SESSION['id']) {
      // 削除する
      $rep_del = $db->prepare('DELETE FROM replies WHERE id=?');
      $rep_del->execute(array($rep_id));
    }
  }

  header('Location:' . $_SERVER['HTTP_REFERER']);
  exit();
