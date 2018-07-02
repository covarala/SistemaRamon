<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use App\Models\Produto;
use App\Models\ProdutoDistribuidor;
use App\Models\ValorProduto;
use App\Models\Orcamento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Users::create(
        [
          'nome'    => 'André',
          'sobrenome'    => 'Oliveira Braga',
          'email'   => 'andrebraga@email.com',
          'password'=> bcrypt('nptsr123'),
          'tipoUsuario'=> 'admin',
        ]
        );
       Users::create(
        [
          'nome'    => 'Grawl',
          'sobrenome'    => 'Desenvolvimentos',
          'email'   => 'grawldesenvolvimentos@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'distribuidor',
        ]
        );
      Users::create(
        [
          'nome'    => 'Georgia',
          'sobrenome'    => 'Souza Gomes Barbosa',
          'email'   => 'georgiabarbosa@email.com',
          'password'=> bcrypt('654321'),
          'tipoUsuario'=> 'admin',
        ]
        );
      Users::create(
        [
          'nome'    => 'Lucas',
          'sobrenome'    => 'Guimarães Pereira',
          'email'   => 'lucasgp@email.com',
          'password'=> bcrypt('987654'),
          'tipoUsuario'=> 'admin',
        ]
        );
      Users::create(
        [
          'nome'    => 'Sueli',
          'sobrenome'    => 'Catarina Isabelle Pinto',
          'email'   => 'suelicatarina@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Heitor',
          'sobrenome'    => 'Paulo Melo',
          'email'   => 'heitormelo@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Joana',
          'sobrenome'    => 'Adriana Isabel Moreira',
          'email'   => 'joanamoreira@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Eduardo',
          'sobrenome'    => 'Emanuel Tomás Caldeira',
          'email'   => 'eduardoemanueltomascaldeira@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Teresinha',
          'sobrenome'    => 'Mariah Sales',
          'email'   => 'teresinhamariahsales@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Emanuel',
          'sobrenome'    => 'Luan Nicolas Barros',
          'email'   => 'emanuelluan@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'distribuidor',
        ]
        );
      Users::create(
        [
          'nome'    => 'Letícia',
          'sobrenome'    => 'Alessandra Gonçalves',
          'email'   => 'leticiagoncalves@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'distribuidor',
        ]
        );
      Users::create(
        [
          'nome'    => 'Lucas',
          'sobrenome'    => 'Guimarães Pereira',
          'email'   => 'lucasgp59@gmail.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'distribuidor',
        ]
        );
        Users::create(
          [
            'nome'    => 'Rapadura',
            'sobrenome'    => 'Mônada',
            'email'   => 'rapaduramonada@email.com',
            'password'=> bcrypt('123456'),
            'tipoUsuario'=> 'admin',
          ]
        );

      Telefone::create(
        [
          'telefone'    => '(79) 99111-2395',
          'idUser'    => '5',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(67) 98957-4080',
          'idUser'    => '6',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(86) 98811-4127',
          'idUser'    => '7',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(82) 99980-5971',
          'idUser'    => '8',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(67) 99870-6244',
          'idUser'    => '9',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(11) 98724-3570',
          'idUser'    => '10',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 98841-8575',
          'idUser'    => '11',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(67) 99536-4237',
          'idUser'    => '6',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(11) 98216-7713',
          'idUser'    => '10',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 99995-6120',
          'idUser'    => '11',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 98845-6120',
          'idUser'    => '13',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(38) 98851-6120',
          'idUser'    => '13',
        ]
        );
      Fisica::create(
        [
          'cpf'    => '837.432.212-84',
          'idUser'    => '5',
        ]
        );
      Fisica::create(
        [
          'cpf'    => '501.579.968-32',
          'idUser'    => '6',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '32.831.932/0001-72',
          'inscricaoEstadual'    => '516.183.070.010',
          'distribuidor'    => '0',
          'idUser'    => '7',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '74.947.958/0001-20',
          'inscricaoEstadual'    => '273.925.520.737',
          'distribuidor'    => '0',
          'idUser'    => '8',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '59.312.703/0001-06',
          'inscricaoEstadual'    => '',
          'distribuidor'    => '0',
          'idUser'    => '9',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '44.022.204/0001-07',
          'inscricaoEstadual'    => '403.528.598/8500',
          'distribuidor'    => '1',
          'idUser'    => '10',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.266.283/0001-90',
          'inscricaoEstadual'    => '513.860.441/4929',
          'distribuidor'    => '1',
          'idUser'    => '11',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.256.283/0001-90',
          'inscricaoEstadual'    => '513.945.441/4929',
          'distribuidor'    => '1',
          'idUser'    => '12',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.956.283/0001-90',
          'inscricaoEstadual'    => '845.945.441/4929',
          'distribuidor'    => '1',
          'idUser'    => '13',
        ]
        );
      Produto::create(
        [
          'nome' => 'Individual',
          'descricao' => 'Em BOPP (sistema Flow Pack), código de barras GS1, validade, informação nutricional e demais informações.',
        ]
        );
      Produto::create(
        [
          'nome' => 'SM',
          'descricao' => 'Contém 04 barras de 25g. Validade, informação nutricional e demais informações.',
        ]
        );
      Produto::create(
        [
          'nome' => 'Display',
          'descricao' => 'Contém 18 barras de 25 g. Embalagem moderna, selada com poliolefínico, informação nutricional, validade, código de barra GS1 e demais informações.',
        ]
        );
      Produto::create(
        [
          'nome' => 'CaixaMasterIndividual',
          'descricao' => 'Com 400 barras de 25g. Para atender a merenda escolar, cantinas, cozinhas industriais e demais segmentos que não necessitam da embalagem intermediária.',
        ]
        );
      Produto::create(
        [
          'nome' => 'CaixaMasterSm',
          'descricao' => 'Com 56 embalagens de 100g. Peso: 5,6 Kg',
        ]
        );
      Produto::create(
        [
          'nome' => 'CaixaMasterDisplay',
          'descricao' => 'Com 32 embalagens de 450g. Peso: 14,4 Kg.',
        ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Dolres Benfica de Aguiar',
            'numero'    => '425',
            'bairro'   => 'Várzea da Olaria',
            'cidade'=> 'Itaúna',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '35681-353',
            'idUser'=> '10',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Alípio José de Souza',
            'numero'    => '407',
            'bairro'   => 'Laranjeiras',
            'cidade'=> 'Uberlândia',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '38410-226',
            'idUser'=> '11',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua VL - 40',
            'numero'    => '817',
            'bairro'   => 'Nova Contagem',
            'cidade'=> 'Contagem',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '32050-035',
            'idUser'=> '5',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Turmalina',
            'numero'    => '338',
            'bairro'   => 'Centro',
            'cidade'=> 'Patos de Minas',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '38700-055',
            'idUser'=> '6',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Santa Tereza',
            'numero'    => '284',
            'bairro'   => 'Santa Rita ',
            'cidade'=> 'Timóteo',
            'estado'=> 'MG',
            'complemento'=> 'Cachoeira do Vale',
            'cep'=> '38400-692',
            'idUser'=> '7',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Padre Francisco Scrizzi',
            'numero'    => '851',
            'bairro'   => 'Parque São José',
            'cidade'=> 'Belo Horizonte',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '35184-308',
            'idUser'=> '8',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'rua goias',
            'numero'    => '460 ',
            'bairro'   => 'Cintra',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39400-393',
            'idUser'=> '12',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rod. Januária Brejo do Amparo Januária',
            'numero'    => '5090',
            'bairro'   => 'Zona Rural',
            'cidade'=> 'Januária',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39480-000',
            'idUser'=> '13',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '0',
            'qntCaixaMasterIndividual'    => '0',
            'qntDisplay'   => '0',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '0',
            'qntCaixaMasterSm'=> '10',
            'idRecebedor'=> '10',
            'idEmissor'=> '9',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '0',
            'qntCaixaMasterIndividual'    => '0',
            'qntDisplay'   => '0',
            'qntCaixaMasterDisplay'=> '50',
            'qntSm'=> '0',
            'qntCaixaMasterSm'=> '0',
            'idRecebedor'=> '10',
            'idEmissor'=> '5',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '9',
            'qntCaixaMasterIndividual'    => '8',
            'qntDisplay'   => '5',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '12',
            'qntCaixaMasterSm'=> '23',
            'idRecebedor'=> '10',
            'idEmissor'=> '6',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '9',
            'qntCaixaMasterIndividual'    => '8',
            'qntDisplay'   => '5',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '10',
            'qntCaixaMasterSm'=> '25',
            'idRecebedor'=> '11',
            'idEmissor'=> '8',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '10',
            'qntCaixaMasterIndividual'    => '8',
            'qntDisplay'   => '5',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '15',
            'qntCaixaMasterSm'=> '20',
            'idRecebedor'=> '10',
            'idEmissor'=> '6',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '0',
            'qntCaixaMasterIndividual'    => '0',
            'qntDisplay'   => '40',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '0',
            'qntCaixaMasterSm'=> '25',
            'idRecebedor'=> '10',
            'idEmissor'=> '7',
          ]
        );
        Orcamento::create(
          [
            'qntIndividual'    => '0',
            'qntCaixaMasterIndividual'    => '0',
            'qntDisplay'   => '30',
            'qntCaixaMasterDisplay'=> '5',
            'qntSm'=> '0',
            'qntCaixaMasterSm'=> '5',
            'idRecebedor'=> '11',
            'idEmissor'=> '8',
          ]
        );

        ValorProduto::create(
          [
            'idProduto' => '1',
            'valor' => '1.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '2',
            'valor' => '2.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '3',
            'valor' => '3.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '4',
            'valor' => '5.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '5',
            'valor' => '9.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '6',
            'valor' => '16.00',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '1',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '2',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '3',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '4',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '5',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '4',
            'idProduto' => '6',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '1',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '2',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '3',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '4',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '5',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '6',
            'qnt' => '5000',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '1',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '2',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '3',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '4',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '5',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '6',
            'idProduto' => '6',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '1',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '2',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '3',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '4',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '5',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '5',
            'idProduto' => '6',
            'qnt' => '500',
          ]
          );



    }
}
