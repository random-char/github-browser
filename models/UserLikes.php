<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserLikes extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_likes';
    }
}