<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resumos – Guia ETEC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
</head>

<body class="bg-gray-100 font-[Poppins]">

  <!-- HERO -->
  <section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-20 px-6 shadow-xl">
    <div class="max-w-5xl mx-auto text-center">
      <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Resumos para o Vestibulinho ETEC</h1>
      <p class="text-lg opacity-90 max-w-2xl mx-auto">
        Resumos diretos, objetivos e altamente visualizados. Estude de forma leve, rápida e eficiente —
        focado no que realmente cai!
      </p>
    </div>
  </section>

  <!-- CONTAINER -->
  <div class="max-w-5xl mx-auto px-6 py-14 space-y-6">


  <!-- BOTÃO VOLTAR -->
<div class="max-w-5xl mx-auto px-6 py-4 text-left">
  <a href="../inicio.php"
     class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded-lg shadow-md transition">
    ← Voltar para o Início
  </a>
</div>


    <!-- TEMPLATE DINÂMICO PARA CADA MATÉRIA -->
    <!-- Você pode duplicar esta estrutura para quantas matérias quiser -->

    <!-- =================================================================== -->
    <!-- PORTUGUÊS -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('port')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-red-600">Língua Portuguesa</h2>
          <p class="text-gray-500 text-sm">Interpretação é 90% da prova</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="port" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          A ETEC foca quase totalmente em <strong>interpretação de textos</strong>.
          Você deve identificar ideias principais, analisar ironias, diferenciar opinião de fato,
          interpretar gráficos, entender tirinhas, propagandas e textos jornalísticos.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Interpretação</span>
          <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Funções da linguagem</span>
          <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Gramática no texto</span>
          <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Uso dos porquês</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- MATEMÁTICA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('mat')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-blue-600">Matemática</h2>
          <p class="text-gray-500 text-sm">Situações do cotidiano + raciocínio lógico</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="mat" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          A prova cobra problemas contextualizados envolvendo
          <strong>porcentagens, regra de três, frações, proporcionalidade, medidas e gráficos</strong>.
          Em geometria, caem áreas, volumes e ângulos simples.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Porcentagem</span>
          <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Regra de três</span>
          <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Gráficos</span>
          <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Área e Volume</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- HISTÓRIA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('his')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-yellow-600">História</h2>
          <p class="text-gray-500 text-sm">Causas, consequências e processos</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="his" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          A prova cobra principalmente <strong>história do Brasil</strong> e temas modernos,
          como Era Vargas, Revolução Industrial, Ditadura Militar e Guerras Mundiais.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Era Vargas</span>
          <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Revolução Industrial</span>
          <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Ditadura Militar</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- GEOGRAFIA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('geo')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-green-600">Geografia</h2>
          <p class="text-gray-500 text-sm">Mapas, gráficos e atualidades</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="geo" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          O foco é interpretação: clima, vegetação, urbanização, impactos ambientais e globalização
          aparecem sempre.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Globalização</span>
          <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Impactos Ambientais</span>
          <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Agricultura</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- BIOLOGIA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('bio')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-purple-600">Biologia</h2>
          <p class="text-gray-500 text-sm">Ecologia domina a prova</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="bio" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          A ETEC cobra células, organelas, ecossistemas, ciclos da natureza, cadeias alimentares e corpo humano.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Ecologia</span>
          <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Células</span>
          <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Corpo Humano</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- FÍSICA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('fis')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-orange-600">Física</h2>
          <p class="text-gray-500 text-sm">Velocidade, movimento e eletricidade</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="fis" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          Quase tudo gira em torno de conceitos aplicados: velocidade média, forças, energia, calor e eletricidade básica.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Velocidade média</span>
          <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Força</span>
          <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Lei de Ohm</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- QUÍMICA -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('qui')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-pink-600">Química</h2>
          <p class="text-gray-500 text-sm">Misturas, reações e gráficos</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="qui" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          Conteúdos mais cobrados: misturas, substâncias, mudanças de estado
          e gráficos de aquecimento.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Misturas</span>
          <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Mudanças de estado</span>
          <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Reações simples</span>
        </div>
      </div>
    </div>

    <!-- =================================================================== -->
    <!-- INGLÊS -->
    <!-- =================================================================== -->
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
      <button onclick="toggleResumo('ing')"
        class="w-full flex justify-between items-center text-left">
        <div>
          <h2 class="text-2xl font-bold text-indigo-600">Inglês</h2>
          <p class="text-gray-500 text-sm">Textos curtos + gramática básica</p>
        </div>
        <span class="text-3xl font-bold text-gray-400">+</span>
      </button>

      <div id="ing" class="hidden mt-6 text-gray-700 leading-relaxed">
        <p>
          A prova usa textos curtos com foco em interpretação e gramática simples:
          <strong>verb to be, modal verbs, present simple e vocabulário cotidiano</strong>.
        </p>

        <div class="mt-4 font-semibold text-gray-900">O que mais cai:</div>
        <div class="flex flex-wrap gap-2 mt-2">
          <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Verb to be</span>
          <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Present Simple</span>
          <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Interpretação</span>
        </div>
      </div>
    </div>

  </div>

  <script>
    function toggleResumo(id) {
      const el = document.getElementById(id);
      el.classList.toggle("hidden");
    }
  </script>

</body>

</html>