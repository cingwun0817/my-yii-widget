<?php
namespace admin\widgets\imageFileUploader\bundles;

use yii\web\AssetBundle;

class ImageFileUploaderAsset extends AssetBundle
{
/**
     * @var (string) sourcePath
     */
    public $sourcePath = '@admin/widgets/imageFileUploader/assets';

    /**
     * @var (array) css
     */
    public $css = [
        'css/css_imageFileUploader.css'
    ];

    /**
     * @var (array) js
     */
    public $js = [
        'js/js_image_file_uploader.js'
    ];

    /**
     * @var (array) depends
     */
    public $depends = [
        'admin\bundles\plugins\jQueryFileUploadAsset'
    ];
}
