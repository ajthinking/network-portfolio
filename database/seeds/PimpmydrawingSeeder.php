<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Image;
use App\Project;

class PimpmydrawingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $result = Project::where('name', 'pimpmydrawing')->get(); 

        if(!$result->isEmpty()) {
            $result->first()->delete();
        }

        $project = Project::create([
            'user_id' => User::withNickname('brainmaniac')->id,
            'name' => 'pimpmydrawing',
            'description' => 'A nice vector library!',
            'elevator_pitch' => 'Placeholder',
            'github' => "",
            'twitter' => null,
            'facebook' => null,
            'production_url' => 'https://pimpmydrawing.com',
            'status' => 'active',
            'tags' => 'vector'
        ]);
        
        $project->images()->createMany(
            [
                [
                    'priority' => 1,
                    'url' => env('APP_URL') .'/images/pimpmydrawing/1.png'
                ],                             
            ]
        );

        $project->addMembers(
            ['ajthinking', 'brainmaniac']
        );
    }
}
