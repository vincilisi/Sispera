document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector('#tags-input');
    const form = document.querySelector('#edit-movie-form');

    if (!input || !form) return;

    // Recupera la whitelist da data attribute (opzionale)
    // Se vuoi passarla dinamicamente, aggiungi nel blade un data-whitelist, es:
    // data-whitelist='@json($allTags->pluck("name"))'
    // Qui uso una whitelist fissa come esempio:
    const whitelist = window.tagsWhitelist || [];

    // Inizializza Tagify
    const tagify = new Tagify(input, {
        whitelist: whitelist,
        dropdown: {
            enabled: 1,
            maxItems: 20,
            classname: 'tags-look',
            fuzzySearch: true,
        }
    });

    form.addEventListener('submit', function (e) {
        // Rimuovi input tags[] nascosti esistenti (se ci sono)
        const oldInputs = form.querySelectorAll('input[name="tags[]"]');
        oldInputs.forEach(i => i.remove());

        // Ottieni i tag in formato array di stringhe
        const tags = tagify.value.map(item => item.value);

        // Crea hidden input tags[] per ogni tag
        tags.forEach(tag => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'tags[]';
            hiddenInput.value = tag;
            form.appendChild(hiddenInput);
        });
    });
});
