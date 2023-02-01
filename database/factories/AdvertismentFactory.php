<?php
namespace Database\Factories;
use App\Models\{Admin, Advertisment};
use Illuminate\Database\Eloquent\Factories\Factory;
class AdvertismentFactory extends Factory {
    protected $model = Advertisment::class;
    public function definition() {
        return [
            'name' => $this->faker->unique()->name,
            'url' => $this->faker->unique()->url(),
            'admin_id' => Admin::all()->random()->id,
            'status' => $this->faker->randomElement(['0', '1'])
        ];
    }
}