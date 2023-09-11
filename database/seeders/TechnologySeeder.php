<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datas = config('technologies');

    foreach ($datas as $data) {
      $technology = new Technology();
      $technology->label = $data['label'];
      $technology->color = $data['color'];
      $technology->save();
    }
  }
}
