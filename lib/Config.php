<?php
namespace lib;

class Config
{
    private $env;

    public function __construct()
    {
        echo "jerte";
        // Load environment variables from .env file
        $this->env = parse_ini_file('.env');
    }

    public function getDatabaseConfig()
    {
        return [
            'host' => $this->env['DB_HOST'],
            'user' => $this->env['DB_USER'],
            'pass' => $this->env['DB_PASS'],
            'name' => $this->env['DB_NAME'],
        ];
    }
}

// Example usage


// Use these values in your database connection or other configurations
