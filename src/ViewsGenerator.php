<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\DatabaseViewsGenerator;

use OxidEsales\Eshop\Core\DbMetaDataHandler;

class ViewsGenerator
{
    /**
     * @return bool Was the call successful?
     */
    public function generate()
    {
        return oxNew(DbMetaDataHandler::class)->updateViews();
    }
}
