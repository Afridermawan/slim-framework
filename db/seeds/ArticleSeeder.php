<?php

use Phinx\Seed\AbstractSeed;

class ArticleSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i=0; $i < 20; $i++) { 
            $data[] = [
                'title'     => $faker->title,
                'content'   => $faker->text,
                'image'     => 'colour.jpg',
                'publish_date'  => date('Y-m-d H:s:i'),
                'user_id'   => rand(1,20),
            ];
        }

        $this->insert('articles', $data);
    }
}
