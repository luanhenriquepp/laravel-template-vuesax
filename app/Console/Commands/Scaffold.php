<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class Scaffold extends Command
{

    protected $options = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:generate {--all= : Gera estrutura completa} {--controller= : Gera Controller} {--model= : Gera Model} {--repository= : Gera Repository}  {--dominio : Gera Dominio} {--v : Gerar views(Vue)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera Controller, Model, Repository, Service e etc.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $args = $this->options();
        $this->options = $args;
        if ($name = $args['all']) {
            return $this->generateAll($name);
        }
    }

    /**
     * Generate ALL
     * @param $name
     */
    public function generateAll($name)
    {
        $this->output->writeln('Generated all commands');
        $this->model($name);
        $this->controller($name);
        $this->service($name);
        $this->repository($name);
        $this->policy($name);
        $this->views($name);
        $this->routes($name);
        $this->postScript($name);
    }

    /**
     * Obtem o arquivo stub para o gerador.
     *
     * @return array
     */
    protected function getStub($type)
    {
        $templates = [
            'model' => app_path() . '/Console/Templates/ModelTemplate.stub',
            'controller' => app_path() . '/Console/Templates/ControllerTemplate.stub',
            'service' => app_path() . '/Console/Templates/ServiceTemplate.stub',
            'repository' => app_path() . '/Console/Templates/RepositoryTemplate.stub',
            'policy' => app_path() . '/Console/Templates/PolicyTemplate.stub',
            'migration_create' => app_path() . '/Console/Templates/MigrationCreateTemplate.stub',
            'migration_alter' => app_path() . '/Console/Templates/MigrationAlterTemplate.stub',
            'viewIndex' => app_path() . '/Console/Templates/VueIndex.stub',
            'viewCreate' => app_path() . '/Console/Templates/VueCreate.stub',
            'viewDetail' => app_path() . '/Console/Templates/VueDetail.stub',
            'viewForm' => app_path() . '/Console/Templates/VueForm.stub',
        ];

        return file_get_contents($templates[$type]);
    }

    /**
     * Generate Model
     * @param $name
     */
    public function model($name)
    {
        $this->output->writeln('Creating model...');
        $dominioModel = $this->options['dominio'] ? '\Dominio' : '';
        $dominio = $this->options['dominio'] ? 'Dominio/' : '';

        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{tableName}}',
                '{{dominio}}'
            ],
            [
                $name,
                snake_case($name),
                $dominioModel
            ],
            $this->getStub('model')
        );

        file_put_contents(app_path("/Models/{$dominio}{$name}.php"), $modelTemplate);
    }

    /**
     * Generate Controller
     * @param $name
     */
    public function controller($name)
    {
        $this->output->writeln('Creating controller...');
        $dominioController = $this->options['dominio'] ? '\Dominio' : '';
        $dominioControllerImport = $this->options['dominio'] ? "Dominio\\" : '';
        $dominio = $this->options['dominio'] ? 'Dominio/' : '';

        $controllerTemplate = str_replace(
            [
                '{{name}}',
                '{{dominio}}',
                '{{dominioControllerImport}}'
            ],
            [
                $name,
                $dominioController,
                $dominioControllerImport
            ],
            $this->getStub('controller')
        );

        file_put_contents(app_path("/Http/Controllers/Api/v1/{$dominio}{$name}Controller.php"), $controllerTemplate);
    }

    /**
     * Generate Service
     * @param $name
     */
    public function service($name)
    {
        $this->output->writeln('Creating service...');
        $dominioService = $this->options['dominio'] ? '\Dominio' : '';
        $dominio = $this->options['dominio'] ? 'Dominio/' : '';

        $serviceTemplate = str_replace(
            [
                '{{name}}',
                '{{dominio}}',
            ],
            [
                $name,
                $dominioService,
            ],
            $this->getStub('service')
        );

        file_put_contents(app_path("/Services/{$dominio}{$name}Service.php"), $serviceTemplate);
    }

    /**
     * Generate Repository
     * @param $name
     */
    public function repository($name)
    {
        $this->output->writeln('Creating repository...');
        $dominio = $this->options['dominio'] ? 'Dominio/' : '';

        $repositoryTemplate = str_replace(
            [
                '{{name}}',
                '{{dominio}}',
            ],
            [
                $name,
                $dominio
            ],
            $this->getStub('repository')
        );

        file_put_contents(app_path("/Repositories/{$name}Repository.php"), $repositoryTemplate);
    }

    /**
     * Generate Repository
     * @param $name
     */
    public function policy($name)
    {
        $this->output->writeln('Creating policy...');
        $policyTemplate = str_replace(
            [
                '{{name}}',
                '{{nameSmall}}',
            ],
            [
                $name,
                str_plural(strtolower($name)),
            ],
            $this->getStub('policy')
        );

        file_put_contents(app_path("/Policies/{$name}Policy.php"), $policyTemplate);
    }

    /**
     * @param $name
     */
    public function views($name)
    {
        $this->output->writeln('Creating view(VueJs)...');
        $vueIndexTemplate = str_replace(
            [
                '{{model}}',
            ],
            [
                str_plural(strtolower($name)),
            ],
            $this->getStub('viewIndex')
        );
        $vueFormTemplate = str_replace(
            [
                '{{model}}',
            ],
            [
                str_plural(strtolower($name)),
            ],
            $this->getStub('viewForm')
        );
        $vueCreateTemplate = str_replace(
            [
                '{{model}}',
                '{{modelUpper}}',
            ],
            [
                str_plural(strtolower($name)),
                str_plural($name),
            ],
            $this->getStub('viewCreate')
        );
        $vueDetailTemplate = str_replace(
            [
                '{{model}}',
                '{{modelUpper}}',
            ],
            [
                str_plural(strtolower($name)),
                str_plural($name),
            ],
            $this->getStub('viewDetail')
        );
        $pageName = str_plural($name);
        $dir = app_path("../resources/js/src/views/pages/{$pageName}");
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $fileName = str_plural($name);
        file_put_contents("{$dir}/{$fileName}.vue", $vueIndexTemplate);
        file_put_contents("{$dir}/{$fileName}Form.vue", $vueFormTemplate);
        file_put_contents("{$dir}/{$fileName}Create.vue", $vueCreateTemplate);
        file_put_contents("{$dir}/{$fileName}Detail.vue", $vueDetailTemplate);
    }

    /**
     * @param $name
     */
    public function routes($name)
    {
        $this->output->writeln('Creating routes...');
        $routes = file(app_path("../routes/api.php"));
        $routesIndex = preg_grep('/Route/i', array_map('trim', $routes));
        $addRoute = '        Route::resource(\'' . str_plural(strtolower($name)) . '\', \'' . $name . 'Controller\', [\'except\' => $excepts]);' . PHP_EOL;

        $routesStart = array_slice($routes, 0, array_key_last($routesIndex) + 1);
        $routesEnd = array_slice($routes, array_key_last($routesIndex) + 1, array_key_last($routes));
        array_push($routesStart, $addRoute);
        $newRoutes = array_merge($routesStart, $routesEnd);

        file_put_contents(app_path("../routes/api.php"), $newRoutes);
    }

    /**
     * @param $name
     */
    public function postScript($name)
    {
        $this->output->writeln('Calling Post script..');
        $pluralized = snake_case(Str::plural($name));
        $pluralizedCamel = snake_case(Str::plural($name));

        $migrationCreateTemplate = str_replace(
            [
                '{{nameClass}}',
                '{{nameTable}}',
            ],
            [
                Str::plural($name),
                $pluralizedCamel,
            ],
            $this->getStub('migration_create')
        );

        $migrationAlterTemplate = str_replace(
            [
                '{{nameClass}}',
                '{{nameTable}}',
            ],
            [
                Str::plural($name),
                $pluralizedCamel,
            ],
            $this->getStub('migration_alter')
        );

        $date = date('Y_m_d_His');
        file_put_contents(app_path("../database/migrations/0000_00_00_000000_create_{$pluralized}_table.php"), $migrationCreateTemplate);
        file_put_contents(app_path("../database/migrations/{$date}_add_keys_to_{$pluralized}_table.php"), $migrationAlterTemplate);

        $this->output->writeln('Finalized.');
    }
}
