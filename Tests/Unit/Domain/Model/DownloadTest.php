<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Tests\Unit\Domain\Model;

use Davitec\DvEducationDownloads\Domain\Model\DocumentType;
use Davitec\DvEducationDownloads\Domain\Model\Download;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class DownloadTest extends UnitTestCase
{
    private Download $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Download();
    }

    #[Test]
    public function testTitleDefault(): void { self::assertSame('', $this->subject->getTitle()); }

    #[Test]
    public function testSetTitle(): void { $this->subject->setTitle('SPO'); self::assertSame('SPO', $this->subject->getTitle()); }

    #[Test]
    public function testDescriptionDefault(): void { self::assertSame('', $this->subject->getDescription()); }

    #[Test]
    public function testSetDescription(): void { $this->subject->setDescription('desc'); self::assertSame('desc', $this->subject->getDescription()); }

    #[Test]
    public function testDocumentTypeDefault(): void { self::assertNull($this->subject->getDocumentType()); }

    #[Test]
    public function testSetDocumentType(): void
    {
        $dt = new DocumentType();
        $this->subject->setDocumentType($dt);
        self::assertSame($dt, $this->subject->getDocumentType());
    }

    #[Test]
    public function testLanguageDefault(): void { self::assertSame('de', $this->subject->getLanguage()); }

    #[Test]
    public function testSetLanguage(): void { $this->subject->setLanguage('en'); self::assertSame('en', $this->subject->getLanguage()); }

    #[Test]
    public function testVersionDefault(): void { self::assertSame('', $this->subject->getVersion()); }

    #[Test]
    public function testSetVersion(): void { $this->subject->setVersion('2.0'); self::assertSame('2.0', $this->subject->getVersion()); }

    #[Test]
    public function testValidFromDefault(): void { self::assertNull($this->subject->getValidFrom()); }

    #[Test]
    public function testSetValidFrom(): void { $d = new \DateTime('2025-01-01'); $this->subject->setValidFrom($d); self::assertSame($d, $this->subject->getValidFrom()); }

    #[Test]
    public function testValidUntilDefault(): void { self::assertNull($this->subject->getValidUntil()); }

    #[Test]
    public function testFileDefault(): void { self::assertNull($this->subject->getFile()); }

    #[Test]
    public function testIsValidWhenNoDates(): void { self::assertTrue($this->subject->getIsValid()); }

    #[Test]
    public function testIsValidWhenInRange(): void
    {
        $this->subject->setValidFrom(new \DateTime('-1 year'));
        $this->subject->setValidUntil(new \DateTime('+1 year'));
        self::assertTrue($this->subject->getIsValid());
    }

    #[Test]
    public function testIsNotValidWhenExpired(): void
    {
        $this->subject->setValidFrom(new \DateTime('-2 years'));
        $this->subject->setValidUntil(new \DateTime('-1 year'));
        self::assertFalse($this->subject->getIsValid());
    }

    #[Test]
    public function testIsNotValidWhenNotYetValid(): void
    {
        $this->subject->setValidFrom(new \DateTime('+1 year'));
        self::assertFalse($this->subject->getIsValid());
    }

    #[Test]
    public function testSortingDefault(): void { self::assertSame(0, $this->subject->getSorting()); }
}
