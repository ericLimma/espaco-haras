document.addEventListener("DOMContentLoaded", () => {
        const imagens = ["carrossel-1.webp", "carrossel-3.webp", "carrossel-4.webp"];
        const caminho = "./assets/img/carousel/";

        const container = document.getElementById("carousel-container");

        if (!container) {
                console.error("Elemento #carousel-container não encontrado!");
                return;
        }

        imagens.forEach(nome => {
                const img = document.createElement("img");
                img.src = caminho + nome;
                img.alt = nome.replace(".webp", "").replace("-", " "); // Formata o alt
                img.classList.add("img-container");
                container.appendChild(img);
        });
});
