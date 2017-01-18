<?php

/* @var $this yii\web\View */

use app\models\RepoLikes;
use yii\helpers\Html;

$this->title = 'Mobidev is cool indeed :^)';
?>
<div class="site-search">



    <div class="body-content">

        <div class="row">
            <div class=" col-xs-offset-1 col-xs-10">
                <div class="row">
                        <h1>Search results for <?=$searchTerm?></h1>
                </div>
        <?php
        if (count($reposData) == 0) { ?>
                Nothing found :c
            </div>
        <?php } else { ?>
            <?php foreach ($reposData as $repoData) {
                $isLiked = (bool) RepoLikes::findOne(['repo_fullname' => $repoData->full_name, 'value' => '1']);?>
                <div class="row search-result">
                    <div class="search-result-header">
                        <div class="col-xs-4">
                            <?= Html::a(
                                $repoData->name . ($isLiked ? ' <i class="fa fa-star "></i>' : ''),
                                '/view/' . $repoData->full_name
                            );?>
                        </div>
                        <div class="col-xs-4">
                            <?= Html::a(
                                $repoData->homepage,
                                $repoData->homepage
                            );?>
                        </div>
                        <div class="col-xs-4">
                            <?= Html::a(
                                $repoData->owner->login,
                                '/user/' . $repoData->owner->login
                            );?>
                        </div>
                    </div>
                    <div class="search-result-description">
                        <div class="col-xs-12">
                            <?=$repoData->description;?>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        Watchers: <?=$repoData->watchers_count;?>
                    </div>
                    <div class="col-xs-4">
                        Forks: <?=$repoData->forks_count;?>
                    </div>
                    <div class="col-xs-4">
                        <?php
                        echo Html::button(
                            $isLiked ? 'UnLike' : 'Like',
                            ['class' => 'btn ' . ($isLiked ? 'btn-danger' : 'btn-success'), 'data-name' => $repoData->full_name, 'onclick' => "vote(this, 'repo')"]);
                        ?>
                    </div>
                </div>
                <br>
            <?php } ?>

            </div>
        </div>
        <?php } ?>
    </div>
</div>
