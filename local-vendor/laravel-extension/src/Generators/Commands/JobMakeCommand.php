<?php

namespace Pterobilling\LaraExtension\Generators\Commands;

use Pterobilling\LaraSourceGenerator\OneFileGeneratorCommand as BaseCommand;
use Pterobilling\Generators\FileGenerator;
use Pterobilling\LaraExtension\Generators\GeneratorCommandTrait;

class JobMakeCommand extends BaseCommand
{
  use GeneratorCommandTrait;

  /**
   * The console command singature.
   *
   * @var string
   */
  protected $signature = 'make:job
        {name : The name of the class}
        {--a|addon= : The name of the addon}
        {--s|sync : Indicates that job should be synchronous}
    ';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = '[+] Create a new job class';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'Job';

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
    return $this->getRootNamespace() . '\\Jobs';
  }

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return $this->option('sync') ? 'job-sync.stub' : 'job-queued.stub';
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
      'root_namespace' => $this->getAppNamespace(),     // use App\Jobs\Job
      'class' => $class,
    ]);
  }
}
