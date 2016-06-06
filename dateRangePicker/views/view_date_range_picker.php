<?php
use admin\widgets\dateRangePicker\bundles\DateRangePickerAsset;

DateRangePickerAsset::register($this);
?>
<div class="form-group" id="<?= $params['id'] ?>">
    <label><?= $params['label'] ?></label>
    <input class="date-range-picker form-control" type="text" placeholder="請選擇時間期間" readonly="readonly" show-time="<?= $showTime ?>" start-time="<?= (!empty($params['beginTime'])) ? date('Y/m/d H:i', $params['beginTime']) : $beginNow ?>" end-time="<?= (!empty($params['beginTime'])) ? date('Y/m/d H:i', $params['endTime']) : $endNow ?>" />
    <input class="input-begin" type="hidden" name="<?= (!empty($params['beginName'])) ? $params['beginName'] : 'begin' ?>" value="<?= (!empty($params['beginTime'])) ? date('Y/m/d H:i', $params['beginTime']) : $beginNow ?>" />
    <input class="input-end" type="hidden" name="<?= (!empty($params['endName'])) ? $params['endName'] : 'end' ?>" value="<?= (!empty($params['beginTime'])) ? date('Y/m/d H:i', $params['endTime']) : $endNow ?>" />
</div>
<?= $this->registerJs('var drp = new _dateRangePicker({el: "#'.$params['id'].'"});', yii\web\View::POS_END) ?>
