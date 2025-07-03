<?php require_once 'inicio-html.php';

?> 

<main>
  <div id="webcrumbs3">
    <div class="w-[400px] bg-white rounded-lg shadow-xl p-8">
      <div class="flex flex-col items-center mb-8"> <span class="material-symbols-outlined text-5xl mb-2">person</span>
        <h1 class="text-2xl font-bold">Login</h1>
      </div>
      <form class="space-y-6" method="post">
        <div class="relative"> <span class="material-symbols-outlined absolute left-3 top-3">mail</span> <input type="email" name="email" id="email" placeholder="Email" class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 outline-none" /> </div>
        <div class="relative"> <span class="material-symbols-outlined absolute left-3 top-3">lock</span> <input type="password" name="password" id="password" placeholder="Senha" class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 outline-none" /> </div>
        <div class="flex items-center justify-between"> <label class="flex items-center space-x-2 cursor-pointer group">   </label>  </div> <button type="submit" value="Entrar" class="w-full  bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transform hover:scale-[1.02] transition-all duration-200">Entrar</button>
        <a class="text-center">Não possuí acesso?<a href="#" class="ml-1 text-blue-600 hover:text-blue-700 transition duration-200">Cadastrar</a> </a>
      </form>
    </div>
  </div>
</main>

