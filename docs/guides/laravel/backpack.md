# Backpack

## Create new Model

- Create **migration** (in case you're starting from scratch)
```bash
php artisan make:migration:schema create_tags_table --model=0 --schema="name:string:unique"
php artisan migrate
```

- Create a **Model** with **Request** and **Controller** for the admin panel
```bash
php artisan backpack:crud tag
```

- Add a **route** for this admin panel to `routes/backpack/custom.php`
```bash
php artisan backpack:add-custom-route "Route::crud('tag', 'TagCrudController');"
```

## Backpack errors

When you install **Backpack** with **Laravel elfinder***.

:::tip
Laravel elfinder is a file manager you can use in Backpack and it's heavy. If you want it, just answer `yes` to this question: `Install barryvdh/laravel-elfinder to provide an admin interface for File Management? (yes/no) [no]:` when you execute the below command.
:::

```bash
php artisan backpack:install
```

You can have this output error:

<code-info ext="sh-output"></code-info>

```bash
Symfony\Component\Process\Exception\ProcessTimedOutException  : The process "composer require barryvdh/laravel-elfinder" exceeded the timeout of 300 seconds.
```

It's just composer error because installation take too time (cause of **elfinder**), you can up max tim for composer installation to avoid this error.

```bash
composer config --global process-timeout 2000
```

### **Backpack & NGINX**

With **Nuxt** and **Laravel** on same url, **Nuxt** crush `public` directory of **Laravel**. If you want to load *CSS* and *JS* from public directory off **Laravel**, you can add it to `location` into first configuration (here, l.10), like this, here *CSS* is present and `public/css/app.css` can be loaded into back-office. Check **Network** in your dev tools if you can't find any error, *404 is the proof of problems with NGINX config*!

<code-info ext="nginx"></code-info>

```nginx{10}
server {
    listen 80;
    server_name secob-v2.useweb.net;

    location / {
        include proxy_params;
        proxy_pass http://localhost:3011;
    }

    location ~ ^/(admin|api|css|media|uploads|storage|docs|packages|cache) {
        include proxy_params;
        proxy_pass http://secob-v2.useweb.net:8000;
        proxy_buffer_size 128k;
        proxy_buffers 4 256k;
        proxy_busy_buffers_size 256k;
    }
}
server {
    listen 8000;
    listen [::]:8000;

    server_name secob-v2.useweb.net;

    access_log /var/log/nginx/secob.access.log;
    error_log /var/log/nginx/secob.error.log;

    root /home/ubuntu/www/secob-backend/public;
    index index.php;

    location / {
            try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ ^/docs/ {
            try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.3-fpm.sock;
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;
    }


    location ~ ^/cache/resolve {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~* \.(js|css|png|jpg|jpeg|gif|ico|eot|svg|ttf|woff|woff2)$ {
        expires max;
        log_not_found off;
    }
}
```

## Notes

### One To Many relationship

*An application have ONE editor, an editor can have MANY applications*

**Application.php**

```php

// ...

protected $with = ['editor'];

// relationships

public function editor()
{
    return $this->belongsTo(Editor::class, 'editor_id');
}
```

**Editor.php**

```php

// relationships

public function applications()
{
    return $this->hasMany(Application::class);
}
```

**application table migration**  
*It have to be after editors table migration*

```php
Schema::table('applications', function (Blueprint $table) {
    $table->integer('editor_id')->unsigned()->nullable()->after('status');
    $table->foreign('editor_id')->references('id')->on('editors');
});
```

**ApplicationCrudController.php**
*app\Http\Controllers\Admin\ApplicationCrudController.php*

```php
protected function setupListOperation()
{
    //...
    
    $this->crud->addColumn([
        // 1-n relationship
        'label'     => 'Éditeur', // Table column heading
        'type'      => 'select',
        'name'      => 'editor_id', // the column that contains the ID of that connected entity;
        'entity'    => 'editor', // the method that defines the relationship in your Model
        'attribute' => 'name', // foreign key attribute that is shown to user
        'model'     => "App\Models\Editor", // foreign key model
    ]);
}

protected function setupCreateOperation()
{
    $this->crud->addField([  // Select
        'label'     => 'Éditeur',
        'type'      => 'select',
        'name'      => 'editor_id', // the db column for the foreign key
        'entity'    => 'editor', // the method that defines the relationship in your Model
        'attribute' => 'name', // foreign key attribute that is shown to user
    ]);
}
```

<https://stackoverflow.com/questions/35449226/laravel-seeding-relationships?rq=1>
<https://github.com/laravel/framework/issues/2794>
<https://stackoverflow.com/questions/19542890/how-would-you-forget-cached-eloquent-models-in-laravel>
<https://laracasts.com/discuss/channels/testing/refresh-a-model?page=1>
<https://medium.com/@JinoAntony/10-hidden-laravel-eloquent-features-you-may-not-know-efc8ccc58d9e>
<https://stackoverflow.com/questions/23642950/how-to-reload-refresh-model-from-database-in-laravel>
<https://laracasts.com/discuss/channels/laravel/call-to-undefined-relationship-replies-on-model>
<https://fractal.thephpleague.com/transformers/>

```
GENERATE_ALWAYS=true
```

```bash
php artisan l5-swagger:generate
```

## Errors

### Deleted relationship which crash on create() with seeds or with Backpack CRUD

Check $with attribute on Model, it will call on create and crash CRUD.