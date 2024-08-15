import { cardRow } from "../components/cardRow.js";

const url = "http://localhost/projeto_quimica/controller/controller_posts.php";

const baseSearchNews = document.querySelector(".result-search");

const alertSearch = document.querySelector(".alertSearch");
const btnFilter = document.querySelectorAll(".room");
let activeFilters = [];
let postagens = [];

// Função para filtrar postagens com base na palavra-chave e nos filtros ativos
function filterPosts(data, keyword, activeFilters) {
  return data.filter((item) => {
    const searchStr =
      `${item.nome_produto} ${item.introducao} ${item.composicao} ${item.combinacoes_perigosas} ${item.manipulacao}`.toLowerCase();
    const matchesKeyword = searchStr.includes(keyword.toLowerCase());

    // Se não houver filtros ativos, ou se o ID da postagem estiver nos filtros ativos
    const matchesFilter =
      activeFilters.length === 0 || activeFilters.includes(item.id_comodo); // Supondo que room_id seja o campo com o ID do comodo

    return matchesKeyword && matchesFilter;
  });
}

// Função para buscar e filtrar postagens
function fetchAndFilterPosts(keyword) {
  fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro na solicitação: " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      const filteredPosts = filterPosts(data, keyword, activeFilters);

      console.log(filteredPosts);

      if (filteredPosts.length === 0) {
        alertSearch.style.display = "block";
        baseSearchNews.innerHTML = ""; // Limpa os resultados exibidos anteriormente
      } else {
        alertSearch.style.display = "none";

        postagens = filteredPosts.map((postagem) => ({
          id: postagem.id_postagem,
          titulo: postagem.nome_produto,
          descricao: postagem.descricao,
          data_publicacao:
            postagem.data_publicacao || new Date().toISOString().split("T")[0],
          categoria: postagem.id_categoria,
          imagem: postagem.banner,
          acessos: postagem.acessos,
        }));

        renderSearchNews();
        setupCardClickHandlers();
      }
    })
    .catch((error) => {
      console.error("Erro: " + error);
    });
}

// Função para extrair a keyword da URL e definir como valor no input
function setKeywordFromUrl() {
  const params = new URLSearchParams(window.location.search);
  const keyword = params.get("query"); // Extrai a keyword da URL

  const searchInput = document.querySelector(".search-input-page");
  if (keyword) {
    searchInput.value = keyword;
    fetchAndFilterPosts(keyword);
  } else {
    console.error("Nenhuma keyword encontrada na URL.");
  }
}

// Inicializa o input com a keyword da URL quando a página carregar
document.addEventListener("DOMContentLoaded", setKeywordFromUrl);

// Adiciona um listener para a barra de pesquisa
const searchInput = document.querySelector(".search-input-page");
searchInput.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    const keyword = searchInput.value.trim();
    if (keyword) {
      fetchAndFilterPosts(keyword);
    } else {
      console.error("Por favor, insira uma palavra-chave para buscar.");
    }
  }
});

function renderSearchNews() {
  baseSearchNews.innerHTML = "";
  let currentIndex = 0;
  const itemsPerPage = 6;
  const prevPageBtn = document.getElementById("prev-page");
  const nextPageBtn = document.getElementById("next-page");
  const pageNumber = document.querySelector(".number");

  let SearchNews = postagens.sort((a, b) => b.acessos - a.acessos).slice(0, 18);

  // Número total de páginas necessárias para exibir todas as notícias
  const totalPages = Math.ceil(SearchNews.length / itemsPerPage);

  function renderCards(startIndex) {
    baseSearchNews.innerHTML = "";
    const endIndex = Math.min(startIndex + itemsPerPage, SearchNews.length);
    for (let i = startIndex; i < endIndex; i++) {
      baseSearchNews.appendChild(cardRow(SearchNews[i]));
    }
    updatePageNumber();
  }

  function updatePageNumber() {
    const currentPage = Math.ceil((currentIndex + 1) / itemsPerPage);
    pageNumber.textContent = currentPage;
    prevPageBtn.style.color = currentPage > 1 ? "black" : "white";
    nextPageBtn.style.color = currentPage < totalPages ? "black" : "white";
  }

  prevPageBtn.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex -= itemsPerPage;
      renderCards(currentIndex);
    }
  });

  nextPageBtn.addEventListener("click", () => {
    if (currentIndex + itemsPerPage < SearchNews.length) {
      currentIndex += itemsPerPage;
      renderCards(currentIndex);
    }
  });

  renderCards(currentIndex);
}

// Listener para os botões de filtro de comodos
btnFilter.forEach((btn) => {
  btn.addEventListener("click", () => {
    const filterId = parseInt(btn.id);

    if (btn.classList.contains("active")) {
      btn.style.backgroundColor = "white";
      btn.style.borderColor = "rgb(194, 194, 194)";
      btn.classList.remove("active");

      // Remover o ID da lista de filtros ativos
      activeFilters = activeFilters.filter((id) => id !== filterId);
    } else {
      btn.style.backgroundColor = "#8ff39b";
      btn.style.borderColor = "#00cd18";
      btn.classList.add("active");

      // Adicionar o ID à lista de filtros ativos
      activeFilters.push(filterId);
    }

    // Refazer a busca com base nos filtros ativos e na palavra-chave
    const keyword = searchInput.value.trim();
    fetchAndFilterPosts(keyword);
  });
});

function setupCardClickHandlers() {
  const ArrayCards = document.querySelectorAll(".result-search");
  const cardColumnTotality = [];

  ArrayCards.forEach((array) => {
    cardColumnTotality.push(...array.children);
  });

  cardColumnTotality.forEach((card) => {
    card.addEventListener("click", () => {
      window.location.href = `./conteudo.html?id=${card.id}`;
    });
  });
}
