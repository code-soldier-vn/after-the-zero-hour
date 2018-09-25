<?php

namespace backend\models;

use \backend\components\assets\ImageResize as AssetsImageResize;
use \backend\components\helpers\file\Path;
use \Yii;
use \yii\behaviors\AttributeBehavior;
use \yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use \yii\db\Expression;
use \yii\helpers\FileHelper;
use \yii\web\UploadedFile;
use \Gumlet\ImageResize;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $title
 * @property string $path
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $del_flag
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['path'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'mimeTypes' => 'image/jpeg, image/png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'path' => Yii::t('app', 'Path'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'del_flag' => Yii::t('app', 'Del Flag'),
        ];
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
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_by'],
                ],
                'value' => function () {
                    return \Yii::$app->user->id;
                }
            ]
        ];
    }

    public function saveAndUpload()
    {
        $this->path = UploadedFile::getInstance($this, 'path');

        if ($this->path && $this->validate()) {
            try {
                $filePath = new Path();

                $fileName = Path::generateUniqueFileName($this->path->getBaseName(), $this->path->getExtension());

                $dir = $filePath->getUploadSubDir();
                $dirThumb = $filePath->getUploadThumbDir();

                $path = $dir . $fileName;
                $pathThumb = $dirThumb . $fileName;

                FileHelper::createDirectory($dir);
                FileHelper::createDirectory($dirThumb);

                $isUploaded = $this->path->saveAs($path);

                if ($isUploaded) {
                    $this->path = Path::toShortUrl($path);

                    $image = new ImageResize($path);
                    $thumb = \Yii::$app->imageResize->getThumb();
                    $image->crop(60, 60);
                    $image->save($pathThumb);

                    if ($this->save()) {
                        $thisThumbs = new MediaThumbs();

                        $thisThumbs->media_id = $this->id;
                        $thisThumbs->path = Path::toShortUrl($pathThumb);
                        $thisThumbs->save();
                    }
                }
            } catch (\Exception $e) {
                \Yii::$app->getSession()->setFlash('error', $e->getMessage());
            }
        }

        return $this;
    }

    public function getThumbs()
    {
        return $this->hasMany(MediaThumbs::className(), ['media_id' => 'id']);
    }

    public function getThumb()
    {
        return $this->hasOne(MediaThumbs::className(), ['media_id' => 'id'])->where(['size' => 'thumb']);
    }
}
