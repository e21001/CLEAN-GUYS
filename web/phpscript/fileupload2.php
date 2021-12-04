<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/escape.php';

  // ファイル名を元に拡張子を返す関数
  function getExtension(string $file):string {
    return pathinfo($file, PATHINFO_EXTENSION);
  }

  // アップロードファイルの妥当性をチェックする関数
  function validate():array {
    // PHPによるエラーを確認する
    if ($_FILES['postedImage']['error'] !== UPLOAD_ERR_OK) {
      return [false, 'アップロードエラーを検知しました。'];
    }
    // ファイル名から拡張子をチェックする
    if (!in_array(getExtension($_FILES['postedImage']['name']), ['jpg','JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF'])) {
      return [false, '画像ファイルのみアップロード可能です。'];
    }
    // ファイルの中身を見てMIMEタイプをチェックする
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES['postedImage']['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mimeType, ['image/jpeg', 'image/JPEG', 'image/jpg', 'image/JPG', 'image/png', 'image/PNG', 'image/gif', 'iamge/GIF'])) {
      return [false, '不正な画像ファイル形式です'];
    }
    return [true, null];
  }

  // アップロード後の保存ファイル名を生成して返す関数
  function generateDestinationPath():string {
    return 'postedImage/' . date('Ymd-His-') . rand(10000, 99999) . '.' . getExtension($_FILES['postedImage']['name']);
  }
?>
