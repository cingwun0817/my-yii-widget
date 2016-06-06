<?php
namespace admin\widgets\datePicker;

use yii\base\Widget;

class DatePickerWidget extends Widget
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
		$format = 'Y/m/d';
		if ( $this->showTime )
			$format = 'Y/m/d H:i';

    	$now = date($format, strtotime('now'));

        return $this->render('view_date_picker', [
        	'showTime' => ($this->showTime) ? 'true' : 'false',
        	'now' => $now,
        	'params' => $this->params
        ]);
    }
}
?>
