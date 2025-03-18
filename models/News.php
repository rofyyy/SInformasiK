<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property string $tag
 * @property string $created_at
 * @property string $image
 */
class News extends \yii\db\ActiveRecord
{
    public $eventImage;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * Handles the file upload and saves the file path to the database.
     */


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author'], 'default', 'value' => ''],
            [['content'], 'required'],
            [['content'], 'string'],
            [['tag'], 'string'],
            [['title', 'author', 'created_at'], 'string', 'max' => 50],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'content' => 'Content',
            'tag' => 'Tag',
            'created_at' => 'Date and Time',
            'image' => 'Image',
        ];
    }
    public function upload() {

        if (true) {
            $path = $this->uploadPath() . $this->id . "." .$this->eventImage->extension;
            $this->eventImage->saveAs($path);
            $this->image = $this->id . "." .$this->eventImage->extension;
            $this->save();
            return true;
        } else {
        return false;
        }		
    }
    public function uploadPath() {
        return Url::to('@web/images/upload');
        }
}