<?php

namespace Peac36\Explorer\Commands;

use Illuminate\Console\Command;

class Bindings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'explore:bindings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prints all bindings in the container.';

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
        $laravel = $this->getLaravel();
        $base_path = $laravel->basePath();
        $headers = ['Binding Name', 'Class', 'File Path'];

        $rows = array_map(function($binding, $key) use($base_path) {

            $binding = new \ReflectionFunction($binding['concrete']);

            return [
                'key' => $key,
                'name' => $binding->getClosureScopeClass()->name,
                'path' => str_replace($base_path, '', $binding->getFileName()),
            ];
        }, $laravel->getBindings(), array_keys($laravel->getBindings()));

        $this->table($headers, $rows);
    }
}
