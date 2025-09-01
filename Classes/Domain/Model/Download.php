<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Download extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected ?DocumentType $documentType = null;
    protected string $language = 'de';
    protected string $version = '';
    protected ?\DateTime $validFrom = null;
    protected ?\DateTime $validUntil = null;
    protected ?FileReference $file = null;
    protected int $sorting = 0;

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): void { $this->description = $description; }
    public function getDocumentType(): ?DocumentType { return $this->documentType; }
    public function setDocumentType(?DocumentType $documentType): void { $this->documentType = $documentType; }
    public function getLanguage(): string { return $this->language; }
    public function setLanguage(string $language): void { $this->language = $language; }
    public function getVersion(): string { return $this->version; }
    public function setVersion(string $version): void { $this->version = $version; }
    public function getValidFrom(): ?\DateTime { return $this->validFrom; }
    public function setValidFrom(?\DateTime $validFrom): void { $this->validFrom = $validFrom; }
    public function getValidUntil(): ?\DateTime { return $this->validUntil; }
    public function setValidUntil(?\DateTime $validUntil): void { $this->validUntil = $validUntil; }
    public function getFile(): ?FileReference { return $this->file; }
    public function setFile(?FileReference $file): void { $this->file = $file; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $sorting): void { $this->sorting = $sorting; }

    public function getIsValid(): bool
    {
        $now = new \DateTime();
        if ($this->validFrom !== null && $this->validFrom > $now) {
            return false;
        }
        if ($this->validUntil !== null && $this->validUntil < $now) {
            return false;
        }
        return true;
    }
}
