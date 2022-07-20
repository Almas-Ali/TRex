<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\settings;
use App\Models\post;
use App\Models\category;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trex:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To setup settings for first time use trex:install command.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        var_dump(count(Settings::all()));
        // Settings
        if (count(Settings::all()) == 0) {
            $settings = new Settings;
            $settings -> site_name          = 'TRex';
            $settings -> site_slogan        = 'Don\'t work hard, work smart!';
            $settings -> site_author_name   = 'TRex Team';
            $settings -> site_author_email  = 'support@trex.com';
            $settings->save();
            echo "[+] Successfully installed site settings!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        // Categories
        if (count(Category::all()) == 0) {
            $category       = new Category;
            $category->name = 'Test';
            $category->save();
            echo "[+] Successfully installed site categories!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        // Posts
        if (count(Post::all()) == 0) {
            $post = new Post;
            $post->title        = 'Hello world';
            $post->slug         = 'hello-world';
            $post->content      = 'Hello world, this is our first post!\n \n Lorem ipsum dolor, sit amet consectetur adipisicing elit. A consequuntur velit, explicabo qui cum aliquam doloremque neque blanditiis exercitationem dicta, sunt corrupti excepturi. In provident non, quibusdam saepe harum, laudantium recusandae minus exercitationem nostrum aliquid iste aperiam aliquam aspernatur fuga necessitatibus. Aut inventore veritatis tempora ea architecto. Quasi cumque ea, voluptates obcaecati numquam ipsa quo aliquam perspiciatis consequatur est voluptatum iste aliquid quam nesciunt repudiandae dicta, optio cum sint aspernatur. Quis necessitatibus maiores commodi fuga, nam possimus. Dicta, ratione impedit beatae odio atque eum veniam rem modi minima velit illo quas id itaque nam quae, iste dignissimos ipsam aperiam quam voluptas obcaecati, hic maxime amet? Sunt, fuga ullam totam voluptas, maxime culpa vitae neque consequuntur itaque laudantium voluptatum sint nemo quo dolorem hic beatae omnis distinctio eius quisquam! Omnis, temporibus dolore iste obcaecati neque consequuntur delectus, dolorum sapiente corrupti quo explicabo enim nesciunt quis esse recusandae similique impedit cupiditate cum veniam adipisci facere cumque quibusdam architecto. Nulla quam non numquam blanditiis, cumque minima veniam aperiam facilis quo asperiores eveniet aliquid, voluptatibus ducimus libero expedita corporis explicabo beatae vero quae eos in. Quis et saepe velit architecto doloribus nobis deserunt aliquid totam magnam consequuntur adipisci quaerat hic, exercitationem asperiores, delectus ea.';
            $post->category_id  = '1';
            $post->author       = '1';
            $newImageName = 'trex-03.png';
            $post -> name = $newImageName;
            $post -> path = "/img/".$newImageName;
            $post->save();
            $post->tag('test');
            echo "[+] Successfully installed site posts!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        return True;
    }
}
