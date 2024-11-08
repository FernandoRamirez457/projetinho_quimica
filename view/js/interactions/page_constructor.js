import increment_view from "./increment_view.js";
import show_post from "./show_post.js";

const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

if (!id) {
    console.error('ID não encontrado na URL.');
}

const url = '../controller/controller_posts.php';

// Exibe o esqueleto de carregamento inicial
document.querySelectorAll('.skeleton').forEach(el => el.classList.add('active'));

// Fetch do JSON
fetch(url)
  .then(response => {
    if (!response.ok) {
      throw new Error('Erro na solicitação: ' + response.status);
    }
    return response.json();
  })
  .then(data => {
    const postagem = data.find(item => item.id_postagem == id);

    if (!postagem) {
        console.error('Postagem não encontrada para o ID fornecido.');
        return;
    }

    // Chama show_post após os dados estarem carregados
    show_post(postagem);

    // Incrementa a visualização
    increment_view(id);

    // Remove o esqueleto de carregamento após a atualização do conteúdo
    document.querySelectorAll('.skeleton').forEach(el => el.classList.remove('active'));
    
  })
  .catch(error => {
    console.error('Erro: ' + error);
  });
