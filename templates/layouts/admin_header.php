<header id="header">
  <div class="header-main">
    <div class="block-inner">
      <div class="header-banner">
        <img class="header-banner-image" src="/images/utlogo.png" />
      </div>
      <nav>
        <ol class="header-menu">
          <li><?= $this->mainMenuAnchor('logout', '/admin/logout', 'ログアウト') ?></li>
          <li><?= $this->mainMenuAnchor('password', '/admin/password', 'パスワード変更') ?></li>
          <li><?= $this->mainMenuAnchor('admin', '/admin', '登録情報一覧') ?></li>
        </ol>
      </nav>
    </div>
  </div>
</header>
