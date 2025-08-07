document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector('#tags-input');
    const form = document.querySelector('#create-movie-form');

    if (!input || !form) return;

    // Prendo la whitelist dal data attribute
    const whitelist = JSON.parse(input.getAttribute('data-whitelist') || '[]');

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
        // Rimuovo eventuali hidden input tags[] creati in precedenza
        const oldInputs = form.querySelectorAll('input[name="tags[]"]');
        oldInputs.forEach(i => i.remove());

        // Prendo i valori tag come array di stringhe
        const tags = tagify.value.map(item => item.value);

        // Aggiungo un hidden input tags[] per ogni tag
        tags.forEach(tag => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'tags[]';
            hiddenInput.value = tag;
            form.appendChild(hiddenInput);
        });
    });
});
