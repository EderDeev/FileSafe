<?php require_once 'inicio-html.php';?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
      
      const urlParams = new URLSearchParams(window.location.search);
      const searchTerm = urlParams.get('search');
  
    const table = $('#table').DataTable({
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
    }}
    
    );
    if (searchTerm) {
                table.search(searchTerm);
            }
      });
    

</script>


<body>
    <div id="webcrumbs">
      <div class="w-[1000px] bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
          
          <a href="./novo-documento"
            class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all duration-200"
          > 
            <span class="material-symbols-outlined">add</span> Adicionar
            documento
          </a>
          <a href="./relatorio-documento"
            class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all duration-200"
          > 
            <span class="material-symbols-outlined"></span> Relatório documentos
          </a>
        </div>
        
        <table class="w-full" id="table">
        
          <thead>
            <tr class="text-sm text-gray-500 bg-gray-50 rounded-lg">
              <th class="px-4 py-2 text-left w-[40px]">Documento</th>
              <th class="px-4 py-2 text-left w-[2fr]">Item</th>
              <th class="px-4 py-2 text-left w-[1.5fr]">Código Documento</th>
              <th class="px-4 py-2 text-left w-[1fr]">Titulo</th>
              <th class="px-4 py-2 text-left w-[1fr]">Data de entrega</th>
              <th class="px-4 py-2 text-left w-[1fr]">Carta de Envio</th>
              <th class="px-4 py-2 text-left w-[1fr]">Validação</th>
              <th class="px-4 py-2 text-left w-[120px]">Ações</th>
            </tr>
          </thead>
          
          <tbody>
          <?php foreach ($documentList as $document):  ?>
          
            <tr class="hover:bg-gray-50 transition-all duration-200">
              <td class="px-4 py-3">
                <span class="material-symbols-outlined text-blue-500"
                  >description</span
                >
                
              </td>
              <td class="px-4 py-3"><?= $document?->item  ?></td>
              <td class="px-4 py-3"><?= $document?->cod_doc  ?></td>
              <td class="px-4 py-3"><?= $document?->title  ?></td>
              <td class="px-4 py-3"><?= $document?->data_entrega;?></td>
              <td class="px-4 py-3"><?= $document?->carta_envio;?></td>
              <td class="px-4 py-3"><?= $document?->validacao;?></td>
              <td class="px-4 py-3">
                <div class="flex gap-2">
                  <button
                    class="p-1.5 hover:bg-gray-100 rounded-lg transition-all duration-200"
                  >
                    <a href="download-documento?id=<?= $document?->id; ?>" class="material-symbols-outlined">download</a>
                  </button>
                  <button
                    class="p-1.5 hover:bg-gray-100 rounded-lg transition-all duration-200"
                  >
                    <a href="editar-documento?id=<?= $document->id; ?>" class="material-symbols-outlined">edit</a>
                  </button>
                  <button
                    class="p-1.5 hover:bg-gray-100 rounded-lg transition-all duration-200"
                  >
                    <a href="excluir-documento?id=<?= $document->id; ?>" class="material-symbols-outlined">delete</a>
                  </button>
                </div>
              </td>
            </tr> 
            <?php endforeach; ?>
          </tbody>
          
        </table>
        
        
      </div>
    </div>
  </body>

</html>


  
  
 
