OXID eShop Views Generator
==========================

This component provides eShop the way of creating/recreating the views structure
from console command. This might be needed after updating OXID eShop version which has a database migration.

Possible ways to use
--------------------

- Run bash script: ``vendor/bin/oe-eshop-db_views_generate``
- Run PHP script ``vendor/oxid-esales/generate_views.php``
- Use class ``ViewsGenerator``

**Note:**

  Path to bootstrap might be forced by passing ESHOP_BOOTSTRAP_PATH parameter.

  ESHOP_BOOTSTRAP_PATH='source/bootstrap.php' vendor/bin/oe-eshop-db_views_generate
  ESHOP_BOOTSTRAP_PATH='/var/www/oxideshop/source/bootstrap.php' php oxideshop-db-views-generator/generate_views.php

Possible return error codes
---------------------------

After the execution of script it will return one of the following return error codes:

* ``0`` - If the execution went without errors;
* ``1`` - If an exception was thrown and details are stored in ``EXCEPTION_LOG.txt`` file;
* ``2`` - If an unknown error has been thrown and no details are available.
