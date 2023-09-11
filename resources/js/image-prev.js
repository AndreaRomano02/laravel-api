const placeholder =
    "https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=";
const imageField = document.getElementById("img");
const previewField = document.getElementById("image-preview");

let imageUrl = null;

imageField.addEventListener("change", () => {
    // Ottieni il file selezionato
    const selectedFile = imageField.files[0];

    if (selectedFile) {
        // Aggiorna l'anteprima dell'immagine con l'URL del file selezionato
        imageUrl = URL.createObjectURL(selectedFile);
        previewField.src = imageUrl;

        // Aggiorna il valore dell'input "img" con il nome del file selezionato
        imageField.value = selectedFile.name;
    } else {
        // Se nessun file è stato selezionato, mostra l'immagine di placeholder
        previewField.src = placeholder;
    }
});

window.addEventListener("beforeunload", () => {
    if (imageUrl) URL.revokeObjectURL(imageUrl);
});
