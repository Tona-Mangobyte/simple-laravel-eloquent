<?php

use App\Models\Article;

class ArticleTest extends \Tests\TestCase
{

    public function testReadRecordsTest() {
        $articles = Article::all();
        $this->assertEquals(500, count($articles));
    }

    public function testReadRecordByIdTest() {
        $article = Article::where('id', 501)->first();
        $this->assertEquals(501, $article->id);
    }

    public function testCreateRecordTest() {
        $article = new Article;
        $article->title = "simple title";
        $article->content = "simple content";
        $article->user_id = 3272;
        $success = $article->save();
        $this->assertTrue($success);
    }

    public function testUpdateRecordTest() {
        $article = Article::where('title', "simple title")->first();
        $article->title = "simple_title";
        $article->content = "simple_content";
        $article->user_id = 3273;
        $success = $article->save();
        $this->assertTrue($success);
    }

    public function testDeleteRecordTest() {
        $article = Article::where('title', "simple_title")->first();
        $id = $article->delete();
        $this->assertNotEmpty($id);
    }
}
