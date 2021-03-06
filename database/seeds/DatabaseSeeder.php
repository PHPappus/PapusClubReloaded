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
        //$this->call(SedeTableSeeder::class);
        //$this->call(ProductoTableSeeder::class);
        //$this->call(ProveedorTableSeeder::class);
        //$this->call(SorteoTableSeeder::class);
        //$this->call(AmbienteTableSeeder::class);
        //$this->call(ActividadTableSeeder::class);
        $this->call(TipoPersonaTableSeeder::class);
        $this->call(ConfiguracionTableSeeder::class);
        $this->call(TarifaMembresiaTableSeeder::class);
        $this->call(TipoMembresiaTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
        //$this->call(PostulanteTableSeeder::class);
        //$this->call(SocioTableSeeder::class);
        //$this->call(CarnetTableSeeder::class);
        //$this->call(ReservasTableSeeder::class);
        //$this->call(TestTallerTableSeeder::class);
        //$this->call(PrecioProductoTableSeeder::class);
        //$this->call(FacturacionTableSeeder::class);
        //$this->call(ProductoxFacturacionTableSeeder::class);
        $this->call(TipoFamiliaTableSeeder::class);
        //$this->call(TarifaAmbientexTipoPersonaTableSeeder::class);
        //$this->call(servicioSeeder::class);
        //$this->call(TarifarioServiciosTableSeeder::class);      
        //$this->call(TarifaFamiliarTableSeeder::class);
        //$this->call(TarifaActividadTableSeeder::class);

        //$this->call(FamiliarxPostulanteTableSeeder::class);
        //$this->call(ConcesionariaTableSeeder::class);

        //$this->call(TarifaTallerTableSeeder::class);
        $this->call(TrabajadorTableSeeder::class);

        Model::reguard();
    }
}
