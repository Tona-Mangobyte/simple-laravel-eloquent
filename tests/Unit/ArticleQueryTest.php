<?php
/*
 * @see https://github.com/laravel/framework/blob/9.x/src/Illuminate/Database/Eloquent/Builder.php
 * **/

use App\Models\Article;

class ArticleQueryTest extends \Tests\TestCase
{
    public function testQueryAllTest() {
        $articles = Article::all();
        $this->assertCount(500, $articles);
    }

    public function testFindManyTest() {
        $articles = Article::findMany([501, 502, 503]);
        $articleKeys = Article::whereKey([501, 502, 503])->get();

        $this->assertCount(3, $articles);
        $this->assertCount(3, $articleKeys);
    }

    public function testFindOneTest() {
        $article = Article::find(501);
        $articleOrNew = Article::findOrNew(503);
        $articleKey = Article::whereKey(502)->first();

        $this->assertEquals(501, $article->id);
        $this->assertEquals(503, $articleOrNew->id);
        $this->assertEquals(502, $articleKey->id);
    }
}
