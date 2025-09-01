<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class DownloadRepository extends Repository
{
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
    ];

    public function findBySearchTerm(string $searchTerm): QueryResultInterface
    {
        $query = $this->createQuery();
        $pattern = '%' . $searchTerm . '%';

        $query->matching(
            $query->logicalOr(
                $query->like('title', $pattern),
                $query->like('description', $pattern),
            )
        );

        return $query->execute();
    }

    public function findByDocumentType(int $typeUid): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('documentType', $typeUid));

        return $query->execute();
    }

    public function findByLanguage(string $language): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('language', $language));

        return $query->execute();
    }
}
