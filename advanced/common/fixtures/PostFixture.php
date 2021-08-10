<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class PostFixture extends ActiveFixture
{
    public $modelClass = 'backend\models\Post';
    public $dataFile = '@backend/tests/_data/post.php';
}