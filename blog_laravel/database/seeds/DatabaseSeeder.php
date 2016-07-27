<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
				// Truncate tables
				DB::table('user')->truncate();
				DB::table('post')->truncate();
				DB::table('comment')->truncate();

				// Insert administrator
				DB::table('user')->insert([
						'name' => 'Nguyễn Tuấn Anh',
						'email' => 'nguyentuananh11b6@gmail.com',
						'password' => bcrypt('123456'),
						'role' => 'admin',
						'created_at' => new DateTime(), 
	          'updated_at' => new DateTime()
				]);

		    $faker = Faker\Factory::create();
		    $limit = 50;
		    for ($i = 0; $i < $limit; $i++) {
		  			// Insert members
		      	DB::table('user')->insert([
		            'name' => $faker->name,
		            'email' => $faker->unique()->email,
		            'password' => bcrypt('123456'),
		            'role' => 'member',
		            'created_at' => new DateTime(), 
		      			'updated_at' => new DateTime()
		        ]);

		      	// Insert posts
		      	$title = $faker->sentence($nbWords = 10, $variableNbWords = true);
		        DB::table('post')->insert([
		            'title' => $title,
		            'slug' => str_slug($title),
		            'photo' => $faker->numberBetween($min = 1, $max = 10).'.jpg',
		            'summary' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
		            'content' => $faker->text,
		            'created_at' => new DateTime(), 
		      			'updated_at' => new DateTime(),
		      			'uid' => $faker->numberBetween($min = 1, $max = $limit)
		        ]);

		        // Insert comments
		        DB::table('comment')->insert([
		            'content' => $faker->text,
		            'created_at' => new DateTime(), 
		      			'updated_at' => new DateTime(),
		      			'uid' => $faker->numberBetween($min = 1, $max = $limit),
		      			'pid' => $faker->numberBetween($min = 1, $max = $limit)
		        ]);
		    }
    }
}
