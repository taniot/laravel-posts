<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        //leggendo un file csv -> cartella db dentro seeders
        //leggendo un file json -> cartella db dentro seeders
        //leggere un array di array associativi -> file posts.php dentro /config -> config('posts')
        //leggere da una api


        for ($i = 0; $i < 100; $i++) {

            $post = new Post();
            //assegna valori specifici

            $post->title = $faker->sentence(3);
            //$post->title = 'città del mondo #ciao @sommerso';
            $post->content = $faker->text(500);
            $post->slug = Str::of($post->title)->slug();


            //consolida il salvataggio del dato in tabella
            $post->save();
        }
    }
}
