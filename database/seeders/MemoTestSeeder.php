<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemoTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memoTests = [
            [
                'name' => 'Animals 1',
                'images' => [
                    'https://memo-test-images.s3.amazonaws.com/image+(1).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(2).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(3).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(4).png',
                ],
            ],
            [
                'name' => 'Animals 2',
                'images' => [
                    'https://memo-test-images.s3.amazonaws.com/image+(4).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(5).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(6).png',
                    'https://memo-test-images.s3.amazonaws.com/image+(7).png',
                ],
            ],
        ];

        foreach ($memoTests as $memoTest) {
            $memoTestId = \DB::table('memo_tests')->insertGetId([
                'name' => $memoTest['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($memoTest['images'] as $image) {
                \DB::table('memo_test_images')->insert([
                    'memo_test_id' => $memoTestId,
                    'url' => $image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
