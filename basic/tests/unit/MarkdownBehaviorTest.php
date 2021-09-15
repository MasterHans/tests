<?php

namespace tests\unit;

use app\models\Post;
use Codeception\Test\Unit;
use tests\unit\fixtures\PostFixture;


class MarkdownBehaviorTest extends Unit
{
    public function testMy()
    {
        if (!file_put_contents('/var/www/html/tttt.txt', codecept_data_dir())) {
            die;
        };
    }

    public function testNewModelSave()
    {
        $post = new Post();
        $post->title = 'Title';
        $post->text = 'my first posting!!';
        $post->content_markdown = 'New *markdown* text';
        $this->assertTrue($post->save());
        $this->assertEquals("<p>New <em>markdown</em> text</p>\n", $post->content_html);
    }

    public function testExistingModelSave()
    {
        $post = Post::findOne(1);
        $post->title = 'edited Title';
        $post->text = 'edited my first posting!!';
        $post->content_markdown = 'edited Other *markdown* text';
        $this->assertTrue($post->save());
        $this->assertEquals("<p>edited Other <em>markdown</em> text</p>\n", $post->content_html);
    }
//не работает
//[Error] Class 'tests\unit\fixtures\PostFixture' not found
//    public function _fixtures()
//    {
//        return [
//            'posts' => [
//                'class' => PostFixture::className(),
//                'dataFile' => codecept_data_dir() . 'post.php'
//            ]
//        ];
//    }
}