<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app["form"]->component('bsHidden', 'inputs.hidden', ['name', 'id', 'value', 'attributes' => []]);
        $this->app["form"]->component('bsSelect', 'inputs.select', ['name', 'id', 'label_name', 'list' => [], 'value', 'parent_class', 'class', 'label_class', "attributes"]);
        $this->app["form"]->component('bsRadio', 'inputs.radio', ['name', 'id', 'items', 'value', 'parent_class', 'label_name', 'label_class', "attributes"]);
        $this->app["form"]->component('bsFiles', 'inputs.files', ['name', 'id', 'label_name', 'attributes']);
        $this->app["form"]->component('bsFile', 'inputs.filebutton', ['name', 'id', 'label_name', 'attributes']);
        $this->app["form"]->component('customInput', 'inputs.custom',
            [
                'type',
                'name',
                'id',
                'value' => null,
                'parent_class' => null,
                'class' => null,
                'label_name' => null,
                'label_class' => null,
                'attributes' => []
            ]);
    }
}
