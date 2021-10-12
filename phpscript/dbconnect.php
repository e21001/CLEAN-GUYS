<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=cleanguys_db;charset=utf8mb4', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      echo '接続に失敗しました。';
    }
