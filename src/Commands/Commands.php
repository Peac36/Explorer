<?php

namespace Peac36\Explorer\Commands;

use App\Console\Kernel;
use Illuminate\Console\Command;

class Commands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'explore:commands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prints all registered commands.';

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
        $commands = $laravel->make(Kernel::class)->all();
        $base_path = $laravel->basePath();

        $rows = array_map(function($command, $comand_name) use($base_path) {
            $reflection = new \ReflectionClass($command);
            return [
                'name' => $comand_name,
                'command' => $reflection->getName(),
                'path' => str_replace($base_path, '', $reflection->getFileName()),
            ];
        }, $commands, array_keys($commands));

        $this->table([], $rows);
    }
}
