function show_post(post) {
    // Atualizar o título da página
    document.title = post.nome_produto;

    let BannerPost = document.querySelector('.banner-img');
    BannerPost.src = post.banner;

    // Atualizar os elementos do DOM com os dados da notícia
    atualizarElemento('.titulo-principal', post.nome_produto);
    atualizarElemento('.intro', post.introducao);
    atualizarElemento('.conteudo-composicao', post.composicao);
    atualizarElemento('.conteudo-combinacoes', post.combinacoes_perigosas);
    atualizarElemento('.conteudo-manipulacao', post.manipulacao);
}

function atualizarElemento(seletor, valor) {
    const elemento = document.querySelector(seletor);
    if (elemento) {
        // Usar innerHTML para interpretar as tags HTML embutidas
        elemento.innerHTML = valor;
    }
}

export default show_post;
