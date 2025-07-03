<?php

namespace Alura\Repository;
use PDO;
use Alura\Entity\Document;
class DocumentRepository
{
    public function __construct(public PDO $pdo)
    {
        $this->pdo = $pdo;  
    }

    public function add(Document $document):bool{
        $sql = 'INSERT INTO arquivo(item,cod_doc,title,data_entrega,carta_envio,validacao,archive_name) VALUES(?,?,?,?,?,?,?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$document->item);
        $statement->bindValue(2,$document->cod_doc);
        $statement->bindValue(3,$document->title);
        $statement->bindValue(4,$document->data_entrega);
        $statement->bindValue(5,$document->carta_envio);
        $statement->bindValue(6,$document->validacao);
        $statement->bindValue(7,$document->getArchiveName());
  
        $result = $statement->execute();     
        $id = $this->pdo->lastInsertId();
        $document->setId(intval($id));
        return $result;
    }
    
    public function all() :array{
        $documentList = $this->pdo->query('SELECT *
        FROM arquivo
        ORDER BY item;')->fetchAll(PDO::FETCH_ASSOC);
        return array_map($this->hydrateDocument(...),$documentList); 
    }

    

    public function remove(int $id):void{
        $sql = 'DELETE FROM arquivo where id=?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();
    }

    public function update(Document $document){
        $updateArchive = '';
        if($document->getArchiveName() !== null){
            $updateArchive = ',archive_name=:archive_name';
        }

        $sql = "UPDATE arquivo SET item=:item,cod_doc=:cod_doc,title=:title,data_entrega=:data_entrega,carta_envio=:carta_envio,validacao=:validacao $updateArchive where id =:id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('item',$document->item);
        $statement->bindValue('cod_doc',$document->cod_doc);
        $statement->bindValue('title',$document->title);
        $statement->bindValue('data_entrega',$document->data_entrega);
        $statement->bindValue('carta_envio',$document->carta_envio);
        $statement->bindValue('validacao',$document->validacao);
        $statement->bindValue('id',$document->id);
    
        if($document->getArchiveName() !== null){
            $statement->bindValue('archive_name',$document->getArchiveName());
        }
        $statement->execute();
    }


    public function hydrateDocument(array $documentData) : Document{
        $document = new Document(
            $documentData['item'],
            $documentData['cod_doc'],
            $documentData['title'],
            $documentData['data_entrega'],
            $documentData['carta_envio'],
            $documentData['validacao'],
        );
        $document->setId($documentData['id']);
        if($documentData['archive_name'] !== null){
            $document->setArchiveName($documentData['archive_name']);
        }
        return $document;
    }

    public function find($id){
        if($id != false){
            $statement = $this->pdo->prepare('SELECT * FROM arquivo where id=? ');
            $statement->bindValue(1,$id);
            $statement->execute();

            return $this->hydrateDocument($statement->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function findItem(){ 
        
         $Item = $this->pdo->query('SELECT * FROM itens;')->fetchAll(PDO::FETCH_ASSOC);
         return $Item;
         
        }
    
        

       
}
