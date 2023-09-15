<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o email do formulário
    $email = $_POST["email"];

    // Valide o email (você pode adicionar validações mais complexas aqui)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Abra ou crie um arquivo para armazenar os emails
        $arquivo = "emails.txt";
        $conteudo = file_get_contents($arquivo);

        // Adicione o novo email ao conteúdo existente
        $conteudo .= $email . "\n";

        // Salve o conteúdo no arquivo
        file_put_contents($arquivo, $conteudo);

        echo "Email armazenado com sucesso!";
    } else {
        echo "Por favor, insira um email válido.";
    }
}
?>