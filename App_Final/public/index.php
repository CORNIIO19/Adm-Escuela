<?php
// Autoloader para clases con namespace
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dirs = [
        __DIR__ . '/../app/models/',
        __DIR__ . '/../app/config/'
    ];
    if (strpos($class, $prefix) === 0) {
        $relative_class = substr($class, strlen($prefix));
        $file_name = str_replace('\\', '/', $relative_class) . '.php';
        foreach ($base_dirs as $base_dir) {
            $file = $base_dir . $file_name;
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    }
});

require_once __DIR__ . '/../core/App.php';
$app = new App();
