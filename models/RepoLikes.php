<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class RepoLikes extends ActiveRecord
{
    public static function tableName()
    {
        return 'repo_likes';
    }
}