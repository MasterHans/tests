<?php
namespace backend\tests;

class SampleAcceptTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\AcceptanceTester
     */
    protected $tester;
    
    protected function _before()
    {

    }

    protected function _after()
    {

    }

    // tests
    public function testSomeFeature(AcceptanceTester $I)
    {
        file_put_contents('/var/www/html/tttt.txt','kjljlkjlkjlkj');
    }
}