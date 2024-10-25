<?php

namespace Redaelfillali\StorageRouteFixer;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteCheckServiceProvider extends ServiceProvider
{
    /**
     * Enregistrer le fournisseur de services.
     *
     * @return void
     */
    public function register()
    {
        // Enregistrement d'autres services ou configurations, si nécessaire.
    }

    /**
     * Démarrer les services, y compris le chargement des routes.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesInOrder();
    }

    /**
     * Charger le fichier storage.php avant web.php pour établir la priorité des routes.
     *
     * @return void
     */
    protected function loadRoutesInOrder()
    {
        // Charger storage.php depuis le package avant web.php
        Route::middleware('web')
            ->group(__DIR__ . '/routes/storage.php');

        // Charger ensuite web.php
        $this->loadRoutesFrom(base_path('routes/web.php'));
    }
}
