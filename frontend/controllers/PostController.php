<?php

namespace frontend\controllers;

use backend\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        $model = Post::find()
            ->select('post.*')
            ->all();

        return $this->render('index', ['model' => $model]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
