<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class DocumentTypeRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];
}
