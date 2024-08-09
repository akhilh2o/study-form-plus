<?php

return [
    'install'    =>    [

        // Enable / Disable `adash:install` command
        'command'    =>    env('APP_DEBUG', true),

        /*
        | Modules
        |---------------------
        | Modules are those segments which comes with `takshak/adash`.
        | All modules specified here will be installed after executing `adash:install` command
        |-------------------------------------
        | Available Modules: default, faqs, pages, testimonials
        */
        'modules'    =>    [
            'default',
            'faqs',
            'pages',
            'testimonials'
        ],

        /*
        | Packages
        |---------------------
        | These are third party packages other than `takshak/adash`.
        | There are several packages which can be used for improvements of project.
        |-------------------------------------
        | Some Packages: takshak/adash-blog, takshak/adash-slider, barryvdh/laravel-debugbar
        */
        'packages'    =>    [
            #'takshak/adash-blog',
            #'takshak/adash-slider',
            #'barryvdh/laravel-debugbar --dev'
        ],
    ],

    'site'    =>    [
        'name'    =>    'Adash',
        'short_name'    =>    'AD',

        'logo_full'     =>    '',
        'logo_short'     =>    '',
        'favicon'         =>    '',
    ],

    'primary_mail' => env('MAIL_PRIMARY', 'hello@example.com'),

    /*
    | Imager
    |---------------------
    | For configuration of package: `takshak/imager`.
    */
    'imager'    =>    [
        'picsum'    =>    [
            'enable_url'    =>    true,
        ],
        'placeholder'    =>    [
            'enable_url'    =>    true,
        ],
    ],

	/*
	| Blog
	|---------------------
	| For configuration of package: `takshak/adash-blog`.
	*/
	'blog'	=>	[
		'install'	=>	[
			// Enable / Disable `adash:blog:install` command
			'command'	=>	env('APP_DEBUG', true),
		],
		/**
         * Disable commenting on blog sections, after setting this true
         * comment form will not be shown on post show form
         */
        'comments'    =>    false,

        /**
         * Disable routes if not required, you may create your own routes
         * all routes will be disabled when `default` if `false` otherwise
         * you can disable front and admin routes separately
         */
        'routes'    =>  [
            'default'   =>  true,
            'sections'  =>  [
                'admin'     =>  true,
                'front'     =>  true
            ]
        ],
        'images' => [
            'categories'    =>  [
                'width'     =>  800,
                'height'    =>  500
            ],
            'posts'         =>  [
                'width'     =>  800,
                'height'    =>  500
            ]
        ]
	],
];
