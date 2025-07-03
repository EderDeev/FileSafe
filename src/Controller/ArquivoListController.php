<?php

namespace Alura\Controller;

use Alura\Repository\DocumentRepository;

class ArquivoListController implements Controller
{
    public function __construct(private DocumentRepository $documentRepository)
    {   
    }

    public function processaRequisicao(): void
    {  
        
        
        $documentList = $this->documentRepository->all();
        
        
        
        require_once __DIR__ . '/../../views/document-list.php';
        
    }
    

}