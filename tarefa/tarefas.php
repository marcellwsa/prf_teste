<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Gerenciador de tarefas</title>
</head>
    <body>
    <?php
		session_start();
		
		include 'banco.php';
		include 'ajudantes.php';
		include 'classes/Tarefas.php';
		
		$tarefas = new Tarefas($conexao);
		
		$exibir_tabela = true;
		
		$tem_erros = false;
		$erros_validacao = array();
		
		if (tem_post()) {
			$tarefa = array();
			
			if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
				$tarefa['nome'] = $_POST['nome'];
			} else {
				$tem_erros = true;
				$erros_validacao['nome'] = "O nome da tarefa � obrigat�rio!";
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
					$erros_validacao['prazo'] = 'O prazo n�o � uma data v�lida!';
				}
				
			} else {
				$tarefa['prazo'] = '';
			}
			
			$tarefa['prioridade'] = $_POST['prioridade'];
			
			if (isset($_POST['concluida'])) {
				$tarefa['concluida'] = 1;
			} else {
				$tarefa['concluida'] = 0;
			}
			
			if (! $tem_erros) {
				$tarefas->gravar_tarefa($tarefa);
				header('Location: tarefas.php');
				die();
			}
			
			//$_SESSION['lista_tarefas'][] = $tarefa;
		}
		
		
		
		//$lista_tarefas = buscar_tarefas($conexao);
		
		$tarefa = array(
				'id' => 0,
				'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
				'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
				'prazo' => (isset($_POST['prazo'])) ? traduz_data_para_banco($_POST['prazo']) : '',
				'prioridade' =>  (isset($_POST['prioridade'])) ? $_POST['prioridade'] : 1,
				'concluida' => (isset($_POST['concluida'])) ? traduz_concluida($_POST['concluida']) : ''
		);
		$tarefas->buscar_tarefas();
		include 'template.php';
		
	?>
    </body>
</html>