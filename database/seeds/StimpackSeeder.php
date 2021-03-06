<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Image;
use App\Project;

class StimpackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = Project::where('name', 'stimpack')->get();
        if(!$result->isEmpty()) {
            $result->first()->delete();
        }

        // PROJECT DETAILS
        $project = Project::create([
            'user_id' => User::withNickname('ajthinking')->id,
            'name' => 'stimpack',
            'description' => 'Code automation and manipulating software for rapid Laravel application prototyping.',
            'github' => "https://github.com/stimpack-io/stimpack",
            'tags' => 'Laravel, accelerator, kickstarter, React, ETL'           
        ]);
        
        // PROJECT IMAGES
        $project->images()->createMany(
            [
                [
                    'priority' => 1,
                    'url' => env('APP_URL') . '/images/stimpack/1.png'
                ],
                [
                    'priority' => 2,
                    'url' => env('APP_URL') . '/images/stimpack/2.png'
                ],
                [
                    'priority' => 3,
                    'url' => env('APP_URL') . '/images/stimpack/3.png'
                ],                                
            ]
        );

        $project->addMembers(
            ['ajthinking', 'brainmaniac', 'mwthinker']
        );
    }
}
