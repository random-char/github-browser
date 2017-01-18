<?php

/* @var $this yii\web\View */

use app\models\RepoLikes;
use app\models\UserLikes;
use yii\helpers\Html;

$this->title = 'Mobidev is cool indeed :^)';
?>
<div class="site-search">
    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <h2 class="col-xs-12">
                        <?=$repoData->full_name?>
                        <?=(bool) RepoLikes::findOne(['repo_fullname' => $repoData->full_name, 'value' => '1']) ? '<i class="fa fa-star "></i>' : '';?>
                    </h2>
                    <div class="col-xs-12">
                        Description: <?=$repoData->description;?>
                    </div>
                    <div class="col-xs-12">
                        watchers: <?=$repoData->watchers_count;?>
                    </div>
                    <div class="col-xs-12">
                        forks: <?=$repoData->forks_count;?></div>
                    <div class="col-xs-12">
                        open issues: <?=$repoData->open_issues_count;?></div>
                    <div class="col-xs-12">
                        homepage: <?= Html::a(
                            $repoData->homepage,
                            $repoData->homepage
                        );?>
                    </div>
                    <div class="col-xs-12">
                        GitHub repo: <?= Html::a(
                            $repoData->html_url,
                            $repoData->html_url
                        );?></div>
                    <div class="col-xs-12">
                        created at: <?=$repoData->created_at?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="col-xs-12">Contributors:</h2>
                <?php foreach ($repoContributors as $repoContributor) { ?>
                    <div style="margin-bottom: 5px; vertical-align: center; float: left; width: 100%;">
                        <div class="col-xs-4" style="height: 100%">
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
                    </div>
                <?php } ?>
                </div>
            </div>

    </div>
</div>