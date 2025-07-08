<?php
require_once  'inicio-html-relatorio.php';
?>
<style>
     .cabecalho__sair {
    margin: 0 20px;
    padding: 5px 10px;
    border-radius: 10%;
    background-color: var(--azul-escuro);

}
* {
      margin: 0;
      padding: 0;
      border: 0;
      box-sizing: border-box;
    }
    /* Estilizando a tabela */
#table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    font-family: "Times New Roman", Arial, sans-serif;
    font-size: 14px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    border-radius: 8px;
    overflow: hidden;
}

/* Estilo para os cabeçalhos */
#table thead {
    background-color: #4CAF50;  /* Cor do Excel */
    color: white;
    font-weight: bold;
    text-align: left;
    position: sticky;
    top: 0;
    z-index: 2;
}

/* Estilizando as células */
#table th, #table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

/* Alternando cores das linhas */
#table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Efeito hover para destacar a linha */
#table tbody tr:hover {
    background-color: #e0f7fa; /* Azul claro */
    cursor: pointer;
}

/* Fixando os cabeçalhos quando houver rolagem */
#table thead th {
    position: sticky;
    top: 0;
    background-color: #4CAF50;
}

/* Ajustando largura das colunas para melhor visualização */
#table th:nth-child(1),
#table td:nth-child(1) {
    width: 5%; /* Item */
}

#table th:nth-child(2),
#table td:nth-child(2) {
    width: 15%; /* Código Documento */
}

#table th:nth-child(3),
#table td:nth-child(3) {
    width: 25%; /* Título */
}

#table th:nth-child(4),
#table td:nth-child(4) {
    width: 15%; /* Data de Entrega */
}

#table th:nth-child(5),
#table td:nth-child(5) {
    width: 20%; /* Carta de Envio */
}

#table th:nth-child(6),
#table td:nth-child(6) {
    width: 10%; /* Validação */
}

/* Responsividade para telas menores */
@media (max-width: 768px) {
    #table {
        font-size: 12px;
    }
    
    #table th, #table td {
        padding: 6px;
    }
}
</style>
<table class="" id="table">
        
          <thead>
            <tr class="">
              <th class="">Item</th>
              <th class="">Código Documento</th>
              <th class="">Arquivo</th>
              <th class="">Titulo</th>
              <th class="">Data de entrega</th>
              <th class="">Carta de Envio</th>
              <th class="">Validação</th>
            </tr>
          </thead>
          
          <tbody>
          <?php foreach ($documentList as $document):  ?>
          
            <tr class="">    
              </td>
                <td class=""><?= $document?->item  ?></td>
                <td class=""><?= $document?->cod_doc  ?></td>
                <td>
                    <a href="download-documento?id=<?= $document?->id; ?> "> 
                        <?= $document?->getArchiveName() ?>
                    </a>
                </td>
                <td class=""><?= $document?->title  ?></td>
                <td class=""><?= $document?->data_entrega;?></td>
                <td class=""><?= $document?->carta_envio;?></td>
                <td class=""><?= $document?->validacao;?></td>
              </td>
            </tr> 

            <?php endforeach; ?>
          </tbody>
          
        </table>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#table').DataTable({
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
    },
    searching: false,
    lengthChange: false,
    info: false,
    paging: false,
    autoWidth: false
}
      );
} );
  </script>