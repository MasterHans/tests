<?php

namespace tests\codeception\unit;

use app\models\Post;
use Codeception\Test\Unit;
use tests\unit\fixtures\PostFixture;


class MarkdownBehaviorTest extends Unit
{
    public function testNewModelSave()
    {
        $post = new Post();
        $post->title = 'Title';
        $post->content_markdown = 'New *markdown* text';
        $this->assertTrue($post->save());
//        $this->assertEquals("<p>New <em>markdown</em> text</p>\n", $post->content_html);
    }

    public function testExistingModelSave()
    {
        $post = Post::findOne(16);
        $post->content_markdown = 'Other *markdown* text';
        $this->assertTrue($post->save());
        $this->assertEquals("<p>Other <em>markdown</em> text</p>\n", $post->content_html);
    }

    public function fixtures()
    {
        return [
            'posts' => [
                'class' => PostFixture::className(),
            ]
        ];
    }
}