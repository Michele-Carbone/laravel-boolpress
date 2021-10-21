<?php


use Illuminate\Support\Str;     //importiamo str
use App\Models\Post;        //importiamo post

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inseriamo la logica per creare dei record sul db (tupla)

        //prendiamo un array per passare i dati al foreach per creare un post
        $posts = [
            [
                "title" => "Il mio terzo post",
                "content" => "Donec sagittis libero quis ipsum fermentum lobortis. Nam vel consequat metus, eget bibendum tortor. Vivamus aliquam orci eget tortor molestie, sed egestas purus molestie. Nulla viverra interdum varius. Duis rutrum tincidunt metus placerat tristique. Integer eget porta massa, ac facilisis nisi. Donec luctus varius sollicitudin. Donec cursus egestas ullamcorper.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio quarto post",
                "content" => "Duis placerat orci bibendum urna rutrum sodales. Vivamus bibendum eleifend ligula. Curabitur tempor urna vel feugiat aliquet. Curabitur euismod placerat ultricies. Pellentesque non sem ac lacus interdum condimentum quis eget nisl. Fusce tempus enim mi. Curabitur facilisis sodales ex. Mauris facilisis tellus at lorem pellentesque tempor id in lectus. Donec ut eros malesuada, suscipit tellus id, pretium ex. Cras vulputate dignissim facilisis. Vivamus mattis scelerisque ex ut finibus. Proin leo sem, mollis sed efficitur ut, ultrices vel nisl.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio quinto post",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies id ex vel pulvinar. Sed tempus mattis felis, eget suscipit arcu sodales id. Fusce fringilla tincidunt nunc quis molestie. Morbi ligula dolor, eleifend vitae sapien eu, sodales varius odio. Vivamus at efficitur ex. Etiam malesuada ipsum nisl, at hendrerit quam dictum ac. Suspendisse potenti. Aenean volutpat sit amet turpis id pharetra. Maecenas pretium, augue dapibus aliquam convallis, lacus odio laoreet massa, eget aliquet mi arcu et sem.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio sesto post",
                "content" => "Duis placerat orci bibendum urna rutrum sodales. Vivamus bibendum eleifend ligula. Curabitur tempor urna vel feugiat aliquet. Curabitur euismod placerat ultricies. Pellentesque non sem ac lacus interdum condimentum quis eget nisl. Fusce tempus enim mi. Curabitur facilisis sodales ex. Mauris facilisis tellus at lorem pellentesque tempor id in lectus. Donec ut eros malesuada, suscipit tellus id, pretium ex. Cras vulputate dignissim facilisis. Vivamus mattis scelerisque ex ut finibus. Proin leo sem, mollis sed efficitur ut, ultrices vel nisl.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio settimo post",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a purus augue. Donec id nisl nunc. Nulla facilisi. Integer congue magna sit amet lacinia cursus. In vel efficitur leo. Suspendisse placerat augue eu erat egestas, nec bibendum tortor imperdiet. Pellentesque at justo laoreet, tincidunt ex id, condimentum eros. Sed rutrum pulvinar urna vitae tincidunt. Fusce eu purus dapibus, finibus mi et, facilisis neque. Phasellus sit amet tincidunt dui. Etiam vel viverra nisl. Maecenas nec commodo nunc. Phasellus pulvinar massa non pharetra consectetur. Nulla tempor, arcu nec convallis rhoncus, leo augue efficitur quam, dictum finibus mi est ut sapien. Nulla vel mi sit amet nisi ultrices congue id ac mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio ottavo post",
                "content" => "Donec sagittis libero quis ipsum fermentum lobortis. Nam vel consequat metus, eget bibendum tortor. Vivamus aliquam orci eget tortor molestie, sed egestas purus molestie. Nulla viverra interdum varius. Duis rutrum tincidunt metus placerat tristique. Integer eget porta massa, ac facilisis nisi. Donec luctus varius sollicitudin. Donec cursus egestas ullamcorper.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio nono post",
                "content" => "Fusce scelerisque, odio vitae pulvinar sagittis, erat nisi venenatis lacus, vitae ultrices neque magna at dui. Donec aliquam viverra erat. Mauris ut sagittis nisi. Pellentesque efficitur urna enim. Cras nibh justo, aliquet sit amet odio eget, elementum interdum risus. Integer ornare condimentum ipsum. Cras tempor velit scelerisque neque pharetra accumsan. Cras dui libero, molestie commodo varius id, vestibulum a ex. Fusce scelerisque eros ut mattis hendrerit. Fusce tempor convallis nisl.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio decimo post",
                "content" => "Duis placerat orci bibendum urna rutrum sodales. Vivamus bibendum eleifend ligula. Curabitur tempor urna vel feugiat aliquet. Curabitur euismod placerat ultricies. Pellentesque non sem ac lacus interdum condimentum quis eget nisl. Fusce tempus enim mi. Curabitur facilisis sodales ex. Mauris facilisis tellus at lorem pellentesque tempor id in lectus. Donec ut eros malesuada, suscipit tellus id, pretium ex. Cras vulputate dignissim facilisis. Vivamus mattis scelerisque ex ut finibus. Proin leo sem, mollis sed efficitur ut, ultrices vel nisl.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio undicesimo post",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies id ex vel pulvinar. Sed tempus mattis felis, eget suscipit arcu sodales id. Fusce fringilla tincidunt nunc quis molestie. Morbi ligula dolor, eleifend vitae sapien eu, sodales varius odio. Vivamus at efficitur ex. Etiam malesuada ipsum nisl, at hendrerit quam dictum ac. Suspendisse potenti. Aenean volutpat sit amet turpis id pharetra. Maecenas pretium, augue dapibus aliquam convallis, lacus odio laoreet massa, eget aliquet mi arcu et sem.",
                "image" => "https://via.placeholder.com/360",
            ],
            [
                "title" => "Il mio dodicesimo post",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a purus augue. Donec id nisl nunc. Nulla facilisi. Integer congue magna sit amet lacinia cursus. In vel efficitur leo. Suspendisse placerat augue eu erat egestas, nec bibendum tortor imperdiet. Pellentesque at justo laoreet, tincidunt ex id, condimentum eros. Sed rutrum pulvinar urna vitae tincidunt. Fusce eu purus dapibus, finibus mi et, facilisis neque. Phasellus sit amet tincidunt dui. Etiam vel viverra nisl. Maecenas nec commodo nunc. Phasellus pulvinar massa non pharetra consectetur. Nulla tempor, arcu nec convallis rhoncus, leo augue efficitur quam, dictum finibus mi est ut sapien. Nulla vel mi sit amet nisi ultrices congue id ac mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                "image" => "https://via.placeholder.com/360",
            ],
        ];
        //usiamo il foreach per creare un post per ognuno dei dati in una array
        foreach ($posts as $post) {
            $newPost = new Post();

            $newPost->title = $post['title'];
            $newPost->content = $post['content'];
            $newPost->image = $post['image'];
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        }
    }
}
