<?php
use app\models\Posts;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="content-wrapper">
    <div class="content">
        <h1>Posts list</h1>
        <p>
            <?= Html::a('Create Post', ['posts/create'], ['class' => 'btn btn-primary']) ?>
        </p>
        <div class="news-list">
            <ul>
                <?php
                foreach ($posts as $postItem) { ?>
                    <li id="<?= $postItem->id?>">
                        <img src="<?= Url::to('@web/img/news_item.png')?>" alt="">
                        <div class="news-text">
                            <a href="<?= Url::to(['posts/view', 'id' => $postItem->id]);?>" >
                                <h4><?= $postItem->title; ?></h4>
                            </a>
                            <p><?= Posts::getPreviewText($postItem->text)?></p>
                        </div>
                        <div class="news-date"><?= date('d.m.Y', $postItem->date); ?></div>
                        <div class="rud-links">
                            <a href="<?= Url::to(['posts/view', 'id' => $postItem->id]);?>" >View</a>
                            <a href="<?= Url::to(['posts/update', 'id' => $postItem->id]);?>">Edit</a>
                            <?= Html::a('Remove', ['posts/delete-main', 'id' => $postItem->id], [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="page-buffer"></div>