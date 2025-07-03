<?php

namespace Alura\Controller;

use Alura\Repository\DocumentRepository;

class FormController implements Controller
{

    public function __construct(private DocumentRepository $documentRepository)
    {
        
    }

    public function processaRequisicao():void{
        $id = filter_input(INPUT_GET,'id');
        
        $document = null;
        if($id !== false || $id !== null){
            $document =$this->documentRepository->find($id);
        };
        $documentItem = $this->documentRepository->findItem($id);
        require_once __DIR__ . '/../../views/document-form.php';
              
    }
}