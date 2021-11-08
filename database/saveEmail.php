<?php
require_once("myPDO.class.php");

function saveEmail($email)
{
    // Volání třídy myPDO
    $pdo = new myPDO();

    // Kotrola zda zadaný email není již v databázi
    $stmt = $pdo->vrat("SELECT email FROM emails WHERE email = :email", [":email" => [$email, PDO::PARAM_STR]]);
    if (count($stmt) == 0) {
        $pdo->proved("INSERT INTO emails(email) VALUES (:email)", [":email" => [htmlspecialchars($email), PDO::PARAM_STR]]);
        mail("jiri.belohlavek@brightbox.cz", "Coming soon email", wordwrap($email, 70));
        return "true";
    } else {
        return "false";
    }
}

if (!empty($_POST["email"])) {
    echo saveEmail($_POST['email']);
}
