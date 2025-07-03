<?php

namespace Alura\Entity;

class Document
{

    public readonly int $id;
    private ?string $archive_name = null;
    public function __construct
    (
        public readonly string $item,
        public readonly string $cod_doc,
        public readonly string $title,
        public readonly string $data_entrega,
        public readonly string $carta_envio,
        public readonly string $validacao,
    )
    {
       
    }

    public function setId(int $id): void{
        $this->id =$id;
    }
    
    public function setArchiveName(string $archive_name){
        $this->archive_name = $archive_name;
    }

    public function getArchiveName(): ?string{
        return $this->archive_name;
    }


}