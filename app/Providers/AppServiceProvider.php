<?php

namespace App\Providers;

use App\Models\Navigation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        $ignoredTables = ['logs','log_types','failed_jobs', 'menu_item_meal_times', 'migrations', 'password_access_tokens', 'password_reset_tokens', 'personal_access_tokens']; // Define the names of the tables to ignore

        $tables = DB::select('SHOW TABLES');
        $tableNames = [];
        foreach ($tables as $table) {
            $tableName = reset($table);
            if (!in_array($tableName, $ignoredTables)) {
                $tableNames[] = $tableName;
            }
        }
        Paginator::useBootstrapFive();
        $navigations = Navigation::all();
        View::share(["navigations" => $navigations, "tables" => $tableNames]);
    }
}
