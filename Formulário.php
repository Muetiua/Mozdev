<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    var_dump($_POST); // Exibe os dados do formulário para depuração

    
    // Validação básica do endereço de e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Abra um arquivo de texto para armazenar os e-mails
        $arquivo = fopen("emails.txt", "a");

        // Escreva o endereço de e-mail no arquivo
        fwrite($arquivo, $email . "\n");

        // Feche o arquivo
        fclose($arquivo);

        // Redirecione de volta para a página do formulário ou exiba uma mensagem de sucesso
        header("Location: Formulário.html");
        exit();
    } else {
        // Redirecione de volta para o formulário com uma mensagem de erro
        header("Location: Formulário.html?erro=1");
        exit();
    }
}
?>