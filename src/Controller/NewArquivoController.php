<?php

namespace Alura\Controller;
use Alura\Repository\DocumentRepository;
use Alura\Entity\Document;

class NewArquivoController implements Controller
{
    public function __construct(private DocumentRepository $documentRepository)
    {
        
    }
    public function processaRequisicao():void{

        $id = filter_input(INPUT_POST,'id');
        
       
        $item = filter_input(INPUT_POST,'item');
            if ($item === false) {
                header('Location: /?sucesso=0');
                exit();
            }
        $cod_doc = filter_input(INPUT_POST,'cod_doc');
            if ($cod_doc === false) {
                header('Location: /?sucesso=0');
                exit();
            }
        $title = filter_input(INPUT_POST,'title');
            if ($title === false) {
                header('Location: /?sucesso=0');
                exit();
            }
        $data_entrega = filter_input(INPUT_POST,'data_entrega');
            if ($data_entrega === false) {
                header('Location: /?sucesso=0');
                exit();
            }
        $carta_envio = filter_input(INPUT_POST,'carta_envio');
            if ($carta_envio === false) {
                header('Location: /?sucesso=0');
                exit();
            }
        $validacao = filter_input(INPUT_POST,'validacao');
            if ($validacao === false) {
                header('Location: /?sucesso=0');
                exit();
            }
            
            $document  = new Document($item,$cod_doc,$title,$data_entrega,$carta_envio,$validacao);

            
                $posicao = strpos($item, '-');
                $codigoItem = trim(substr($item,0,$posicao));
                
            
            if($_FILES['archive_name']['error']=== UPLOAD_ERR_OK){
                    move_uploaded_file(
                        $_FILES['archive_name']['tmp_name'],
                        __DIR__ . "/../../public/produtos/"  . "$codigoItem". "-" . $_FILES['archive_name']['name']
                    );   
            }
        
                $document->setArchiveName($_FILES['archive_name']['name']);
            
          /*  if($_FILES['archive_name']['error']=== UPLOAD_ERR_OK){
                move_uploaded_file(
                    $_FILES['archive_name']['tmp_name'],
                    __DIR__ . '/../../public/uploads' . uniqid('upload_') . $_FILES['archive_name']['name']
                );
                $document->setArchiveName($_FILES['archive_name']['name']);
            }*/

        $sucess = $this->documentRepository->add($document);
        if($sucess === false){
            header('Location: /?sucesso=0');
            exit();
        }else{
            header('Location: /?sucesso=1');
            exit();
        }

        
        
            

    } 
    }
