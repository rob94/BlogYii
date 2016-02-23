<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property string $id
 * @property integer $blog_post_id
 * @property integer $commented_by
 * @property string $comment
 * @property integer $status
 * @property integer $parent
 *
 * @property Post $blogPost
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'blog_post_id', 'commented_by', 'comment', 'status', 'parent'], 'required'],
            [['id', 'blog_post_id', 'commented_by', 'status', 'parent'], 'integer'],
            [['comment'], 'string'],
            [['blog_post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['blog_post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'blog_post_id' => Yii::t('app', 'Blog Post ID'),
            'commented_by' => Yii::t('app', 'Commented By'),
            'comment' => Yii::t('app', 'Comment'),
            'status' => Yii::t('app', 'Status'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'blog_post_id']);
    }
}
