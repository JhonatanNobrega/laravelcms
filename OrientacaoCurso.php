<?php

    /*###################################################
    #### COMANDOS PARA INSTALAR E EXECUTAR O LARAVEL ####
    ####################################################*/

    /*  
        1. =>   Para puchar as informações do laravel globalmente
                'composer global require laravel/installer'
        
        2. =>   Depois de acessar a pasta onde vai ficar o projeto.
                'laravel new nomepastadoprojeto'

                Para a aulas no curso que usa o laravel 6
                'composer create-project --prefer-dist laravel/laravel:^6.0 LaravelCMS'
        
        3. =>   Para iniciar o servidor rodando o laravel
                'php artisan serve'

                Para finalizar o servidor é só dar o comando
                => CTRL + C
    */

    /*###################################################
    #### CONFIGURAÇÕES BASICAS ##########################
    ####################################################*/

    /*
        1. A pasta mais importando do projeto é a pasta 'public'
            No servidor vai ter que ser direcionado para essa pasta unica e exclusivamente
            Ou seja todas as outras pastas não vai esta acessivel para o mundo exterior. Apenas a pasta 'public'

        2. Geração 'Aplication Key'
            Após esta na pasta do projeto executar o comando
            'php artisan key:generate'

            Após executar esse comando, vai ser adicionado um hash no arquivo .env
            Vai esta na linha 3 APP_KEY=''
            
            Ele é usado para criptografar sessoes, cokies.. 

        3. Configuração do banco de dados
            Na pasta .env pode modificar as configurações que inicia com DB
            Exemplo:  DB_DATABASE, DB_USERNAME...
            ## Essas configurações vão para config/database.php

        4. Configuração do charset
            No arquivo config/database.php 
            Indo nas configurações de banco de dados 
            * mysql -> charset = 'utf8'
            * mysql -> collation = 'utf8_general_ci'
        
        5. Definindo nome da aplicação
            No arquivo .env APP_NAME
    /*

    /*###################################################
    #### ENTENDENDO A ESTRUTURA #########################
    ####################################################*/

    /*
        1. Pasta 'app' ... nada mais é o código principais e logicos do seu sistema.
        
        2. Pasta 'bootstrap' ... não tem nada a ver com o bootstrap criado pelos funcionarios do twiter
            Esse nome é usado para sistema de inicialização
            Se vermos o index da pasta public depois do carregamento automatico 
             ele pucha justamente essa pasta o arquivo app.php
        
        3. Pasta 'config' ... nele tem os evetuais arquivos de configurações
        
        4. Pasta 'database' ... trata de assuntos relacionados ao banco de dados.
            Nessa pasta tem uma pasta chamada 'migrations' 
             no decorrer do curso vamos endender o que é roda migrations!
        5. Pasta 'public' pasta do mundo exterior.
        
        6. Pasta 'resources' ... pasta com arquivos .js, .css, linguagem e html
            'js' => arquivos JavaScrip
            'lang' => arquivos de linguagem
            'sass' => arquivos CSS (No caso pré processador de css)
            'views' => HTML

            ## Obs. Aqui são recursos que precisara ter um pré processamento antes de serem visto na pasta public

        7. Pasta 'routes' ... cada arquivos nessa pasta é para situação expecificas
            O mais usado é o web.php
             E é justamente nesse pasta que fica as rotas.
             Rotas são todas as URL possiveis do seu sistema.
        8. Pasta 'storege' ... guardar arquivos por exemplo imagem recebida pelos usuarios
            Colocar dentro de app/public
            Depois faz um link para conseguir acessar pela pasta principal 'public'
        
        9. Pasta 'tests' ... qualquer tipo de teste programatico que desejar fazer coloca dentro dessa pasta

        10. Pasta 'vendor' ... a pasta do composer, nela vai esta tudo o que vai ser instalado pelo composer.

    */

    /*###################################################
    #### ROTAS BASICAS  #################################
    ####################################################*/

    /*
        As principais são routes/ web.php e api.php

        Diferenças entre a web e a api
        A web, vai aproveitar tudo que um navegador oferece SESSÕES, COKKEIS... 
        A api, não tem sessions e cokkies isso porque ela precisa ser liberada para as aplicações que vai se alimentar
         nesse caso ainda não entendo, mas tem como definir quem pode consumir essa api

        Nas rotas tem o 'console.php' é usado quando é usado o terminal para executar comandos
        E o 'channels.php' é usado para canais, socket que vai se abordado no curso.. 

    */

    /* 
    | Exemplo de rota, essa rota carrega apenas um view no caso é o arquivo localizado em
    | resources/welcome.blade.php

    | O 'get' a baixo é basicamente o método do acesso. Então requisição do tipo post não vai entrar aqui!
    */
    Route::get('/', function () {
        return view('welcome');
    });

    /*
    | Exemplo de rota statica
    */
    Route::view('/teste', 'teste');

    /*
    | Redirecionar para outra rota
    */
    Route::redirect('/', '/teste');

    /*###################################################
    #### ROTAS COM PARAMETROS ###########################
    ####################################################*/

    /*
    | Rota com parametros é usado para uso dinamico
    | A string dentro de { } se transforma em uma variavel que pode ser recebida na função e usada
    */
    Route::get('/noticia/{slug}', function($slug){
        echo 'Slug..=> '.$slug;
    });

    /*###################################################
    #### ROTAS COM REGEX + PROVIDER #####################
    ####################################################*/

    /*
        Uso de expressão regulares
         Abaixo temos um exemplo de rota com o mesmo padrão
          Mas caso seja enviado um nome vai ser acessado uma rota
           Se for um numero é outra rota
    */
    Route::get('/user/{nome}', function($nome){
        echo 'Mostrando usuario de Nome '.$nome;
    })->where('nome', '[a-z]+');

    Route::get('/user/{id}', function($id){
        echo 'Mostrando usuario do ID '.$id;
    })->where('id', '[0-9]+');

    /*
        O conceito de PROVIDE, é usado para eu definir padroes do exemplo acima
        Tipo sempre que eu coloco um parametro com nome 'id' isso quer dizer que 
         para ser possivel acessar vai ter que receber um 'id'

        Para criar um padrão deve acessar app/Providers/RouteServiceProvider.php 
         Ir na FUNÇÃO 'boot'

        Route::pattern('id', '[0-9]+');
        Route::pattern('nome', '[a-z]+');

        Feito esse padrão não precisa mais definir o where como os exemplos acima
    */

    /*###################################################
    #### ROTAS COM NOME + REDIRECT ######################
    ####################################################*/

    /*
    | O exemplo a baixo eu recebo o link da roda após nomeala 
    |  Obs. Pensando nisso mesmo que a rota muda na url ela vai sempre ser o nome definido
    |  Então tudo fica dinamico e nunca vai sair do controle porque esta nomeada.
    */
    Route::get('config', function(){
        $link_info = route('info');
        return view('config');
    });
    
    Route::get('config/info', function(){
        echo 'Config Info';
    })->name('info');

    /*
    | O exemplo a baixo faz o redirecionamento pelo nome definido na rota acima
    */
    Route::get('config', function(){
        
        return redirect()->route('info');
        
        return view('config');
    });

    /*###################################################
    #### GRUPO DE ROTAS #################################
    ####################################################*/

    /*
    |   Grupos de rotas é uso quando se trata de pré-fixo
    */

    Route::prefix('/config')->group(function(){

        Route::get('/', function(){
            return view('config');
        });
    
        Route::get('info', function(){
            echo 'Config Info';
        })->name('info');
    
    });

    /*###################################################
    #### FALLBACK DE ROTAS (404) ########################
    ####################################################*/

    /*
        Essa rota é recomendado que seja sempre no final das rotas
        FallBack é uma auternativa caso alguma coisa não funcionar
    */

    Route::fallback(function(){
        return view('404');
    });

    /*###################################################
    #### ROTAS + CONTROLLERS ############################
    ####################################################*/

    /*
        Para criar um novo controller, acesse a pasta app/Http/Controllers
        A criação pode ser feita manual e organizar por pastas
         Ou pode ser criado atraves de comandos no terminal
          use o comando:  'php artisan make:controller NomeController'
    */

    Route::prefix('/config')->group(function(){

        Route::get('/', 'ConfigController@index');
    
        Route::get('info', 'ConfigController@info')->name('info');
    
    });

    /* 
        Obs. Caso eu tenha uma rota que só chama um controller e não diz a action deve ver isso
        Dentro do controller chamado
    */
    
    /*public*/ function __invoke()
    {
        echo 'Essa função é o padrão tipo index do MVC';
    }

    /*###################################################
    #### CONTROLLERS E NAMESPACES #######################
    ####################################################*/

    /*
        O laravel suporta que eu faça divições de pasta até nos controller

        Para isso é preciso definir nas rotas as pastas alem do namespace do controler
    */

    //  namespace App\Http\Controllers\{NOME DA PASTA QUE ESTA O CONTROLLER};

    /*  Como a classe controle 'extends' a Controller tem que dar um 'use' nela como abaixo    */
    //  use App\Http\Controllers\Controller;

    // Para usar esse controle tem que setar uma barra invertida para indicar a pasta que esta no namespace
    Route::get('/', 'Admin\ConfigController@index');

    /*###################################################
    #### ENTENDENDO O REQUEST (1/2) #####################
    ####################################################*/

    /*
        Todo controller tem 'use Illuminate\Http\Request'
        É justamente ele que vamos entender agora!

        Ele é recebido como parametro na função dos CONTROLLER.
        Para receber ele basta colocar 'Request $request'

        O request é usado para receber 'cabeçalhos da requisição, valores enviados via formulario, 
         ou via própria querystring, arquivos enviados, tudo relacionado a requisições'
    */

    /*  Para saber qual URL foi acessada  */
    $url = $request->url();
    
    /*  Para saber o método da requisição  */
    $method = $request->method();

    /*  Retorna um array com todos os dados enviados  */
    $data = $request->all(); //Paga em qualquer tipo de requisição

    /*  Pega um dados especifico  */
    $data = $request->input('nome'); // Paga do corpo (post) COMO PRIORIDADE ou da url (get)
    /*  Obs. o segundo parametro é o padrao caso não ache o nome por exemplo  */
    $data = $request->query('nome', 'Visitante'); // Paga apenas da url (get)

    /*###################################################
    #### ENTENDENDO O REQUEST (2/2) #####################
    ####################################################*/

    /*  Verifica se foi enviado o campo por exemplo 'estado'  */
    if($request->has('estado')){} // Esse modo não verifica se esta preenchido, apenas se foi enviado
    if($request->filled('estado')){} // Esse modo verifica se foi enviado e se esta preenchido
    if($request->missing('estado')){} // Verifica se NÃO EXISTE

    /*
        IMPORTANTE! O laravel usa segurança 'CSRF' que deve ser colocado após abrir a tag <form>
        Coloca-se  @csrf
    */

    /*  Pegar campos especificos, mesmo que seja enviado mais coisas  */
    $data = $request->only( ['nome', 'idade'] ); // Como parametro recebe um array com todos os campos

    $data = $request->except( ['idade'] ); // É o contrario do exemplo acima, paga tudo mundo exeto o que eu dizer
    
    /*###################################################
    #### BLADE: RECEBENDO DADOS NO VIEW #################
    ####################################################*/

    /*
        Para mandar dados do controle para o view pode colocar segundo parâmetro um array com os dados assim como no MVC.
        Para dar um echo em uma variável no view faz assim  {{$nome}}
    */

    /*###################################################
    #### DADOS GLOBAIS ##################################
    ####################################################*/

    /*
        Criação de variável global.
        app/Providers/AppServiceProvider.php
        Coloca na função boot
        View::share('variavelNome', 'Valor');
        Mas tem que importar o view
        use Iluminate\Suppote\Facades\View
    */

    /*###################################################
    #### BLADE: DEFININDO UM TEMPLATE ###################
    ####################################################*/

    /*
        Em views pode criar um pasta chamada layout e pode criar o templete..
        Para dizer onde vai receber conteúdo dinâmico use o codigo:  @yield('variavel')
        Agora no view faz assim:  
        @extends('layout.templete)
        @section('variavel', 'valor')
        Ou se tiver muito conteúdo
        @section('variavel')
            Conteúdo
        @endsection
    */

    /*###################################################
    #### BLADE: CONDICIONAIS ############################
    ####################################################*/
    
    /*
        @if(condicao)
        @elseif(condicao)
        @else 
        @endif 

        @isset(estasetado)
        @endisset

        @empty(vazio)
        @endempty 
    */

    /*###################################################
    #### BLADE: CONDICIONAIS ############################
    ####################################################*/

    /*
        @for(condição)   @endfor
        @foreach($itens as $iten) @endforeach
        @while(condição)   @endwhile

        #### Esse loop tem a opção de definir quando itens for fazio
        @forelse($itens as $item)   @empty  @endforelse  
    */

    /*###################################################
    #### BLADE: COMPONENTES #############################
    ####################################################*/

    /*
        São caixa de códigos já prontos para reutilizalos

        É bem semelhante ao funcionamento do layout.
        No arquivo do componete pode usar essas formas de variavel

        {{$slog}}  // Valor padrão que pode ser passado facilmente pelo view
                   // Se notar não precisa especificar nome de variavel para uso deste.

        Uso simples: 
        @component('components.aviso')  Texto que vai subtituir a variavel slot  @component

        Se tenho que passar mais que uma variavel, posso definir qualquer nome de variavel e passar dessa forma.
        {{$variavelQualquer}} // dentro do component

        @component('components.aviso')
            @slot('variavelQualquer')
                Valor que vai subistituir a variavel no component
            @endslot
            Texto que vai subtituir a variavel slot  // nesse caso o padrão simple
        @component

        OBSERVAÇÃO, SE EU QUISER CRIAR UM COMPONENT PARA USAR O NOME DELE em VEZ de informar onde ele esta:

            exemplo:
                @alert
                    Mensagem que subistitui o slot
                @endalert

        Para fazer isso é preciso sequir os passos abaixo:
        
        1. app/Providers/AppServiceProvider.php 
        Define  'use Illuminate\Support\Facades\Blade;'

        2. Na função boot aplica assim: 
        Blade::component('caminhoComponente', atalhoParaUsarNoView);

    */

    /*###################################################
    #### CRIANDO UM CRUD BÁSICO #########################
    ####################################################*/

    /*
        Pra conectar ao banco de dados direto no controller
        'use Illuminate\Support\Facades\DB;'

        $variavel = DB::select('SELECT * FROM dados');
        $variavel = DB::select('SELECT * FROM dados WHERE status = ?', ['1']);

        Depois que mandar para o view e dar o foreach pode usar um objeto para mostrar na tela
        exemplo:  {{$item->NomeCampo}}

        Para criação de link com parametros:
        
        // A forma em baixo usa rota nomeada
        exemplo:  <a href="{{   route('grupo.action', ['id'=>$item->id])   }}">Link</a>

        // A forma a baixo usa a rota em si sem parametros
        exemplo:  <a href=" {{  url('/admin')  }} ">Link</a>

        if($request->filled('name')){
            $valorRecebido = $request->input('name');

            DB::insert('INSERT INTO dados (name) VALUES (:name)', [
                'name' => $valorRecebido
            ]);
        }

        Para redirecionar no final da inserção
        return redirect()->route('grupo.action');

        CONCEITO DE FLASH (Enviar mensagem quando algo não deu certo)
            Uma vez exibida a mensagem é deletada é amazenado no session

        Ainda no exemplo acima só que no else.
        else{
            return redirect()
                ->route('grupo.add')
                ->with('warning', 'Você não preenchou o campo name XYX');
        }

        no view pode exibir a mensagem assim.
        @if(session('warning'))
            @alert
                {{session('warning')}}
            @endalert
        @endif

        Para coletar dados e criar uma pagina de edição

        no controler vai receber por parametro o item que quer editar. Exemplo 'id'

        $data = DB::select('SELECT * FROM dados WHERE id = :id', [
            'id'=>$id
        ]);

        if(count($data)>0){
            return view('grupo.editar', [
                'data' => $data[0]
            ]);
        } else {
            return redirect()->route('grupo.list');
        }

        COMANDO
        // OBSERVAÇÃO:  na rota pode tem que receber o id e pode enviar assim como no get por parametro
        DB::update('UPDATE dados SET nome = :nome' WHERE id = :id, [
            'nome' => $nome
            'id' => $id
        ])

        BD::delete('DELETE FROM dados WHERE id = :id', [
            'id' => $id
        ])
    */

    /*###################################################
    #### VALIDAR FORMULÁRIOS ############################
    ####################################################*/

    /*
        No controller que recebe os dados:

        $request->validate([
            'name' => ['required', 'string']
        ]);

        No view fica dessa forma:
            @if($errors->any())
                @alert
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                @endalert
            @endif
    */

    /*###################################################
    #### ELOQUENT ORM (1/2) #############################
    ####################################################*/

    /*
        Comando no cmd para criar um model
        'php artisan make:model NomeTabelaSingular'
        
        exemplo tenho uma tabela 'Spotifts'
        'php artisan make:model Spotify'

        O model fica em app/Spotify
        ## Algumas coisas pode ser definido manual, mas é geralmente tudo automatico
        
        protected $table = 'tabela'; // Se não definir o laravel vai dizer que é 'spotifys'
        protected $primaryKey = 'id'; // Por padrão o laravel já sabe que usamos 'id', mas se for outro pode colocar
        public $incrementing = false; // O laravel já vem como true porque id é sempre auto incremente
        protected $keyType = 'string'; // O laravel encara o id como INT, mas se for uma string tem que dizer para ele.

        || O laravel por padrão sempre vai colocar datas na coluna  'created_at' e 'updated_at'
        || Então sempre ele acha que tem essas colunas, vai dar erro se esse campo não existir.
        Enttão para cancelar isso, tem que colocar essa informaçao para trocar o padrão
        public $timestamps = false;

        Ou então poderá mudar os valores da coluna padrão para o seu uso
        exemplo:
        const CREATED_AT = 'data_criado';
        const UPDATED_AT = 'data_atualizado';
    */


    /*###################################################
    #### ELOQUENT ORM (2/2) #############################
    ####################################################*/

    /*
        Para usar o model criado
        'use App\Spotify;'

        Comando
        $lista = Spotify::all(); // Pega tudos os registros
        $lista = Spotify::where('status', 1)->get(); // Pega filtrando pelo status
        $lista = Spotify::where('status', 1)->first(); // Pega apenas o primeiro resultado com o filtro
        $lista = Spotify::where('status', 1)->where('outroCampo', 'ativo')->first(); // Pega apenas o primeiro resultado com 2 filtros
        $lista = Spotift::where('status', 1)->orWhere('id', 2)->get(); // Uso do OR (OU)
        $lista = Spotift::find(2) // Aqui pesquisa pelo 'id'
        $lista = Spotift::find( [ 1, 2 ] ) // Aqui pesquisa pelo 'id' nesse caso mais que 1 item

        $qt = Spotify::where('status', 1)->count(); // Conta quantos resultados tem

        Adicionar informação ao banco
        $p = new Spotify;
        $p->name = 'Valor a adicionar';
        $p->save();

        Editar informação
        $p = Spotify::find(1); // Selecionei um item pelo id
        $p->name = 'Novo valor do campo';
        $p->save();

        Deletar
        $p = Spotify::find(1);
        $p->delete();

        Editar itens em massa
        Spotify::where('status', 1)->update([
            'status' => 2
        ]);
        // Dessa forma acima todos os itens achados vai estar com status 2

        Deletar em massa
        Spotify::where('status', 1)->delete();

        // Uso de joins
        https://laravel.com/docs/8.x/queries#joins
    */

    /*###################################################
    #### RESOURCE CONTROLLER ############################
    ####################################################*/

    /*
        Comando   'php artisan make:controller TodoController --resource'

        Criara um controller pronto para usar todos os meios possiveis de GRUD

        As rotas fica simplificadas de pode usar apenas uma linha

        Route::resource('todo', 'TodoController');

        *
        |   GET - /todo - index - todo.index - LISTA OS ITENS
        |   GET - /todo/create - create - todo.create - FORM DE CRIAÇÃO
        |   POST - /todo - store - todo.store - RECEBEOS DADOS DO ADD ITEM
        |   GET - /todo/{id} - show - todo.show - ABRE 1 ITEM PARA MAIS DETALHES
        |   GET - /todo/{id}/edit - edit - todo.edit - FORMULARIO DE EDIÇÃO
        |   PUT - /todo/{id} - update - todo.update - RECEBE DADOS E ATUALIZA O ITEM
        |   DELETE - /todo{id} - destroy - todo.destroy - DELETAR O ITEM
        *
    */

    /*###################################################
    #### MIDDLEWARE: O QUE É E PRA QUE SERVE? ###########
    ####################################################*/

    /*
        Ele é uma caixa de código que roda no meio
        Tipo antes de mandar solicitação ao controller
        Dessa forma que é feito o sistema de login por exemplo.

        Na rota pode definir qual é o middleware
        Exemplo:  Route::get('/admin', 'Adimin\ConfigController@index')->middleware('auth');
    */

    /*###################################################
    ####  AUTENTICAÇÃO (1/4) ############################
    ####################################################*/
