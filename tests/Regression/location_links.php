<?php

$root = dirname(__DIR__, 2);
$mapUrl = 'https://maps.app.goo.gl/7RwZBqbxb8ahMeop7';
$secureAttributes = sprintf(
    'href="%s" target="_blank" rel="noopener noreferrer"',
    $mapUrl,
);

$expectations = [
    $root.'/resources/views/components/navbar.blade.php' => 2,
    $root.'/resources/views/welcome.blade.php' => 2,
];

foreach ($expectations as $file => $expectedCount) {
    $contents = file_get_contents($file);
    $actualCount = substr_count($contents, $secureAttributes);

    if ($actualCount !== $expectedCount) {
        fwrite(STDERR, sprintf(
            "FAIL: %s expected %d secure location links, found %d.\n",
            $file,
            $expectedCount,
            $actualCount,
        ));
        exit(1);
    }
}

echo "PASS: every primary location action uses the configured map safely.\n";
