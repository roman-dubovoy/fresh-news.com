<header id="header">
    <div class="logo">
        <a href="/news">
            <img src=../../../img/logo.png alt="Our logo" width="75">
        </a>
    </div>
    <div id="site-name">
        <span>FRESH NEWS</span>
    </div>
    <?php
        if (isset($_COOKIE['userData'])){
            echo "<button class=\"logout-btn\" onclick=\"onLogoutClick()\">
                    <span>Logout</span>
                    <img src=\"../../../img/logout.png\" alt=\"Logout icon\" width=\"50\">
                  </button>";
        }
        else{
            echo "<button class=\"login-btn\" onclick=\"onLoginClick()\">
                    <span>Login</span>
                    <img src=\"../../../img/login.png\" alt=\"Login icon\" width=\"50\">
                  </button>";
        }
    ?>
</header>

