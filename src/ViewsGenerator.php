<?php
/**
 * This file is part of OXID eSales Views Generator.
 *
 * OXID eSales Views Generator is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Views Generator is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Views Generator. If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2017
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