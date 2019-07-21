Yii2 template multilanguage install ducumentation
==============

[![Build Status](https://scrutinizer-ci.com/g/itstructure/yii2-template-multilanguage/badges/build.png?b=master)](https://scrutinizer-ci.com/g/itstructure/yii2-template-multilanguage/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/itstructure/yii2-template-multilanguage/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/itstructure/yii2-template-multilanguage/?branch=master)

1 Introduction
----------------------------

Yii2 project template with multilanguage mode, based on [Yii2 basic framework](https://github.com/yiisoft/yii2-app-basic).
Project is available to install at [Git Hub repository](https://github.com/itstructure/yii2-template-multilanguage).

This template includes:
- Admin panel, based on [AdminLTE](https://github.com/almasaeed2010/AdminLTE)
- Ability to content manage with some number of languages.
- Number of entities, which are managed by admin panel:
    - Languages
    - Site settings (Initial role and status after registration, e.t.c.)
    - Users
    - RBAC (Set roles and permissions for users)
    - Positions
    - Pages
        - Products (child products for pages)
    - Feedback
    - About (about company page)
        - Technologies (child)
        - Qualities (child)
    - Contacts
        - Social (child)
    - Home page
    - Site map
    
This template helps you to easy start your Yii2 project. And then you can change it as you like.

2 Dependencies
----------------------------

- php >= 7.1
- composer
- MySql >= 5.5

3 Installation
----------------------------

1. Clone project.
    ```
    SSH SOURCE:
    git@github.com:itstructure/yii2-template-multilanguage.git
    ```
    ```
    HTTPS SOURCE:
    https://github.com/itstructure/yii2-template-multilanguage.git
    ```
2. Install dependencies by running from the project root ```composer install``` 
 
3. Create new data base.

4. Copy file ```db_example.php``` to ```db.php```. In file ```db.php``` set the settings according to the settings for accessing the MySql server. Enter the name of the created data base.

    Example:
    ```php
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yourdbname',
        'username' => 'root',
        'password' => 'passwordvalue',
        'charset' => 'utf8',
    ];
    ```

5. Run the RBAC migration: 
    ```
    yii migrate --migrationPath=@yii/rbac/migrations
    ```
6. Run the command to build initial rbac entities: 
    ```
    yii build-rbac
    ```
    
    Roles and permissions will be created with the following structure:
    ```php
    |--------------------|-----------------------------|
    |                    |            Roles            |
    |                    |-----------------------------|
    | Permissions        |  admin  | manager |  user   |
    |--------------------|---------|---------|---------|
    | CREATE             |    X    |         |         |
    | UPDATE             |    X    |         |         |
    | DELETE             |    X    |         |         |
    | SET_ROLES          |    X    |         |         |
    | VIEW_BACKSIDE      |    X    |    X    |         |
    | VIEW_FRONTSIDE     |    X    |    X    |    X    |
    |--------------------|---------|---------|---------|
    ```
    
7. Run MFU module migration:
    ```
    yii migrate --migrationPath=@mfuploader/migrations
    ```
8. Run the application migration:
    ```
    yii migrate
    ```
    
9. If you are going to use google captcha, it is necessary to set captcha params in new captcha.php config file:
    ```php
    return [
        'site_key' => '...',
        'secret_key' => '...',
    ];
    ```
    
10. If you are going to load some files to Amazon remote storage by [MFUploader module](https://github.com/itstructure/yii2-multi-format-uploader), it is necessary to set AWS access params in new aws-credentials.php config file:
    ```php
    return [
        'aws_access_key_id' => '...',
        'aws_secret_access_key' => '...',
    ];
    ```