<?php


use Illuminate\Support\Str;     //importiamo str
use App\Models\Post;        //importiamo post
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;        //as vuol dire alias //importiamo FAker
use Illuminate\Support\Arr;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /*
        Ora stiamo creando dei post faker di conseguenza questa procedura non ci serve
        
        //inseriamo la logica per creare dei record sul db (tupla)

        //prendiamo un array per passare i dati al foreach per creare un post
        $posts = [
            [
                "title" => "Il mio quattordicesimo post",
                "content" => "Donec sagittis libero quis ipsum fermentum lobortis. Nam vel consequat metus, eget bibendum tortor. Vivamus aliquam orci eget tortor molestie, sed egestas purus molestie. Nulla viverra interdum varius. Duis rutrum tincidunt metus placerat tristique. Integer eget porta massa, ac facilisis nisi. Donec luctus varius sollicitudin. Donec cursus egestas ullamcorper.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio tredicesimo post",
                "content" => "Duis placerat orci bibendum urna rutrum sodales. Vivamus bibendum eleifend ligula. Curabitur tempor urna vel feugiat aliquet. Curabitur euismod placerat ultricies. Pellentesque non sem ac lacus interdum condimentum quis eget nisl. Fusce tempus enim mi. Curabitur facilisis sodales ex. Mauris facilisis tellus at lorem pellentesque tempor id in lectus. Donec ut eros malesuada, suscipit tellus id, pretium ex. Cras vulputate dignissim facilisis. Vivamus mattis scelerisque ex ut finibus. Proin leo sem, mollis sed efficitur ut, ultrices vel nisl.",
                "image" => "https://via.placeholder.com/360",
            ],

        ];
        //usiamo il foreach per creare un post per ognuno dei dati in una array
        foreach ($posts as $post) {
            $newPost = new Post();

            /*
            $newPost->title = $post['title'];
            $newPost->content = $post['content'];
            $newPost->image = $post['image'];

            //altro metodo con il fill()
            $newPost->fill($post);      //non basta ma si deve aggiungere il fillable al file Models/Post.php

            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        }*/

        //tutte le categorie come oggetto categoria solo con id
        $categories_id = Category::select('id')->pluck('id')->toArray(); //toArray() ci da un array di oggetti

        //FAKER creaiamo 50 post
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            //ASSEGNARE A CASO UNA CATEGORIA
            $post->category_id = Arr::random($categories_id);   //tramite Arr ci permette di randomizzare una categoria per ogni post

            $post->title = $faker->text(50);    // il 50 sta a indicare i caratteri e non le parole
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        }
    }
}
