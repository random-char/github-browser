<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class UserLikes
 * @package app\models
 * @property string $username
 * @property int $value
 */
class UserLikes extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_likes';
    }
}