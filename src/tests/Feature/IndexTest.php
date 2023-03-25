<?php

namespace Tests\Feature;

use App\BigQuestion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;


class IndexTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {


        $new_record = factory(BigQuestion::class)->create();

        $response = $this->get('/');

        // 「http://localhost/」 にアクセスした時にステータスコード200が返ってくる
        $response->assertStatus(200);

        // 「/」にアクセスした時レスポンスに「東京の難読地名クイズ」という文字列が含まれている事を確認する
        // $response->assertSee("東京の難読地名クイズ");

        $response->assertSee($new_record->name);
    }
}
