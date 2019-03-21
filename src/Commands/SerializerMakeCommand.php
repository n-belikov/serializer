<?php

namespace NiBurkin\Serializer\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SerializerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = "make:serializer";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command description";

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option("object")) {
            $stub = "/stubs/object-serializer.stub";
        } else {
            $stub = "/stubs/serializer.stub";
        }
        return __DIR__ . $stub;
    }

    protected function buildClass($name)
    {
        $replace = [];

        if ($this->option("name")) {
            $replace["DummyName"] = $this->option("name");
        }
        if ($this->option("object")) {
            $option = str_replace("/", "\\", $this->option("object"));
            $explode = explode("\\", $option);
            if (count($explode)) {
                $replace["DummyFullObject"] = $option;
                $replace["DummyObject"] = $explode[count($explode) - 1];
            }
        }

        return str_replace(array_keys($replace), array_values($replace), parent::buildClass($name));
    }

    protected function getOptions()
    {
        return [
            ["name", null, InputOption::VALUE_OPTIONAL, "The name of serializer", "default"],
            ["object", "o", InputOption::VALUE_OPTIONAL, "The object serializer"],
        ];
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Serializers";
    }
}