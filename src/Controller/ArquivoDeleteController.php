<?php

namespace Alura\Controller;
use Alura\Repository\DocumentRepository;

class ArquivoDeleteController
{
    public function __construct(private DocumentRepository $documentRepository)
    {   
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id');
        if ($id === null || $id === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $sucess = $this->documentRepository->remove($id);
            if ($sucess === false) {
                header('Location: /?sucesso=0');
                exit();
            }else{
                header('Location: /?sucesso=1');
                exit();
            }
    }
}