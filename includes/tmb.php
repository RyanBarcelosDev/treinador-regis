<?php
/**
 * Cálculo da Taxa Metabólica Basal — fórmula de Mifflin-St Jeor.
 */

const NIVEIS_ATIVIDADE = [
    'sedentario' => ['label' => 'Sedentário', 'descricao' => 'Pouco ou nenhum exercício', 'fator' => 1.2],
    'leve' => ['label' => 'Levemente ativo', 'descricao' => 'Exercício 1–3x por semana', 'fator' => 1.375],
    'moderado' => ['label' => 'Moderadamente ativo', 'descricao' => 'Exercício 3–5x por semana', 'fator' => 1.55],
    'intenso' => ['label' => 'Muito ativo', 'descricao' => 'Exercício 6–7x por semana', 'fator' => 1.725],
    'extremo' => ['label' => 'Extremamente ativo', 'descricao' => 'Treino pesado 2x ao dia', 'fator' => 1.9],
];

/** TMB em kcal/dia. $sexo: "masculino" ou "feminino". */
function calcular_tmb(string $sexo, float $pesoKg, float $alturaCm, int $idade): int
{
    $base = 10 * $pesoKg + 6.25 * $alturaCm - 5 * $idade;
    return (int) round($sexo === 'masculino' ? $base + 5 : $base - 161);
}

/** Gasto diário total = TMB × fator de atividade (kcal/dia). */
function calcular_gasto_diario(int $tmb, string $nivel): int
{
    $fator = NIVEIS_ATIVIDADE[$nivel]['fator'] ?? 1.2;
    return (int) round($tmb * $fator);
}

/** Formata número no padrão brasileiro (1.234). */
function numero_br(int $n): string
{
    return number_format($n, 0, ',', '.');
}
