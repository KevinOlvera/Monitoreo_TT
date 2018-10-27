<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
            'name' => 'Introduccion',
            'project_id' => 1
      ]);
      DB::table('projects')->insert([
            'name' => 'Marco Teorico',
            'project_id' => 1
      ]);
      DB::table('projects')->insert([
            'name' => 'Conclusiones',
            'project_id' => 1
      ]);

      DB::table('projects')->insert([
            'name' => 'Introduccion',
            'project_id' => 2
      ]);
      DB::table('projects')->insert([
            'name' => 'Marco Teorico',
            'project_id' => 2
      ]);
      DB::table('projects')->insert([
            'name' => 'Conclusiones',
            'project_id' => 2
      ]);

      DB::table('projects')->insert([
            'name' => 'Introduccion',
            'project_id' => 3
      ]);
      DB::table('projects')->insert([
            'name' => 'Marco Teorico',
            'project_id' => 3
      ]);
      DB::table('projects')->insert([
            'name' => 'Conclusiones',
            'project_id' => 3
      ]);
    }
}
