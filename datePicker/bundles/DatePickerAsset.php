<?php

/**
 * this bundle class is used to set base javascript, css, and source path
 * for order date picker
 */

namespace admin\widgets\datePicker\bundles;

use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle
{

    /**
     * @var (string) sourcePath
     */
    public $sourcePath = '@admin/widgets/datePicker/assets';

    /**
     * @var (array) js
     */
    public $js = [
        'js/js_datepicker.js'
    ];

    /**
     * @var (array) depends
     */
    public $depends = [
        'admin',
        'admin\bundles\plugins\DateRangePickerAsset'
    ];
}
