const forms = document.querySelectorAll(".destroy-form");

forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const title = form.dataset.title;

        const is_confirmed = confirm(
            `Sei sicuro di voler cancellare il progetto ${title}?`
        );

        if (is_confirmed) form.submit();
    });
});
