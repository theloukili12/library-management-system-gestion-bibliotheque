<input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlick"></span>
                <span >
                    <a  class="nom">
                    <?php
                        echo $_SESSION['nc'];
                    ?>
                    </a>
                </span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebare-menu">
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="ti-home"></span>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="../administrateur.php">
                        <span class="ti-face-smile"></span>
                        <span>Administrateur</span>
                    </a>
                </li>
                <li>
                    <a href="../Statistiques.php">
                        <span class="ti-clipboard"></span>
                        <span>Statistiques</span>
                    </a>
                </li>
                <li>
                    <a href="../livres.php">
                        <span class="ti-agenda"></span>
                        <span>Livres</span>
                    </a>
                </li>

                <li>
                    <a href="../etudiant.php">
                        <span class="ti-face-smile"></span>
                        <span>Etudiant</span>
                    </a>
                </li>
                <li>
                    <a href="../parametres.php">
                        <span class="ti-settings"></span>
                        <span>Parametres</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>