<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $post_author
 * @property string $post_slug
 * @property string $post_title
 * @property string $post_excerpt
 * @property string $post_content
 * @property int $post_parent
 * @property int $post_status
 * @property int $del_flag
 * @property int $comment_count
 * @property int $created_at
 * @property int $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_author', 'post_slug', 'post_title'], 'required'],
            [['post_author', 'post_parent', 'post_status', 'del_flag', 'comment_count', 'created_at', 'updated_at'], 'integer'],
            [['post_excerpt', 'post_content'], 'string'],
            [['post_slug', 'post_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_author' => Yii::t('app', 'Post Author'),
            'post_slug' => Yii::t('app', 'Post Slug'),
            'post_title' => Yii::t('app', 'Post Title'),
            'post_excerpt' => Yii::t('app', 'Post Excerpt'),
            'post_content' => Yii::t('app', 'Post Content'),
            'post_parent' => Yii::t('app', 'Post Parent'),
            'post_status' => Yii::t('app', 'Post Status'),
            'del_flag' => Yii::t('app', 'Del Flag'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
