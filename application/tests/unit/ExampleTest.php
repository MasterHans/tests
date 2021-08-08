<?php


use app\models\User;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
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
        $user = User::findByUsername('demo');
        $this->assertTrue($user->validatePassword('demo'));

        $user = User::findByUsername('admin');

        $this->assertTrue($user->validatePassword('admin'));
    }
}