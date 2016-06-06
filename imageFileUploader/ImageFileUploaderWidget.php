<?php
namespace admin\widgets\imageFileUploader;

use yii\base\Widget;
use yii\helpers\Url;

class ImageFileUploaderWidget extends Widget
{
    public $bucket = 'default';

    /**
     * @var (string) buttonTitle default: 上傳圖片
     */
    public $buttonTitle = '上傳圖片';

    /**
     * @var (string) deleteUrl
     */
    public $deleteUrl;

    /**
     * @var (string) uploadUrl
     */
    public $uploadUrl;


    /**
     * init
     */
    public function init()
    {
        if (empty($deleteUrl))
            $this->deleteUrl = Url::to('/image/delete');

        if (empty($uploadUrl))
            $this->uploadUrl = Url::to(['/image/upload']);
    }

    /**
     * run this widget
     */
    public function run()
    {
        return $this->render('view_image_file_uploader', [
            'buttonTitle' => $this->buttonTitle,
            'deleteUrl' => $this->deleteUrl,
            'uploadUrl' => $this->uploadUrl . "?bucket=" . $this->bucket
        ]);
    }
}
