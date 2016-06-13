<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Gerenciador de tarefas</title>
</head>
    <body>
    <?php
		session_start();
		
		include '../prf_teste/tarefa/banco.php';
		
		if (isset($_GET['nome']) && $_GET['nome'] != '') {
			$tarefa = array();
			$tarefa['nome'] = $_GET['nome'];
			
			if (isset($_GET['descricao'])) {
				$tarefa['descricao'] = $_GET['descricao'];
			} else {
				$tarefa['descricao'] = '';
			}
			
			if (isset($_GET['prazo'])) {
				$tarefa['prazo'] = $_GET['prazo'];
			} else {
				$tarefa['prazo'] = '';
			}
			
			$tarefa['prioridade'] = $_GET['prioridade'];
			
			if (isset($_GET['concluida'])) {
				$tarefa['concluida'] = $_GET['concluida'];
			} else {
				$tarefa['concluida'] = '';
			}
			
		}
		
		$lista_tarefas = buscar_tarefas($conexao);
		
		include '../prf_teste/tarefa/template.php';
		
	?>
    </body>
</html>