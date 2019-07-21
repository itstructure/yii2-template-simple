<?php

use Itstructure\AdminModule\Module as AdminModule;
use Itstructure\RbacModule\Module as RbacModule;

$controllerId = Yii::$app->controller->id;

return [
    'menuItems' => [
        'settings' => [
            'title' => Yii::t('settings', 'Settings'),
            'icon' => 'fa fa-cog',
            'url' => '/admin/settings',
            'active' => $controllerId == 'settings' ? true : false
        ],
        'users' => [
            'title' => Yii::t('users', 'Users'),
            'icon' => 'fa fa-users',
            'url' => '/admin/users',
            'active' => $controllerId == 'users' ? true : false
        ],
        'rbac' => [
            'title' => RbacModule::t('rbac', 'RBAC'),
            'icon' => 'fa fa-universal-access',
            'url' => '#',
            'subItems' => [
                'roles' => [
                    'title' => RbacModule::t('roles', 'Roles'),
                    'icon' => 'fa fa-user-circle-o',
                    'url' => '/rbac/roles',
                    'active' => $controllerId == 'roles' ? true : false
                ],
                'permissions' => [
                    'title' => RbacModule::t('permissions', 'Permissions'),
                    'icon' => 'fa fa-user-secret',
                    'url' => '/rbac/permissions',
                    'active' => $controllerId == 'permissions' ? true : false
                ],
                'profiles' => [
                    'title' => RbacModule::t('profiles', 'Profiles'),
                    'icon' => 'fa fa-user-o',
                    'url' => '/rbac/profiles',
                    'active' => $controllerId == 'profiles' ? true : false
                ],
            ],
            'active' => in_array($controllerId, ['roles', 'permissions', 'profiles']) ? true : false
        ],
        'positions' => [
            'title' => Yii::t('positions', 'Positions'),
            'icon' => 'fa fa-user-circle-o',
            'url' => '/admin/positions',
            'active' => $controllerId == 'positions' ? true : false
        ],
        'pages' => [
            'title' => Yii::t('pages', 'Pages'),
            'icon' => 'fa fa-file',
            'url' => '/admin/pages',
            'active' => $controllerId == 'pages' ? true : false
        ],
        'products' => [
            'title' => Yii::t('products', 'Products'),
            'icon' => 'fa fa-product-hunt',
            'url' => '/admin/products',
            'active' => $controllerId == 'products' ? true : false
        ],
        'feedback' => [
            'title' => Yii::t('feedback', 'Feedback'),
            'icon' => 'fa fa-paper-plane',
            'url' => '/admin/feedback',
            'active' => $controllerId == 'feedback' ? true : false
        ],
        'about' => [
            'title' => Yii::t('about', 'About'),
            'icon' => 'fa fa-info-circle',
            'url' => '#',
            'subItems' => [
                'text' => [
                    'title' => Yii::t('about', 'Text'),
                    'icon' => 'fa fa-file-text',
                    'url' => '/admin/about',
                    'active' => $controllerId == 'about' ? true : false
                ],
                'technologies' => [
                    'title' => Yii::t('about', 'Technologies'),
                    'icon' => 'fa fa-cogs',
                    'url' => '/admin/technologies',
                    'active' => $controllerId == 'technologies' ? true : false
                ],
                'qualities' => [
                    'title' => Yii::t('about', 'Qualities'),
                    'icon' => 'fa fa-cogs',
                    'url' => '/admin/qualities',
                    'active' => $controllerId == 'qualities' ? true : false
                ],
            ],
            'active' => in_array($controllerId, ['about', 'technologies', 'qualities']) ? true : false
        ],
        'contacts' => [
            'title' => Yii::t('contacts', 'Contacts'),
            'icon' => 'fa fa-location-arrow',
            'url' => '#',
            'subItems' => [
                'text' => [
                    'title' => Yii::t('contacts', 'Text'),
                    'icon' => 'fa fa-file-text',
                    'url' => '/admin/contacts',
                    'active' => $controllerId == 'contacts' ? true : false
                ],
                'social' => [
                    'title' => Yii::t('contacts', 'Social'),
                    'icon' => 'fa fa-cogs',
                    'url' => '/admin/social',
                    'active' => $controllerId == 'social' ? true : false
                ],
            ],
            'active' => in_array($controllerId, ['contacts', 'social']) ? true : false
        ],
        'home' => [
            'title' => Yii::t('home', 'Home page'),
            'icon' => 'fa fa-home',
            'url' => '/admin/home',
            'active' => $controllerId == 'home' ? true : false
        ],
        'albums' => [
            'title' => 'Albums',
            'icon' => 'fa fa-book',
            'url' => '#',
            'subItems' => [
                'imageAlbums' => [
                    'title' => 'Image albums',
                    'icon' => 'fa fa-picture-o',
                    'url' => '/mfuploader/image-album',
                    'active' => $controllerId == 'image-album' ? true : false
                ],
                'audioAlbums' => [
                    'title' => 'Audio albums',
                    'icon' => 'fa fa-headphones',
                    'url' => '/mfuploader/audio-album',
                    'active' => $controllerId == 'audio-album' ? true : false
                ],
                'videoAlbums' => [
                    'title' => 'Video albums',
                    'icon' => 'fa fa-video-camera',
                    'url' => '/mfuploader/video-album',
                    'active' => $controllerId == 'video-album' ? true : false
                ],
                'appAlbums' => [
                    'title' => 'Application albums',
                    'icon' => 'fa fa-microchip',
                    'url' => '/mfuploader/application-album',
                    'active' => $controllerId == 'application-album' ? true : false
                ],
                'textAlbums' => [
                    'title' => 'Text albums',
                    'icon' => 'fa fa-file-text',
                    'url' => '/mfuploader/text-album',
                    'active' => $controllerId == 'text-album' ? true : false
                ],
                'otherAlbums' => [
                    'title' => 'Other albums',
                    'icon' => 'fa fa-file',
                    'url' => '/mfuploader/other-album',
                    'active' => $controllerId == 'other-album' ? true : false
                ],
            ],
            'active' => in_array($controllerId, ['image-album', 'audio-album', 'video-album', 'application-album', 'text-album', 'other-album']) ? true : false
        ],
        'sitemap' => [
            'title' => Yii::t('app', 'Sitemap'),
            'icon' => 'fa fa-sitemap',
            'url' => '/admin/sitemap',
            'active' => $controllerId == 'sitemap' ? true : false
        ],
    ],
];
