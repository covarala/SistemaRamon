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
      $produtos = DB::table('produto')->join('valorproduto', 'produto.id', 'valorproduto.idProduto')
      ->orderBy('valor', 'asc')->get();
      return view('admin.produtos', compact('produtos'));
    }
    public function clientes()
    {
      $clientes = DB::table('users')->where('tipoUsuario','=','cliente')->orderBy('nome', 'asc')->orderBy('qntOrcPed')->get();
      $telefones = DB::table('telefonesusuarios')->get();

      return view('admin.clientes',compact('clientes', 'telefones'));
    }
    public function usuarios()
    {
      $usuarios = DB::table('users')->orderBy('tipoUsuario', 'asc')->get();
      return view('admin.usuarios', compact('usuarios'));
    }
    public function distribuidor()
    {
        $distribuidores = DB::table('users')->join('juridica', 'users.id', '=', 'idUser')
        ->where('distribuidor','=',true)->orderBy('nome', 'asc')->get();
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
    public function visaoDistribuidores()
    {
      // $orcamentosRecebidos = DB::table('orcamento')->join('users','users.id','idEmissor')->get();
      $distribuidores = DB::table('users')->join('juridica', 'users.id', '=', 'idUser')
      ->where('distribuidor','=',true)->orderBy('nome', 'asc')->get();
      return view('admin.visaodistribuidor', compact('distribuidores'));
    }
    public function viewVisaoDistribuidor($idUser)
    {
      $orcamentosRecebidos = DB::table('orcamento')->join('users','users.id','idEmissor')
        ->where('idRecebedor', '=',$idUser)->orderBy('idEmissor')->get();
      // $orcamentosEfetuados =
      return view('distribuidor.orcamentosrecebidos', compact('orcamentosRecebidos'));
    }

    public function viewAtualizaProduto($idProduto)
    {

      $valorProduto = ValorProduto::where('idProduto','=', "$idProduto")->first();
      $produto =  Produto::where('id','=', "$idProduto")->first();
      return view('admin.atualiza.produto', compact('produto', 'valorProduto'));
    }
    public function viewCadastroProduto()
    {
      return view('admin/cadastro/produto');
    }
    public function excluiProduto($idProduto)
    {
      $teste = Produto::destroy($idProduto);
      $produtos = DB::table('produto')->join('valorproduto', 'produto.id', 'valorproduto.idProduto')
        ->orderBy('valor', 'asc')->get();
        return redirect()->route('admin.produtos', compact('produtos'))->with('status', 'Excluido com sucesso!');
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

      $img = $request->file('imagem');

      if ($img = $request->hasFile('imagem')) {


        $img = $request->file('imagem');
        $diretorioImg = storage_path("app\public\produto\\".$dadosProduto['nome']);



        $dadosImagem = [
          'idProduto' => $dadosValorProduto['idProduto'],
          'nomeHash' => $img->hashName(),
          'extensao' => $img->getClientOriginalExtension(),
          'nomeImagem' => $img->getClientOriginalName(),
          'diretorio' => $diretorioImg,
        ];
        $upload  = $img->store('public/produto'.'/'.$dadosProduto['nome']);
        $updateProduto = Produto::where('id', '=', $request->idProduto)->update($dadosProduto);
        $updateValorProduto = ValorProduto::where('idProduto', '=', $request->idProduto)->update($dadosValorProduto);

        ImagensProdutos::create($dadosImagem);
        if ( !$upload ){
          return redirect()->route('admin.produtos')->with('status', 'Falha ao fazer upload da imagem')->withInput();
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




      $img = $request->file('imagem');

      if ($img = $request->hasFile('imagem')) {

        $img = $request->file('imagem');
        $diretorioImg = storage_path("app\public\produto\\".$dadosProduto['nome']);

        $dadosNovoProduto = Produto::create($dadosProduto);

        $dadosValorProduto = [
          'idProduto' => $dadosNovoProduto->id,
          'valor' => $dados['valorProduto'],
        ];

        $dadosImagem = [
          'idProduto' => $dadosValorProduto['idProduto'],
          'nomeHash' => $img->hashName(),
          'extensao' => $img->getClientOriginalExtension(),
          'nomeImagem' => $img->getClientOriginalName(),
          'diretorio' => $diretorioImg,
        ];
        $upload  = $img->store('public/produto'.'/'.$dadosProduto['nome']);

        ValorProduto::create($dadosValorProduto);
        ImagensProdutos::create($dadosImagem);
        if ( !$upload ){
          return redirect()->route('admin.produtos')->with('status', 'Falha ao fazer upload da imagem')->withInput();
        }
        return redirect()->route('admin.produtos')->with('status', 'Cadastrado com sucesso!');
      }
      return redirect()->route('admin.produtos')->with('status', 'Erro ao cadastrar!')->withInput();

    }

    public function viewJuridicasCadastradas()
    {
      $distribuidores = DB::table('users')->join('juridica', 'users.id', '=', 'idUser')->get();
      return view('admin/cadastro/distribuidor', compact('distribuidores'));
    }
    public function changeDistribuidor(Request $request, $idUser)
    {

      if ($request['atual'] === 'distribuidor')
      {
        if($idUser === "2"){
          return redirect()->route('view.juridicas.cadastradas')->with('status', 'Esse usuário não pode ser alterado!');
        }
        Juridica::where('idUser','=',$idUser)->update(['distribuidor' => false]);
        Users::where('id','=',$idUser)->update(['tipoUsuario' => 'cliente']);
        return redirect()->route('view.juridicas.cadastradas')->with('status', 'Alterado com sucesso!');
      }
      else {
        Juridica::where('idUser',$idUser)->update(['distribuidor' => true]);
        Users::where('id','=',$idUser)->update(['tipoUsuario' => 'distribuidor']);
        return redirect()->route('view.juridicas.cadastradas')->with('status', 'Alterado com sucesso!');
      }
    }

    // public function excluiDistribuidor($idUser)
    // {
    //   $request = new Request;
    //   $request['atual'] = 'distribuidor';
    //   $request['exclusao'] = 'true';
    //   $this->changeDistribuidor($request , $idUser);
    // }


    public function viewAtualizaUsuario($idUsuario)
    {
      $usuario =  Users::where('id','=', "$idUsuario")->first();

      if ($usuario->tipoUsuario === 'admin') {
        return view('admin/atualiza/usuario', compact('usuario'));
      }else {
        return redirect()->route('admin.usuario')->with('status', 'Não é possível alterar usuarios que não seja administradores!');

      }

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
        'tipoUsuario'  =>  $request->tipoUsuario,
      ];

      if ($dadosUsuario['tipoUsuario'] === 'distribuidor') {
        $this->cadastraDistribuidor($dados['id']);
      }


      $updateUsuario = Users::where('id', '=', $request->idUsuario)->update($dadosUsuario);

      return redirect()->route('admin.usuarios')->with('status', 'Editado com sucesso!');
    }
    public function excluiUsuario($idUser)
    {
      $dadoUser = Users::find($idUser);
      if($dadoUser->tipoUsuario === 'admin')
      {
        Users::destroy($idUser);
        return redirect()->route('admin.usuarios')->with('status', 'Usuário removido com sucesso!');
      }
      else {
        return redirect()->route('admin.usuarios')->with('status', 'Não é possível remover usuários que não são administradores!');
      }
    }
    public function viewCadastroUsuario()
    {
      return view('admin/cadastro/usuario');
    }
    public function cadastroUsuario(Request $request)
    {
      $dados = $request->all();

      foreach ($dados as $dado => $value) {
        if ($value === null) {
          if (strcmp($dado, 'button')) {
            return redirect()->route('cadastro.usuario')->with('status', 'Campo obrigatório!')->withInput();
          }
        }
      }
      if ($dados['password'] == null || $dados['password_confirm'] == null) {

        return redirect()->route('cadastro.usuario')->with('status-senha', 'Senha não pode ser nula!')->withInput();
      }
      if (strcmp($dados['password'], $dados['password_confirm'])) {

        return redirect()->route('cadastro.usuario')->with('status-senha', 'Senhas diferentes!')->withInput();
      }
      $dados['password'] = Hash::make($dados['password']);
      $dadosBanco = Users::where('email', '=' ,$dados['email'])->first();
      if ($dados['email'] === $dadosBanco['email']) {
        return redirect()->route('cadastro.usuario')->with('status-email', 'Email já cadastrado!')->withInput();
      }
      $dadosUsers = [
        'nome' => $dados['nome'],
        'sobrenome' => $dados['sobrenome'],
        'password' => $dados['password'],
        'email' => $dados['email'],
        'tipoUsuario' => $dados['tipoUsuario'],
      ];

      Users::create($dadosUsers);
      return redirect()->route('admin.usuarios')->with('status', 'Cadastro efetuado com sucesso');
    }
}
