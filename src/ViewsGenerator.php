<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\DatabaseViewsGenerator;

use OxidEsales\Eshop\Core\DbMetaDataHandler;

class ViewsGenerator
{
    /**
     * @return bool Was the call successful?
     */
    public function generate()
    {
        $metaDataHandler = oxNew(DbMetaDataHandler::class);

        return $metaDataHandler->updateViews();
    }
}
