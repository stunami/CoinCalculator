#Code Calculator

##Setup

To simplify the setup all the code is bundled with the Standard Edition of Symfony 2 Framework with vendors.
This provides many libraries not required in this app and could be stripped from the code base.

Permissions: You may need to set the permissions on the app/cache and app/logs directories to allow the web server to write to them

VirtualHost: Use a standard virtual host with DireectoryIndex app.php

and DocumentRoot <theprojectroot>/web

Example virtualhost:

    <VirtualHost *>
        ServerName     localhost.dev
        DirectoryIndex app.php
        DocumentRoot "/path/to/CodeCalculator/web"

        <Directory "/path/to/CodeCalculator/web">
            AllowOverride None
            Order allow,deny
            Allow from All
        </Directory>
    </VirtualHost>

##Code

The code is split into two, the Bundle and the Library

###Bundle

This is found in src/Stunami/CodeCalculatorBundle

* Stunami\CoinCalculatorBundle\Controller\DefaultController - Controller class
* Stunami\CoinCalculatorBundle\Entity\CoinAmount - Contains string from request
* Stunami\CoinCalculatorBundle\Form\CalculatorType - Calculator Form
* Stunami\CoinCalculatorBundle\Resources\views - contains view files
* Stunami\Tests - Unit and Functional tests for bundle

You can run the tests for this by running in the root of the project:

    phpunit -c app

###Library

The library code is split out into a standalone library.

This is found in vendors/stunami/CodeCalculator

* Stunami\Component\Calculator\Calculator - The Calculator that uses a solver and denomination
* Stunami\Component\Converter\SterlingConvert - Converts valid Sterling strings to pence
* Stunami\Component\Solver\GreedySolver - Simple Solver good enough for Sterling. This could be replaced by a more advanced solver algorithms that might be required for other currencies.
* Stunami\Component\Denomination\SterlingDenomination - Contains Sterling coins. This could be replaced by a different curreny.
* Stunami\Tests - contain Unit tests for library

To run the tests in vendors/stunami run:

    phpunit

##Documentation

You can generate Docblox (www.docblox-project.org) documentation by running

    docblox

##TODOs

See [TODO.md](https://github.com/stunami/CoinCalculator/blob/master/TODO.md)