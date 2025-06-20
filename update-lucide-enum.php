<?php

// This script reads all SVGs from the local vendor directory and generates the enum file.

$svgDir = __DIR__ . '/vendor/mallardduck/blade-lucide-icons/resources/svg';
$enumFile = __DIR__ . '/src/Enums/LucideIcon.php';

if (! is_dir($svgDir)) {
    exit("SVG directory not found: $svgDir\n");
}

$enumCases = [];
$files = scandir($svgDir);

foreach ($files as $file) {
    if (preg_match('/^(.*)\.svg$/', $file, $matches)) {
        $iconName = $matches[1];
        // Convert kebab-case to PascalCase for enum key
        $enumKey = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $iconName)));
        // If the key starts with a number, prefix with an underscore
        if (preg_match('/^\d/', $enumKey)) {
            $enumKey = '_' . $enumKey;
        }
        $enumCases[] = "    case $enumKey = '$iconName';";
    }
}

sort($enumCases);

$enumContent = '<?php

namespace CodeWithDennis\\FilamentLucideIcons\\Enums;

use Filament\\Support\\Contracts\\ScalableIcon;
use Filament\\Support\\Enums\\IconSize;

enum LucideIcon: string implements ScalableIcon
{
' . implode("\n", $enumCases) . '

    public function getIconForSize(IconSize $size): string
    {
        return "lucide-" . $this->value;
    }
}
';

file_put_contents($enumFile, $enumContent);

echo 'LucideIcon enum generated with ' . count($enumCases) . " icons from local vendor directory.\n";
