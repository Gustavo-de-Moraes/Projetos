(function () {
    "use strict";

    /* ---- Faixa de pista: pinta de amarelo conforme a rolagem ---- */
    var road = document.querySelector(".road");
    var ticking = false;

    function updateRoad() {
        var max = document.documentElement.scrollHeight - window.innerHeight;
        var progress = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
        if (road) road.style.setProperty("--p", progress.toFixed(4));
        ticking = false;
    }

    window.addEventListener("scroll", function () {
        if (!ticking) {
            ticking = true;
            window.requestAnimationFrame(updateRoad);
        }
    }, { passive: true });
    window.addEventListener("resize", updateRoad);
    updateRoad();

    /* ---- Menu no celular ---- */
    var toggle = document.querySelector(".nav-toggle");
    var nav = document.getElementById("menu");

    function setMenu(open) {
        if (!toggle || !nav) return;
        nav.classList.toggle("is-open", open);
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
    }

    if (toggle && nav) {
        toggle.addEventListener("click", function () {
            setMenu(toggle.getAttribute("aria-expanded") !== "true");
        });
        nav.addEventListener("click", function (event) {
            if (event.target.closest("a")) setMenu(false);
        });
        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") setMenu(false);
        });
    }

    /* ---- Fotos dos porta-bits ampliadas ---- */
    var dialog = document.getElementById("lightbox");

    if (dialog && typeof dialog.showModal === "function") {
        var dialogImg = dialog.querySelector("img");

        document.querySelectorAll(".gallery-btn").forEach(function (button) {
            button.addEventListener("click", function () {
                dialogImg.src = button.dataset.full;
                dialogImg.alt = button.dataset.alt || "";
                dialog.showModal();
            });
        });

        dialog.addEventListener("click", function (event) {
            if (event.target === dialog) dialog.close();
        });
    }

    /* ---- Troca de foto nos produtos com mais de uma imagem ---- */
    document.querySelectorAll("[data-gallery]").forEach(function (group) {
        var main = group.querySelector(".part-main");
        var thumbs = group.querySelectorAll(".thumb");

        thumbs.forEach(function (thumb) {
            thumb.addEventListener("click", function () {
                main.src = thumb.dataset.src;
                thumbs.forEach(function (other) {
                    other.setAttribute("aria-pressed", other === thumb ? "true" : "false");
                });
            });
        });
    });

    /* ---- Aberto agora / fechado agora (horário de Brasília) ---- */
    var status = document.getElementById("open-status");

    if (status && window.Intl && Intl.DateTimeFormat) {
        try {
            var parts = new Intl.DateTimeFormat("en-US", {
                timeZone: "America/Sao_Paulo",
                weekday: "short",
                hour: "numeric",
                minute: "numeric",
                hour12: false
            }).formatToParts(new Date());

            var info = {};
            parts.forEach(function (part) { info[part.type] = part.value; });

            var hour = parseInt(info.hour, 10) % 24;
            var minutes = hour * 60 + parseInt(info.minute, 10);
            var weekday = info.weekday; // Mon, Tue...
            var isWeekday = ["Mon", "Tue", "Wed", "Thu", "Fri"].indexOf(weekday) !== -1;
            var isOpen = isWeekday && minutes >= 8 * 60 && minutes < 18 * 60;

            status.hidden = false;
            status.dataset.open = isOpen ? "true" : "false";
            status.textContent = isOpen ? "Estamos atendendo agora" : "Fechado agora. Respondemos no próximo dia útil.";
        } catch (error) {
            status.hidden = true;
        }
    }

    /* ---- Formulário de contato ---- */
    var form = document.getElementById("contact-form");
    var formStatus = document.getElementById("form-status");

    if (form && formStatus && window.fetch) {
        var submitButton = form.querySelector("button[type='submit']");

        function setStatus(message, ok) {
            formStatus.textContent = message;
            formStatus.classList.toggle("is-ok", ok === true);
            formStatus.classList.toggle("is-error", ok === false);
        }

        function validate() {
            var firstInvalid = null;
            var rules = [
                { id: "nome", ok: function (v) { return v.trim().length >= 2; }, msg: "Informe seu nome." },
                { id: "telefone", ok: function (v) { return v.replace(/\D/g, "").length >= 8; }, msg: "Informe um telefone ou WhatsApp válido, com DDD." },
                { id: "email", ok: function (v) { return v === "" || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }, msg: "O e-mail informado não parece válido." },
                { id: "mensagem", ok: function (v) { return v.trim().length >= 5; }, msg: "Escreva a peça e a máquina que você procura." }
            ];

            rules.forEach(function (rule) {
                var field = document.getElementById(rule.id);
                var valid = rule.ok(field.value);
                field.classList.toggle("is-invalid", !valid);
                field.setAttribute("aria-invalid", valid ? "false" : "true");
                if (!valid && !firstInvalid) {
                    firstInvalid = { field: field, msg: rule.msg };
                }
            });

            return firstInvalid;
        }

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            var problem = validate();
            if (problem) {
                setStatus(problem.msg, false);
                problem.field.focus();
                return;
            }

            submitButton.disabled = true;
            setStatus("Enviando...", null);

            fetch(form.action, {
                method: "POST",
                body: new FormData(form),
                headers: { "Accept": "application/json" }
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return { ok: response.ok && data.ok, message: data.message };
                    });
                })
                .then(function (result) {
                    setStatus(result.message, result.ok);
                    if (result.ok) form.reset();
                })
                .catch(function () {
                    setStatus("Não conseguimos enviar agora. Fale com a gente pelo WhatsApp.", false);
                })
                .then(function () {
                    submitButton.disabled = false;
                });
        });
    }
})();
