<?php
use admin\widgets\datePicker\bundles\DatePickerAsset;

DatePickerAsset::register($this);
?>
<div class="form-group" id="<?= $params['id'] ?>">
    <label><?= $params['label'] ?></label>
    <input class="date-picker form-control" type="text" placeholder="請選擇時間" readonly="readonly" show-time="<?= $showTime ?>" start-time="<?= (!empty($params['value'])) ? date('Y/m/d H:i', $params['value']) : $now ?>" />
    <input class="input-time" type="hidden" name="<?= (!empty($params['name'])) ? $params['name'] : 'time' ?>" value="<?= (!empty($params['value'])) ? date('Y/m/d H:i', $params['value']) : $now ?>" />
</div>
<?= $this->registerJs('var dp = new _datePicker({el: "#'.$params['id'].'"});', yii\web\View::POS_END) ?>
