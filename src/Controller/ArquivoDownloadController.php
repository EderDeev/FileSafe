<?php

namespace Alura\Controller;
use Alura\Repository\DocumentRepository;
class ArquivoDownloadController
{
    public function __construct(private DocumentRepository $documentRepository)
    {   
    }

    public function processaRequisicao(): void{
        $id = filter_input(INPUT_GET,'id');
        $document =$this->documentRepository->find($id);
        $item = $document->item;
        $nomeArquivo = $document->getArchiveName();

        $posicao = strpos($item, '-');
        $codigoItem = trim(substr($item,0,$posicao)); 

        $caminhoArquivo =  __DIR__ . "/../../public/produtos/" . "$codigoItem". "-" . $nomeArquivo;
        
        
        if (file_exists($caminhoArquivo)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Expires: 0');
                header('Content-Disposition: attachment; filename="' . basename($caminhoArquivo) . '"');
                header('Content-Length: ' . filesize($caminhoArquivo));
                ob_clean(); // Limpa o buffer de saída
                flush(); 
                // Ler e enviar o arquivo para o navegador
                readfile($caminhoArquivo);
                exit;
        } else {
            echo "Nenhum arquivo especificado.";
        }   
       
    }
}