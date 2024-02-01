<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['Database', 'FrontEnd', 'BackEnd', 'FullStack'];

        foreach ($skills as $skill) {
            $newSkill = new Skill();
            $newSkill->name = $skill;
            $newSkill->save();
            
        }

    }
}
