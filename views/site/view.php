<?php

/* @var $this yii\web\View */

use app\models\UserLikes;
use yii\helpers\Html;

$this->title = 'Mobidev is cool indeed :^)';
?>
<div class="site-search">

    <h1><?=$repoData->full_name?></h1>


    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <?php
//                    var_dump($repoData);
                ?>
                Description: <?=$repoData->description;?>
                <br>
                watchers: <?=$repoData->watchers_count;?>
                <br>
                forks: <?=$repoData->forks_count;?>
                <br>
                open issues: <?=$repoData->open_issues_count;?>
                <br>
                homepage: <?= Html::a(
                    $repoData->homepage,
                    $repoData->homepage
                );?>
                <br>
                GitHub repo: <?= Html::a(
                    $repoData->html_url,
                    $repoData->html_url
                );?>
                <br>
                created at: <?=$repoData->created_at?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-12">
                        Contributors:
                    </div>
                <?php foreach ($repoContributors as $repoContributor) { ?>
                    <div class="col-xs-4">
                    <?= Html::a(
                        $repoContributor->login,
                        '/user/' . $repoContributor->login
                    );?>
                    </div>
                    <div class="col-xs-8">
                    <?php
                    $isLiked = (bool) UserLikes::findOne(['username' => $repoContributor->login, 'value' => '1']);
                    echo Html::button(
                        $isLiked ? 'UnLike' : 'Like',
                        ['class' => 'btn ' . ($isLiked ? 'btn-danger' : 'btn-success'), 'data-name' => $repoContributor->login, 'onclick' => "vote(this, 'user')"]); ?>
                    </div>
                <?php } ?>
                </div>
            </div>

    </div>
</div>