<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property int $parent
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent', 'status'], 'required'],
            [['slug'], 'unique', 'on' => 'update'],
            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'parent' => 'Parent',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['slug'];

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
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique' => true
            ]
        ];
    }

    /**
     * @param $slug
     * @return Category|null
     * @throws NotFoundHttpException
     */
    protected function findBySlug($slug)
    {
        if (($model = $this::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}
