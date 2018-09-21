<?php
/* @var $this yii\web\View */
?>

<?php foreach ($model as $post): ?>

    <?php
    /** @var \backend\models\Post $post */
    ?>

    <article>
        <h3><?= $post->post_title; ?></h3>
        <div>
            <?= $post->post_content; ?>
        </div>
    </article>

<?php endforeach; ?>