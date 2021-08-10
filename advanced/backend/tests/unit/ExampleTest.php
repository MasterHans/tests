<?php

namespace backend\tests;

use common\fixtures\PostFixture;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        echo '21212';
        print_r('33333');
        var_dump('33333');

        if (!file_put_contents('/var/www/html/tttt.txt', codecept_data_dir())) {
            die;
        };

    }

    public function _fixtures()
    {
        return [
            'posts' => [
                'class' => PostFixture::class,
                'dataFile' => codecept_data_dir() . 'post.php'
            ]
        ];
    }

}