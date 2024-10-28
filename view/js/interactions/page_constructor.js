import increment_view from "./increment_view.js";
import show_post from "./show_post.js";

const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

if (!id) {
    console.error('ID não encontrado na URL.');
}

var url = '../controller/controller_posts.php';

//Fetch do JSON 
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

    show_post(postagem);
    increment_view(id);

  })
  .catch(error => {
    console.error('Erro: ' + error);
  });