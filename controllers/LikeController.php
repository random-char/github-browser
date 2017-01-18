<?php

namespace app\controllers;

use app\models\RepoLikes;
use app\models\UserLikes;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class LikeController extends Controller
{
    public function actionVote($type, $name)
    {
        if ($type == 'user') {
            $like = UserLikes::findOne(['username' => $name]);
            if (empty($like)) {
                $like = new UserLikes();
                $like->username = $name;
                $like->value = 1;
                $like->save();
            } else {
                $like->value = ($like->value + 1) % 2;
                $like->save();
            }
        } elseif ($type == 'repo') {
            $like = RepoLikes::findOne(['repo_fullname' => $name]);
            if (empty($like)) {
                $like = new RepoLikes();
                $like->repo_fullname = $name;
                $like->value = 1;
                $like->save();
            } else {
                $like->value = ($like->value + 1) % 2;
                $like->save();
            }
        } else {
            throw new BadRequestHttpException('Wrong type!');
        }
    }
}
