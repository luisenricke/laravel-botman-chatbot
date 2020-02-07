## About

This is a test project that integrates Laravel with Botman.

## Setup

- Create a laravel project

```
laravel new <project_name> # OR
composer create-project --prefer-dist laravel/laravel <project_name>
```

- Download Botman dependency and drivers

```
composer require botman/botman
composer require botman/driver-web
```

- Create and copy files in config/botman/

```
// config/botman/config.php

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Conversation Cache Time
    |--------------------------------------------------------------------------
    |
    | BotMan caches each started conversation. This value defines the
    | number of minutes that a conversation will remain stored in
    | the cache.
    |
    */
    'conversation_cache_time' => 40,

    /*
    |--------------------------------------------------------------------------
    | User Cache Time
    |--------------------------------------------------------------------------
    |
    | BotMan caches user information of the incoming messages.
    | This value defines the number of minutes that this
    | data will remain stored in the cache.
    |
    */
    'user_cache_time' => 30,
];
```

```
// config/botman/web.php

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Web verification
    |--------------------------------------------------------------------------
    |
    | This array will be used to match incoming HTTP requests against your
    | web endpoint, to see if the request should match the web driver.
    |
    */
    'matchingData' => [
        'driver' => 'web',
    ],
];
```

- Create the route that will consume the chat

```
//routes/web.php
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
```

- Create the controller that will handle the messages

```
php artisan make:controller BotManController
```

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
			// ...
        });

        $botman->listen();
    }
}
```

- Put the css and js in the views where you are going to have the chat

```
@section('botman')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

<script>
    var botmanWidget = {
       aboutText: 'Powered by Luis Villalobos',
       aboutLink: 'https://github.com/luisenricke',
       introMessage: "Hi, this is a test in Botman"
   };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

@endsection
```