<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">パスワード変更</div>
      <div id="herarchy-sub-title">Change Password</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p>パスワードを入力してください。</p>
      <?php if (isset($this->option['error']) && $this->option['error'] === true) { ?>
      <p style="font-weight: bold">入力に誤りがあります。</p>
      <?php } else if (isset($this->option['success']) && $this->option['success'] === true) { ?>
      <p style="font-weight: bold">パスワードは正常に変更されました。</p>
      <?php } ?>
    </div>
    <div class="section">
      <?php echo '<form action="' .BASE .'/admin/password" method="POST">'; ?>
        <fieldset class="form-fieldset">
          <legend>パスワード</legend>
          <div class="form-part">
            <?php echo $this->formTextInput(array('type' => 'password', 'name' => 'password'), $this->option) ?>
          </div>
        </fieldset>
        <fieldset class="form-fieldset">
          <legend>パスワード再入力</legend>
          <div class="form-part">
            <?php echo $this->formTextInput(array('type' => 'password', 'name' => 'recheck'), $this->option) ?>
          </div>
        </fieldset>
        <div class="form-action-buttons">
          <input type="submit" value="変更" />
        </div>
      </form>
    </div>
  </div>
</main>
