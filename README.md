#Setup

To simplify the setup all the code is bundled with the Standard Edition of Symfony 2 Framework with vendors.
This provides many libraries not required in this app and could be stripped from the code base.

Permissions: You may need to set the permissions on the app/cache and app/logs directories to allow the web server to write to them

VirtualHost: Use a standard virtual host with DireectoryIndex app.php

and DocumentRoot <theprojectroot>/web

#Code

The code is split into two, the Bundle and the Library

##Bundle

This is found in src/Stunami/CodeCalculatorBundle

You can run the tests for this by running in the root of the project:

    phpunit -c app

##Library

The library code is split out into a standalone library.

This is found in vendors/stunami/CodeCalculator

To run the tests in vendors/stunami run:

    phpunit

TODOs

See TODO