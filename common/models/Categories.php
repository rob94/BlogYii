<?php

namespace common\models;

use Yii;
use backend\models\PostSearch;

/**
 * This is the model class for table "categories".
 *
 * @property string $id
 * @property string $nombre
 * @property string $description
 * @property integer $publications
 * @property integer $status
 * @property integer $counter
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'description'], 'required'],
            [['publications', 'status', 'counter'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'description' => Yii::t('app', 'Description'),
            'publications' => Yii::t('app', 'Publications'),
            'status' => Yii::t('app', 'Status'),
            'counter' => Yii::t('app', 'Counter'),
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Profile::className(),['blog_category_id'=>'id']);
    }
}
