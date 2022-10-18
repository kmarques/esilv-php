<header <?= isset($theme['headerClass']) ? 'class="'. $theme['headerClass']. '"' : ''; ?>>
    <nav>
        <div>Portail Intervenants - <?= $user["lastname"]." ".$user['firstname']; ?></div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="taskList.php">Liste des tâches</a></li>
        </ul>
    </nav>
</header>