<?php

$root = dirname(__DIR__, 2);

require $root.'/vendor/autoload.php';

$app = require $root.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$html = view('welcome', [
    'featuredProducts' => collect(),
])->render();

$document = new DOMDocument();
@$document->loadHTML($html);
$xpath = new DOMXPath($document);
$errors = [];

$destinations = [
    'Beranda' => '/',
    'Tentang Kami' => '/tentang-kami',
    'Katalog' => '/katalog',
    'Gubug Kuliner' => '/#gubug',
    'Lokasi' => 'https://maps.app.goo.gl/7RwZBqbxb8ahMeop7',
];

foreach ($destinations as $label => $expectedDestination) {
    $links = $xpath->query(sprintf(
        '//a[normalize-space(string(.)) = "%s"]',
        $label,
    ));

    if ($links === false || $links->length !== 2) {
        $errors[] = sprintf(
            '%s expected 2 header links, found %d.',
            $label,
            $links === false ? 0 : $links->length,
        );
        continue;
    }

    foreach ($links as $link) {
        $href = $link->getAttribute('href');

        if ($label === 'Lokasi') {
            $actualDestination = $href;

            if ($link->getAttribute('target') !== '_blank') {
                $errors[] = 'Lokasi must open in a new tab.';
            }

            if ($link->getAttribute('rel') !== 'noopener noreferrer') {
                $errors[] = 'Lokasi must use safe external-link attributes.';
            }
        } else {
            $parts = parse_url($href);
            $actualDestination = $parts['path'] ?? '/';

            if (isset($parts['fragment'])) {
                $actualDestination .= '#'.$parts['fragment'];
            }
        }

        if ($actualDestination !== $expectedDestination) {
            $errors[] = sprintf(
                '%s expected destination %s, found %s.',
                $label,
                $expectedDestination,
                $actualDestination,
            );
        }
    }
}

$navbar = file_get_contents($root.'/resources/views/components/navbar.blade.php');
$welcome = file_get_contents($root.'/resources/views/welcome.blade.php');

$requiredNavbarPatterns = [
    'x-data="{ mobileMenu: false }"' => 'Navbar must own its mobile menu state.',
    "route('katalog')" => 'Mobile catalog navigation must use the catalog route.',
    "\$dispatch('open-cart')" => 'Cart button must dispatch an event without depending on page-local state.',
    'typeof getWaMessage' => 'WhatsApp action must provide a safe fallback outside the home page.',
    'typeof getTotalCount' => 'Cart badge must tolerate pages without cart state.',
];

foreach ($requiredNavbarPatterns as $pattern => $message) {
    if (! str_contains($navbar, $pattern)) {
        $errors[] = $message;
    }
}

if (str_contains($welcome, '<!-- Dropdown Menu Mobile -->')) {
    $errors[] = 'Home page must not duplicate the navbar mobile menu.';
}

if (! str_contains($welcome, '@open-cart.window="cartOpen = true"')) {
    $errors[] = 'Home page must handle the navbar cart event.';
}

if (! str_contains($welcome, '<section id="katalog"')) {
    $errors[] = 'Home catalog section must expose the anchor used by its call-to-action buttons.';
}

if ($errors !== []) {
    fwrite(STDERR, "FAIL:\n- ".implode("\n- ", array_unique($errors))."\n");
    exit(1);
}

echo "PASS: header navigation is consistent and safe on every page.\n";
