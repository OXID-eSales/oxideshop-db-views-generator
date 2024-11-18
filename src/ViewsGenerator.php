<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\DatabaseViewsGenerator;

class ViewsGenerator
{
    /**
     * @return bool Was the call successful?
     */
    public function generate()
    {
        $configFile = \OxidEsales\Eshop\Core\Registry::get(\OxidEsales\Eshop\Core\ConfigFile::class);
        $configFile->setVar("aSlaveHosts", null);

        /**
         * @var \OxidEsales\Eshop\Core\DbMetaDataHandler $metaDataHandler
         */
        $metaDataHandler = oxNew(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);

        return $metaDataHandler->updateViews();
    }
}
