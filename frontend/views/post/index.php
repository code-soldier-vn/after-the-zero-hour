<?php
/* @var $this yii\web\View */
?>

<?php foreach ($models as $post): ?>

    <?php
    /** @var \backend\models\Post $post */
    ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="post-block">
            <div class="post-img">
                <a href="#" class="imghover">
                    <img src="./images/post-img-small-1.jpg" alt="" class="img-responsive"></a>
            </div>
            <!-- post block -->
            <div class="post-content">
                <div class="meta">
                    <span class="meta-categories"><a href="#"></a></span>
                    <span class="meta-date">30 July, 2020</span>
                </div>
                <h4><a href="#" class="title"><?= $post->post_title; ?></a></h4>
                <p><?= $post->post_excerpt; ?></p>
                <a href="#" class="btn-link">read more</a>
            </div>
        </div>
    </div>

<?php endforeach; ?>


<!-- pagination start -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="st-pagination">
<!--        <ul class="pagination">-->
<!--            <li><a href="#" aria-label="previous"><span aria-hidden="true">Previous</span></a> </li>-->
<!--            <li class="active"><a href="#">1</a></li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
<!--            <li> <a href="#" aria-label="Next"><span aria-hidden="true">Next</span></a> </li>-->
<!--        </ul>-->

        <?php
        // display pagination
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>

    </div>
</div>
<!-- pagination close -->
