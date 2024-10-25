<?php

namespace Redaelfillali\StorageRouteFixer;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class RouteCheckServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Chemin du fichier storage.php dans le répertoire des routes
        $storageRoutePath = base_path('routes/storage.php');

        // Code de la route pour le fichier storage.php
        $routeContent = <<<'EOT'
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/storage/{any}', function ($any) {
    $path = storage_path('app/public/' . $any);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    return response($file, 200)->header("Content-Type", $type);
})->where('any', '.*');
EOT;

        // Créez le fichier storage.php s'il n'existe pas
        if (!File::exists($storageRoutePath)) {
            File::put($storageRoutePath, $routeContent);
        }

        // Charger le fichier storage.php avec web.php
        $this->loadRoutesFrom($storageRoutePath);
    }

    public function register()
    {
        //
    }
}
