<?php

namespace Pterobilling\LaraExtension\Generators;

use Pterobilling\LaraAddomnipot\Environment as AddonEnvironment;
use UnexpectedValueException;

trait GeneratorCommandTrait
{
  /**
   * addon.
   *
   * @var \Pterobilling\LaraExtension\Addons\Addon
   */
  protected $addon;

  /**
   * Execute the console command.
   *
   * @return bool
   */
  public function handle()
  {
    if (!$this->processArguments()) {
      return false;
    }

    $this->addon = $this->getAddon();

    return parent::handle();
  }

  /**
   * Process command line arguments
   *
   * @return bool
   */
  protected function processArguments()
  {
    return true;
  }

  /**
   * Option --addon specified.
   *
   * @return bool
   */
  protected function onAddon()
  {
    return $this->option('addon') !== null;
  }

  /**
   * Get addon.
   *
   * @return string
   */
  protected function getAddon()
  {
    if ($addon = $this->option('addon')) {
      $env = app(AddonEnvironment::class);

      if (!$env->exists($addon)) {
        throw new UnexpectedValueException("Addon '$addon' is not found.");
      }

      return $env->addon($addon);
    } else {
      return;
    }
  }

  /**
   * Get the application namespace.
   *
   * @return $string
   */
  protected function getAppNamespace()
  {
    return trim($this->laravel->getNamespace(), '\\');
  }

  /**
   * Get the addon namespace.
   *
   * @return $string
   */
  protected function getAddonNamespace()
  {
    return $this->addon->phpNamespace();
  }

  /**
   * Get the default namespace for the class.
   *
   * @return $string
   */
  protected function getRootNamespace()
  {
    return $this->addon ? $this->getAddonNamespace() : $this->getAppNamespace();
  }

  /**
   * Get the directory path for root namespace.
   *
   * @return string
   */
  protected function getRootDirectory()
  {
    if ($this->addon) {
      $directories = $this->addon->config('addon.directories');

      if (!$directories) {
        $directories = ['classes'];
      }

      return $this->addon->path($directories[0]);
    } else {
      return parent::getRootDirectory();
    }
  }
}
