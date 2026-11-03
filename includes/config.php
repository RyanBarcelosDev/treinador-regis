<?php
/**
 * Configurações gerais do site.
 * Altere aqui WhatsApp, Instagram, região e serviços — tudo o site lê deste arquivo.
 */

const SITE_NOME = 'Treinador Regis';
const SITE_WHATSAPP_NUMERO = '5511954661150';
const SITE_WHATSAPP_EXIBICAO = '+55 11 95466-1150';
const SITE_INSTAGRAM_URL = 'https://www.instagram.com/treinadorregis';
const SITE_INSTAGRAM_USUARIO = '@treinadorregis';
const SITE_REGIAO = 'São Paulo, Capão Redondo e região';
const SITE_FRASE = 'Disciplina é o que te leva mais longe';

/** Escapa texto para exibir com segurança no HTML. */
function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

/** Gera o link do WhatsApp com mensagem pronta. */
function whatsapp_link(string $mensagem = 'Olá, Regis! Vim pelo site e quero saber mais sobre os treinos.'): string
{
    return 'https://wa.me/' . SITE_WHATSAPP_NUMERO . '?text=' . rawurlencode($mensagem);
}

/** Serviços — usados na página inicial e na página Serviços. */
$SERVICOS = [
    [
        'id' => 'personal',
        'titulo' => 'Personal presencial',
        'tag' => 'Presencial',
        'resumo' => 'Treino individual, lado a lado, com correção em cada repetição.',
        'descricao' => 'Acompanhamento individual na academia, em condomínio ou ao ar livre. Cada sessão é pensada para o seu objetivo, seu ritmo e sua rotina.',
        'itens' => ['Treino 100% individual', 'Correção de postura e execução', 'Ajustes semana a semana'],
        'imagem' => 'img/personal-presencial.jpg',
    ],
    [
        'id' => 'grupo',
        'titulo' => 'Treino em grupo',
        'tag' => 'Em grupo',
        'resumo' => 'Energia de equipe, intensidade de verdade e custo menor.',
        'descricao' => 'Turmas reduzidas com treinos funcionais e de força. A motivação do grupo te empurra mais longe — sem perder a atenção do treinador.',
        'itens' => ['Turmas reduzidas', 'Funcional e força', 'Ambiente motivador'],
        'imagem' => 'img/treino-grupo-limpo.jpg',
    ],
    [
        'id' => 'avaliacao',
        'titulo' => 'Avaliação física',
        'tag' => 'Avaliação',
        'resumo' => 'Saiba exatamente de onde você parte e acompanhe sua evolução.',
        'descricao' => 'Medidas corporais, composição e testes de desempenho para montar um plano baseado em dados — e comparar seus resultados ao longo do tempo.',
        'itens' => ['Medidas e composição corporal', 'Testes de mobilidade e força', 'Relatório de evolução'],
        'imagem' => 'img/avaliacao-fisica.jpg',
    ],
    [
        'id' => 'online',
        'titulo' => 'Consultoria online',
        'tag' => 'Online',
        'resumo' => 'Seu treino no celular, com acompanhamento de onde você estiver.',
        'descricao' => 'Planilha personalizada, vídeos de execução e contato direto pelo WhatsApp para treinar em casa, na academia ou viajando.',
        'itens' => ['Treino personalizado no app', 'Vídeos de execução', 'Suporte pelo WhatsApp'],
        'imagem' => 'img/consultoria-online.jpg',
    ],
];

/** Ícones (desenhos em SVG, sem bibliotecas externas). */
function icone(string $nome, string $classe = ''): string
{
    $desenhos = [
        'seta' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
        'direita' => '<path d="m9 18 6-6-6-6"/>',
        'esquerda' => '<path d="m15 18-6-6 6-6"/>',
        'info' => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
        'mais' => '<path d="M5 12h14"/><path d="M12 5v14"/>',
        'whatsapp' => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
        'instagram' => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        'local' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'predio' => '<path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/>',
        'halter' => '<path d="m6.5 6.5 11 11"/><path d="m21 21-1-1"/><path d="m3 3 1 1"/><path d="m18 22 4-4"/><path d="m2 6 4-4"/><path d="m3 10 7-7"/><path d="m14 21 7-7"/>',
        'arvores' => '<path d="M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z"/><path d="M7 16v6"/><path d="M13 19v3"/><path d="M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5"/>',
        'pessoas' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'mundo' => '<path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"/><path d="M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><circle cx="12" cy="12" r="10"/>',
        'check' => '<path d="M20 6 9 17l-5-5"/>',
        'fogo' => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
        'menu' => '<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>',
        'fechar' => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
    ];
    $desenho = $desenhos[$nome] ?? '';
    return '<svg class="icon ' . e($classe) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $desenho . '</svg>';
}

/** Título de seção com as duas setas amarelas (parte fina + parte em negrito). */
function titulo_secao(string $fino, string $negrito, string $tag = 'h2', string $classe = ''): string
{
    $setas = '<svg class="chevrons" viewBox="0 0 28 20" aria-hidden="true"><path d="M10 0h6L8 10l8 10h-6L2 10z"/><path d="M20 0h6l-8 10 8 10h-6l-8-10z" opacity="0.55"/></svg>';
    return "<{$tag} class=\"section-title " . e($classe) . "\">{$setas}<span><span class=\"light\">" . e($fino) . ' </span><span class="bold">' . e($negrito) . "</span></span></{$tag}>";
}
