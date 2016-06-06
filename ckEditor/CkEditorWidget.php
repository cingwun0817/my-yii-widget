<?php
namespace admin\widgets\ckEditor;

use yii\base\Widget;
use Exception;

class CkEditorWidget extends Widget
{

	public $tableName = null;

	public $dataId = null;

	public $language = 'tw';

	/**
     * @var array $params
     */
    public $params = [];

    public function run()
    {
    	try {
    		if ( empty($this->tableName) )
    			throw new Exception("Parameter tableName error", 400);
    		if ( empty($this->dataId) )
    			throw new Exception("Parameter dataId error", 401);

    		return $this->render('view_ck_editor', [
    			'tableName' => $this->tableName,
    			'dataId' => $this->dataId,
    			'language' => $this->language,
    			'params' => $this->params
    		]);
    	} catch (Exception $e) {
    		throw $e;
    	}

    }
}
?>
