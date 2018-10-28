<?php

use Illuminate\Database\Seeder;
use App\ActivityLog;

class ActivityLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            // seed comments and replies
            for ($j = 1; $j <= 12; $j++) {
                ActivityLog::create([
                    'root_user_id' => rand(1, 5),
                    'post_id' => $i,
                    'comment_id' => $j + 12 * ($i - 1),
                    'action_type_id' => 10
                ]);
            }

            // seed likes
            for ($j = 1; $j <= 3; $j++) {
                ActivityLog::create([
                    'root_user_id' => rand(1, 5),
                    'post_id' => $i,
                    'has_like' => 1,
                    'action_type_id' => 16
                ]);
            }

            // seed bookmarks
            for ($j = 1; $j <= 5; $j++) {
                ActivityLog::create([
                    'root_user_id' => rand(1, 5),
                    'post_id' => $i,
                    'has_bookmark' => 1,
                    'action_type_id' => 18
                ]);
            }

            // seed rates
            for ($j = 1; $j <= 5; $j++) {
                ActivityLog::create([
                    'root_user_id' => rand(1, 5),
                    'post_id' => $i,
                    'rate' => rand(3, 5),
                    'action_type_id' => 20
                ]);
            }
        }
    }
}
