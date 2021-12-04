<?php
  declare(strict_types=1);

  function escape($val):string {
    return htmlspecialchars($val, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }

  function makeLink($val) {
    return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)", '<a href="\1\2">\1\2</a>', $val);
  }
