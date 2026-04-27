<?php
// Initialise la session
session_start();

// Supprime toutes les variables de session
$_SESSION = array();

// Détruit le cookie de session dans le navigateur (optionnel mais recommandé pour la sécurité)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruit la session sur le serveur
session_destroy();

// Redirige vers la page d'accueil ou de connexion
header("Location: index.php");
exit();
?>
