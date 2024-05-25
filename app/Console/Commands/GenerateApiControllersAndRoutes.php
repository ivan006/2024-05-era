<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GenerateApiControllersAndRoutes extends Command
{
    protected $signature = 'generate:api-controllers-and-routes';
    protected $description = 'Generate API controllers and routes from database schema';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_$database"};
            $modelName = Str::studly(Str::singular($tableName));
            $controllerName = $modelName . 'Controller';
            $itemNameSingular = Str::title(Str::replace('_', ' ', Str::singular($tableName)));

            $controllerContent = $this->generateControllerContent($modelName, $controllerName, $itemNameSingular);
            $routeContent = $this->generateRouteContent($tableName, $controllerName);

            $controllerPath = app_path("Http/Controllers/Api/{$controllerName}.php");
            File::put($controllerPath, $controllerContent);

            $routePath = base_path("routes/api.php");
            File::append($routePath, $routeContent);

            $this->info("Generated API controller and route for $tableName");
        }
    }

    protected function generateControllerContent($modelName, $controllerName, $itemNameSingular)
    {
        return <<<EOT
<?php

namespace App\Http\Controllers\Api;

use QuicklistsOrmApi\OrmApi;
use App\Http\Controllers\Controller;
use App\Models\\$modelName;
use Illuminate\Http\Request;

class $controllerName extends Controller
{
    protected \$itemNameSingular = "$itemNameSingular";
    protected \$model;

    public function __construct()
    {
        \$this->model = new $modelName();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request \$request)
    {
        \$result = OrmApi::fetchAllWithFullQueryExposure(\$this->model, \$request);
        return response()->json(\$result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request \$request)
    {
        \$result = OrmApi::createItemWithOptionalBulkRelations(
            \$request,
            \$this->model,
            \$this->itemNameSingular
        );
        return response()->json(\$result['res'], \$result['code']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string \$id)
    {
        \$result = OrmApi::fetchByIdWithFullQueryExposure(\$this->model, \$id);
        return response()->json(\$result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request \$request, string \$id)
    {
        \$result = OrmApi::updateItem(
            \$request,
            \$this->model,
            \$id,
            \$this->itemNameSingular
        );
        return response()->json(\$result['res'], \$result['code']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string \$id)
    {
        \$result = OrmApi::deleteItem(
            \$this->model,
            \$id,
            \$this->itemNameSingular
        );
        return response()->json(\$result['res'], \$result['code']);
    }
}
EOT;
    }

    protected function generateRouteContent($tableName, $controllerName)
    {
        $routeName = Str::plural(Str::snake($tableName));
        return <<<EOT

// API routes for $tableName
Route::apiResource('$routeName', \\App\\Http\\Controllers\\Api\\$controllerName::class);
EOT;
    }
}
