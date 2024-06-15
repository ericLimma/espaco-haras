<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["mensagem"]);
    
    if (empty($nome) || empty($email) || empty($mensagem) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    $para = "seuemail@exemplo.com"; // Substitua pelo seu e-mail
    $assunto = "Nova mensagem do formulário de contato";
    
    $conteudo = "Nome: $nome\n";
    $conteudo .= "Email: $email\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";
    
    $headers = "From: $nome <$email>";
    
    if (mail($para, $assunto, $conteudo, $headers)) {
        echo "Obrigado! Sua mensagem foi enviada com sucesso.";
    } else {
        echo "Desculpe, algo deu errado e sua mensagem não foi enviada.";
    }
} else {
    echo "Houve um problema com o envio do formulário. Por favor, tente novamente.";
}
?>