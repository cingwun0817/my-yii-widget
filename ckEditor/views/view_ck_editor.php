<?php
use admin\widgets\ckEditor\bundles\CkEditorAsset;

CkEditorAsset::register($this);

$webPath = Yii::$app->assetManager->getBundle('web')->baseUrl;
$ckPath = Yii::$app->assetManager->getBundle('admin\bundles\plugins\ckEditorAsset')->baseUrl;
?>
<div class="form-group" id="<?= $params['id'] ?>" meta-css="<?= $webPath ?>/stylesheets/layout.css" meta-fa-css="<?= $ckPath ?>/plugins/fontawesome/font-awesome/css/font-awesome.min.css" mate-bt-css="<?= $ckPath ?>/plugins/glyphicons/bootstrap/css/bootstrap.css">
	<label><?= isset($params['label']) ? $params['label'] : '內容' ?></label>
	<textarea class="textarea-content" name="<?= $params['name'] ?>" rows="10" cols="80">
        <?= isset($params['data']) ? $params['data'] : '' ?>
    </textarea>
</div>
<?= $this->registerJs('var ck = new _ckEditor({el: "#'.$params['id'].'", bucket: "'.$params['bucket'].'", table: "'.$tableName.'", id: "'.$dataId.'", language: "'.$language.'"});', yii\web\View::POS_END) ?>
