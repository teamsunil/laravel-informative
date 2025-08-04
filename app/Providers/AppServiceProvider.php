<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::runningInConsole() || !Schema::hasTable('settings')) {
            return;
        }

        $settings = Setting::pluck('value', 'key')->toArray();

        if (!empty($settings['enable_darkmode'])) {
            session(['adminlte_dark_mode' => true]);
        } else {
            session()->forget('adminlte_dark_mode');
        }

        config([
            'adminlte.logo' => $settings['site_name'] ?? '<b>Admin</b>LTE',
            'adminlte.logo_img' => !empty($settings['favicon']) ? 'storage/' . $settings['favicon'] : 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'adminlte.layout_dark_mode' => !empty($settings['enable_darkmode']) && $settings['enable_darkmode'] == 1

        ]);

        // Load Header & Footer Menus globally
        if (Schema::hasTable('menus')) {
            View::composer('*', function ($view) {
                $headerMenus = Menu::where('position', 'header')->where('status', 1)->orderBy('order')->get();
                $footerCompanyMenus = Menu::where('position', 'footer-company')->where('status', 1)->orderBy('order')->get();
                $footerQuickMenus = Menu::where('position', 'footer-quick')->where('status', 1)->orderBy('order')->get();

                $view->with(compact('headerMenus', 'footerCompanyMenus', 'footerQuickMenus'));
            });
        }

    }
}
