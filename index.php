<?php 

session_start();

require_once __DIR__ . '/config/db.php';

require_once __DIR__ . '/config/pdo.php';

$recupMessages = $pdo->query('SELECT * FROM messages');
$messages = $recupMessages->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat</title>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <div class="chat-container">
            <div class="chat-header">
                <h2>Chat Room</h2>
            </div>
            <div class="chat-messages" id="chat-messages">
                <!-- Les messages apparaîtront ici -->
                <?php foreach ($messages as $message) {
                    $messageId = $message['id'];
                   echo"<div class='message'>
                    <span>" . $message['message'] ."</span>
                    <a href='/deletemessage.php?id=$messageId'><button class='delete-button'>Delete</button></a>
                    </div>
                    <form method='POST' style='display:inline'>
                    <input type='hidden' name='delete-button'></button>
                    </form>";
                } ?>
                <!-- Start Message -->
                <!-- Ci-dessous un exemple de structure HTML & CSS d'un message -->
               
                <!-- End Message -->

            </div>
            <div class="chat-input">
                <!-- Le formulaire pour envoyer des messages doit se trouver ci-dessous -->
                <form method="POST">
                    <label for="message"></label>
                    <input type="message" name="message" id="">
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = $_POST['message'] ?? '';

if (!empty($message)){
$messageUser = $pdo->prepare('INSERT INTO messages(message) VALUES (:message)');
$messageUser->bindValue(':message', $message, PDO::PARAM_STR);
$messageUser->execute();

}} 


?>