<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SearchRepo extends Model
{
    //search term
    public $q;

    public function rules() {
        return [
            ['q', 'required'],
            ['q', 'string'],
        ];
    }
}