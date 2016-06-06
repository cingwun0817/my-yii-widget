<?php

use admin\widgets\imageFileUploader\bundles\ImageFileUploaderAsset;

ImageFileUploaderAsset::register($this);
?>
<div class="image-file-uploader">
    <ul class="photo-list" data-deleteUrl="<?=$deleteUrl?>"></ul>
    <div class="clearfix"></div>
    <div class="uploader">
        <span class="btn btn-default btn-select"><?=$buttonTitle?></span>
        <input type="file" name="files[]" data-uploadUrl="<?=$uploadUrl?>" style="display: none;" />
        <div class="progress progress-striped progress-box" style="margin-top: 5px; display: none;">
            <div class="bar progress-bar progress-bar-success"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /.uploader-body -->
