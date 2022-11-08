<?php

use App\Models\Article;
use Tests\TestCase;

class ArticleRelationQueryTest extends TestCase
{
    public function test_count_commends() {
        $article = Article::find(501)->withCount('comments')->first();
        $this->assertEquals($article->comments_count, 6);
    }

    public function test_where_relation() {
        /*$article = Article::whereRelation('comments', 'id', '=', 1)
            // ->first();
            ->get();*/
        $article = Article::whereRelation('comments', 'message', '=', 'simple comment.')
            ->first();
        print_r($article->comments);
        $this->assertEquals(1, 1);
    }
}
