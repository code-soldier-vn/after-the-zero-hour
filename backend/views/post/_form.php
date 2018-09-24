<?php

use \yii\helpers\Html;
use \yii\widgets\ActiveForm;
use \dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_excerpt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>

    <?php

    $flatList = \backend\models\Post::getFlatList($model);
    $flatList[0] = Yii::t('app', '-- Select parent --');
    ksort($flatList);

    echo $form->field($model, 'post_parent')->dropDownList($flatList);
    ?>

    <?= $form->field($model, 'post_status')->dropDownList([
        0 => 'Draft',
        1 => 'Publish',
        2 => 'Private'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
