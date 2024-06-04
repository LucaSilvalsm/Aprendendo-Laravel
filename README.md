<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## SOBRE O PROJETO

## RESUMO DO PROJETO

Nesse codigo, aprendo a realizar um CRUD usando o Laravel versão 10, junto com toda a estrutura que o Framework, nele tambem aprendo Sobre construção de Uma API junto de como consumir ela

## COMANDO DO PROJETOS

* php artisan make:controller Usuario


Para criar o controller do Usuario aonde nele eu realizo todos os metodos utilizado nesse projeto, junto com a validação basica do Form, e da API 

Para retornar todos os Usuarios Criado no Sistemas : utilizo o metodo index

 Esse para a view e tela

    //    public function index()
    {
        $usuarios = ModelsUsuario::orderBy('id')->get();
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

Utilizo a propriedade Hash para criptografar a senha 

      public function setSenhaAttribute($password) // para deixar a senha hash e deixa ele de forma mais segura
    {
        $this->attributes['senha'] = Hash::make($password);
    }

 E tambem uso o required para validar o form, dizendo quais campos são obrigatorios 

      public function rulesForCreate(): array
    {
        return [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'senha' => 'required',
            'confirmacaoSenha' => 'required|same:senha',
        ];
    }
    public function rulesForUpdate(): array
    {
        return [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',

        ];

    }
    public function messages(): array
    
    {
        return [
            'nome.required' => 'Campo nome é obrigatorio',
            'telefone.required' => 'Campo telefone é obrigatorio',

            'email.required' => 'Campo email é obrigatorio',
            'senha.required' => 'Campo senha é obrigatorio',
            'confirmacaoSenha.required' => 'Campo confirme a sua senha  é obrigatorio',
        ];
    }

 E esse para AQUI EU FALO DA API

    * Route::get('usuario', [Usuario::class, 'apiIndex']); // retorna todos os usuarios

            Nessa rota eu faço uma ordenação do menor para o Maior, assim listando todos os Usuarios identificado pelo ID 


    * Route::get('usuario/{id}',[Usuario::class,'apiShow']); // retornar ele pelo ID
  
            Aqui eu realizo uma busca aonde o sistema me retorna o Usuario completo apenas pelo ID 

    * Route::post('usuario/store',[Usuario::class,'apiStore']); // criando um usuario
   
            Aqui é aonde se cria um usuario inserindo todos os dados 

    * Route::put('usuario/update/{id}',[Usuario::class,'apiUpdate']); // atualizar o Cadastro
  
            Para Atualizar o usuario pelo ID, ai ele atualiza diretamente ja inserindo no banco 

    *   Route::delete('usuario/{id}', [Usuario::class, 'apiDestroy']); // Deletar o usuario pelo ID




       
