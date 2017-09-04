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

use OxidEsales\DatabaseViewsGenerator\ViewsGenerator;

$bootstrapFileName = getenv('ESHOP_BOOTSTRAP_PATH');
if (!empty($bootstrapFileName)) {
    $bootstrapFileName = realpath(trim(getenv('ESHOP_BOOTSTRAP_PATH')));
} else {
    $count = 0;
    $bootstrapFileName = 'source/bootstrap.php';
    $currentDirectory = __DIR__ . '/';
    while ($count < 5) {
        $count++;
        if (file_exists($currentDirectory . $bootstrapFileName)) {
            $bootstrapFileName = $currentDirectory . $bootstrapFileName;
            break;
        }
        $bootstrapFileName = '../' . $bootstrapFileName;
    }
}

if (!(file_exists($bootstrapFileName) && !is_dir($bootstrapFileName))) {
    $items = [
        "Unable to find eShop bootstrap.php file.",
        "You can override the path by using ESHOP_BOOTSTRAP_PATH environment variable.",
        "\n"
    ];

    $message = implode(" ", $items);

    die($message);
}

require_once($bootstrapFileName);

$ViewsGenerator = new ViewsGenerator();

$status = (object)[
    'updateViews' => false,
    'noException' => false
];

function handleExit($status) {
    if ((!$status->updateViews) || (!$status->noException)) {
        print("There was an error while regenerating the views.");
    }

    if (!$status->noException) {
        print(" Please look at `EXCEPTION_LOG.txt` for more details.\n");
    }

    if (($status->noException) && (!$status->updateViews)) {
        print(" Please double check the state of database and configuration.\n");
    }
}

register_shutdown_function('OxidEsales\DatabaseViewsGenerator\handleExit', $status);

$status->updateViews = $ViewsGenerator->generate();
$status->noException = true;

if (!$status->updateViews) {
    exit(2);
}
