Setup

The code is bundled with the Standard Edition of Symfony 2 Framework.

You may need to set the permissions on the app/cache and app/logs directories to allow the web server to write to them

Use a standard virtual host with DireectoryIndex app.php

and DocumentRoot <theprojectroot>/web

Code

The code is split into two, the Application and the Library

Application

This is found in src/Stunami/CodeCalculatorBundle

You can run the tests for this by running in the root of the project:

phpunit -c app

Library

The library code is split out into a standalone library that does not depend on Symfony.

This is found in vendors/stunami/CodeCalculator

To run the tests in vendors/stunami run:

phpunit

TODOs

See TODO.txt