<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Book::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dataInsert = [];
        $authors = \App\Models\Author::all();
        $arrayIds = array_column($authors->toArray(), 'id');

        foreach ($this->getBookData() as $key => $item) {
            $dataInsert[] = [
                'author_id'  => $arrayIds[$key],
                'title'      => $item['title'],
                'languages'  => 'English',
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ];
        }

        \App\Models\Book::insert($dataInsert);
    }

    public function getBookData()
    {
        return [
            [
                'title'  => 'The Stranger',
            ],
            [
                'title'  => 'In Search of Lost Time',
            ],
            [
                'title'  => 'The Trial',
            ],
            [
                'title'  => 'The Little Prince',
            ],
            [
                'title'  => 'Man\'s Fate',
            ],
            [
                'title'  => 'Journey to the End of the Night',
            ],
            [
                'title'  => 'The Grapes of Wrath',
            ],
            [
                'title'  => 'For Whom the Bell Tolls',
            ],
            [
                'title'  => 'Le Grand Meaulnes',
            ],
            [
                'title'  => 'Froth on the Daydream',
            ],
            [
                'title'  => 'The Second Sex',
            ],
        ];
    }
}
