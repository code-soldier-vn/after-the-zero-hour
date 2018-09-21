<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

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
    public static $flatList = null;

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
            [['post_title'], 'required'],
            [['post_parent', 'post_status'], 'integer'],
            [['post_excerpt', 'post_content'], 'string'],
            [['post_slug', 'post_title'], 'string', 'max' => 255],
            [['post_slug'], 'unique', 'on' => 'update'],
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

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = [
            'post_author',
            'post_slug',
            'post_title',
            'post_excerpt',
            'post_content',
            'post_parent',
            'post_status',
            'del_flag',
            'comment_count',
            'created_at',
            'updated_at'
        ];

        return $scenarios;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('UNIX_TIMESTAMP()'),
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'post_title',
                'slugAttribute' => 'post_slug',
                'immutable' => true,
                'ensureUnique' => true
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['post_author'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['post_author'],
                ],
                'value' => function () {
                    return Yii::$app->user->id;
                }
            ]
        ];
    }

    /**
     * @param $id
     * @return Post|null
     * @throws NotFoundHttpException
     */
    public function findById($id)
    {
        if (($model = $this::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param $slug
     * @return Post|null
     * @throws NotFoundHttpException
     */
    public function findBySlug($slug)
    {
        if (($model = $this::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param Post|null $post
     * @return null
     */
    public static function getFlatList(Post $post = null)
    {
        if (null === self::$flatList) {
            $model = self::find()
                ->select(['id', 'post_title']);

            if ($post && $post->id) {
                $model->where("id <> {$post->id}")
                    ->andWhere("post_parent <> {$post->id}");
            }

            if ($post && $post->id) {
                $model->andWhere("level < {$post->level}");
            }

            $model = $model->all();

            if ($model) {
                self::$flatList = ArrayHelper::map($model, 'id', 'post_title');
            }
        }

        return self::$flatList;
    }
}
