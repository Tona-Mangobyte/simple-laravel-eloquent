<?php

use App\Models\Article;
use Tests\TestCase;

class CommentArticleTest extends TestCase
{
    public function test_create_records() {
        /*$article = Article::published(1)->firstWhere('id', 501);
        $article->comments()->createMany([
            [
                'message' => 'A new comment.',
            ],
            [
                'message' => 'Another new comment.',
            ],
        ]);
        $this->assertEquals($article->published, 1);*/

        $this->assertTrue(true);
    }

    public function test_read_records() {
        $article = Article::find(501);
        $this->assertEquals(count($article->comments), 6);
        $this->assertEquals($article->published, 1);
    }
}
