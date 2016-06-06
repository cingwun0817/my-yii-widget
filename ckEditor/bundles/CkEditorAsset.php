<?php

/**
 * this bundle class is used to set base javascript, css, and source path
 * for order date picker
 */

namespace admin\widgets\ckEditor\bundles;

use yii\web\AssetBundle;

class CkEditorAsset extends AssetBundle
{

    /**
     * @var (string) sourcePath
     */
    public $sourcePath = '@admin/widgets/ckEditor/assets';

    /**
     * @var (array) js
     */
    public $js = [
        'js/js_ckeditor.js'
    ];

    /**
     * @var (array) depends
     */
    public $depends = [
        'admin',
        'admin\bundles\plugins\ckEditorAsset'
    ];
}
