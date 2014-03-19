<!DOCTYPE html>

<html lang="ja">
  <head>
    <title>平成26年度筑波大学情報科学類新歓</title>
    <?php echo $this->embedTemplate('layouts/meta/general'); ?>
    <?php echo $this->html->styleSheet('app'); ?>
    <?php echo $this->html->script('app'); ?>
    <?php
    if ($this->isForAdmin($this->id, $this->pageId))
      echo $this->html->script('admin');
    ?>
  </head>

  <body>
    <?php
    if ($this->isForAdmin($this->id, $this->pageId))
      echo $this->embedTemplate('layouts/admin_header');
    else
      echo $this->embedTemplate('layouts/header');
    echo $this->embedContent();
    echo $this->embedTemplate('layouts/footer');
    ?>
  </body>
</html>
