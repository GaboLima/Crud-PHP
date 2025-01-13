<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['data_nascimento']) || empty($_POST['senha'])) {
        $_SESSION['mensagem'] = 'Todos os campos são obrigatórios.';
        header('Location: index.php');
        exit;
    }

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);

    // Verifica se o email já existe
    $checkEmailQuery = "SELECT id FROM usuarios WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conexao, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $_SESSION['mensagem'] = 'O email já está cadastrado.';
        header('Location: index.php');
        exit;
    }

    // Tentativa de inserção no banco
    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso.';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao criar o usuário: ' . mysqli_error($conexao);
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = $_POST['usuario_id'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $data_nascimento = trim($_POST['data_nascimento']);
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

    // Base da consulta SQL
    $sql = "UPDATE usuarios SET nome = ?, email = ?, data_nascimento = ?";
    $params = [$nome, $email, $data_nascimento];

    if (!empty($senha)) {
        $sql .= ", senha = ?";
        $params[] = password_hash($senha, PASSWORD_DEFAULT);
    }

    $sql .= " WHERE id = ?";
    $params[] = $usuario_id;

    // Prepara e executa a consulta
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso.';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar o usuário: ' . $stmt->error;
        header('Location: index.php');
        exit;
    }

    $stmt->close();
}


if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    // Verifica se o ID é válido (opcional, mas recomendado)
    if (!is_numeric($usuario_id)) {
        $_SESSION['mensagem'] = 'ID inválido para exclusão.';
        header('Location: index.php');
        exit;
    }

    // Prepara a consulta de exclusão
    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

    // Executa a consulta
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = 'Usuário excluído com sucesso.';
    } else {
        $_SESSION['mensagem'] = 'Erro ao excluir o usuário: ' . mysqli_error($conexao);
    }

    // Redireciona de volta para a página principal
    header('Location: index.php');
    exit;
}
