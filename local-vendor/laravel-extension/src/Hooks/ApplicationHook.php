<?php

namespace Pterobilling\LaraExtension\Hooks;

use Illuminate\Contracts\Foundation\Application as ApplicationInterface;
use Illuminate\Foundation\Application as LaravelApplication;

/**
 * @author Fumio Furukawa <fumio@jumilla.me>
 */
class ApplicationHook extends LaravelApplication implements ApplicationInterface
{
  /**
   *	@var \Illuminate\Contracts\Foundation\Application
   */
  private $app;

  public function __construct(ApplicationInterface $app)
  {
    $this->app = $app;
  }

  /**
   * An array of the types that have been resolved.
   *
   * @return array
   */
  public function getResolved()
  {
    return $this->app->resolved;
  }

  /**
   * The container's bindings.
   *
   * @return array
   */
  public function getBindings()
  {
    return $this->app->bindings;
  }

  /**
   * The container's shared instances.
   *
   * @return array
   */
  public function getInstances()
  {
    return $this->app->instances;
  }

  /**
   * The registered type aliases.
   *
   * @return array
   */
  public function getAliases()
  {
    return $this->app->aliases;
  }

  /**
   * All of the registered tags.
   *
   * @return array
   */
  public function getTags()
  {
    return $this->app->tags;
  }
}
