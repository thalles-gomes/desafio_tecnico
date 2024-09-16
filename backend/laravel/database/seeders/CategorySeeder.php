<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      /* 
        Inserção de dados na tabela categories se não existir
      */
      
        if(!Category::where('name', 'Aluguel')->first())
        {
          Category::create
          ([
            'name' => 'Aluguel',
            'description' => 'Pagemento de aluguel mensal',
          ]);
        }

        if(!Category::where('name', 'Alimentação')->first())
        {
          Category::create
          ([
            'name' => 'Alimentação',
            'description' => 'Gastos em alimentação, incluindo supermercados e restaurantes',
          ]);
        }

        if(!Category::where('name', 'Cartão de Crédito')->first())
        {
          Category::create
          ([
            'name' => 'Cartão de Crédito',
            'description' => 'Pagamento de fatura de cartão de crédito',
          ]);
        }

        if(!Category::where('name', 'Compras')->first())
        {
          Category::create
          ([
            'name' => 'Compras',
            'description' => 'Gastos gerais com compras pessoais',
          ]);
        }

        if(!Category::where('name', 'Contas de Água')->first())
        {
          Category::create
          ([
            'name' => 'Contas de Água',
            'description' => 'Pagamentos mensais de água',
          ]);
        }

        if(!Category::where('name', 'Contas de Luz')->first())
        {
          Category::create
          ([
            'name' => 'Contas de Luz',
            'description' => 'Pagamentos mensais de energia elétrica',
          ]);
        }

        if(!Category::where('name', 'Educação')->first())
        {
          Category::create
          ([
            'name' => 'Educação',
            'description' => 'Investimentos em educação, como cursos e material escolar',
          ]);
        }

        if(!Category::where('name', 'Freelance')->first())
        {
          Category::create
          ([
            'name' => 'Freelance',
            'description' => 'Receitas provenientes de trabalhos freelancers',
          ]);
        }

        if(!Category::where('name', 'Impostos')->first())
        {
          Category::create
          ([
            'name' => 'Impostos',
            'description' => 'Pagamentos de impostos, taxas e contribuições',
          ]);
        }

        if(!Category::where('name', 'Internet')->first())
        {
          Category::create
          ([
            'name' => 'Internet',
            'description' => 'Pagamentos de serviços de internet',
          ]);
        }

        if(!Category::where('name', 'Investimentos')->first())
        {
          Category::create
          ([
            'name' => 'Investimentos',
            'description' => 'Ganhos de investimentos como ações, fundos, etc.',
          ]);
        }

        if(!Category::where('name', 'Lazer')->first())
        {
          Category::create
          ([
            'name' => 'Lazer',
            'description' => 'Gastos com entretenimento e atividades recreativas',
          ]);
        }

        if(!Category::where('name', 'Manutenção')->first())
        {
          Category::create
          ([
            'name' => 'Manutenção',
            'description' => 'Gastos com manutenção de casa, carro, etc.',
          ]);
        }

        if(!Category::where('name', 'Prêmios')->first())
        {
          Category::create
          ([
            'name' => 'Prêmios',
            'description' => 'Receitas provenientes de prêmios',
          ]);
        }

        if(!Category::where('name', 'Prolabore')->first())
        {
          Category::create
          ([
            'name' => 'Prolabore',
            'description' => 'Recebimento de prolabore em empresas',
          ]);
        }

        if(!Category::where('name', 'Reembolso')->first())
        {
          Category::create
          ([
            'name' => 'Reembolso',
            'description' => 'Dinheiro recebido como reembolso de despesas',
          ]);
        }

        if(!Category::where('name', 'Salário')->first())
        {
          Category::create
          ([
            'name' => 'Salário',
            'description' => 'Recebimento de salário mensal',
          ]);
        }

        if(!Category::where('name', 'Saúde')->first())
        {
          Category::create
          ([
            'name' => 'Saúde',
            'description' => 'Despesas médicas, consultas, exames e medicamentos',
          ]);
        }

        if(!Category::where('name', 'Transporte')->first())
        {
          Category::create
          ([
            'name' => 'Transporte',
            'description' => 'Despesas com transporte público, combustível, táxis e afins',
          ]);
        }

        if(!Category::where('name', 'Vendas')->first())
        {
          Category::create
          ([
            'name' => 'Vendas',
            'description' => 'Ganhos com vendas de produtos ou serviços',
          ]);
        }
        //
        // if(!Category::where('name', '')->first())
        // {
        //   Category::create
        //   ([
        //     'name' => '',
        //     'description' => '',
        //   ]);
        // }
        
    }
}
