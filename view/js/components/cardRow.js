import { formatDate } from "./dateFormat.js";

export function cardRow(data) {
    const cardRowContainer = document.createElement('div');
    cardRowContainer.classList.add('card-row-container');
    cardRowContainer.id = data.id;

    const cardImg = document.createElement('img');
    cardImg.src = data.imagem;
    cardImg.classList.add('card-img');
    cardRowContainer.appendChild(cardImg);

    const cardContent = document.createElement('div');
    cardContent.classList.add('card-content');
    cardRowContainer.appendChild(cardContent);

    const title = document.createElement('h3');
    title.classList.add('title');
    title.textContent = data.titulo;

    // DATE
    const dateBase = document.createElement("div");
    dateBase.classList.add("date-base");

    const iconDate = document.createElement("i");
    iconDate.classList.add("fa-solid", "fa-clock");
    iconDate.style.color = "#00d619";

    const date = document.createElement("p");
    date.classList.add("date");
    date.textContent = formatDate(data.data_publicacao);

    const barra = document.createElement("p");
    barra.textContent = "|";

    const pCategoria = document.createElement("p");

    let id_categoria = data.categoria;
    let categoria;

    switch (id_categoria) {
        case 1:
            categoria = "Misturas da Internet";
            break;
        case 2:
            categoria = "Mito ou Verdade";
            break;
        case 3:
            categoria = "Misturas Perigosas";
            break;
        case 4:
            categoria = "Usos Errados";
            break;
        case 5:
            categoria = "Produtos de Higiene";
            break;
        default:
            categoria = null;
            break;
    }

    pCategoria.textContent = categoria;

    dateBase.appendChild(iconDate);
    dateBase.appendChild(date);
    dateBase.appendChild(barra);
    dateBase.appendChild(pCategoria);

    // CONTENT
    const text = document.createElement('p');
    text.classList.add('text');

    const maxLength = 200;
    text.innerHTML = data.descricao.length > maxLength 
      ? `${data.descricao.substring(0, maxLength)}...` 
      : data.descricao;

    const btnView = document.createElement('a');
    btnView.href = `./conteudo.html?id=${data.id}`;
    btnView.classList.add('btn-view');
    btnView.textContent = 'Saiba mais';

    cardContent.appendChild(title);
    cardContent.appendChild(dateBase);
    cardContent.appendChild(text);
    cardContent.appendChild(btnView);

    return cardRowContainer;
}
