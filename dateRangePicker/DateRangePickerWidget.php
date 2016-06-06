<?php
namespace admin\widgets\dateRangePicker;

use yii\base\Widget;

class DateRangePickerWidget extends Widget
{
	/**
	 * @var boolean $showTime
	 */
	public $showTime = false;

	/**
     * @var array $params
     */
    public $params = [];

    public function run()
    {
    	$now = date('Y/m/d', strtotime('now'));
		if ( $this->showTime ) {
			$beginNow = $now . ' 00:00';
			$endNow = $now . ' 23:59';
		} else {
			$beginNow = $now;
			$endNow = $now;
		}

        return $this->render('view_date_range_picker', [
        	'showTime' => ($this->showTime) ? 'true' : 'false',
        	'beginNow' => $beginNow,
        	'endNow' => $endNow,
        	'params' =>  $this->params
        ]);
    }
}
?>
