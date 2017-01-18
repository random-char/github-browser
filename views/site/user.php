<?php

/* @var $this yii\web\View */

use app\models\UserLikes;
use yii\helpers\Html;

$this->title = 'Mobidev is cool indeed :^)';
?>
<div class="site-user">
    <div class="body-content"">
        <div class="twPc-div">
            <a class="twPc-bg twPc-block"></a>

            <div>
                <div class="twPc-button">
                    <?php
                    $isLiked = (bool) UserLikes::findOne(['username' => $userData->login, 'value' => '1']);
                    echo Html::button(
                        $isLiked ? 'UnLike' : 'Like',
                        ['class' => 'btn ' . ($isLiked ? 'btn-danger' : 'btn-success'), 'data-name' => $userData->login, 'onclick' => "vote(this, 'user')"]);
                    ?>
                </div>

                <span class="twPc-avatarLink">
                    <img alt="<?=$userData->name?>" src="<?=$userData->avatar_url?>" class="twPc-avatarImg">
                </span>

                <div class="twPc-divUser">
                    <div class="twPc-divName">
                        <?=$userData->name?>
                    </div>
			<span>
                <?=$userData->login?>
			</span>
                </div>

                <div class="twPc-divStats">
                    <ul class="twPc-Arrange">
                        <li class="twPc-ArrangeSizeFit">
                            <span class="twPc-StatLabel twPc-block">Company</span>
                            <span class="twPc-StatValue"><?=$userData->company ? $userData->company : '-'?></span>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="<?=$userData->blog ? $userData->blog : '#'?>" title="885 Following">
                                <span class="twPc-StatLabel twPc-block">Blog</span>
                                <span class="twPc-StatValue"><?=$userData->blog ? $userData->blog : '-'?></span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <span class="twPc-StatLabel twPc-block">Followers</span>
                            <span class="twPc-StatValue"><?=$userData->followers?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- code end -->



    </div>
</div>
