<?php
declare(strict_types=1);

/**
 * Dados e funções do site Viatractor.
 * Para trocar textos, telefones, e-mail ou produtos, edite somente este arquivo.
 */

// E-mail que recebe as mensagens do formulário de contato.
// ATENÇÃO: no site antigo aparecia "viatractor@viatracor.com.br" (sem o "t"). Confirme o endereço correto.
const CONTACT_TO = 'viatractor@viatractor.com.br';

const DEFAULT_WA_MESSAGE = 'Olá! Vim pelo site da Viatractor, poderia me ajudar?';

$site = [
    'name'        => 'Viatractor',
    'url'         => 'https://viatractor.com.br',
    'title'       => 'Viatractor | Peças para fresadoras, acabadoras e equipamentos de pavimentação',
    'description' => 'Peças de reposição e porta-bits fabricados para fresadoras, acabadoras de asfalto, mini carregadeiras e rolos compactadores. Garantia, testes e entrega rápida.',
    'phone'       => '(11) 5611-1867',
    'phone_href'  => '+551156111867',
    'email'       => CONTACT_TO,
    'instagram'   => 'https://www.instagram.com/viatractor_/',
    'privacy_url' => '/politica-de-privacidade/',
    'image'       => 'https://viatractor.com.br/wp-content/uploads/2025/10/fundo-destaque-1.jpg',
];

// Atendentes de WhatsApp. O primeiro é o contato principal (botões do site).
$whatsapp = [
    ['name' => 'Eduarda', 'number' => '5511994989469', 'display' => '(11) 99498-9469'],
    ['name' => 'Carlos',  'number' => '5511949670896', 'display' => '(11) 94967-0896'],
    ['name' => 'Samuel',  'number' => '5511965942416', 'display' => '(11) 96594-2416'],
];

$machines = [
    'Fresadora de asfalto',
    'Acabadora de asfalto',
    'Mini carregadeira',
    'Rolo compactador',
];

$commitments = [
    ['title' => 'Garantia total',     'text' => 'Todas as nossas peças têm garantia para a sua máquina.'],
    ['title' => 'Testes rigorosos',   'text' => 'Cada produto passa por testes antes de chegar até você.'],
    ['title' => 'Entrega rápida',     'text' => 'Logística eficiente para reduzir o tempo da máquina parada.'],
];

$portaBits = [
    'models' => ['HT01', 'HT02', 'HT03', 'HT11', 'HT22'],
    'uses'   => [
        'Fresagem de asfalto',
        'Recuperação de rodovias e vias urbanas',
        'Preparação de superfície para recapeamento',
    ],
    'brands'  => 'Wirtgen, Cifali, Bomag, Dynapac, Marini e outras',
    'gallery' => [
        ['src' => '1.jpg',               'alt' => 'Porta-bits fabricado pela Viatractor, vista 1'],
        ['src' => '2.jpg',               'alt' => 'Porta-bits fabricado pela Viatractor, vista 2'],
        ['src' => '3.jpg',               'alt' => 'Porta-bits fabricado pela Viatractor, vista 3'],
        ['src' => '4.jpg',               'alt' => 'Porta-bits fabricado pela Viatractor, vista 4'],
        ['src' => 'porta-bits-5-v1.jpg', 'alt' => 'Porta-bits fabricado pela Viatractor, vista 5'],
        ['src' => '6.jpg',               'alt' => 'Porta-bits fabricado pela Viatractor, vista 6'],
    ],
];

// As imagens apontam para o site atual. Em produção, baixe-as para assets/img/ e troque o prefixo.
const IMG_BASE = 'https://viatractor.com.br/wp-content/uploads/2025/10/';

$products = [
    [
        'name'   => 'Bits',
        'images' => ['BITS-1024x1024.jpg'],
        'intro'  => 'Os bits, também chamados de dentes de corte, removem camadas de asfalto ou concreto com precisão e preparam a superfície para o novo pavimento.',
        'specs'  => [
            'Material'      => 'Carbeto de tungstênio, resistente ao desgaste e ao calor',
            'Modelos'       => 'Para corte profundo ou superficial, em vários tamanhos e formatos',
            'Aplicações'    => 'Acabamento, remoção pesada e correção de pista',
            'Compatível com' => 'Fresadoras Wirtgen, Caterpillar, Dynapac, Bomag e outras',
        ],
    ],
    [
        'name'   => 'Base do porta-bits HT11',
        'images' => ['Base-do-Porta-Bits-HT11-1024x1024.jpg'],
        'intro'  => 'Suporte onde o porta-bits é instalado. Aguenta abrasão, impacto e calor intenso, e mantém os bits firmes no tambor. Fabricamos parafuso, base e porta-bits, com pronta entrega.',
        'specs'  => [
            'Fixação'      => 'Precisa, com encaixe rápido e seguro',
            'Resistência'  => 'Alto desgaste, impacto e vibração',
            'Aplicação'    => 'Fresadoras e recicladoras de alto rendimento',
            'Benefício'    => 'Menos paradas para manutenção e ferramentas que duram mais',
        ],
    ],
    [
        'name'   => 'Sapatas',
        'images' => ['Sapatas-1-v2.jpg', 'Sapatas-2-v2.jpg'],
        'intro'  => 'Distribuem melhor o peso da máquina, reduzem o desgaste do equipamento e ajudam a manter o nivelamento e a compactação do asfalto.',
        'specs'  => [
            'Material'   => 'Poliuretano ou borracha industrial',
            'Medidas'    => '230 mm, 260 mm e 300 mm',
            'Modelos'    => 'Base de troca e troca rápida',
            'Aplicação'  => 'Acabadoras e fresadoras de asfalto',
        ],
    ],
    [
        'name'   => 'Raspadores para fresadora',
        'images' => ['Raspador-v3-1024x1024.jpg'],
        'intro'  => 'Ficam em volta do tambor de corte. Mantêm a área de fresagem limpa, evitam acúmulo de material, levam os fragmentos até a correia transportadora e protegem o tambor.',
        'specs'  => [
            'Compatível com' => 'Fresadoras W 1000 L e W 100',
            'Desgaste'       => 'Peça de troca periódica, essencial para um corte uniforme',
        ],
    ],
    [
        'name'   => 'Correia do rolo fresador',
        'images' => ['Correia-do-Rolo-Fresador-v2-1024x1024.jpg'],
        'intro'  => 'Transmite a força do motor para o tambor de corte e garante rotação estável. Trabalha sob vibração, impacto e temperatura alta, e precisa estar bem tensionada.',
        'specs'  => [
            'Máquinas W100'   => 'Correia 3/5V 1.000',
            'Máquinas W1000L' => 'Correia 3/5V 1.250',
        ],
    ],
    [
        'name'   => 'Rodas para fresadora',
        'images' => ['Rodas-para-Fresadorapara-Fresadora-1024x1024.jpg'],
        'intro'  => 'Rodas emborrachadas para movimentar a fresadora em oficinas, pátios e áreas de manutenção, e para ajustes finos de posição em suportes e bases móveis.',
        'specs'  => [
            'Versões'        => 'Base de troca ou roda completa',
            'Compatível com' => 'Caterpillar PM102, Wirtgen W100, Wirtgen W1000L e outras fresadoras',
        ],
    ],
    [
        'name'   => 'Cerdas para varredora',
        'images' => ['Cerdas-para-Varredora-1024x1024.jpg'],
        'intro'  => 'Para varredoras hidráulicas acopladas em mini carregadeiras. Removem poeira, areia e detritos e deixam a superfície limpa para o asfalto ou o micro revestimento.',
        'specs'  => [
            'Material'       => 'Polipropileno industrial ou aço temperado',
            'Formato'        => 'Segmentado ou rolo contínuo, conforme a máquina',
            'Medidas'        => '165 mm ou 210 mm',
            'Montagem'       => 'Encaixe universal',
            'Compatível com' => 'BobCat, Case, New Holland, Caterpillar e outras',
        ],
    ],
];

/* ---------- Funções auxiliares ---------- */

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function wa_link(string $number, string $message = DEFAULT_WA_MESSAGE): string
{
    return 'https://wa.me/' . $number . '?text=' . rawurlencode($message);
}

function img_url(string $file): string
{
    return IMG_BASE . $file;
}
