<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class installerController extends Controller
{
    public function installation() {
        return view('backend.installation.installation');
    }
    
    public function db_connection() {
        return view('backend.installation.db_connection');
    }
    
    public function db_connection_submit(Request $request) {
        if (App::environment('local')) {
            // return dd(config('app'));
            try {
                \DB::connection()->getPDO();
                dd('Database connected: ' . \DB::connection()->getDatabaseName());
            }
             
            catch (\Exception $e) {
                dd('Database connected: ' . 'None');
            }
        }

        `APP_NAME=TRex
        APP_ENV=${app_env}
        APP_KEY=${app_key}
        APP_DEBUG=${app_debug}
        APP_URL=${app_url}
        
        LOG_CHANNEL=stack
        LOG_DEPRECATIONS_CHANNEL=null
        LOG_LEVEL=debug
        
        DB_CONNECTION=mysql
        DB_HOST=${db_host}
        DB_PORT=${db_port}
        DB_DATABASE=${db_name}
        DB_USERNAME=${db_username}
        DB_PASSWORD=${db_password}
        
        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        FILESYSTEM_DISK=local
        QUEUE_CONNECTION=sync
        SESSION_DRIVER=file
        SESSION_LIFETIME=120
        
        MEMCACHED_HOST=127.0.0.1
        
        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379
        
        MAIL_MAILER=smtp
        MAIL_HOST=mailhog
        MAIL_PORT=1025
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS="hello@example.com"
        MAIL_FROM_NAME="${APP_NAME}"
        
        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=
        AWS_USE_PATH_STYLE_ENDPOINT=false
        
        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_APP_CLUSTER=mt1
        
        MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
        MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"        
        `;

        return view('backend.installation.db_connection');
    }

}
