Site de l'Association pour la Vie Etudiante à Descartes
========================


This document contains information on how to download, install, and start
using Symfony. For a more detailed explanation, see the [Installation][1]
chapter of the Symfony Documentation.

1) Installing Symfony's dependencies
----------------------------------

When it comes to install all the dependencies, you have to use Composer.

### Use Composer

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to re-create a project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command inside your github's project folder:

    curl -s http://getcomposer.org/installer | php

Then, use the `install` command to install all the necessary dependencies:

    php composer.phar install

Composer will install all Symfony's dependencies in the project folder.


2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path-to-project/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Getting started with Symfony
-------------------------------

Congratulations! You're now ready to use Symfony.

A great way to start learning Symfony is via the [Quick Tour][3], which will
take you through all the basic features of Symfony2.

Once you're feeling good, you can move onto reading the official
[Symfony2 book][4].

You can launch your application in development environment :

    http://localhost/path-to-project/web/app_dev.php

You can also launch your application in production environment :

    http://localhost/path-to-project/web/app.php

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/2.8/book/installation.html
[2]:  http://getcomposer.org
[3]:  http://symfony.com/doc/current/quick_tour/the_big_picture.html
[4]:  http://symfony.com/doc/2.8/index.html

