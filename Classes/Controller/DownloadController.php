<?php

declare(strict_types=1);

namespace Davitec\DvEducationDownloads\Controller;

use Davitec\DvEducationDownloads\Domain\Repository\DocumentTypeRepository;
use Davitec\DvEducationDownloads\Domain\Repository\DownloadRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DownloadController extends ActionController
{
    public function __construct(
        private readonly DownloadRepository $downloadRepository,
        private readonly DocumentTypeRepository $documentTypeRepository,
    ) {}

    public function listAction(): ResponseInterface
    {
        $searchTerm = trim((string)($this->request->getParsedBody()['tx_dveducationdownloads_downloadlist']['searchTerm']
            ?? $this->request->getQueryParams()['tx_dveducationdownloads_downloadlist']['searchTerm']
            ?? ''));
        $typeUid = (int)($this->request->getParsedBody()['tx_dveducationdownloads_downloadlist']['documentType']
            ?? $this->request->getQueryParams()['tx_dveducationdownloads_downloadlist']['documentType']
            ?? 0);
        $language = trim((string)($this->request->getParsedBody()['tx_dveducationdownloads_downloadlist']['language']
            ?? $this->request->getQueryParams()['tx_dveducationdownloads_downloadlist']['language']
            ?? ''));

        if ($searchTerm !== '') {
            $downloads = $this->downloadRepository->findBySearchTerm($searchTerm);
        } elseif ($typeUid > 0) {
            $downloads = $this->downloadRepository->findByDocumentType($typeUid);
        } elseif ($language !== '') {
            $downloads = $this->downloadRepository->findByLanguage($language);
        } else {
            $downloads = $this->downloadRepository->findAll();
        }

        $this->view->assignMultiple([
            'downloads' => $downloads,
            'documentTypes' => $this->documentTypeRepository->findAll(),
            'searchTerm' => $searchTerm,
            'selectedType' => $typeUid,
            'selectedLanguage' => $language,
            'languages' => ['de' => 'Deutsch', 'en' => 'English'],
        ]);

        return $this->htmlResponse();
    }
}
