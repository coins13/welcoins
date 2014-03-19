<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">新入生登録</div>
      <div id="herarchy-sub-title">Register</div>
    </div>
    <div class="herarchy-stage">
      <div class="herarchy-border"></div>
      <div class="herarchy-progress-bar herarchy-progress-bar-additional"></div>
      <div class="herarchy-pass">✔ 基本情報を入力</div>
      <div class="herarchy-phase-additional" id="herarchy-phase">追加情報を入力</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p style="font-weight: bold"><span class="form-required">*</span> がついた項目は必須項目です。</p>
    </div>

    <div class="section">
      <form action="/register/additional" method="post">
        <?php if ($this->shouldAskAllergy($this->option)) { ?>
          <fieldset class="form-fieldset">
            <legend><?= $this->formCount() ?>.アレルギー</legend>
            <div class="form-description">
              <p>アレルギーがある方は入力してください。</p>
            </div>
            <div class="form-part">
              <label for="name">
                <?= $this->formTextInput(['name' => 'allergy', 'placeholder' => 'アレルギー'], $this->option) ?>
              </label>
            </div>
          </fieldset>
        <?php } ?>

        <?php if ($this->shouldAskReason($this->option)) { ?>
          <fieldset class="form-fieldset">
            <legend><?= $this->formCount() ?>.新歓合宿に参加しない理由 <span class="form-required">*</span></legend>
            <div class="form-description">
              <p>前のページの「新歓合宿への参加/不参加」で「参加しない」を選択した人は、新歓合宿に参加しない理由を入力してください。</p>
            </div>
            <div class="form-part">
              <label for="ruby">
                <?= $this->formTextInput(['name' => 'reason', 'placeholder' => '理由', 'textarea' => true], $this->option) ?>
              </label>
            </div>
          </fieldset>
        <?php } ?>

        <fieldset class="form-fieldset">
          <legend><?= $this->formCount() ?>.その他</legend>
          <div class="form-description">
            <p>新歓合宿や懇親会に関する質問を入力してください。</p>
          </div>
          <div class="form-part">
            <label for="email">
              <?= $this->formTextInput(['name' => 'question', 'placeholder' => '質問等', 'textarea' => true], $this->option) ?>
            </label>
          </div>
        </fieldset>

        <div class="form-action-buttons">
          <input id="form-action-button-back" type="button" value="戻る" />
          <input type="submit" value="次へ" />
        </div>
      </form>
    </div>
  </div>
</main>
