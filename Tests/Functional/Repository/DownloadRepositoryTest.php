<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Tests\Functional\Repository;

use Davitec\DvEducationDownloads\Domain\Repository\DownloadRepository;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class DownloadRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['typo3conf/ext/dv_education_downloads'];

    private DownloadRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationdownloads_domain_model_documenttype.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationdownloads_domain_model_download.csv');
        $this->repository = $this->get(DownloadRepository::class);
        $this->repository->setDefaultQuerySettings(
            $this->repository->createQuery()->getQuerySettings()->setRespectStoragePage(false)
        );
    }

    #[Test]
    public function testFindAllReturnsNonDeleted(): void
    {
        self::assertCount(4, $this->repository->findAll());
    }

    #[Test]
    public function testFindBySearchTermMatchesTitle(): void
    {
        self::assertCount(1, $this->repository->findBySearchTerm('Immatrikulation'));
    }

    #[Test]
    public function testFindBySearchTermMatchesDescription(): void
    {
        self::assertCount(1, $this->repository->findBySearchTerm('Setup VPN'));
    }

    #[Test]
    public function testFindByDocumentType(): void
    {
        self::assertCount(3, $this->repository->findByDocumentType(1));
    }

    #[Test]
    public function testFindByLanguageDe(): void
    {
        self::assertCount(3, $this->repository->findByLanguage('de'));
    }

    #[Test]
    public function testFindByLanguageEn(): void
    {
        self::assertCount(1, $this->repository->findByLanguage('en'));
    }
}
