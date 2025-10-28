<?php

declare(strict_types=1);

namespace App\Service;

final class YamlParser
{
    public function parse(string $path)
    {
        if (!file_exists($path)) {
            return '';
        }

        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if (!in_array($extension, ['yaml', 'yml'])) {
            return '';
        }

        return yaml_parse_file($path);
    }
}