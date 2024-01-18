<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Заголовок поста 1',
                'img' => '/posts/1.png',
                'short_content' => 'Про обычное...',
                'content' => 'Сегодня мы почему-то очень долго спали. Я поражён природой повседневной жизни.',
                'creator_id' => 1,
                'created_at' => '2023-04-21 21:12:00',
            ],
            [
                'title' => 'Заголовок поста 2',
                'img' => '/posts/2.png',
                'short_content' => 'Слоны снова захватили зоопарк..!',
                'content' => 'Не могу себе представить как придётся их выгонять отсюда... Это зоопарк в центре города и здесь вообще слоны не числятся...',
                'creator_id' => 2,
                'created_at' => '2023-06-25 16:10:10',
            ],
            [
                'title' => 'Заголовок поста 3',
                'img' => '/posts/3.png',
                'short_content' => 'Купили 1ГБ в облачном хранилище...',
                'content' => 'Купили 1ГБ в облачном хранилище. Никто не может понять как его смогли продать в настоящем облаке, кхм.',
                'creator_id' => 1,
                'created_at' => '2023-08-09 12:01:35',
            ],
            [
                'title' => 'Заголовок поста 4',
                'img' => '/posts/4.png',
                'short_content' => 'Сенсация...!',
                'content' => 'В этом посте ничего не оказалось...',
                'creator_id' => 3,
                'created_at' => '2024-01-11 20:15:40',
            ]
        ]);
    }
}
