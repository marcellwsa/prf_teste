<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		session_start();
		
		include 'banco.php';
		include 'ajudantes.php';
		
		$exibir_tabela = false;
		
		
		if (isset($_POST['nome']) && $_POST['nome'] != '') {
			$tarefa = array();
			$tarefa['id'] = $_POST['id'];
			
			IF (tem_post()) {
				if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
					$tarefa['nome'] = $_POST['nome'];
				} else {
					$tem_erros = true;
					$erros_validacao['nome'] = 'O nome da tarefa é obrigatório!' ;
				}
			}
			
			
			if (isset($_POST['descricao'])) {
				$tarefa['descricao'] = $_POST['descricao'];
			} else {
				$tarefa['descricao'] = '';
			}
			
			if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
				if (validar_data($_POST['prazo'])) {
					$tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
				} else {
					$tem_erros = true;
					$erros_validacao['prazo'] = 'O prazo não é uma data válida!';
				}
			}
				
			$tarefa['prioridade'] = $_POST['prioridade'];
				
			if (isset($_POST['concluida'])) {
				$tarefa['concluida'] = 1;
			} else {
				$tarefa['concluida'] = 0;
			}
			
			if(!$tem_erros) {
				editar_tarefa($conexao, $tarefa);
				header('Location: tarefas.php');
				die();
			}
			
		}
		
		$tarefa = buscar_tarefa($conexao, $_GET['id']);
		$tarefa['nome'] = (isset($_POST['nome'])) ? $_POST['nome'] : $tarefa['nome'];
		$tarefa['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : $tarefa['descricao'];
		$tarefa['prazo'] = (isset($_POST['prazo'])) ? $_POST['prazo'] : $tarefa['prazo'];
		$tarefa['prioridade'] = (isset($_POST['prioridade'])) ? $_POST['prioridade'] : $tarefa['prioridade'];
		$tarefa['concluida'] = (isset($_POST['concluida'])) ? $_POST['concluida'] : $tarefa['concluida'];
		
		include 'template.php';
	?>
    </body>
</html>