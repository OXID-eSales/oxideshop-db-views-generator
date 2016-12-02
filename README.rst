OXID eShop views regenerator
============================

This component provides eShop the way of creating/recreating the views structure
from console command. The script should be accessible through the oe-eshop-facts
component. Information on how to use ``oe-eshop-db_views_regenerate`` script together
with ``oe-eshop-facts`` can be found in the following
`README <https://github.com/OXID-eSales/eshop-facts/blob/master/README.rst>`__.

Alternative way of running
--------------------------

ESHOP_BOOTSTRAP_PATH='source/bootstrap.php' vendor/bin/oe-eshop-db_views_regenerate

Possible return error codes
---------------------------

After the execution of script it will return one of the following return error codes:

* ``0`` - If the execution went without errors;
* ``1`` - If an exception was thrown and details are stored in ``EXCEPTION_LOG.txt`` file;
* ``2`` - If an unknown error has been thrown and no details are available.
