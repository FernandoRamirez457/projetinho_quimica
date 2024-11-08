<?php
session_start();


// Recupera informações do usuário que estão na sessão
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome_user'];
$email = $_SESSION['email_user'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Usuário</title>
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="./css/assets/main.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="menu-icon" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="navbar-content">
            <a href="./index.html"><img src="./img/logo_q_perigo.png" alt=""></a>
            <div class="functions">
                <div class="search-container">
                    <label for="search-input" class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="text" class="search-input" id="search-input" required />
                </div>
                <div class="profile"><i class="fa-solid fa-user"></i></div>
            </div>
        </div>
    </header>
    <aside class="sidebar" id="sidebar">
        <p class="close-btn" onclick="toggleSidebar()">×</p>
        <a href="./index.html"><div class="logotipo"><img src="./img/logo_q_perigo.png" alt=""></div></a>
        <div class="sidebar-content">
            <a href="./index.html" class="sidebar-link active">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fa-solid fa-gamepad"></i>
                <span>Jogo: Clean House</span>
            </a>
            <a href="./contribuidor.html" class="sidebar-link">
                <i class="fa-solid fa-handshake-angle"></i>
                <span>Contribua</span>
            </a>

            <div class="conteudos">Acesse Também
                <div class="triangulo"></div>
            </div>

            <a href="./subpaginas/dicas_web.html" class="sidebar-link">
                <i class="fa-solid fa-lightbulb"></i>
                <span>Dicas da Web</span>
            </a>
            <a href="./subpaginas/desvendando_mitos.html" class="sidebar-link">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
                <span>Desvendando Mitos</span>
            </a>
            <a href="./subpaginas/produtos_limpeza.html" class="sidebar-link">
                <i class="fa-solid fa-soap"></i>
                <span>Produtos de Limpeza</span>
            </a>
        </div>
    </aside>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>
    <!--FIM HEADER-->

    <main>
        <div class="user-header">
            <h2>Bem Vindo(a): <?php echo $nome ?></h2>
        </div>
        <section class="stats-section">
            <div class="stats-header">
                <h3>Estatísticas Gerais:</h3>
            </div>
            <div class="stats-grid">
                <!-- Coluna com dois cards menores -->
                <div>
                    <div class="stats-card stats-card-small">
                        <h4>Total da Pontuação do Jogador:</h4>
                        <div class="score">
                            <img src="./img/Rating.png" alt="Rating" class="score-rating">
                            <p>+ 4000</p>
                        </div>
                    </div>
                    <div class="stats-card stats-card-small">
                        <h4>Nº de Tarefas concluídas com perfeição</h4>
                        <p>Conteúdo do card pequeno 2.</p>
                    </div>
                </div>

                <!-- Coluna com dois cards grandes lado a lado -->
                <div>
                <div class="stats-card stats-card-large">
                    <div class="chart-container">
                        <h4>Gráfico de conclusão geral:</h4>
                        <div class="chart-content">
                            <img src="img/grafico1.svg" alt="Gráfico de conclusão geral">
                            <div class="legend">
                                <p><span class="legend-color" style="background-color: #ff0000;"></span> Concluído</p>
                                <p><span class="legend-color" style="background-color: #00ff00;"></span> Em progresso</p>
                                <p><span class="legend-color" style="background-color: #0000ff;"></span> Não iniciado</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="stats-card stats-card-large">
                        <h4>Feedback</h4>
                        <p>Conteúdo do card grande 2.</p>
                    </div>
                </div>
            </div>

            <div class="room-stats">
                <h3>Estatísticas de cada cômodo:</h3>
                <div class="room-stats-grid">
                    <div class="room-stats-card">
                        <div class="room-stat-circle" style="background-color: #FF5722;">100%</div>
                        <p>Cozinha</p>
                    </div>
                    <div class="room-stats-card">
                        <div class="room-stat-circle" style="background-color: #FFC107;">100%</div>
                        <p>Quarto</p>
                    </div>
                    <div class="room-stats-card">
                        <div class="room-stat-circle" style="background-color: #9C27B0;">100%</div>
                        <p>Sala de Estar</p>
                    </div>
                    <div class="room-stats-card">
                        <div class="room-stat-circle" style="background-color: #03A9F4;">100%</div>
                        <p>Banheiro</p>
                    </div>
                    <div class="room-stats-card">
                        <div class="room-stat-circle" style="background-color: #4CAF50;">100%</div>
                        <p>Lavanderia</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="js/interactions/navbar.js"></script>
    <script src="./js/interactions/carrossel.js"></script>
</body>

</html>