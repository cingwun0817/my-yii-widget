<?php

/**
 * this bundle class is used to set base javascript, css, and source path
 * for order date picker
 */

namespace admin\widgets\dateRangePicker\bundles;

use yii\web\AssetBundle;

class DateRangePickerAsset extends AssetBundle
{

    /**
     * @var (string) sourcePath
     */
    public $sourcePath = '@admin/widgets/dateRangePicker/assets';

    /**
     * @var (array) js
     */
    public $js = [
        'js/js_daterangepicker.js'
    ];

    /**
     * @var (array) depends
     */
    public $depends = [
        'admin',
        'admin\bundles\plugins\DateRangePickerAsset'
    ];
}
