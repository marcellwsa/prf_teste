<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Remover</title>
</head>
    <body>
    
    
    <?php
    include 'banco.php';
    remover_tarefa($conexao, $_GET['id']);
    header('Location: tarefas.php');

	?>
    </body>
</html>