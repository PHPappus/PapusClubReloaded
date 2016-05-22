<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

        $this->call(TestUserTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(SedeTableSeeder::class);
        $this->call(TarifarioTableSeeder::class);
		$this->call(ProveedorTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        Model::reguard();
    }
}
