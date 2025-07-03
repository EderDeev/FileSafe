<?php require_once 'inicio-html.php'; 

?> 

<main>
  <body>
    
 
  <div id="webcrumbs1">
    <div class="w-[700px] p-8 bg-white rounded-xl shadow-lg">
      <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Salvar arquivo</h1>
        <p class="text-neutral-600">Carregue seus arquivos inserindo um nome e selecionando um documento</p>
      </div>
      <form class="space-y-6" method="post" enctype="multipart/form-data">
        <div class="space-y-2">
          <label class="block text-sm font-medium">Nome Arquivo</label>

      <input list="item" name="item" placeholder="Selecione um item" value="<?=$document?->item;?>" class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400">
          <datalist  id="item">           
            <?php
              if($document->id === null){
                foreach ($documentItem as $item) {  
                  $nomeItem = $item['nome_item'];
                  echo "<option id='item' name='item' >{$nomeItem}</option>";
                }
            }
              //var_dump($$document->item);exit();
            ?>
          </datalist>
            <!--
            <input type="text" 
            placeholder="Item"
            name="item"
            id="item"
            value="<?= $document?->item;?>"
            required
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
            -->
            <input type="text"
            placeholder="Código Documento"
            name="cod_doc"
            id="cod_doc"
            value="<?= $document?->cod_doc;?>"
            
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
            
            <input type="text"
            placeholder="Título"
            name="title"
            id="title"
            value="<?= $document?->title;?>"
            
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
            
            <input type="date"
            placeholder="Data"
            name="data_entrega"
            id="data_entrega"
            value="<?= $document?->data_entrega;?>"
            
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
            
            <input type="text"
            placeholder="Carta de Envio"
            name="carta_envio"
            id="carta_envio"
            value="<?= $document?->carta_envio;?>"
            
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
            
            <input type="text"
            placeholder="Validação"
            name="validacao"
            id="validacao"
            value="<?= $document?->validacao;?>"
            
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 hover:border-blue-400" />
        </div>
        <div class="space-y-2">
          <label class="block text-sm font-medium text-center">Documento</label>
          <div
            class="relative border-2 border-dashed border-neutral-300 rounded-lg p-8 text-center hover:border-blue-400 transition duration-200">
            <input type="file"
            id="archive_name"
            
            name="archive_name"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
            <?= $document?->getArchiveName();?>
            <span class="material-symbols-outlined text-4xl mb-2">upload_file</span>
            
            
            <p class="text-sm text-neutral-600">Arraste e solte seu arquivo aqui ou clique para navegar</p>
            <p class="text-xs text-neutral-500 mt-2">Formatos suportados: PDF, DOC, DOCX, RAR</p>
          </div>
        </div>
        <button type="submit"
          class="w-full bg-blue-500 text-white py-3 rounded-lg font-medium hover:bg-blue-600 active:bg-blue-700 transform transition duration-200 hover:scale-[1.02] active:scale-[0.98] shadow-md hover:shadow-lg">
          Enviar documento </button>
      </form>
      <div class="mt-8 p-4 bg-neutral-50 rounded-lg">
        <div class="flex items-center gap-2 text-sm text-neutral-600">
          <span class="material-symbols-outlined">info</span>
          <p>Tamanho máximo do arquivo: 10MB</p>
        </div>
      </div>
    </div>
  </div>

  </body>
  </main>
 
</html>