<?php
$pagina = 'sobre';
$titulo = 'Minha trajetória — Treinador Regis';
$descricao = 'Conheça o Treinador Regis, personal trainer em São Paulo e Capão Redondo, e o método que guia cada treino.';
$og_descricao = 'Disciplina, método e propósito: conheça a história do Treinador Regis.';
$og_tipo = 'profile';
require __DIR__ . '/includes/header.php';
?>

<section class="sobre-hero">
  <div class="container sobre-grid">
    <div class="sobre-texto reveal">
      <?= titulo_secao('Minha', 'Trajetória', 'h1', 'big') ?>
      <p class="font-wide quote">“<?= e(SITE_FRASE) ?>.”</p>
      <div class="sobre-paragrafos">
        <p>
          Sou o Regis, personal trainer em São Paulo. Atendo no Capão Redondo e região — e
          online para quem quer treinar comigo de qualquer lugar.
        </p>
        <p>
          Meu trabalho é simples de explicar e exige muito para fazer:
          <strong>método, constância e acompanhamento de perto</strong>.
          Cada aluno tem um ponto de partida diferente, e é por isso que nenhum treino é igual ao outro.
        </p>
      </div>
      <img src="img/logo-word_yellow.png" alt="Treinador Regis" class="sobre-logo">
    </div>
    <div class="sobre-foto">
      <img src="img/foto-regis.jpeg" alt="Treinador Regis de braços cruzados na academia">
      <div class="bar"></div>
    </div>
  </div>
</section>

<?php
require __DIR__ . '/includes/secoes/metodo.php';
require __DIR__ . '/includes/secoes/contato-cta.php';
require __DIR__ . '/includes/footer.php';
