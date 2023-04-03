<?php



namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_de_naissance' => Carbon::parse($this->faker->date('Y-m-d', '2005-01-01')),
            'ville_id' => function () {
                return Ville::factory()->create()->id;
            },
        ];
    }
}
