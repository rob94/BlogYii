<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property string $id
 * @property string $tagname
 * @property integer $counter
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tagname', 'counter'], 'required'],
            [['counter'], 'integer'],
            [['tagname'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tagname' => Yii::t('app', 'Tagname'),
            'counter' => Yii::t('app', 'Counter'),
        ];
    }
}
