<?php

use Illuminate\Database\Seeder;
use App\rating_member;

class RatingMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo dữ liệu mẫu cho bảng rating_members
        for ($i = 1; $i <= 20; $i++) {
            rating_member::create([
                'name' => 'Member ' . $i,
                'images' => 'member' . $i . '.jpg',
                'point' => rand(70, 100),
                'note' => 'Sample note for Member ' . $i,
            ]);
        }
    }
}
