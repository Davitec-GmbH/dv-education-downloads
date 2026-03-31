<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Tests\Unit\Domain\Model;

use Davitec\DvEducationDownloads\Domain\Model\DocumentType;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class DocumentTypeTest extends UnitTestCase
{
    #[Test]
    public function testTitleDefault(): void { self::assertSame('', (new DocumentType())->getTitle()); }

    #[Test]
    public function testSetTitle(): void { $s = new DocumentType(); $s->setTitle('Formulare'); self::assertSame('Formulare', $s->getTitle()); }

    #[Test]
    public function testSortingDefault(): void { self::assertSame(0, (new DocumentType())->getSorting()); }

    #[Test]
    public function testSetSorting(): void { $s = new DocumentType(); $s->setSorting(3); self::assertSame(3, $s->getSorting()); }
}
