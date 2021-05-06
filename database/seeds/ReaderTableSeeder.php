<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Reader::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dataInsert = [];
        foreach ($this->getReaderData() as $item) {
            $dataInsert[] = [
                'full_name'  => $item['full_name'],
                'gender'     => $item['gender'],
                'age'        => $item['age'],
                'address'    => $item['address'],
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ];
        }

        \App\Models\Reader::insert($dataInsert);
    }

    public function getReaderData()
    {
        return [
            [
                'full_name'  => 'Nguyễn Thị Anh Thư',
                'gender'     => \App\Enums\GenderType::FEMALE,
                'age'        => 39,
                'address'    => 'Thành phố Hồ Chí Minh, Việt Nam',
            ],
            [
                'full_name'  => 'Bạch Công Khanh',
                'gender'     => \App\Enums\GenderType::MALE,
                'age'        => 30,
                'address'    => 'Thành phố Hồ Chí Minh, Việt Nam',
            ],
            [
                'full_name'  => 'Vũ Phạm Diễm Hương',
                'gender'     => \App\Enums\GenderType::FEMALE,
                'age'        => 31,
                'address'    => 'Thành phố Hồ Chí Minh, Việt Nam',
            ],
            [
                'full_name'  => 'Bùi Đại Nghĩa',
                'gender'     => \App\Enums\GenderType::MALE,
                'age'        => 42,
                'address'    => 'Thành phố Hồ Chí Minh, Việt Nam',
            ],
            [
                'full_name'  => 'Hari Won',
                'gender'     => \App\Enums\GenderType::FEMALE,
                'age'        => 35,
                'address'    => 'Việt Nam',
            ],
            [
                'full_name'  => 'Nguyễn Hoài Linh',
                'gender'     => \App\Enums\GenderType::MALE,
                'age'        => 51,
                'address'    => 'Việt Nam',
            ],
        ];
    }
}
