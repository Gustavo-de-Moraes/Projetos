<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/includes/data.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

require __DIR__ . '/includes/header.php';
$mainWa = wa_link($whatsapp[0]['number']);
?>

<!-- ============ Abertura ============ -->
<section class="hero" id="topo">
    <div class="wrap hero-grid">
        <div class="hero-copy">
            <h1>Peças que mantêm sua máquina trabalhando.</h1>
            <p class="lede">
                Fornecemos peças de reposição para acabadoras, fresadoras, mini carregadeiras,
                rolos compactadores e usinas de asfalto. Com garantia, testes e entrega rápida.
            </p>
            <div class="hero-actions">
                <a class="btn btn-cta" href="<?= e($mainWa) ?>" target="_blank" rel="noopener">Pedir orçamento no WhatsApp</a>
                <a class="link-plain" href="#pecas">Ver as peças</a>
            </div>
        </div>
        <figure class="hero-figure">
            <img src="<?= e($site['image']) ?>" alt="Equipamento de pavimentação asfáltica em operação" width="900" height="1100" fetchpriority="high">
        </figure>
    </div>

    <div class="wrap">
        <ul class="machines" aria-label="Equipamentos atendidos">
            <?php foreach ($machines as $machine): ?>
                <li><?= e($machine) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- ============ Empresa ============ -->
<section class="section" id="empresa">
    <div class="wrap about-grid">
        <div>
            <h2>Quem somos</h2>
        </div>
        <div class="about-body">
            <p class="big">
                Com anos de experiência em pavimentação asfáltica, a Viatractor fornece peças de reposição
                confiáveis, com preço competitivo e atendimento especializado para a sua operação não parar.
            </p>
            <p>
                Nossas peças são feitas com materiais de alta qualidade e durabilidade. Atendemos acabadoras e fresadoras
                das marcas Ciber, Wirtgen, Cifali e B.Green Peças, além de rolos compactadores, vassouras mecânicas,
                espargidores, carregadeiras, motoniveladoras e escavadeiras.
            </p>

            <dl class="commitments">
                <?php foreach ($commitments as $item): ?>
                    <div>
                        <dt><?= e($item['title']) ?></dt>
                        <dd><?= e($item['text']) ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>

            <p class="mission">
                Nossa missão é perpetuar os negócios da empresa e ampliar sua participação no mercado,
                atendendo às expectativas de clientes, colaboradores e fornecedores.
            </p>
        </div>
    </div>
</section>

<!-- ============ Porta-bits (fabricação própria) ============ -->
<section class="section section-dark" id="porta-bits">
    <div class="wrap bits-grid">
        <div class="bits-copy">
            <h2>Fabricamos porta-bits</h2>
            <p class="lede">
                Sistemas de fixação robustos para os bits de corte que soltam e fragmentam o pavimento.
                Feitos para durar em obra pesada.
            </p>

            <h3>Modelos disponíveis</h3>
            <ul class="chips">
                <?php foreach ($portaBits['models'] as $model): ?>
                    <li>Porta-bits <?= e($model) ?></li>
                <?php endforeach; ?>
            </ul>

            <h3>Usados em</h3>
            <ul class="plain-list">
                <?php foreach ($portaBits['uses'] as $use): ?>
                    <li><?= e($use) ?></li>
                <?php endforeach; ?>
            </ul>

            <p class="fit">Compatíveis com fresadoras e recicladoras <?= e($portaBits['brands']) ?>.</p>

            <a class="btn btn-cta" target="_blank" rel="noopener"
               href="<?= e(wa_link($whatsapp[0]['number'], 'Olá! Vim pelo site da Viatractor e quero um orçamento de porta-bits.')) ?>">
                Pedir orçamento de porta-bits
            </a>
        </div>

        <ul class="gallery" aria-label="Fotos dos porta-bits">
            <?php foreach ($portaBits['gallery'] as $photo): ?>
                <li>
                    <button type="button" class="gallery-btn" data-full="<?= e(img_url($photo['src'])) ?>" data-alt="<?= e($photo['alt']) ?>" aria-label="Ampliar: <?= e($photo['alt']) ?>">
                        <img src="<?= e(img_url($photo['src'])) ?>" alt="<?= e($photo['alt']) ?>" loading="lazy" width="400" height="400">
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- ============ Catálogo de peças ============ -->
<section class="section" id="pecas">
    <div class="wrap">
        <div class="section-head">
            <h2>Peças de reposição</h2>
            <p class="lede">
                Fale com a gente informando o modelo da máquina e a peça que você precisa.
                Respondemos pelo WhatsApp com preço e prazo.
            </p>
        </div>

        <div class="parts">
            <?php foreach ($products as $i => $product): ?>
                <?php $waMsg = 'Olá! Vim pelo site da Viatractor e quero um orçamento de: ' . $product['name'] . '.'; ?>
                <article class="part">
                    <div class="part-media" data-gallery>
                        <img class="part-main"
                             src="<?= e(img_url($product['images'][0])) ?>"
                             alt="<?= e($product['name']) ?>"
                             width="640" height="640" loading="lazy">
                        <?php if (count($product['images']) > 1): ?>
                            <ul class="thumbs" aria-label="Outras fotos de <?= e($product['name']) ?>">
                                <?php foreach ($product['images'] as $k => $file): ?>
                                    <li>
                                        <button type="button" class="thumb" data-src="<?= e(img_url($file)) ?>"
                                                aria-label="Ver foto <?= $k + 1 ?> de <?= e($product['name']) ?>"
                                                aria-pressed="<?= $k === 0 ? 'true' : 'false' ?>">
                                            <img src="<?= e(img_url($file)) ?>" alt="" loading="lazy" width="64" height="64">
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="part-body">
                        <h3><?= e($product['name']) ?></h3>
                        <p><?= e($product['intro']) ?></p>
                        <dl class="specs">
                            <?php foreach ($product['specs'] as $label => $value): ?>
                                <div>
                                    <dt><?= e((string) $label) ?></dt>
                                    <dd><?= e($value) ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                        <a class="btn btn-outline" target="_blank" rel="noopener"
                           href="<?= e(wa_link($whatsapp[0]['number'], $waMsg)) ?>">
                            Pedir orçamento de <?= e(mb_strtolower($product['name'])) ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ Contato ============ -->
<section class="section section-concrete" id="contato">
    <div class="wrap contact-grid">
        <div class="contact-form-col">
            <h2>Fale conosco</h2>
            <p class="lede">Conte qual máquina e qual peça você procura. Retornamos em horário comercial.</p>

            <?php if ($flash): ?>
                <p class="form-status <?= $flash['ok'] ? 'is-ok' : 'is-error' ?>" role="status"><?= e($flash['message']) ?></p>
            <?php endif; ?>

            <form class="contact-form" id="contact-form" action="contato.php" method="post" novalidate>
                <div class="hp" aria-hidden="true">
                    <label>Não preencha este campo <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                </div>

                <div class="field">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" type="text" autocomplete="name" required maxlength="100">
                </div>
                <div class="field">
                    <label for="empresa-campo">Empresa <span class="optional">(opcional)</span></label>
                    <input id="empresa-campo" name="empresa" type="text" autocomplete="organization" maxlength="120">
                </div>
                <div class="field">
                    <label for="telefone">Telefone ou WhatsApp</label>
                    <input id="telefone" name="telefone" type="tel" inputmode="tel" autocomplete="tel" required maxlength="30">
                </div>
                <div class="field">
                    <label for="email">E-mail <span class="optional">(opcional)</span></label>
                    <input id="email" name="email" type="email" autocomplete="email" maxlength="120">
                </div>
                <div class="field field-wide">
                    <label for="interesse">O que você procura?</label>
                    <select id="interesse" name="interesse">
                        <option value="">Escolha uma opção</option>
                        <option>Porta-bits</option>
                        <?php foreach ($products as $product): ?>
                            <option><?= e($product['name']) ?></option>
                        <?php endforeach; ?>
                        <option>Outra peça</option>
                    </select>
                </div>
                <div class="field field-wide">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="5" required maxlength="2000" placeholder="Informe a marca e o modelo da máquina e a peça que você precisa."></textarea>
                </div>

                <div class="form-actions field-wide">
                    <button class="btn btn-send" type="submit" style="background:#ff5a1f;color:#13171a;-webkit-text-fill-color:#13171a;border:2px solid #ff5a1f;border-radius:6px;padding:15px 32px;font:700 17px/1.2 Arial,sans-serif;cursor:pointer;min-width:160px">Enviar</button>
                    <p class="form-status" id="form-status" role="status" aria-live="polite"></p>
                </div>
            </form>
        </div>

        <aside class="contact-side" aria-label="Outros canais de contato">
            <h3>WhatsApp</h3>
            <ul class="wa-list">
                <?php foreach ($whatsapp as $person): ?>
                    <li>
                        <a href="<?= e(wa_link($person['number'])) ?>" target="_blank" rel="noopener">
                            <span class="wa-name"><?= e($person['name']) ?></span>
                            <span class="wa-num"><?= e($person['display']) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h3>Telefone e e-mail</h3>
            <p>
                <a href="tel:<?= e($site['phone_href']) ?>"><?= e($site['phone']) ?></a><br>
                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
            </p>

            <h3>Horário de atendimento</h3>
            <p>Segunda a sexta, das 8h às 18h.<br>Sábado e domingo: fechado.</p>
            <p class="open-status" id="open-status" hidden></p>

            <h3>Instagram</h3>
            <p><a href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener">@viatractor_</a></p>
        </aside>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
