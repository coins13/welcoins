<div class="herarchy">
  <div class="block-inner">
    <div class="herarchy-content">
      <div id="herarchy-title">登録情報一覧</div>
      <div id="herarchy-sub-title">Registry</div>
    </div>
  </div>
</div>

<main id="main">
  <div class="block-inner">
    <div class="section">
      <p>項目をクリックすると登録者一覧が表示されます。</p>
    </div>
    <div class="section">
      <div class="section-block">
        <h3 class="section-title-toggle" id="gathering-attender-title">懇親会に参加する人 (<span id="number-of-gathering-attender"></span>)</h3>
      </div>
      <div class="section-list" id="gathering-attender-list">
        <?php
        $gatheringAttender = 0;
        foreach ($this->option as $recordName => $record) {
          if ($record->gathering === 'true') {
            $gatheringAttender++;
        ?>
        <table class="registry-table registry-table-first" cellspacing="0" cellpadding="0">
          <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>メールアドレス</th>
          </tr>
          <tr>
          <td><?= $record->name ?></td>
          <td><?= $record->ruby ?></td>
          <td><?= $record->email ?></td>
          </tr>
        </table>
        <table class="registry-table registry-table-second" cellspacing="0" cellpadding="0">
          <tr>
            <th>アレルギー</th>
            <th>その他</th>
          </tr>
          <tr>
            <td><?= empty($record->allergy) ? 'なし' : $record->allergy ?></td>
            <td><?= empty($record->question) ? 'なし' : $record->question ?></td>
          </tr>
        </table>
        <?php } } ?>
      </div>
    </div>

    <div class="section">
      <div class="section-block">
        <h3 class="section-title-toggle" id="training-attender-title">新歓合宿に参加する人 (<span id="number-of-training-attender"></span>)</h3>
      </div>
      <div class="section-list" id="training-attender-list">
        <?php
        $trainingAttender = 0;
        foreach ($this->option as $recordName => $record) {
          if ($record->training === 'true') {
            $trainingAttender++;
        ?>
        <table class="registry-table registry-table-first" cellspacing="0" cellpadding="0">
          <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>メールアドレス</th>
          </tr>
          <tr>
          <td><?= $record->name ?></td>
          <td><?= $record->ruby ?></td>
          <td><?= $record->email ?></td>
          </tr>
        </table>
        <table class="registry-table registry-table-second" cellspacing="0" cellpadding="0">
          <tr>
            <th>アレルギー</th>
            <th>その他</th>
          </tr>
          <tr>
            <td><?= empty($record->allergy) ? 'なし' : $record->allergy ?></td>
            <td><?= empty($record->question) ? 'なし' : $record->question ?></td>
          </tr>
        </table>
        <?php } } ?>
      </div>
    </div>

    <div class="section">
      <div class="section-block">
        <h3 class="section-title-toggle" id="gathering-decliner-title">懇親会に参加しない人 (<span id="number-of-gathering-decliner"></span>)</h3>
      </div>
      <div class="section-list" id="gathering-decliner-list">
        <?php
        $gatheringDecliner = 0;
        foreach ($this->option as $recordName => $record) {
          if ($record->gathering === 'false') {
            $gatheringDecliner++;
        ?>
        <table class="registry-table registry-table-first" cellspacing="0" cellpadding="0">
          <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>メールアドレス</th>
          </tr>
          <tr>
          <td><?= $record->name ?></td>
          <td><?= $record->ruby ?></td>
          <td><?= $record->email ?></td>
          </tr>
        </table>
        <table class="registry-table registry-table-second" cellspacing="0" cellpadding="0">
          <tr>
            <th>その他</th>
          </tr>
          <tr>
            <td><?= empty($record->question) ? 'なし' : $record->question ?></td>
          </tr>
        </table>
        <?php } } ?>
      </div>
    </div>

    <div class="section">
      <div class="section-block">
        <h3 class="section-title-toggle" id="training-decliner-title">新歓合宿に参加しない人 (<span id="number-of-training-decliner"></span>)</h3>
      </div>
      <div class="section-list" id="training-decliner-list">
        <?php
        $trainingDecliner = 0;
        foreach ($this->option as $recordName => $record) {
          if ($record->training === 'false') {
            $trainingDecliner++;
        ?>
        <table class="registry-table registry-table-first" cellspacing="0" cellpadding="0">
          <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>メールアドレス</th>
          </tr>
          <tr>
          <td><?= $record->name ?></td>
          <td><?= $record->ruby ?></td>
          <td><?= $record->email ?></td>
          </tr>
        </table>
        <table class="registry-table registry-table-second" cellspacing="0" cellpadding="0">
          <tr>
            <th>その他</th>
            <th>新歓合宿に参加しない理由</th>
          </tr>
          <tr>
            <td><?= empty($record->question) ? 'なし' : $record->question ?></td>
            <td><?= $record->reason ?></td>
          </tr>
        </table>
        <?php } } ?>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript">
  var statistics = {
    gathering: {
      attend: <?= $gatheringAttender ?>,
      decline: <?= $gatheringDecliner ?>
    },
    training: {
      attend: <?= $trainingAttender ?>,
      decline: <?= $trainingDecliner ?>
    }
  };
</script>
