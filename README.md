Polcode Recruitment Project
=======================

Installation
------------

Get composer:

    curl -s http://getcomposer.org/installer | php

Run the following command:

    php composer.phar create-project tworzenieweb/polcode-recruitment polcode-recruitment dev-master

The installation process used Incenteev's ParameterHandler to handle parameters.yml configuration. With the current
installation, it is possible to use environment variables to configure this file:


Reset the data
--------------

Fixtures are automatically loaded on the ``composer create-project`` step. If you'd like to reset your sandbox to the default fixtures (or you had an issue while installing and want to fill in the fixtures manually), you may run:

    php bin/load_data.php

This will completely reset your database.

Run
---

If you are running PHP5.4, you can use the built in server to start the demo:

    app/console server:run localhost:9090

Now open your browser and go to http://localhost:9090/

Tests
-----

To run tests use phpunit:

phpunit -c app/


Copyright
-----

This project skeleton was made based on sonata sandbox project https://github.com/sonata-project/sandbox/ - to have all sonata functionality configured correctly. Also for new bootstrap theme which is not
 enabled by default
