<?php
  declare(strict_types=1);

  function escape($val):string {
    return htmlspecialchars($val, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }
?>
