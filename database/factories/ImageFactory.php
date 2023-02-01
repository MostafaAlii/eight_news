<?php
namespace Database\Factories;

use App\Models\Advertisment;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
class ImageFactory extends Factory {
    protected $model = Image::class;
    public function definition() {
        return [
            'filename' => $this->faker->randomElement(['1.png', '2.png', '3.png']),
            'imageable_id' => Advertisment::all()->random()->id,
            'imageable_type' => 'App\Models\Advertisment',
        ];
    }
}