<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class, 10)->create()->each(function ($user) {
            $user->feedbacks()->save(factory(Feedback::class)->make());
        });
    }
}
