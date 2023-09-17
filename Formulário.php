<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];
    
    // Validação dos campos (pode ser mais robusta dependendo das necessidades)
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        // Endereço de e-mail para onde a mensagem será enviada
        $destinatario = "jeremiasmuetiua@gmail.com";
        
        // Assunto do e-mail
        $assunto = "Nova mensagem de contato de $nome";
        
        // Corpo do e-mail
        $corpo = "Nome: $nome\n";
        $corpo .= "E-mail: $email\n";
        $corpo .= "Mensagem:\n$mensagem";
        
        // Cabeçalhos do e-mail
        $cabecalhos = "From: $email" . "\r\n" .
                     "Reply-To: $email" . "\r\n" .
                     "X-Mailer: PHP/" . phpversion();
        
        // Envia o e-mail
        if (mail($destinatario, $assunto, $corpo, $cabecalhos)) {
            echo "Mensagem enviada com sucesso. Entraremos em contato em breve!";
        } else {
            echo "Erro ao enviar a mensagem. Por favor, tente novamente mais tarde.";
        }
    }
} else {
    // Se o formulário não foi submetido, redireciona para a página de contato
    header("Location: contato.html");
    exit;
}
?>