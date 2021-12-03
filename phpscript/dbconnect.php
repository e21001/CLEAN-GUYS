<?php
  try {
    $db = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=cleanguys_db;charset=utf8mb4', 'bfe7dc892b8f3b', '7407447b');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      echo '接続に失敗しました。';
    }
?>
