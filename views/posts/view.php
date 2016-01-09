<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Posts;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="content-wrapper">
        <div class="content" id="content-1">
            <div class="single-view-text">
                <p><?= $model->text; ?></p>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="notify"><p>Message</p></div>
                <h3>Leave your comment:</h3>
                <div class="form-item form-name">
                    <?= $form->field($newComment, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-item form-email">
                    <?= $form->field($newComment, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-item form-comment">
                    <?= $form->field($newComment, 'message')->textArea(['rows' => '6']) ?>

                </div>
                <div class="submit-form">
                    <?= Html::submitButton('Add comment', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            <div class="comments-list">
                <h3>Comments:</h3>
                <?php foreach($comments as $comment){ ?>
                    <section>
                        <h5><?= $comment['name'] ?> <span>says...</span></h5>
                        <p><?= $comment['message'] ?></p>
                        <div class="comment-date"><?= date('d.m.Y'); ?></div>
                    </section>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="page-buffer"></div>
</div>
