<?php

namespace Pterobilling\LaraExtension\Database\Commands;

use Pterobilling\LaraVersionia\Commands\SeederMakeCommand as BaseCommand;
use Pterobilling\LaraExtension\Addons\Addon;
use Pterobilling\LaraExtension\Generators\GeneratorCommandTrait;

class SeederMakeCommand extends BaseCommand
{
  use GeneratorCommandTrait;

  /**
   * The console command singature.
   *
   * @var stringphp
   */
  protected $signature = 'make:seeder
        {name : The name of the class}
        {--a|addon= : The name of the addon}
    ';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = '[+] Create a new seeder class';

  /**
   * The constructor.
   */
  public function __construct()
  {
    parent::__construct();

    $this->setStubDirectory(__DIR__ . '/../stubs');
  }

  /**
   * Get the default namespace for the class.
   *
   * @return string
   */
  protected function getDefaultNamespace()
  {
    return $this->getRootNamespace() . '\\' . ($this->onAddon() ? 'Seeds' : 'Database\\Seeds');
  }
}
