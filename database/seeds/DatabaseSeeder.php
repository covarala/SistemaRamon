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
          'email'   => 'andreobraga96@gmail.com',
          'password'=> bcrypt('nptsr123'),
          'tipoUsuario'=> 'admin',
        ]
        );
       Users::create(
        [
          'nome'    => 'Grawl',
          'sobrenome'    => 'Desenvolvimentos',
          'email'   => 'grawldesenvolvimentos@gmail.com',
          'password'=> bcrypt('development'),
          'tipoUsuario'=> 'distribuidor',
        ]
        );
      Users::create(
        [
          'nome'    => 'Georgia',
          'sobrenome'    => 'Souza Gomes Barbosa',
          'email'   => 'georgia.sgb@gmail.com',
          'password'=> bcrypt('bunnicula'),
          'tipoUsuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'nome'    => 'Lucas',
          'sobrenome'    => 'Guimarães Pereira',
          'email'   => 'lucasgp59@gmail.com',
          'password'=> bcrypt('quaquercoisa'),
          'tipoUsuario'=> 'cliente',
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
            'nome'    => 'Emanuel',
            'sobrenome'    => 'Luan Nicolas Barros',
            'email'   => 'emanuelluan@email.com',
            'password'=> bcrypt('123456'),
            'tipoUsuario'=> 'distribuidor',
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
          'sobrenome'    => 'Gonçalves Pereira',
          'email'   => 'lucasgp@email.com',
          'password'=> bcrypt('123456'),
          'tipoUsuario'=> 'cliente',
        ]
        );


      Telefone::create(
        [
          'telefone'    => '(79) 99111-2395',
          'idUser'    => '2',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(79) 98957-4080',
          'idUser'    => '2',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(86) 98811-4127',
          'idUser'    => '3',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(82) 99980-5971',
          'idUser'    => '4',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(67) 99870-6244',
          'idUser'    => '5',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(11) 98724-3570',
          'idUser'    => '6',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 98841-8575',
          'idUser'    => '7',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(67) 99536-4237',
          'idUser'    => '8',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(11) 98216-7713',
          'idUser'    => '9',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 99995-6120',
          'idUser'    => '10',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(92) 98845-6120',
          'idUser'    => '11',
        ]
        );
      Telefone::create(
        [
          'telefone'    => '(38) 98851-6120',
          'idUser'    => '12',
        ]
        );
      Fisica::create(
        [
          'cpf'    => '837.432.212-84',
          'idUser'    => '4',
        ]
        );
      Fisica::create(
        [
          'cpf'    => '501.579.968-32',
          'idUser'    => '10',
        ]
        );
      Fisica::create(
        [
          'cpf'    => '630.157.171-11',
          'idUser'    => '12',
        ]
        );


      Juridica::create(
        [
          'cnpj'    => '32.831.932/0001-72',
          'inscricaoEstadual'    => '516.183.070.010',
          'distribuidor'    => '0',
          'idUser'    => '3',
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
          'idUser'    => '11',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.266.283/0001-90',
          'inscricaoEstadual'    => '513.860.441/4929',
          'distribuidor'    => '1',
          'idUser'    => '2',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.256.283/0001-90',
          'inscricaoEstadual'    => '513.945.441/4929',
          'distribuidor'    => '1',
          'idUser'    => '7',
        ]
        );
      Juridica::create(
        [
          'cnpj'    => '38.956.283/0001-90',
          'inscricaoEstadual'    => '845.945.441/4929',
          'distribuidor'    => '0',
          'idUser'    => '5',
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
            'rua'    => 'Rua Caiçara',
            'numero'    => '594',
            'bairro'   => 'Vila Áurea',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39400-818',
            'idUser'=> '3',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Guatemala',
            'numero'    => '968',
            'bairro'   => 'Independência',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39404-299',
            'idUser'=> '8',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Frei Francisco',
            'numero'    => '105',
            'bairro'   => 'Independência',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39404-382',
            'idUser'=> '6',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Emília Teixeira de Carvalho',
            'numero'    => '727Morrinhos',
            'bairro'   => 'Centro',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39400-541',
            'idUser'=> '5',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Praça Itapetinga',
            'numero'    => '201',
            'bairro'   => 'Alto São João',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> 'Apto 306',
            'cep'=> '39400-306',
            'idUser'=> '7',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rod. Januária Brejo do Amparo',
            'numero'    => '5090',
            'bairro'   => 'Zona Rural',
            'cidade'=> 'Januária',
            'estado'=> 'MG',
            'complemento'=> 'Faz. Itapiraçaba',
            'cep'=> '39480-000',
            'idUser'=> '2',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Goiás',
            'numero'    => '460 ',
            'bairro'   => 'Cintra',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39400-393',
            'idUser'=> '4',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Vinte e Quatro',
            'numero'    => '900',
            'bairro'   => 'Jardim Primavera',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39404-144',
            'idUser'=> '9',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Avenida Professor Waldir Rameta',
            'numero'    => '770',
            'bairro'   => 'Jardim Parque Morada do Sol',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39408-306',
            'idUser'=> '10',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua Lagoa Monsara',
            'numero'    => '109',
            'bairro'   => 'Interlagos',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39404-271',
            'idUser'=> '11',
          ]
        );
        Endereco::create(
          [
            'rua'    => 'Rua H',
            'numero'    => '504',
            'bairro'   => 'São Bento',
            'cidade'=> 'Montes Claros',
            'estado'=> 'MG',
            'complemento'=> '',
            'cep'=> '39406-112',
            'idUser'=> '12',
          ]
        );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '0',
        //     'qntCaixaMasterIndividual'    => '0',
        //     'qntDisplay'   => '0',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '0',
        //     'qntCaixaMasterSm'=> '10',
        //     'idRecebedor'=> '10',
        //     'idEmissor'=> '9',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '0',
        //     'qntCaixaMasterIndividual'    => '0',
        //     'qntDisplay'   => '0',
        //     'qntCaixaMasterDisplay'=> '50',
        //     'qntSm'=> '0',
        //     'qntCaixaMasterSm'=> '0',
        //     'idRecebedor'=> '10',
        //     'idEmissor'=> '5',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '9',
        //     'qntCaixaMasterIndividual'    => '8',
        //     'qntDisplay'   => '5',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '12',
        //     'qntCaixaMasterSm'=> '23',
        //     'idRecebedor'=> '10',
        //     'idEmissor'=> '6',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '9',
        //     'qntCaixaMasterIndividual'    => '8',
        //     'qntDisplay'   => '5',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '10',
        //     'qntCaixaMasterSm'=> '25',
        //     'idRecebedor'=> '11',
        //     'idEmissor'=> '8',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '10',
        //     'qntCaixaMasterIndividual'    => '8',
        //     'qntDisplay'   => '5',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '15',
        //     'qntCaixaMasterSm'=> '20',
        //     'idRecebedor'=> '10',
        //     'idEmissor'=> '6',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '0',
        //     'qntCaixaMasterIndividual'    => '0',
        //     'qntDisplay'   => '40',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '0',
        //     'qntCaixaMasterSm'=> '25',
        //     'idRecebedor'=> '10',
        //     'idEmissor'=> '7',
        //   ]
        // );
        // Orcamento::create(
        //   [
        //     'qntIndividual'    => '0',
        //     'qntCaixaMasterIndividual'    => '0',
        //     'qntDisplay'   => '30',
        //     'qntCaixaMasterDisplay'=> '5',
        //     'qntSm'=> '0',
        //     'qntCaixaMasterSm'=> '5',
        //     'idRecebedor'=> '11',
        //     'idEmissor'=> '8',
        //   ]
        // );

        ValorProduto::create(
          [
            'idProduto' => '1',
            'valor' => '0.50',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '2',
            'valor' => '2.40',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '3',
            'valor' => '8.28',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '4',
            'valor' => '200.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '5',
            'valor' => '120.00',
          ]
          );
        ValorProduto::create(
          [
            'idProduto' => '6',
            'valor' => '264.96',
          ]
          );


        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '1',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '2',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '3',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '4',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '5',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '2',
            'idProduto' => '6',
            'qnt' => '99999999',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '1',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '2',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '3',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '4',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '5',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '7',
            'idProduto' => '6',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '1',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '2',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '3',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '4',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '5',
            'qnt' => '500',
          ]
          );
        ProdutoDistribuidor::create(
          [
            'idJuridica' => '11',
            'idProduto' => '6',
            'qnt' => '500',
          ]
          );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '1',
        //     'qnt' => '500',
        //   ]
        //   );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '2',
        //     'qnt' => '500',
        //   ]
        //   );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '3',
        //     'qnt' => '500',
        //   ]
        //   );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '4',
        //     'qnt' => '500',
        //   ]
        //   );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '5',
        //     'qnt' => '500',
        //   ]
        //   );
        // ProdutoDistribuidor::create(
        //   [
        //     'idJuridica' => '5',
        //     'idProduto' => '6',
        //     'qnt' => '500',
        //   ]
        //   );



    }
}
