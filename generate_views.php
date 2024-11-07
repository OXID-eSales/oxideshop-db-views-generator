<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\DatabaseViewsGenerator;

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
        'Unable to find eShop bootstrap.php file.',
        'You can override the path by using ESHOP_BOOTSTRAP_PATH environment variable.',
        "\n"
    ];

    $message = implode(' ', $items);

    die($message);
}

require_once($bootstrapFileName);

$ViewsGenerator = new ViewsGenerator();

$status = (object)[
    'updateViews' => false,
    'noException' => false
];

function handleExit($status)
{
    if ((!$status->updateViews) || (!$status->noException)) {
        print('There was an error while regenerating the views.');
    }

    if (!$status->noException) {
        print(" Please look at `oxideshop.log` for more details.\n");
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
