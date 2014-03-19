<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">管理者ログイン</div>
      <div id="herarchy-sub-title">Administrator Login</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p>ユーザ名とパスワードを入力してください。</p>
      <?php if (isset($this->option['error']) && $this->option['error'] === true) { ?>
      <p style="font-weight: bold">入力に誤りがあります。</p>
      <?php } ?>
    </div>
    <div class="section">
      <?php echo '<form action="' .BASE .'/admin/login" method="POST">'; ?>
        <fieldset class="form-fieldset">
          <legend>ユーザ名</legend>
          <div class="form-part">
            <?php echo $this->formTextInput(array('type' => 'text', 'name' => 'username'), $this->option) ?>
          </div>
        </fieldset>
        <fieldset class="form-fieldset">
          <legend>パスワード</legend>
          <div class="form-part">
            <?php echo $this->formTextInput(array('type' => 'password', 'name' => 'password'), $this->option) ?>
          </div>
        </fieldset>
        <div class="form-action-buttons">
          <input type="submit" value="ログイン" />
        </div>
      </form>
    </div>
  </div>
</main>
