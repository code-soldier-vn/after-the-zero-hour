<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "media_thumbs".
 *
 * @property int $id
 * @property int $media_id
 * @property string $size
 * @property string $path
 */
class MediaThumbs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media_thumbs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['media_id'], 'required'],
            [['media_id'], 'integer'],
            [['path'], 'string'],
            [['size'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'media_id' => Yii::t('app', 'Media ID'),
            'size' => Yii::t('app', 'Size'),
            'path' => Yii::t('app', 'Path'),
        ];
    }

    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }
}
