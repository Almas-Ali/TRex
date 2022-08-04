<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\settings;
use App\Models\post;
use App\Models\category;
use App\Models\User;

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

        // Set DB Connection
        // $db_connection = (string)readline("Enter database connection (example: mysql/pgsql): ") ? !'' : 'mysql';
        // $db_host = (string)readline("Enter database host (example: localhost): ") ? !'' : '127.0.0.1';
        // $db_port = (int)readline("Enter database port (example: 3306): ") ? !'' : '3306';
        // $db_name = (string)readline("Enter database name (example: trex): ") ? !'' : 'trex';
        // $db_username = (string)readline("Enter database username (example: root): ") ? !'' : 'root';
        // $db_password = (string)readline("Enter database password (leave empty for localhost): ") ? !'' : '';

        // $db = `
        // APP_NAME=TRex
        // APP_ENV=local
        // APP_KEY=
        // APP_DEBUG=true
        // APP_URL=http://localhost
        
        // LOG_CHANNEL=stack
        // LOG_DEPRECATIONS_CHANNEL=null
        // LOG_LEVEL=debug
        
        // DB_CONNECTION=${db_connection}
        // DB_HOST=${db_host}
        // DB_PORT=${db_port}
        // DB_DATABASE=${db_name}
        // DB_USERNAME=${db_username}
        // DB_PASSWORD=${db_password}
        
        // BROADCAST_DRIVER=log
        // CACHE_DRIVER=file
        // FILESYSTEM_DISK=local
        // QUEUE_CONNECTION=sync
        // SESSION_DRIVER=file
        // SESSION_LIFETIME=120
        
        // MEMCACHED_HOST=127.0.0.1
        
        // REDIS_HOST=127.0.0.1
        // REDIS_PASSWORD=null
        // REDIS_PORT=6379
        
        // MAIL_MAILER=smtp
        // MAIL_HOST=mailhog
        // MAIL_PORT=1025
        // MAIL_USERNAME=null
        // MAIL_PASSWORD=null
        // MAIL_ENCRYPTION=null
        // MAIL_FROM_ADDRESS="hello@example.com"
        // MAIL_FROM_NAME="\${APP_NAME}"
        
        // AWS_ACCESS_KEY_ID=
        // AWS_SECRET_ACCESS_KEY=
        // AWS_DEFAULT_REGION=us-east-1
        // AWS_BUCKET=
        // AWS_USE_PATH_STYLE_ENDPOINT=false
        
        // PUSHER_APP_ID=
        // PUSHER_APP_KEY=
        // PUSHER_APP_SECRET=
        // PUSHER_APP_CLUSTER=mt1
        
        // MIX_PUSHER_APP_KEY="\${PUSHER_APP_KEY}"
        // MIX_PUSHER_APP_CLUSTER="\${PUSHER_APP_CLUSTER}"        
        // `;
        // var_dump($db);
        // echo $db_connection;
        // echo $db_host;
        // echo $db_port;
        // echo $db_name;
        // echo $db_username;
        // echo $db_password;
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
            $category = new Category;
            $category->name         = 'Test1';
            $category->slug         = 'test1';
            $category->description  = 'This is a test category.';
            $category->save();
            echo "[+] Successfully installed site categories!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        // Users
        if (count(User::all()) == 0) {
            $user = new User;
            $user -> name         = 'TRex';
            $user -> username     = 'trex';
            $user -> gender       = 'male';
            $user -> is_admin     = 1;
            $user -> email        = 'support@trex.com';
            $user -> password     = \Illuminate\Support\Facades\Hash::make('12345678');
            $user -> save();
            echo "[+] Successfully installed site default user!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        // Posts
        if (count(Post::all()) == 0) {
            $post = new Post;
            $post -> title        = 'Hello world';
            $post -> slug         = 'hello-world';
            $post -> content      = 'Hello world, this is our first post!\n \n Lorem ipsum dolor, sit amet consectetur adipisicing elit. A consequuntur velit, explicabo qui cum aliquam doloremque neque blanditiis exercitationem dicta, sunt corrupti excepturi. In provident non, quibusdam saepe harum, laudantium recusandae minus exercitationem nostrum aliquid iste aperiam aliquam aspernatur fuga necessitatibus. Aut inventore veritatis tempora ea architecto. Quasi cumque ea, voluptates obcaecati numquam ipsa quo aliquam perspiciatis consequatur est voluptatum iste aliquid quam nesciunt repudiandae dicta, optio cum sint aspernatur. Quis necessitatibus maiores commodi fuga, nam possimus. Dicta, ratione impedit beatae odio atque eum veniam rem modi minima velit illo quas id itaque nam quae, iste dignissimos ipsam aperiam quam voluptas obcaecati, hic maxime amet? Sunt, fuga ullam totam voluptas, maxime culpa vitae neque consequuntur itaque laudantium voluptatum sint nemo quo dolorem hic beatae omnis distinctio eius quisquam! Omnis, temporibus dolore iste obcaecati neque consequuntur delectus, dolorum sapiente corrupti quo explicabo enim nesciunt quis esse recusandae similique impedit cupiditate cum veniam adipisci facere cumque quibusdam architecto. Nulla quam non numquam blanditiis, cumque minima veniam aperiam facilis quo asperiores eveniet aliquid, voluptatibus ducimus libero expedita corporis explicabo beatae vero quae eos in. Quis et saepe velit architecto doloribus nobis deserunt aliquid totam magnam consequuntur adipisci quaerat hic, exercitationem asperiores, delectus ea.';
            $post -> category       = 1;
            $post -> user           = 1;
            $newImageName         = 'trex-03.png';
            $post -> photo_name   = $newImageName;
            $post -> photo_path   = "/img/".$newImageName;
            $post -> save();
            $post -> tag('test');
            echo "[+] Successfully installed site posts!\n";
        } else {
            echo "[!] Warning! requirements already satisfied!\n";
        }

        // return True;
    }
}
