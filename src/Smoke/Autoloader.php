<?php
namespace Smoke;


class Autoloader
{

    protected static $instance = null;

    protected $namespaces = [];

    public static function register($preppend = false)
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
            self::$instance->addNamespace(__NAMESPACE__, __DIR__);
            $callback = [self::$instance, 'autoload'];
            spl_autoload_register($callback, true, $preppend);
        }

        return self::$instance;
    }

    public function addNamespace($namespace, $directory)
    {
        $this->namespaces[$namespace] = $directory;
    }

    public function autoload($class)
    {
        $slash = strpos($class, '\\');
        if ($slash === false)
        {
            return;
        }

        $prefix = substr($class, 0, $slash + 1);

        foreach ($this->namespaces as $namespace => $directory)
        {
            if ($prefix !== $namespace . '\\')
            {
                continue;
            }

            $file = str_replace($namespace . '\\', '', $class);
            $path = $directory . DIRECTORY_SEPARATOR . $file . '.php';

            if (file_exists($path))
            {
                return require($path);
            }
        }
    }

}
