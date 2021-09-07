<?php

namespace Pterobilling\LaraExtension\Generators\Commands;

use Pterobilling\LaraSourceGenerator\OneFileGeneratorCommand as BaseCommand;
use Pterobilling\Generators\FileGenerator;
use Pterobilling\LaraExtension\Generators\GeneratorCommandTrait;

class TestMakeCommand extends BaseCommand
{
  use GeneratorCommandTrait;

  /**
   * The console command singature.
   *
   * @var string
   */
  protected $signature = 'make:test
        {name : The name of the class}
        {--a|addon= : The name of the addon}
        {--u|unit : Create a unit test}
    ';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = '[+] Create a new test class';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'Test';

  /**
   * The constructor.
   */
  public function __construct()
  {
    parent::__construct();

    $this->setStubDirectory(__DIR__ . '/../stubs');
  }

  /**
   * Get the directory path for root namespace.
   *
   * @return string
   */
  protected function getRootDirectory()
  {
    return $this->addon ? $this->addon->path('tests') : $this->laravel->basePath() . '/tests';
  }

  /**
   * Get the default namespace for the class.
   *
   * @return $string
   */
  protected function getRootNamespace()
  {
    return $this->addon ? 'Tests\\' . studly_case($this->addon->name()) : 'Tests';
  }

  /**
   * Get the root namespace for the class.
   *
   * @return string
   */
  protected function getDefaultNamespace()
  {
    return $this->getRootNamespace() . ($this->option('unit') ? '\\Unit' : '\\Feature');
  }

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return $this->option('unit') ? 'test-unit.stub' : 'test-feature.stub';
  }

  /**
   * Generate file.
   *
   * @param \Jumilla\Generators\FileGenerator $generator
   * @param string $path
   * @param string $fqcn
   *
   * @return bool
   */
  protected function generateFile(FileGenerator $generator, $path, $fqcn)
  {
    list($namespace, $class) = $this->splitFullQualifyClassName($fqcn);

    return $generator->file($path)->template($this->getStub(), [
      'namespace' => $namespace,
      'root_namespace' => $this->getRootNamespace(),
      'class' => $class,
    ]);
  }
}
