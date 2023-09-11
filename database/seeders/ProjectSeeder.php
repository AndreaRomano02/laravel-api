<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProjectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(Generator $faker): void
  {
    $types_ids = Type::pluck('id')->toArray();
    $technology_ids = Technology::pluck('id')->toArray();

    for ($i = 0; $i < 50; $i++) {
      $project = new Project();
      $project->title = $faker->jobTitle();
      $project->url = $faker->url;
      $project->description = $faker->paragraphs(5, true);
      $project->type_id = Arr::random($types_ids);
      $project->save();
      $project_technologies = [];
      foreach ($technology_ids as $tech_id) {
        if ($faker->boolean()) $project_technologies[] = $tech_id;
      }

      $project->technologies()->attach($project_technologies);
    }
  }
}
