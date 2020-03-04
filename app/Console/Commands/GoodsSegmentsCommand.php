<?php

namespace App\Console\Commands;

use App\GoodsSegments;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GoodsSegmentsCommand extends Command
{
    protected $signature = 'nfe:goods-segments';
    protected $description = 'Population Goods Segments';

    protected $goodsSegments = [
        '01. Autopeças',
        '02. Bebidas alcoólicas, exceto cerveja e chope',
        '03. Cervejas, chopes, refrigerantes, águas e outras bebidas',
        '04. Cigarros e outros produtos derivados do fumo',
        '05. Cimentos',
        '06. Combustíveis e lubrificantes',
        '07. Energia elétrica',
        '08. Ferramentas',
        '09. Lâmpadas, reatores e “starter”',
        '10. Materiais de construção e congêneres',
        '11. Materiais de limpeza',
        '12. Materiais elétricos',
        '13. Medicamentos de uso humano e outros produtos farmacêuticos para uso humano ou veterinário',
        '14. Papéis, plásticos, produtos cerâmicos e vidros',
        '15. REVOGADO',
        '16. Pneumáticos, câmaras de ar e protetores de borracha',
        '17. Produtos alimentícios',
        '18. REVOGADO',
        '19. Produtos de papelaria',
        '20. Produtos de perfumaria e de higiene pessoal e cosméticos',
        '21. Produtos eletrônicos, eletroeletrônicos e eletrodomésticos',
        '22. Rações para animais domésticos',
        '23. Sorvetes e preparados para fabricação de sorvetes em máquinas',
        '24. Tintas e vernizes',
        '25. Veículos automotores',
        '26. Veículos de duas e três rodas motorizados',
        '27. REVOGADO',
        '28. Venda de mercadorias pelo sistema porta a porta',
    ];

    public function handle()
    {
        GoodsSegments::query()->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        GoodsSegments::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($this->goodsSegments as $value) {
            GoodsSegments::query()->create([
                'name' => $value
            ]);
        }

        $this->info('Goods Segments finisher');
    }
}
