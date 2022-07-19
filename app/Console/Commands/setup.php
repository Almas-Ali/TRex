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
    protected $signature = 'setup:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To setup settings for first time.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Settings
        $settings = new Settings;
        $settings -> site_name          = 'TRex';
        $settings -> site_slogan        = 'Don\'t work hard, work smart!';
        $settings -> site_author_name   = 'TRex Team';
        $settings -> site_author_email  = 'support@trex.com';
        $settings->save();
        echo "[+] Successfully installed site settings!";

        // Categories
        $category       = new Category;
		$category->name = 'Test';
		$category->save();
        echo "[+] Successfully installed site categories!";

        // Posts
        $post = new Post;
        $post->title        = 'Hello world';
        $post->slug         = 'hello-world';
        $post->content      = 'Hello world, this is our first post!';
        $post->category_id  = '1';
        $post->author       = '1';
        $newImageName = time() . '-' . 'trex-03.png';
        $post -> name = $newImageName;
        $post -> path = "/img/".$newImageName;
        $post->save();
    	$post->tag('test');
		echo "[+] Successfully installed site posts!";


        return True;
    }
}
