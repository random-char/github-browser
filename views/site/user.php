<?php

/* @var $this yii\web\View */

use app\models\UserLikes;
use yii\helpers\Html;

$this->title = 'Mobidev is cool indeed :^)';
?>
<div class="site-user">

    <h1><?=$userData->name?></h1>
    <?php
//    var_dump($userData);
    ?>

    <div class="body-content">

        <div class="row">
            <div class="col-xs-12">
                <?=Html::img($userData->avatar_url, ['class' => 'user-avatar']);?>
                <?=$userData->login?>
                Company: <?=$userData->company?>
                Blog: <?=$userData->blog?>
                Followers: <?=$userData->followers?>
                <?php
                $isLiked = (bool) UserLikes::findOne(['username' => $userData->login, 'value' => '1']);
                echo Html::button(
                    $isLiked ? 'UnLike' : 'Like',
                    ['class' => 'btn ' . ($isLiked ? 'btn-danger' : 'btn-success'), 'data-name' => $userData->login, 'onclick' => "vote(this, 'user')"]);
                ?>
            </div>
        </div>

    </div>
</div>
