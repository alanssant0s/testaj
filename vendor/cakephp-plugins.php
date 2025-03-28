<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'AuditLog' => $baseDir . '/vendor/hevertonfreitas/cakephp-audit-log/',
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'SoftDelete' => $baseDir . '/vendor/salines/cakephp4-soft-delete/',
    ],
];
