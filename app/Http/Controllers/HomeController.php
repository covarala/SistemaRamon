<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Users;
use App\User;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Produto;
use App\Models\ValorProduto;
use App\Models\ImagensProdutos;
use App\Models\Telefone;
use Illuminate\Support\Facades\Hash;
use App\Models\ViewTelefone;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function produtos()
    {
        $produtos = DB::table('produto')->orderBy('nome', 'asc')->get();
        $valorProdutos = DB::table('valorproduto')->get();
        return view('admin.produtos',compact('produtos', 'valorProdutos'));
    }
    public function clientes()
    {
      $clientes = DB::table('users')->where('tipousuario','=','cliente')->orderBy('nome', 'asc')->get();
      $telefones = DB::table('telefonesusuarios')->get();

      return view('admin.clientes',compact('clientes', 'telefones'));
    }
    public function usuarios()
    {

      $usuarios = DB::table('users')->orderBy('nome', 'asc')->get();
        return view('admin.usuarios', compact('usuarios'));
    }
    public function distribuidor()
    {
        $distribuidores = DB::table('users')->where('tipousuario','=','distribuidor')->orderBy('nome', 'asc')->get();
        $telefones = ViewTelefone::all();

        return view('admin.distribuidor', compact('distribuidores', 'telefones'));
    }
    public function relatorio()
    {
        return view('admin.relatorio');
    }
    public function visaocliente()
    {
        return view('comuns.inicial');
    }
    public function visaodistribuidor()
    {
        return view('admin.visaodistribuidor');
    }

    public function viewAtualizaProduto($idProduto)
    {

      $valorProduto = ValorProduto::where('idProduto','=', "$idProduto")->first();
      $produto =  Produto::where('idProduto','=', "$idProduto")->first();
      return view('admin/atualiza/produto', compact('produto', 'valorProduto'));
    }
    public function viewCadastroProduto()
    {
      return view('admin/cadastro/produto');
    }
    public function excluiProduto($idProduto)
    {
      DB::table('produto')->where('idProduto', '=', $idProduto)->delete();
      return redirect()->route('admin.produtos')->with('status', 'Excluido com sucesso!');
    }
    public function updateProduto(Request $request)
    {
      $dadosValorProduto = [
        'idProduto' => $request->idProduto,
        'valor'  =>  $request->valorProduto,
      ];
      $dadosProduto = [
        'nome'  =>  $request->nome,
        'descricao'  =>  $request->descricao,
      ];
      $updateProduto = Produto::where('idProduto', '=', $request->idProduto)->update($dadosProduto);
      $updateValorProduto = ValorProduto::where('idProduto', '=', $request->idProduto)->update($dadosValorProduto);

      $img = $request->file('imagem');
      if ($img = $request->hasFile('imagem')) {

        $img = $request->file('imagem');
        $diretorioImg = storage_path("app\public\produto\\$idProduto->nome");

        $dadosImagem = [
          'idProduto' => $idProduto->id,
          'nomeHash' => $img->hashName(),
          'extensao' => $img->getClientOriginalExtension(),
          'nomeImagem' => $img->getClientOriginalName(),
          'diretorio' => $diretorioImg,
        ];
        $upload  = $img->store('public/produto'.'/'.$dados['nome']);

        ImagensProdutos::create($dadosImagem);


        if ( !$upload ){
          return redirect()->route('admin.produtos')->with('status', 'Falha ao fazer upload')->withInput();
        }
      }
      
      return redirect()->route('admin.produtos')->with('status', 'Editado com sucesso!');
    }
    public function cadastroProduto(Request $request)
    {
      $dados = $request->all();

      $dadosProduto = [
        'nome' => $dados['nome'],
        'descricao' => $dados['descricao'],
      ];


      $idProduto = Produto::create($dadosProduto);
      $dadosValorProduto = [
        'idProduto' => $idProduto->id,
        'valor' => $dados['valorProduto'],
      ];

      ValorProduto::create($dadosValorProduto);

      $img = $request->file('imagem');
      if ($img = $request->hasFile('imagem')) {

        $img = $request->file('imagem');
        $diretorioImg = storage_path("app\public\produto\\$idProduto->nome");

        $dadosImagem = [
          'idProduto' => $idProduto->id,
          'nomeHash' => $img->hashName(),
          'extensao' => $img->getClientOriginalExtension(),
          'nomeImagem' => $img->getClientOriginalName(),
          'diretorio' => $diretorioImg,
        ];
        $upload  = $img->store('public/produto'.'/'.$dados['nome']);

        ImagensProdutos::create($dadosImagem);


        if ( !$upload ){
          return redirect()->route('admin.produtos')->with('status', 'Falha ao fazer upload')->withInput();
        }
      }
      return redirect()->route('admin.produtos')->with('status', 'Cadastrado com sucesso!');
    }

    public function atualizaDistribuidor()
    {
      return null;
    }
    public function excluiDistribuidor()
    {
      return null;
    }
    public function cadastraDistribuidor()
    {
      // code...
    }


    public function viewAtualizaUsuario($idUsuario)
    {
      $usuario =  Users::where('id','=', "$idUsuario")->first();

      return view('admin/atualiza/usuario', compact('usuario'));
    }

    public function updateUsuario(Request $request)
    {
      $dados = $request->all();


      if (strlen($dados['password']) <= 5 || strlen($dados['password_confirm']) <= 5) {
        return redirect()->route('atualiza.usuario', $dados['id'])->with('status-senha', 'A senha deve ter no mínimo 6 caracteres');
      }
      if ($dados['password'] == null || $dados['password_confirm'] == null) {
        return redirect()->route('atualiza.usuario', $dados['id'])->with('status-senha', 'Senha não pode ser nula!');
      }
      if ($dados['password'] !== $dados['password_confirm']) {
        return redirect()->route('atualiza.usuario', $dados['id'])->with('status-senha', 'Senhas diferentes!');
      }
      $dados['password'] = Hash::make($dados['password']);


      $dadosUsuario = [
        'nome'  =>  $request->nome,
        'sobrenome'  =>  $request->sobrenome,
        'email'  =>  $request->email,
        'tipousuario'  =>  $request->tipousuario,
      ];

      if ($dadosUsuario['tipousuario'] === 'distribuidor') {
        $this->cadastraDistribuidor($dados['id']);
      }


      $updateUsuario = Users::where('id', '=', $request->idUsuario)->update($dadosUsuario);

      return redirect()->route('admin.usuarios')->with('status', 'Editado com sucesso!');
    }
}
