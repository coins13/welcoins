<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">新入生登録</div>
      <div id="herarchy-sub-title">Register</div>
    </div>
    <div class="herarchy-stage">
      <div class="herarchy-border"></div>
      <div id="herarchy-phase">基本情報を入力</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p>新入生の皆さん、合格おめでとうございます。</p>
      <p>懇親会と新歓合宿の出欠確認をしたいので以下の項目を入力してください。</p>
      <p style="font-weight: bold"><span class="form-required">*</span> がついた項目は必須項目です。</p>
    </div>

    <div class="section">
      <?php echo '<form action="' .BASE .'/register" method="post">'; ?>
        <fieldset class="form-fieldset">
          <legend>1.氏名 <span class="form-required">*</span></legend>
          <div class="form-description">
            <p>氏名はフルネームで入力してください。</p>
          </div>
          <div class="form-part">
            <label for="name">
              <?php echo $this->formTextInput(array('name' => 'name', 'placeholder' => '例: 筑波太郎'), $this->option); ?>
            </label>
          </div>
        </fieldset>

        <fieldset class="form-fieldset">
          <legend>2.フリガナ <span class="form-required">*</span></legend>
          <div class="form-description">
            <p>氏名のふりがなを片仮名で入力してください。</p>
          </div>
          <div class="form-part">
            <label for="ruby">
              <?php echo $this->formTextInput(array('name' => 'ruby', 'placeholder' => '例: ツクバタロウ'), $this->option); ?>
            </label>
          </div>
        </fieldset>

        <fieldset class="form-fieldset">
          <legend>3.メールアドレス <span class="form-required">*</span></legend>
          <div class="form-description">
            <p>連絡先メールアドレスを入力してください。</p>
          </div>
          <div class="form-part">
            <label for="email">
              <?php echo $this->formTextInput(array('name' => 'email', 'placeholder' => 'mail@example.com'), $this->option); ?>
            </label>
          </div>
        </fieldset>

        <fieldset class="form-fieldset">
          <legend>4.懇親会への参加/不参加 <span class="form-required">*</span></legend>
          <div class="form-description">
            <p>懇親会の詳細は新歓パンフの p. をご覧ください。</p>
          </div>
          <div class="form-part">
            <div class="form-part-set">
              <?php echo $this->formRadioInput(array('name' => 'gathering', 'value' => 'false', 'for' => 'decline-gathering', 'label' => '参加しない'), $this->option); ?>
            </div>
            <div class="form-part-set">
              <?php echo $this->formRadioInput(array('name' => 'gathering', 'value' => 'true', 'for' => 'attend-gathering', 'label' => '参加する'), $this->option); ?>
            </div>
          </div>
        </fieldset>

        <fieldset class="form-fieldset">
          <legend>5.新歓合宿への参加/不参加 <span class="form-required">*</span></legend>
          <div class="form-description">
            <p>新歓合宿の詳細は新歓パンフの p. をご覧ください。</p>
          </div>
          <div class="form-part">
            <div class="form-part-set">
              <?php echo $this->formRadioInput(array('name' => 'training', 'value' => 'false', 'for' => 'decline-training', 'label' => '参加しない'), $this->option); ?>
            </div>
            <div class="form-part-set">
              <?php echo $this->formRadioInput(array('name' => 'training', 'value' => 'true', 'for' => 'attend-training', 'label' => '参加する'), $this->option); ?>
            </div>
          </div>
        </fieldset>
        <div class="form-action-buttons">
          <input type="submit" value="次へ" />
        </div>
      </form>
    </div>
  </div>
</main>
