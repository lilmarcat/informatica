<nav class="navbar navbar-inverse navabar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"> </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img rel="shortcut icon" href="img/napoli.webp" />
            <a href="index.php" class="navbar-brand">
                <link rel="shortcut icon" href="img/napoli.webp" />Bilion.
            </a>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">    
                <?php
                if(isset($_SESSION['email'])){
                ?>
                <!--.<li><a href="cerca.php"><span class="glyphicon glyphicon-search"></span> Cerca</a></li>-->
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrello</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Impostazioni</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php
                }else{
                ?>
                <!--<li><a href="cerca.php"><span class="glyphicon glyphicon-search"></span> Cerca</a></li>-->
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
                }
                ?>

<!--<button id="search-button">Cerca prodotti</button>

<div id="popup" class="popup">
    <h2>Ricerca prodotti</h2>
    <form>
        <input type="text" name="search-query">
        <button type="submit">Cerca</button>
    </form>
    <button id="close-button">Chiudi</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search-button').click(function() {
            $('#popup').fadeIn();
        });

        $('#close-button').click(function() {
            $('#popup').fadeOut();
        });
    });
</script>-->

            </ul>
        </div>

    </div>
</nav>