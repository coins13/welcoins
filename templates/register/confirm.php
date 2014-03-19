<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">新入生登録</div>
      <div id="herarchy-sub-title">Register</div>
    </div>
    <div class="herarchy-stage">
      <div class="herarchy-border"></div>
      <div class="herarchy-progress-bar herarchy-progress-bar-confirm"></div>
      <div class="herarchy-pass">✔ 基本情報を入力</div>
      <div class="herarchy-pass herarchy-pass-additional">✔ 追加情報を入力</div>
      <div class="herarchy-phase-confirm" id="herarchy-phase">確認</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p>入力した項目を確認して、よろしれば「送信」ボタンをクリックしてください。</p>
    </div>

    <div class="section">
      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.氏名</h3>
        <div class="section-content"><?php echo $this->option->base['name']['value'] ?></div>
      </div>

      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.フリガナ</h3>
        <div class="section-content"><?php echo $this->option->base['ruby']['value'] ?></div>
      </div>

      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.メールアドレス</h3>
        <div class="section-content"><?php echo $this->option->base['email']['value'] ?></div>
      </div>

      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.懇親会への参加/不参加</h3>
        <div class="section-content">
          <?php
          if ($this->option->base['gathering']['value'] === 'true')
            echo '参加する';
          else
            echo '参加しない';
          ?>
        </div>
      </div>

      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.新歓合宿への参加/不参加</h3>
        <div class="section-content">
          <?php
          if ($this->option->base['training']['value'] === 'true')
            echo '参加する';
          else
            echo '参加しない';
          ?>
        </div>
      </div>

      <?php if ($this->shouldAskAllergy($this->option->base)) { ?>
      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.アレルギー</h3>
        <div class="section-content">
          <?php
          $allergy = $this->option->additional['allergy']['value'];

          if (empty($allergy))
            echo 'なし';
          else
            echo $allergy;
          ?>
        </div>
      </div>
      <?php } ?>

      <?php if ($this->shouldAskReason($this->option->base)) { ?>
      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.新歓合宿に参加しない理由</h3>
        <div class="section-content"><?php echo $this->option->additional['reason']['value'] ?></div>
      </div>
      <?php } ?>

      <div class="section-block">
        <h3><?php echo $this->formCount() ?>.その他</h3>
        <div class="section-content">
          <?php
          $question = $this->option->additional['question']['value'];

          if (empty($question))
            echo 'なし';
          else
            echo $question;
          ?>
        </div>
      </div>

      <div class="form-action-buttons">
        <?php echo '<form action="' .BASE .'/register/confirm" method="post">'; ?>
          <input id="form-action-button-back" type="button" value="戻る" />
          <input type="submit" value="送信" />
          <input type="hidden" name="confirm" value="true" />
        </form>
      </div>
    </div>
  </div>
</main>
