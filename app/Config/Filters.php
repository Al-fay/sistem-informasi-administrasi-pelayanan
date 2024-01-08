<?php

namespace Config;

use App\Filters\AuthFilter_Lurah;
use App\Filters\AuthFilter_Pemohon;
use App\Filters\AuthFilter_Petugas;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, string>
     * @phpstan-var array<string, class-string>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authfilter_petugas' => AuthFilter_Petugas::class,
        'authfilter_pemohon' => AuthFilter_Petugas::class,
        'authfilter_lurah' => AuthFilter_Lurah::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            'authfilter_petugas' => [
                'except' => [
                    'pages', 'pages/*',
                    'auth', 'auth/*',
                    'admin', 'admin/*',
                ],
            ],
            'authfilter_pemohon' => [
                'except' => [
                    'pages', 'pages/*',
                    'auth', 'auth/*',
                    'admin', 'admin/*'
                ],
            ],
            'authfilter_lurah' => [
                'except' => [
                    'pages', 'pages/*',
                    'auth', 'auth/*',
                    'admin', 'admin/*',
                ],
            ],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        // 'after' => [
        //     'authfilter_petugas' => [
        //         'except' => [
        //             'kelahiran', 'kelahiran/*',
        //             'kematian', 'kematian/*',
        //             'keterangan', 'keterangan/*',
        //             'petugas', 'petugas/*',
        //             'pindah', 'pindah/*',
        //             'suratpengantar', 'suratpengantar/*',
        //         ],
        //     ],
        //     'authfilter_pemohon' => [
        //         'except' => [
        //             'kelahiran', 'kelahiran/*',
        //             'kematian', 'kematian/*',
        //             'keterangan', 'keterangan/*',
        //             'pemohon', 'pemohon/*',
        //             'pindah', 'pindah/*',
        //             'suratpengantar', 'suratpengantar/*',
        //         ],
        //     ],
        //     'authfilter_lurah' => [
        //         'except' => [
        //             'laporan', 'laporan/*',
        //         ],
        //     ],
        //     'toolbar',
        //     // 'honeypot',
        //     // 'secureheaders',
        // ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        // 'login' => ['admin/*', 'datang/*', 'kelahiran/*', 'kematian/*', 'keterangan/*', 'laporan/*', 'pemohon/*', 'petugas/*', 'pindah/*', 'suratpengantar/*']
    ];
}
