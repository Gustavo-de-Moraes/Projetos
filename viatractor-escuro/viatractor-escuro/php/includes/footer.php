<?php
/** @var array $site */
/** @var array $whatsapp */
?>
</main>

<footer class="site-footer">
    <div class="wrap footer-inner">
        <p class="wordmark wordmark-light"><span class="wordmark-bar" aria-hidden="true"></span>Viatractor</p>
        <p class="footer-text">Peças de reposição e porta-bits para pavimentação asfáltica.</p>
        <p class="footer-meta">
            © <?= date('Y') ?> Viatractor.
            <a href="<?= e($site['privacy_url']) ?>">Política de privacidade</a>
        </p>
    </div>
</footer>

<a class="wa-float" href="<?= e(wa_link($whatsapp[0]['number'])) ?>" target="_blank" rel="noopener" aria-label="Falar com a Viatractor no WhatsApp">
    <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12.04 2a9.9 9.9 0 0 0-8.5 14.9L2 22l5.25-1.38A9.9 9.9 0 1 0 12.04 2Zm0 18.1c-1.5 0-2.97-.4-4.25-1.17l-.3-.18-3.12.82.83-3.04-.2-.31a8.1 8.1 0 1 1 7.04 3.88Zm4.45-6.06c-.24-.12-1.44-.71-1.66-.79-.22-.08-.39-.12-.55.12-.16.24-.63.79-.77.95-.14.16-.28.18-.52.06-.24-.12-1.03-.38-1.96-1.21-.72-.65-1.21-1.45-1.35-1.69-.14-.24-.01-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.55-1.32-.75-1.81-.2-.47-.4-.41-.55-.42h-.47c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.51.1.46-.07 1.44-.59 1.64-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28Z"/></svg>
    <span>WhatsApp</span>
</a>

<dialog class="lightbox" id="lightbox" aria-label="Foto ampliada">
    <form method="dialog"><button class="lightbox-close" aria-label="Fechar foto">Fechar</button></form>
    <img src="" alt="">
</dialog>

<script src="../javascript/main.js" defer></script>
</body>
</html>
