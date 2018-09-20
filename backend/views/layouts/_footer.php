</div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="<?= Yii::$app->homeUrl; ?>"><?= \Yii::t('app', 'Home'); ?></a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
            , made with <i class="fa fa-heart heart"></i> by <a
                href="<?= Yii::$app->homeUrl; ?>"><?= Yii::$app->name; ?></a>
        </div>
    </div>
</footer>

</div>
</div>


<?php
/*
<div class="wrap">
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
 */
?>

<?php $this->endBody() ?>
</body>
</html>