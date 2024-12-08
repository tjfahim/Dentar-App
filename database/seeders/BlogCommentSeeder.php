<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            $commentCount = rand(0, 5); // Generate a random number of comments

            for ($i = 0; $i < $commentCount; $i++) {
                // Randomly select a user type
                $userType = ['Doctor', 'Patient', 'Student'][array_rand(['Doctor', 'Patient', 'Student'])];
                $userModel = "App\\Models\\$userType";

                // Retrieve a random user of the selected type
                $user = $userModel::inRandomOrder()->first();

                if ($user) { // Ensure a user exists before creating a comment
                    BlogComment::factory()->create([
                        'blog_id' => $blog->id,
                        'user_id' => $user->id,
                        'user_type' => $user->userType, // Use the selected user type
                    ]);
                }
            }
        }
    }
}
