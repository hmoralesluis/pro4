<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		  $this->call('CategorySeeder');
	}



}

class CategorySeeder extends Seeder{

	public function run()
	{


       /* $user = new User();

        $user->email = 'admin2@gmail.com';
        $user->name = 'Administrador';
        $user->password = bcrypt('admin123');
        $user->save();*/



       $prods = Product::all();
		foreach($prods as $prod)
		{
			$prod->image = $prod->image . '.jpg';
			$prod->save();
		}
	}



}
