<?php

namespace App\Http\Controllers;

use App\Classes\Enc;
use App\Classes\Logger;
use App\Classes\Random;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Main extends Controller
{
    private $R;
    private $Enc;
    private $Logger;

    public function __construct()
    {
        $this->R = new Random();
        $this->Enc = new Enc();
        $this->Logger = new Logger();

    }

    public function index()
    {

        // Verifica se o Usuário está Logado
        if ($this->checkSession()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    private function checkSession()
    {
        return session()->has('usuario');
    }

    public function login()
    {

        // Verifica se existe a sessão
        if ($this->checkSession()) {
            return redirect()->route('index');
        }

        // Verificando se existe ERRO
        $erro = session('erro');
        $data = [];
        if (!empty($erro)) {
            $data = [
                'erro' => $erro,
            ];
        }

        // Apresenta o Formulário de Login
        return view('login', $data);
    }

    public function login_submit(LoginRequest $request)
    {
        // Verifica se houve submissão de formulário
        if (!$request->isMethod('post')) {
            return redirect()->route('index');
        }

        // Verifica se existe a sessão
        if ($this->checkSession()) {
            return redirect()->route('index');
        }


        // Validação dos Dados
        $request->validated();

        // Verificar dados de Login
        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario = Usuario::where('usuario', $usuario)->first();

        //  Verifica se Existe o Usuário
        if (!$usuario) {

            // LOG
            $this->Logger->log('error', trim($request->input('text_usuario')). ' - Não existe o Usuário.');

            //Usuário não existe
            session()->flash('erro', ['Não existe o Usuário.']);
            return redirect()->route('login');
        }

        // Verificar se a senha está correta
        if (!Hash::check($senha, $usuario->senha)) {

            // LOG
            $this->Logger->log('error', trim($request->input('text_usuario')). ' - Senha Inválida.');

            //Senha Invalida
            session()->flash('erro', ['Senha Inválida.']);
            return redirect()->route('login');
        }

        // Criar a Sessão (Se Login Ok!)
        session()->put('usuario', $usuario);

        // LOG
        $this->Logger->log('info', 'Realizou um Login.');

        return redirect()->route('index');
    }

    public function logout(){
        // LOG
        $this->Logger->log('info', 'Realizou um Logout.');

        // Realiza LOGOUT
        session()->forget('usuario');
        return redirect()->route('index');
    }

    public function home(){

        // Verifica se existe a sessão
        if(!$this->checkSession()){
            return redirect()->route('login');
        }

            $data = [
                'smstoken' =>$this->R->SMSToken(),
                'usuarios' => Usuario::all()
            ];

            return view('home', $data);
    }

    public function edit($id_usuario){

        $id_usuario = $this->Enc->desencriptar($id_usuario);

       echo 'O usuário a editar é : '.$id_usuario;
    }

    public function final($hash){

        $hash = $this->Enc->desencriptar($hash);
        echo 'valor: '. $hash;
    }

    public function upload(Request $request){

        // Validação do UPLOAD
        $validate = $request->validate(
            // Regras
            [
                'ficheiro' => 'required|image|mimes:jpg|max:100|dimensions:min_width=100,min_height=100,max_width=1000,max_height=500'
            ],
             // Mensagens de ERRO
             [
                 'ficheiro.required' => 'A imagem é obrigatória',
                 'ficheiro.image' => 'Ficheiro Inválido. Carregue uma imagem',
                 'ficheiro.mimes' => 'A imagem tem que ser em formato .jpg',
                 'ficheiro.max' => 'Imagem no máximo com 100 kB',
                 'ficheiro.dimensions' => 'Dimensões Inválidas'
             ]
        );


        $request->ficheiro->store('public/images');
        echo 'terminado';
    }

    public function lista_ficheiro(){
        $files = Storage::files('public/images');
        echo '<pre>';
        print_r($files);
    }

    public function dowload($file){
        return response()->dowload("storage/images/$file");
    }

    // public function temp(){

    //         $usuario = new Usuario;
    //         $usuario->usuario = 'user@gmail.com';
    //         $usuario->senha = Hash::make('abc123');
    //         $usuario -> save();

    //         echo 'terminado';

    // }



}
