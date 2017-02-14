<?php namespace Macrobit\Drugreq\Utils;

use October\Rain\Support\Facades\File;
use October\Rain\Support\Facades\Yaml;

class YamlUtils
{
    public static function parseFile($filePath)
    {
        return Yaml::parse(File::get($filePath));
    }
}
