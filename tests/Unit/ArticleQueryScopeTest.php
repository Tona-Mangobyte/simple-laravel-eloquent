<?php

use App\Models\Article;
use Tests\TestCase;

class ArticleQueryScopeTest extends TestCase
{
    public function test_query_scope() {
        $articles = Article::published()->get();

        $this->assertEquals(count($articles), 1);
    }

    /*public function test_article_update_published() {
        $article = Article::find(501);
        $article->publishedArticle();
        $article->content = "simple content";
        $saved = $article->save();
        $this->assertEquals($saved->published, 1);
    }*/
}
