<?php

namespace mockery;


use Code\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        parent::setUp();
        $this->article = new Article();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }

    public function testEmptyTitle()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSameTitle()
    {
        $this->article->title = "sample title";

        $this->assertEquals("sample title", $this->article->title);
    }

    /**
     * @dataProvider titles
     * @param $title
     * @param $slug
     */
    public function testArticleSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($slug, $this->article->slug());
    }

    public function titles(): array
    {
        return [
            ["This is same title", "this_is_same_title"],
            ["This is    same   title", "this_is_same_title"],
            ["This is \n  same title", "this_is_same_title"],
            ["This is % same @ title", "this_is_same_title"],
            [" This1 Is % same @ title", "this_is_same_title"],
        ];
    }
}