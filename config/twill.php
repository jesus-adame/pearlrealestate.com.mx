<?php

return [
    'namespace' => 'App',

    // Tables
    'enabled' => [
        'users-management' => true,
        'media-library' => true,
        'file-library' => true,
        'block-editor' => true,
        'buckets' => true,
        'users-image' => false,
        'settings' => true,
        'dashboard' => true,
        'search' => true,
        'users-description' => false,
        'activitylog' => true,
        'users-2fa' => false,
        'users-oauth' => false,
    ],

    // Tables
    'users_table' => 'twill_users',
    'password_resets_table' => 'twill_password_resets',
    'blocks_table' => 'blocks',
    'features_table' => 'features',
    'settings_table' => 'settings',
    'medias_table' => 'medias',
    'mediables_table' => 'mediables',
    'files_table' => 'files',
    'fileables_table' => 'fileables',
    'related_table' => 'related',
    'tags_table' => 'tags',
    'tagged_table' => 'tagged',

    // locales
    'locale' => 'fr',
    'fallback_locale' => 'en',

    // Dates
    'publish_date_24h' => false, // enable 24h format in publisher dates
    'publish_date_format' => 'd F Y H:i', // format used by publication date pickers
    'publish_date_display_format' => 'DD MMMM YYYY HH:mm', // format used when displaying the publication date

    // Subdomains
    'support_subdomain_admin_routing' => false,
    'admin_app_subdomain' => 'admin',
    'active_subdomain' => null,

    // Media library
    'media_library' => [
        'disk' => 'twill_media_library',
        'endpoint_type' => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 's3'),
        'cascade_delete' => env('MEDIA_LIBRARY_CASCADE_DELETE', false),
        'local_path' => env('MEDIA_LIBRARY_LOCAL_PATH', 'uploads'),
        'image_service' => env('MEDIA_LIBRARY_IMAGE_SERVICE', 'A17\Twill\Services\MediaLibrary\Imgix'),
        'acl' => env('MEDIA_LIBRARY_ACL', 'private'),
        'filesize_limit' => env('MEDIA_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => ['svg', 'jpg', 'gif', 'png', 'jpeg'],
        'init_alt_text_from_filename' => true,
        'prefix_uuid_with_local_path' => config('twill.file_library.prefix_uuid_with_local_path', false),
        'translated_form_fields' => false,
    ],

    // IMGIX
    'imgix' => [
        'default_params' => [
            'fm' => 'jpg',
            'q' => '80',
            'auto' => 'compress,format',
            'fit' => 'min',
        ],
        'lqip_default_params' => [
            'fm' => 'gif',
            'auto' => 'compress',
            'blur' => 100,
            'dpr' => 1,
        ],
        'social_default_params' => [
            'fm' => 'jpg',
            'w' => 900,
            'h' => 470,
            'fit' => 'crop',
            'crop' => 'entropy',
        ],
        'cms_default_params' => [
            'q' => 60,
            'dpr' => 1,
        ],
        'source_host' => env('IMGIX_SOURCE_HOST'),
        'use_https' => env('IMGIX_USE_HTTPS', true),
        'use_signed_urls' => env('IMGIX_USE_SIGNED_URLS', false),
        'sign_key' => env('IMGIX_SIGN_KEY'),
    ],

    // File library
    'file_library' => [
        'disk' => 'twill_file_library',
        'endpoint_type' => env('FILE_LIBRARY_ENDPOINT_TYPE', 's3'),
        'cascade_delete' => env('FILE_LIBRARY_CASCADE_DELETE', false),
        'local_path' => env('FILE_LIBRARY_LOCAL_PATH', 'uploads'),
        'file_service' => env('FILE_LIBRARY_FILE_SERVICE', 'A17\Twill\Services\FileLibrary\Disk'),
        'acl' => env('FILE_LIBRARY_ACL', 'public-read'),
        'filesize_limit' => env('FILE_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => [],
        'prefix_uuid_with_local_path' => false,
    ],
];
