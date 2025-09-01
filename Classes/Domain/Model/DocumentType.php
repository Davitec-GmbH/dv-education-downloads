<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class DocumentType extends AbstractEntity
{
    protected string $title = '';
    protected int $sorting = 0;

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $sorting): void { $this->sorting = $sorting; }
}
