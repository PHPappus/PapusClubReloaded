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
        $this->call(DepartamentoTableSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(DistritoTableSeeder::class);
        $this->call(TestUserTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(SedeTableSeeder::class);
<<<<<<< HEAD
    	$this->call(ProductoTableSeeder::class);
    	$this->call(ProveedorTableSeeder::class);
    	$this->call(SorteoTableSeeder::class);
=======
	$this->call(ProductoTableSeeder::class);
	$this->call(ProveedorTableSeeder::class);
	$this->call(SorteoTableSeeder::class);
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
        $this->call(AmbienteTableSeeder::class);
        $this->call(ActividadTableSeeder::class);
        $this->call(TipoPersonaTableSeeder::class);
        $this->call(ConfiguracionTableSeeder::class);
        $this->call(TarifaMembresiaTableSeeder::class);
        $this->call(TipoMembresiaTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
        $this->call(PostulanteTableSeeder::class);
        $this->call(SocioTableSeeder::class);
        $this->call(CarnetTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(TestTallerTableSeeder::class);
<<<<<<< HEAD
	    $this->call(PrecioProductoTableSeeder::class);
=======
	$this->call(PrecioProductoTableSeeder::class);
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
        $this->call(FacturacionTableSeeder::class);
        $this->call(ProductoxFacturacionTableSeeder::class);
        $this->call(TipoFamiliaTableSeeder::class);
        $this->call(TarifaAmbientexTipoPersonaTableSeeder::class);
<<<<<<< HEAD
	    $this->call(servicioSeeder::class);
=======
	$this->call(servicioSeeder::class);
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
        $this->call(TarifaFamiliarTableSeeder::class);
        $this->call(TarifaActividadTableSeeder::class);
		
        Model::reguard();
    }
}
