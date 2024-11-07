<?php
session_start();

<<<<<<< HEAD
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome_user'];
$email = $_SESSION['email_user'];
=======
 $id = $_SESSION['id_administrador'];
 $nome = $_SESSION['nome_administrador'];
 $email = $_SESSION['email_administrador'];
>>>>>>> a28c04bd8517e33cb588e210cd75e18a2c643e55

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="./css/assets/main.css">
    <link rel="stylesheet" href="./css/adm.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="menu-icon" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars" style="color: white;"></i>
        </div>
        <div class="navbar-content">
            <a href="./index.html"><img src="./img/logo_q_perigo.png" alt=""></a>
            <div class="functions">
                <div class="search-container">
                    <label for="search-input" class="search-icon" style="color: green;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="text" class="search-input" id="search-input" required />
                </div>
                <div class="profile"><i class="fa-solid fa-user" style="color: green;"></i></div>
            </div>
        </div>
    </header>
    <aside class="sidebar" id="sidebar">
        <p class="close-btn" onclick="toggleSidebar()">×</p>
        <a href="./index.html">
            <div class="logotipo"><img src="./img/logo_q_perigo.png" alt=""></div>
        </a>
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

    <main class="content-perfil">
        <div class="admin-header">
            <img src="https://cdn.icon-icons.com/icons2/3868/PNG/512/profile_circle_icon_242774.png" alt="">
        </div>

        <section class="stats-section">
            <h2 class="name-user"><?php echo $nome ?></h2>
            <hr class="divisor-hr">
            <div class="stats-header">
                <h3>Estatísticas Gerais:</h3>
            </div>
            <div class="stats-grid">
                <div class="stats-card">
                    <div class="chart-container">
                        <h4>Gráfico de conclusão geral:</h4>
                        <div>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <p>+ 2019</p>
                        </div>
                    </div>

                    <div class="chart-container">
                        <h4>Gráfico de conclusão geral:</h4>
                        <div>
                        <i class="fa-brands fa-quinscape" style="color: #B197FC;"></i>
                            <p>+ 2019</p>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="chart-container">
                        <h4>Gráfico de uso de produtos químicos:</h4>
                        <div class="chart-content">
                            <img src="img/grafico2.svg" alt="Gráfico de uso de produtos químicos">
                            <div class="legend">
                                <p><span class="legend-color" style="background-color: #ffcc00;"></span> Produto A</p>
                                <p><span class="legend-color" style="background-color: #33cc33;"></span> Produto B</p>
                                <p><span class="legend-color" style="background-color: #3399ff;"></span> Produto C</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <h4>Feedback:</h4>
                    <p></p>
                    <i></i>
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