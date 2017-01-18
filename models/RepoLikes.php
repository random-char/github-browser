<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class RepoLikes
 * @package app\models
 * @property string $repo_fullname
 * @property int $value
 */
class RepoLikes extends ActiveRecord
{
    public static function tableName()
    {
        return 'repo_likes';
    }
}