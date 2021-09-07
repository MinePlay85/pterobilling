<?php

namespace Pterobilling\LaraExtension\Generators\Commands;

use Pterobilling\LaraSourceGenerator\OneFileGeneratorCommand as BaseCommand;
use Pterobilling\Generators\FileGenerator;
use Pterobilling\LaraExtension\Generators\GeneratorCommandTrait;

class MailMakeCommand extends BaseCommand
{
  use GeneratorCommandTrait;

  /**
   * The console command singature.
   *
   * @var string
   */
  protected $signature = 'make:mail
        {name : The name of the class}
        {--a|addon= : The name of the addon}
        {--m|markdown : Create a new Markdown template for the mailable}
    ';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = '[+] Create a new email class';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'Mail';

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
    return $this->getRootNamespace() . '\\Mail';
  }

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return $this->option('markdown') ? 'mail-markdown.stub' : 'mail-view.stub';
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
      'class' => $class,
    ]);
  }
}
