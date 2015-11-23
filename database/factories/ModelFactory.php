<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use CodeDelivery\Models\Category;
use CodeDelivery\Models\Client;
use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;
use CodeDelivery\Models\Product;
use CodeDelivery\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Category::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word
    ];
});

$factory->define(Product::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(),
        'price' => $faker->numberBetween(10, 50),
    ];
});

$factory->define(Client::class, function(Faker\Generator $faker){
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(Order::class, function(Faker\Generator $faker){
    return [
        'client_id' => rand(1,10),
        'total' => rand(50,100),
        'status' => 0
    ];
});

$factory->define(OrderItem::class, function(Faker\Generator $faker){
    return [
    ];
});