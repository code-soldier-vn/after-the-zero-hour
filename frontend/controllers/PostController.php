<?php

namespace frontend\controllers;

use backend\models\Post;
use yii\data\Pagination;

class PostController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {

        $query = Post::find();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count()
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }
}
