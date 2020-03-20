<?php

use App\CfopTable;
use Illuminate\Database\Seeder;
//https://www.contabilizei.com.br/contabilidade-online/tabela-cfop-completa/
class CfopTableSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->cfop() as $value) {
            CfopTable::create([
                'cfop' => $value[0],
                'description' => $value[1],
                'origin' => $value[2],
            ]);
        }
    }

    protected function cfop()
    {
        return [
            [
                '1102 – Compra para comercialização',
                'Compra de produtos, de fornecedor do seu estado, sem substituição tributária',
                'Mesmo estado'
            ],
            [
                '2102 – Compra para comercialização',
                'Compra de produtos, de fornecedor de outro estado, sem substituição tributária',
                'Outro estado'
            ],
            [
                '2403 – Compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária',
                'Compra de produtos, de fornecedor de outro estado, com substituição tributária',
                'Outro estado'
            ],
            [
                '2556 – Classificam-se neste código as compras de produtos destinadas ao uso ou consumo do estabelecimento.',
                'Compra de produtos de fornecedor/vendedor de outro estado, destinados ao uso / consumo da empresa, por exemplo, materiais para consumir no dia-a-dia.',
                'Outro estado'
            ],
            [
                '2551 – Compra de bem para o ativo imobilizado',
                'Compra de produtos de fornecedor/vendedor de outro estado, que são destinados às atividades da empresa.',
                'Outro estado'
            ],

            [
                '1908 – Entrada de bem por conta de contrato de comodatoo',
                'Entrada de bem que você recebe em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso (1908), o bem “emprestado” pertence ao mesmo estado.',
                'Mesmo estado'
            ],
            [
                '1912 – Entrada de mercadoria ou bem recebido para demonstração ou mostruário',
                null,
                'Mesmo estado'
            ],
            [
                '1917 – Entrada de mercadoria recebida em consignação mercantil ou industrial',
                'Entrada de mercadoria recebida em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso (1917), a mercadoria é do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '2908 – Entrada de bem por conta de contrato de comodato',
                'Entrada de bem que você recebe em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso (2908), o bem “emprestado” pertence a outro estado.',
                'Outro estado'
            ],
            [
                '2912 – Entrada de mercadoria ou bem recebido para demonstração ou mostruário',
                null,
                'Outro estado'
            ],
            [
                '2917 – Entrada de mercadoria recebida em consignação mercantil ou industrial',
                'Entrada de mercadoria recebida em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso (1917), a mercadoria é de outro estado.',
                'Outro estado'
            ],

            [
                '2411 – Devolução de venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de um produto que você vendeu para um cliente de outro estado e possui substituição tributária.',
                'Outro estado'
            ],
            [
                '2202 – Devolução de venda de mercadoria adquirida ou recebida de terceiros',
                'Devolução de um produto que você vendeu para um cliente de outro estado e não possui substituição tributária.',
                'Outro estado'
            ],
            [
                '2204 – Devolução de venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio',
                'Devolução de um produto que você vendeu para um cliente de outro estado, na Zona Franca de Manaus ou Áreas de Livre Comércio, e que não possui substituição tributária.',
                'Outro estado'
            ],
            [
                '1202 – Devolução de venda de mercadoria adquirida ou recebida de terceiros',
                'Devolução de um produto que você vendeu para um cliente do mesmo estado e não possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '1204 – Devolução de venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio',
                'Devolução de um produto que você vendeu para um cliente do mesmo estado, na Zona Franca de Manaus ou Áreas de Livre Comércio, e que não possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '1411 – Devolução de venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de um produto que você vendeu para um cliente do mesmo estado e possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '2553 – Devolução de venda de bem do ativo imobilizado',
                'Devolução de uma venda feita com bens utilizados nas atividades da sua empresa, para pessoa ou empresa de outro estado.',
                'Outro estado'
            ],
            [
                '1553 – Devolução de venda de bem do ativo imobilizado',
                'Devolução de uma venda feita com bens utilizados nas atividades da sua empresa, para pessoa ou empresa do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '1209 – Devolução de mercadoria adquirida ou recebida de terceiros, remetida em transferência',
                'Devolução de um produto que foi enviado pela sua empresa para terceiros do mesmo estado, para fins diversos (venda, demonstração, etc).',
                'Mesmo estado'
            ],
            [
                '1918 – Devolução de mercadoria remetida em consignação mercantil ou industrial',
                'Devolução de um produto que você enviou em consignação para outra empresa que está no mesmo estado que a sua.',
                'Mesmo estado'
            ],
            [
                '2209 – Devolução de mercadoria adquirida ou recebida de terceiros, remetida em transferência',
                'Devolução de um produto que foi enviado pela sua empresa para terceiros de outro estado, para fins diversos (venda, demonstração, etc).',
                'Outro estado'
            ],
            [
                '2918 – Devolução de mercadoria remetida em consignação mercantil ou industrial',
                'Devolução de um produto que você enviou em consignação para uma empresa que é de outro estado.',
                'Outro estado'
            ],

            [
                '1415 – Retorno de mercadoria adquirida ou recebida de terceiros, remetida para venda fora do estabelecimento em operação com mercadoria sujeita ao regime de substituição tributária',
                'Retorno de mercadoria com substituição tributária, que você enviou para vender fora da sua empresa, mas no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '1904 – Retorno de remessa para venda fora do estabelecimento',
                'Retorno de mercadoria sem substituição tributária, que você enviou para vender fora da sua empresa, mas no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '2415 – Retorno de mercadoria adquirida ou recebida de terceiros, remetida para venda fora do estabelecimento em operação com mercadoria sujeita ao regime de substituição tributária',
                'Retorno de mercadoria com substituição tributária, que você enviou para vender fora da sua empresa e em outro estado.',
                'Outro estado'
            ],
            [
                '2904 – Retorno de remessa para venda fora do estabelecimento',
                'Retorno de mercadoria sem substituição tributária, que você enviou para vender fora da sua empresa e em outro estado.',
                'Outro estado'
            ],
            [
                '1554 – Retorno de bem do ativo imobilizado remetido para uso fora do estabelecimento',
                'Retorno de um bem da sua empresa que foi enviado para ser usado em outro local, dentro do seu estado.',
                'Mesmo estado'
            ],
            [
                '2554 – Retorno de bem do ativo imobilizado remetido para uso fora do estabelecimento',
                'Retorno de um bem da sua empresa que foi enviado para ser usado em outro local, fora do seu estado.',
                'Outro estado'
            ],
            [
                '1555 – Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento',
                'Quando sua empresa recebe um bem de outra empresa, que está no mesmo estado, para utilização nas atividades de sua empresa.',
                'Mesmo estado'
            ],
            [
                '2555 – Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento',
                'Quando sua empresa recebe um bem de outra empresa, que está em outro estado, para utilização nas atividades de sua empresa.',
                'Outro estado'
            ],
            [
                '1906 – Retorno de mercadoria remetida para depósito fechado ou armazém geral',
                'Quando sua própria mercadoria retorna ao seu estoque de um armazém ou depósito no mesmo estado que o seu.',
                'Mesmo estado'
            ],
            [
                '1907 – Retorno simbólico de mercadoria remetida para depósito fechado ou armazém geral',
                'Quando ocorre algum imprevisto no envio da sua própria mercadoria para um armazém ou depósito de estocagem (no mesmo estado) e ela retorna ao seu estoque, antes de ter chegado ao destino inicial.',
                'Mesmo estado'
            ],
            [
                '2906 – Retorno de mercadoria remetida para depósito fechado ou armazém geral',
                'Quando sua própria mercadoria retorna ao seu estoque de um armazém ou depósito de outro estado.',
                'Outro estado'
            ],
            [
                '2907 – Retorno simbólico de mercadoria remetida para depósito fechado ou armazém geral',
                'Quando ocorre algum imprevisto no envio da sua própria mercadoria para um armazém ou depósito de estocagem (em outro estado) e ela retorna ao seu estoque, antes de ter chegado ao destino inicial.',
                'Outro estado'
            ],
            [
                '1909 – Retorno de bem remetido por conta de contrato de comodato',
                'Retorno de bem que você enviou em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso (2908), o bem da sua empresa foi emprestado para uma empresa do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '1913 – Retorno de mercadoria ou bem remetido para demonstração, mostruário ou treinamento',
                'Retorno de mercadoria que você enviou para demonstração, mostruário ou treinamento em outra empresa no mesmo estado que o seu.',
                'Mesmo estado'
            ],
            [
                '1914 – Retorno de mercadoria ou bem remetido para exposição ou feira',
                'Retorno de mercadoria que você enviou para uma exposição ou feira que ocorreu no mesmo estado que o seu.',
                'Mesmo estado'
            ],
            [
                '1916 – Retorno de mercadoria ou bem remetido para conserto ou reparo',
                'Retorno de uma mercadoria de sua empresa, que você enviou para arrumar em um lugar no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '2909 – Retorno de bem remetido por conta de contrato de comodato',
                'Retorno de bem que você enviou em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso (2908), o bem da sua empresa foi emprestado para uma empresa de outro estado.',
                'Outro estado'
            ],
            [
                '2913 – Retorno de mercadoria ou bem remetido para demonstração, mostruário ou treinamento',
                'Retorno de mercadoria que você enviou apenas para demonstração, mostruário ou treinamento em outra empresa em outro estado diferente do seu.',
                'Outro estado'
            ],
            [
                '2914 – Retorno de mercadoria ou bem remetido para exposição ou feira',
                'Retorno de mercadoria que você enviou para uma exposição ou feira que ocorreu em outro estado diferente do seu.',
                'Outro estado'
            ],
            [
                '2916 – Retorno de mercadoria ou bem remetido para conserto ou reparo',
                'Retorno de uma mercadoria de sua empresa, que você enviou para arrumar em um lugar em um estado diferente do seu.',
                'Outro estado'
            ],
            [
                '1915 – Entrada de mercadoria ou bem recebido para conserto ou reparo',
                'Quando sua empresa recebe um produto para arrumar/consertar, vindo do mesmo estado que o seu.',
                'Mesmo estado'
            ],
            [
                '2915 – Entrada de mercadoria ou bem recebido para conserto ou reparo',
                'Quando sua empresa recebe um produto para arrumar/consertar, vindo de um estado diferente do seu.',
                'Outro estado'
            ],
            [
                '1925 – Retorno de mercadoria remetida para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente',
                'Quando um produto seu, que foi enviado para uma indústria no mesmo estado que o da sua empresa, retorna para você antes mesmo de chegar no seu cliente.',
                'Mesmo estado'
            ],
            [
                '2925 – Retorno de mercadoria remetida para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente',
                'Quando um produto seu, que foi enviado para uma indústria em outro estado, retorna para você antes mesmo de chegar no seu cliente.',
                'Outro estado'
            ],
            [
                '2949 – Outra entrada de mercadoria ou prestação de serviço não especificada',
                'Qualquer outra entrada de mercadoria na sua empresa, vinda de outro estado, que não se encaixe em nenhuma das outras especificações anteriores. Este CFOP é muito usado para troca em garantia.',
                'Outro estado'
            ],
            [
                '1949 – Outra entrada de mercadoria ou prestação de serviço não especificada',
                'Qualquer outra entrada de mercadoria na sua empresa, vinda do mesmo estado, que não se encaixe em nenhuma das outras especificações anteriores.',
                'Mesmo estado'
            ],

            [
                '1152 – Transferência de produtos de outro estabelecimento da mesma empresa, para serem comercializadas.',
                'Quando sua empresa recebe seus produtos vindos de outro espaço da sua própria rede, dentro do mesmo estado, para que seja vendido.',
                'Mesmo estado'
            ],
            [
                '2152 – Transferência de produtos de outro estabelecimento da mesma empresa, para serem comercializadas.',
                'Quando sua empresa recebe seus produtos vindos de outro espaço da sua própria rede, dentro de outro estado, para que seja vendido.',
                'Outro estado'
            ],
            [
                '1409 – Transferência para comercialização em operação com mercadoria sujeita ao regime de substituição tributária, para serem comercializadas, decorrentes de operações sujeitas ao regime de substituição tributária.',
                'Quando sua empresa recebe seus produtos com substituição tributária vindos de outro espaço da sua própria rede, dentro do mesmo estado, para que seja vendido.',
                'Mesmo estado'
            ],
            [
                '2409 – Transferência para comercialização em operação com mercadoria sujeita ao regime de substituição tributária, para serem comercializadas, decorrentes de operações sujeitas ao regime de substituição tributária.',
                'Quando sua empresa recebe seus produtos com substituição tributária vindos de outro espaço da sua própria rede, dentro de outro estado, para que seja vendido.',
                'Outro estado'
            ],
            [
                '1154 – Transferência para utilização na prestação de serviço de outro estabelecimento da mesma empresa, para serem utilizadas nas prestações de serviços.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede no mesmo estado, para utilizar ao prestar um serviço.',
                'Mesmo estado'
            ],
            [
                '2154 – Transferência para utilização na prestação de serviço de outro estabelecimento da mesma empresa, para serem utilizadas nas prestações de serviços.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede em outro estado, para utilizar ao prestar um serviço.',
                'Outro estado'
            ],
            [
                '1557 – Transferência de material para uso ou consumo recebidos em transferência de outro estabelecimento da mesma empresa.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede no mesmo estado, para uso ou consumo.',
                'Mesmo estado'
            ],
            [
                '2557 – Transferência de material para uso ou consumo recebidos em transferência de outro estabelecimento da mesma empresa.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede em outro estado, para uso ou consumo.',
                'Outro estado'
            ],
            [
                '1552 – Transferência de bem do ativo imobilizado recebidos em transferência de outro estabelecimento da mesma empresa.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede no mesmo estado, mercadoria essa para ser destinada às atividades da empresa.',
                'Mesmo estado'
            ],
            [
                '2552 – Transferência de bem do ativo imobilizado recebidos em transferência de outro estabelecimento da mesma empresa.',
                'Quando sua empresa recebe uma mercadoria vinda da sua própria empresa, de uma sede de outro estado, mercadoria essa para ser destinada às atividades da empresa.',
                'Outro estado'
            ],

            [
                '5102 – Venda de mercadoria adquirida ou recebida de terceiros',
                'Venda de um produto para um cliente do mesmo estado e que não possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6102 – Venda de mercadoria adquirida ou recebida de terceiros',
                'Venda de um produto para um cliente de outro estado e que não possui substituição tributária.',
                'Outro estado'
            ],
            [
                '5403 – Venda de mercadoria, adquirida ou recebida de terceiros, sujeita ao regime de substituição tributária, na condição de **contribuinte-substituto**',
                'Venda de uma mercadoria que você comprou de terceiros e que tenha substituição tributária. Nesse caso, a venda é feita dentro do mesmo estado e sua empresa é quem vai pagar o imposto.',
                'Mesmo estado'
            ],
            [
                '5405 – Venda de mercadoria, adquirida ou recebida de terceiros, sujeita ao regime de substituição tributária, na condição de contribuinte-substituído',
                'Venda de uma mercadoria que você comprou de terceiros e que tenha substituição tributária. Nesse caso, a venda é feita dentro do mesmo estado e a empresa que comprou é quem vai pagar o imposto.',
                'Mesmo estado'
            ],
            [
                '6403 – Venda de mercadoria, adquirida ou recebida de terceiros, sujeita ao regime de substituição tributária, na condição de **contribuinte-substituto**',
                'Venda de uma mercadoria que você comprou de terceiros e que tenha substituição tributária. Nesse caso, a venda é feita para outro estado e sua empresa é quem vai pagar o imposto.',
                'Outro estado'
            ],
            [
                '6404 – Venda de mercadoria sujeita ao regime de substituição tributária, cujo imposto já tenha sido retido anteriormente',
                'Venda para cliente de outro estado, de uma mercadoria que já teve o imposto retido anteriormente.',
                'Outro estado'
            ],
            [
                '5110 – Venda de mercadoria, adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comercio, de que trata o Anexo do Convênio SINIEF s/n, de 15 de dezembro de 1970, que dispõe sobre o Sistema Nacional Integrado de Informações Econômico-Fiscais',
                'Venda de produto para um cliente do mesmo estado, na Zona Franca de Manaus ou Áreas de Livre Comércio, e que não possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6108 – Venda de mercadoria adquirida ou recebida de terceiros, destinada a não contribuinte',
                'Venda de mercadoria, que foi comprada de terceiros, para comprador de outro estado que não contribui com ICMS. Isento de ICMS, isso não significa que não possui Inscrição Estadual, ok?',
                'Outro estado'
            ],
            [
                '5551 – Venda de bem do ativo imobilizado',
                'Venda de BEM da empresa para comprador do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6551 – Venda de bem do ativo imobilizado',
                'Venda de BEM da empresa para comprador de outro estado.',
                'Outro estado'
            ],
            [
                '5114 – Venda de mercadoria adquirida ou recebida de terceiros **REMETIDA** anteriormente em consignação mercantil',
                'Quando você vende um produto que anteriormente enviou como em consignação, você utiliza esse CFOP após fazer uma emissão com o 1917.',
                'Mesmo estado'
            ],
            [
                '5115 – Venda de mercadoria adquirida ou recebida de terceiros, **RECEBIDA** anteriormente em consignação mercantil',
                'Quando sua empresa compra um produto que foi recebido em consignação e faz a venda deste dentro do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5117 – Venda de mercadoria adquirida ou recebida de terceiros, originada de encomenda para entrega futura',
                'Quando você emite uma nota de venda para um cliente do mesmo estado, que encomendou mercadoria da sua empresa, mas ainda não a recebeu. Utilizado na entrega da mercadoria emitida pela NF com CFOP 5922.',
                'Mesmo estado'
            ],
            [
                '5119 – Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem',
                'Quando seu cliente, do mesmo estado que sua empresa, vende um produto que comprou da sua empresa e manda entregar direto no cliente dele. Nesse caso, seu cliente paga pelo frete.',
                'Mesmo estado'
            ],
            [
                '5120 – Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem',
                'Quando seu cliente, do mesmo estado que sua empresa, vende um produto que comprou da sua empresa e manda entregar direto no cliente dele. Nesse caso, sua empresa paga pelo frete.',
                'Mesmo estado'
            ],
            [
                '5922 – Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura',
                'Quando você emite uma nota de lançamento de mercadoria sem substituição tributária para um cliente do mesmo estado, que encomendou mercadoria da sua empresa mas ainda não a recebeu. Utilizado em casos de adiantamento ou recebimento financeiro.',
                'Mesmo estado'
            ],
            [
                '6922 – Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura.',
                'Quando você emite uma nota de lançamento de mercadoria sem substituição tributária para um cliente de outro estado, que encomendou mercadoria da sua empresa mas ainda não a recebeu. Utilizado em casos de adiantamento ou recebimento financeiro.',
                'Outro estado'
            ],
            [
                '6104 – Venda de mercadoria adquirida ou recebida de terceiros, efetuada fora do estabelecimento',
                'Quando a nota é referente a uma venda que foi realizada fora do estabelecimento, para cliente de outro estado.',
                'Outro estado'
            ],
            [
                '5104 – Venda de mercadoria adquirida ou recebida de terceiros, efetuada fora do estabelecimento',
                'Quando a nota é referente a uma venda que foi realizada fora do estabelecimento, para cliente do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6110 – Venda de mercadoria, adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio',
                'Venda de produto para um cliente de outro estado, na Zona Franca de Manaus ou Áreas de Livre Comércio, e que não possui substituição tributária.',
                'Outro estado'
            ],
            [
                '5110 – Venda de mercadoria, adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio',
                'Venda de produto para um cliente do mesmo estado, na Zona Franca de Manaus ou Áreas de Livre Comércio, e que não possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6114 – Venda de mercadoria adquirida ou recebida de terceiros **REMETIDA** anteriormente em consignação mercantil',
                'Quando sua empresa consigna um produto a um cliente de outro estado e esse cliente faz a venda desse produto.',
                'Outro estado'
            ],
            [
                '6115 – Venda de mercadoria adquirida ou recebida de terceiros, **RECEBIDA** anteriormente em consignação mercantil',
                'Quando sua empresa recebe um produto em consignação e faz a venda dele para outro estado.',
                'Outro estado'
            ],
            [
                '6117 – Venda de mercadoria adquirida ou recebida de terceiros, originada de encomenda para entrega futura',
                'Quando você emite uma nota de venda para um cliente de outro estado, que encomendou mercadoria da sua empresa, mas ainda não a recebeu.',
                'Outro estado'
            ],
            [
                '6119 – Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem',
                'Quando seu cliente, de outro estado, vende um produto que comprou da sua empres e manda entregar direto no cliente dele. Nesse caso, seu cliente paga pelo frete.',
                'Outro estado'
            ],
            [
                '6120 – Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem',
                'Quando seu cliente, de outro estado, vende um produto que comprou da sua empresa e manda entregar direto no cliente dele. Nesse caso, sua empresa paga pelo frete.',
                'Outro estado'
            ],
            [
                '5123 – Venda de mercadoria adquirida ou recebida de terceiros remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente',
                'Quando você manda uma mercadoria para alteração, adição de outros itens para compor o que você vende, sem que a matéria-prima passe por seu estabelecimento',
                'Mesmo estado'
            ],
            [
                '6123 – Venda de mercadoria adquirida ou recebida de terceiros remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente',
                'Quando você manda uma mercadoria para alteração, adição de outros itens para compor o que você vende, sem que a matéria-prima passe por seu estabelecimento',
                'Outro estado'
            ],

            [
                '5917 – Remessa de mercadoria em consignação mercantil ou industrial',
                'Saída de mercadoria em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso, a mercadoria vai para o mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5908 – Remessa de bem por conta de contrato de comodato',
                'Saída de bem da sua empresa em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso o bem é “emprestado” para uma empresa no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5909 – Retorno de bem recebido por conta de contrato de comodato',
                'Saída de bem que você recebeu em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso, o bem “emprestado” pertence a uma outra empresa do mesmo estado e você está devolvendo.',
                'Mesmo estado'
            ],
            [
                '6908 – Remessa de bem por conta de contrato de comodato',
                'Saída de bem da sua empresa em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso o bem é “emprestado” para uma empresa em outro estado.',
                'Outro estado'
            ],
            [
                '6909 – Retorno de bem recebido por conta de contrato de comodato',
                'Saída de bem que você recebeu em comodato. No contrato de comodato, a empresa que é dona do bem o “empresta” sem cobrar por isso, mas por outro lado, pode retirar quando decidir. Neste caso, o bem “emprestado” pertence a uma outra empresa de outro estado e você está devolvendo.',
                'Outro estado'
            ],
            [
                '6917 – Remessa de mercadoria em consignação mercantil ou industrial',
                'Saída de mercadoria em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso, a mercadoria vai para outro estado.',
                'Outro estado'
            ],

            [
                '5412 – Devolução de bem do ativo imobilizado, em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de produtos que seriam destinados ao consumo/uso da empresa para fornecedor/vendedor do mesmo estado. Produtos com substituição tributária.',
                'Mesmo estado'
            ],
            [
                '5553 – Devolução de compra de bem para o ativo imobilizado',
                'Devolução de produtos que seriam destinados ao consumo/uso da empresa para fornecedor/vendedor do mesmo estado. Produtos sem substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6412 – Devolução de bem do ativo imobilizado, em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de produtos que seriam destinados ao consumo/uso da empresa para fornecedor/vendedor de outro estado. Produtos com substituição tributária.',
                'Outro estado'
            ],
            [
                '6553 – Devolução de compra de bem para o ativo imobilizado',
                'Devolução de produtos que seriam destinados ao consumo/uso da empresa para fornecedor/vendedor de outro estado. Produtos com substituição tributária.',
                'Outro estado'
            ],
            [
                '5202 – Devolução de compra para comercialização',
                'Devolução de produtos que foram comprados para sua empresa vender. Quando esses produtos não têm substituição tributária e são de fornecedor do mesmo estado que o da sua empresa.',
                'Mesmo estado'
            ],
            [
                '6202 – Devolução de compra para comercialização',
                'Devolução de produtos que foram comprados para sua empresa vender. Quando esses produtos não têm substituição tributária e são de fornecedor de outro estado.',
                'Outro estado'
            ],
            [
                '5411 – Devolução de compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de produtos que foram comprados para sua empresa vender. Quando esses produtos possuem substituição tributária e são de fornecedor do mesmo estado que o da sua empresa.',
                'Mesmo estado'
            ],
            [
                '6411 – Devolução de compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária',
                'Devolução de produtos que foram comprados para sua empresa vender. Quando esses produtos possuem substituição tributária e são de fornecedor de outro estado.',
                'Outro estado'
            ],
            [
                '5918 – Devolução de mercadoria recebida em consignação mercantil ou industrial',
                'Devolução de mercadoria que foi recebida em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso, a mercadoria é do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5919 – Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, recebida anteriormente em consignação mercantil ou industrial',
                'Quando, por algum motivo pontual, você precisa fazer uma devolução apenas simbólica dentro do mesmo estado, sem realmente devolver a mercadoria que foi acordada em consignação.',
                'Mesmo estado'
            ],
            [
                '5921- Devolução de vasilhame ou sacaria',
                'Quando sua empresa devolve uma embalagem, vasilhame ou sacaria para outra empresa do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5209 – Devolução de produtos recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.',
                'Quando, dentro do mesmo estado, sua empresa devolve produtos para outro espaço da sua própria rede, para que sejam vendidos.',
                'Mesmo estado'
            ],
            [
                '6209 – Devolução de produtos recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.',
                'Quando, entre diferentes estados, sua empresa devolve produtos para outro espaço da sua própria rede, para que sejam vendidos.',
                'Outro estado'
            ],
            [
                '6918 – Devolução de mercadoria recebida em consignação mercantil ou industrial',
                'Devolução de mercadoria que foi recebida em consignação. No contrato de consignação mercantil ou industrial, a mercadoria é consignada com a intenção de ser vendida. Neste caso, a mercadoria é de outro estado.',
                'Outro estado'
            ],
            [
                '6919 – Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, recebida anteriormente em consignação mercantil ou industrial',
                'Quando, por algum motivo pontual, você precisa fazer uma devolução apenas simbólica para outro estado, sem realmente devolver a mercadoria que foi acordada em consignação.',
                'Outro estado'
            ],
            [
                '6921- Devolução de vasilhame ou sacaria',
                'Quando sua empresa devolve uma embalagem, vasilhame ou sacaria para outra empresa de outro estado.',
                'Outro estado'
            ],
            [
                '5210 – Devolução de compra para utilização na prestação de serviço',
                'Quando você devolve uma mercadoria, que comprou para usar na prestação de serviço, para uma empresa dentro do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6210 – Devolução de compra para utilização na prestação de serviço',
                'Quando você devolve uma mercadoria, que comprou para usar na prestação de serviço, para uma empresa de outro estado.',
                'Outro estado'
            ],
            [
                '5413 – Devolução de mercadoria destinada ao uso ou consumo, em operação com mercadoria sujeita ao regime de substituição tributária.',
                'Devolução de mercadoria que você comprou de fornecedor/vendedor do mesmo estado, destinada ao uso / consumo da empresa e que tenha substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6413 – Devolução de mercadoria destinada ao uso ou consumo, em operação com mercadoria sujeita ao regime de substituição tributária.',
                'Devolução de mercadoria que você comprou de fornecedor/vendedor de outro estado, destinada ao uso / consumo da empresa e que tenha substituição tributária.',
                'Outro estado'
            ],
            [
                '6556 – Devolução de compra de material de uso ou consumo',
                'Devolução de mercadoria que você comprou de fornecedor/vendedor de outro estado, destinada ao uso / consumo da empresa e que não tenha substituição tributária.',
                'Outro estado'
            ],
            [
                '5556 – Devolução de compra de material de uso ou consumo',
                'Devolução de mercadoria que você comprou de fornecedor/vendedor do mesmo estado, destinada ao uso / consumo da empresa e que não tenha substituição tributária.',
                'Mesmo estado'
            ],


            [
                '5904 – Remessa para venda fora do estabelecimento',
                'Envio de mercadoria para fora do seu estabelecimento dentro do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6905 – Remessa para depósito fechado ou armazém geral',
                'Envio de mercadoria para um depósito fechado ou armazém que fica em um outro estado.',
                'Mesmo estado'
            ],
            [
                '5905 – Remessa para depósito fechado ou armazém geral',
                'Envio de mercadoria para um depósito fechado ou armazém que fica dentro do mesmo estado que sua empresa.',
                'Mesmo estado'
            ],
            [
                '5415 – Remessa de mercadoria adquirida ou recebida de terceiros para venda fora do estabelecimento, em operação com mercadoria sujeita ao regime de substituição tributária',
                'Quando sua empresa envia, dentro do mesmo estado, uma mercadoria que foi recebida ou adquirida de terceiros e contém substituição tributária',
                'Mesmo estado'
            ],
            [
                '6904 – Remessa para venda fora do estabelecimento',
                'Envio de mercadoria para fora do seu estabelecimento em outro estado.',
                'Outro estado'
            ],
            [
                '6415 – Remessa de mercadoria adquirida ou recebida de terceiros para venda fora do estabelecimento, em operação com mercadoria sujeita ao regime de substituição tributária',
                'Quando sua empresa envia para outro estado uma mercadoria que foi recebida ou adquirida de terceiros e contém substituição tributária.',
                'Outro estado'
            ],
            [
                '5910 – Remessa em bonificação, doação ou brinde',
                'Envio de mercadoria dentro do mesmo estado, com o intuito de doar, bonificar ou apenas dar um brinde, sem fins comerciais.',
                'Mesmo estado'
            ],
            [
                '5911 – Remessa de amostra grátis',
                'Envio de amostra grátis para empresa do mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6910 – Remessa em bonificação, doação ou brinde',
                'Envio de mercadoria para outro estado, com o intuito de doar, bonificar ou apenas dar um brinde, sem fins comerciais.',
                'Outro estado'
            ],
            [
                '6911 – Remessa de amostra grátis',
                'Envio de amostra grátis para empresa de outro estado.',
                'Outro estado'
            ],
            [
                '5912 – Remessa de mercadoria ou bem para demonstração, mostruário ou treinamento',
                'Envio de mercadoria apenas para demonstração, mostruário ou treinamento no mesmo estado, sem fins comerciais, ou seja, não pode ser vendida.',
                'Mesmo estado'
            ],
            [
                '5913 – Retorno de mercadoria ou bem recebido para demonstração ou mostruário',
                'Quando você devolve, para uma empresa no mesmo estado, uma mercadoria que foi recebida apenas para demonstração ou mostruário, não para ser vendida.',
                'Mesmo estado'
            ],
            [
                '5914 – Remessa de mercadoria ou bem para exposição ou feira',
                'Quando você envia uma mercadoria para uma feira ou para ficar exposta no mesmo estado, mas que pode ser vendida caso necessário.',
                'Mesmo estado'
            ],
            [
                '5915- Remessa de mercadoria ou bem para conserto ou reparo',
                'Quando você envia uma mercadoria ou bem de sua empresa, para arrumar em um lugar no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '5916 – Retorno de mercadoria ou bem recebido para conserto ou reparo',
                'Quando você devolve para uma empresa do mesmo estado, uma mercadoria ou bem que sua empresa recebeu para arrumar.',
                'Mesmo estado'
            ],
            [
                '6912 – Remessa de mercadoria ou bem para demonstração, mostruário ou treinamento',
                'Envio de mercadoria apenas para demonstração, mostruário ou treinamento em outro estado, sem fins comerciais, ou seja, não pode ser vendida.',
                'Outro estado'
            ],
            [
                '6913 – Retorno de mercadoria ou bem recebido para demonstração ou mostruário',
                'Quando você devolve, para uma empresa de outro estado, uma mercadoria que foi recebida apenas para demonstração ou mostruário, não para ser vendida.',
                'Outro estado'
            ],
            [
                '6914 – Remessa de mercadoria ou bem para exposição ou feira',
                'Quando você envia uma mercadoria para uma feira ou para ficar exposta em outro estado, mas que pode ser vendida caso necessário.',
                'Outro estado'
            ],
            [
                '6915 – Remessa de mercadoria ou bem para conserto ou reparo',
                'Quando você envia uma mercadoria ou bem de sua empresa, para arrumar em um lugar em outro estado.',
                'Outro estado'
            ],
            [
                '6916 – Retorno de mercadoria ou bem recebido para conserto ou reparo',
                'Quando você devolve para uma empresa de outro estado, uma mercadoria ou bem que sua empresa recebeu para arrumar.',
                'Outro estado'
            ],
            [
                '5554 – Remessa de bem do ativo imobilizado para uso fora do estabelecimento',
                'Quando você envia um bem da sua empresa para que seja utilizado fora do seu estabelecimento, no mesmo estado.',
                'Mesmo estado'
            ],
            [
                '6554 – Remessa de bem do ativo imobilizado para uso fora do estabelecimento',
                'Quando você envia um bem da sua empresa para que seja utilizado fora do seu estabelecimento, em outro estado.',
                'Outro estado'
            ],
            [
                '5555 – Devolução de bem do ativo imobilizado de terceiro, recebido para uso no estabelecimento',
                'Quando você devolve um bem de outra empresa, do mesmo estado que o seu, que foi “emprestado” para que fosse utilizado na sua empresa.',
                'Mesmo estado'
            ],
            [
                '6555 – Devolução de bem do ativo imobilizado de terceiro, recebido para uso no estabelecimento',
                'Quando você devolve um bem de outra empresa, de outro estado, que foi “emprestado” para que fosse utilizado na sua empresa.',
                'Outro estado'
            ],
            [
                '5927 – Lançamento efetuado a título de baixa de estoque decorrente de perda, roubo ou deterioração',
                'Quando você precisa emitir uma nota de baixa de estoque apenas, para um produto que foi roubado, perdido ou estragado.',
                'Mesmo estado'
            ],
            [
                '5928 – Lançamento efetuado a título de baixa de estoque decorrente do encerramento da atividade da empresa',
                'Quando você precisa emitir uma nota de baixa de estoque porque sua empresa não terá mais atividade.',
                'Mesmo estado'
            ],
            [
                '5929 – Lançamento efetuado em decorrência de emissão de documento fiscal relativo a operação ou prestação também registrada em equipamento Emissor de Cupom Fiscal – ECF',
                'Quando você compra mercadoria em estabelecimento que emite Cupom Fiscal, e você precisará de uma nota fiscal para entrada em Estoque/Uso Consumo',
                'Mesmo estado'
            ],
            [
                '5949 – Outra saída de mercadoria ou prestação de serviço não especificado',
                'Qualquer outra saída de mercadoria da sua empresa, para o mesmo estado, que não se encaixe em nenhuma das outras especificações anteriores.',
                'Mesmo estado'
            ],
            [
                '6929 – Lançamento efetuado em decorrência de emissão de documento fiscal relativo a operação ou prestação também registrada em equipamento Emissor de Cupom Fiscal – ECF',
                'Quando você compra mercadoria em estabelecimento que emite Cupom Fiscal, e você precisará de uma nota fiscal para entrada em Estoque/Uso Consumo',
                'Outro estado'
            ],
            [
                '6949 – Outra saída de mercadoria ou prestação de serviço não especificado',
                'Qualquer outra saída de mercadoria da sua empresa, para outro estado, que não se encaixe em nenhuma das outras especificações anteriores.',
                'Outro estado'
            ],
            [
                '5206 – Anulação de valor relativo a aquisição de serviço de transporte',
                'Quando você paga para uma transportadora para enviar ou receber uma mercadoria, e por algum motivo cancelará o processo, deverá emitir uma NF com essa CFOP para anular o valor de Frete, assim o transportador pode recuperar o valor sobre.',
                'Mesmo estado'
            ],
            [
                '6206 – Anulação de valor relativo a aquisição de serviço de transporte',
                'Quando você paga para uma transportadora para enviar ou receber uma mercadoria, e por algum motivo cancelará o processo, deverá emitir uma NF com essa CFOP para anular o valor de Frete, assim o transportador pode recuperar o valor sobre.',
                'Outro estado'
            ],
            [
                '5603 – Ressarcimento de ICMS retido por substituição tributária',
                'Quando você emite uma nota com valores que não deveriam ser debitados quanto a substituição tributária, e precisa recuperá-los de forma legal',
                'Mesmo estado'
            ],
            [
                '5606 – Utilização de saldo credor do ICMS para extinção por compensação de débitos fiscais',
                'Esse é utilizado de acordo com estado e sua base legal.',
                'Mesmo estado'
            ],
            [
                '6603 – Ressarcimento de ICMS retido por substituição tributária',
                'Quando você emite uma nota com valores que não deveriam ser debitados quanto a substituição tributária, e precisa recuperá-los de forma legal.',
                'Outro estado'
            ],

            [
                '5409 – Transferência de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária',
                'Saída de um produto que você comprou ou recebeu de um fornecedor / vendedor do mesmo estado e possui substituição tributária.',
                'Mesmo estado'
            ],
            [
                '6409 – Transferência de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária',
                'Saída de um produto que você comprou ou recebeu de um fornecedor / vendedor de outro estado e possui substituição tributária.',
                'Outro estado'
            ],
            [
                '5557 – Transferência de material de uso ou consumo',
                'Transferência dentro do mesmo estado de materiais destinados ao uso ou consumo da empresa, por exemplo, para consumir no dia-a-dia.',
                'Mesmo estado'
            ],
            [
                '6557 – Transferência de material de uso ou consumo',
                'Transferência para outro estado de materiais destinados ao uso ou consumo da empresa, por exemplo, para consumir no dia-a-dia.',
                'Outro estado'
            ],
            [
                '5552 – Transferência de bem do ativo imobilizado',
                'Transferência dentro do mesmo estado de materiais que são destinados às atividades da empresa.',
                'Mesmo estado'
            ],
            [
                '6552 – Transferência de bem do ativo imobilizado',
                'Transferência para outro estado de materiais que são destinados às atividades da empresa.',
                'Outro estado'
            ],
        ];
    }
}
