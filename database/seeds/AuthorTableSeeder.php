<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Author::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dataInsert = [];
        foreach ($this->getAuthorData() as $item) {
            $dataInsert[] = [
                'name' => $item['name'],
                'links' => $item['links'],
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ];
        }

        \App\Models\Author::insert($dataInsert);
    }

    public function getAuthorData()
    {
        return [
            [
                'name'  => 'Albert Camus',
                'links' => 'https://en.wikipedia.org/wiki/Albert_Camus',
            ],
            [
                'name'  => 'Marcel Proust',
                'links' => 'https://en.wikipedia.org/wiki/Marcel_Proust',
            ],
            [
                'name'  => 'Franz Kafka',
                'links' => 'https://en.wikipedia.org/wiki/Franz_Kafka',
            ],
            [
                'name'  => 'Antoine de Saint-Exupéry',
                'links' => 'https://en.wikipedia.org/wiki/Antoine_de_Saint-Exup%C3%A9ry',
            ],
            [
                'name'  => 'André Malraux',
                'links' => 'https://en.wikipedia.org/wiki/Andr%C3%A9_Malraux',
            ],
            [
                'name'  => 'Louis-Ferdinand Céline',
                'links' => 'https://en.wikipedia.org/wiki/Louis-Ferdinand_C%C3%A9line',
            ],
            [
                'name'  => 'John Steinbeck',
                'links' => 'https://en.wikipedia.org/wiki/John_Steinbeck',
            ],
            [
                'name'  => 'Ernest Hemingway',
                'links' => 'https://en.wikipedia.org/wiki/Ernest_Hemingway',
            ],
            [
                'name'  => 'Alain-Fournier',
                'links' => 'https://en.wikipedia.org/wiki/Alain-Fournier',
            ],
            [
                'name'  => 'Boris Vian',
                'links' => 'https://en.wikipedia.org/wiki/Boris_Vian',
            ],
            [
                'name'  => 'Simone de Beauvoir',
                'links' => 'https://en.wikipedia.org/wiki/Simone_de_Beauvoir',
            ],
        ];
    }
}
