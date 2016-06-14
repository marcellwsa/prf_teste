<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		$servidor = "localhost";
		$usuario = "postgres";
		$senha = "123456";
		$banco = "tarefas";
		
		$con_string = "host=localhost port=5432 dbname=tarefas user=postgres password=123456";
		
		
		$conexao = pg_connect($con_string);
		
		echo "Conexão efetuada com sucesso!!";
		
		function buscar_tarefas($conexao) {
			$sqlBusca = 'SELECT * FROM tarefas';
			$resultado = pg_query($conexao, $sqlBusca);
			
			$tarefas = array();
			
			while ($tarefa = pg_fetch_assoc($resultado)) {
				$tarefas[] = $tarefa;
			}
			return $tarefas;
		} //fim da funcao buscar
		
		function gravar_tarefas($conexao, $tarefa) {
			$sqlGravar = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida) VALUES
					('{$tarefa['nome']}', '{$tarefa['descricao']}', 
					'{$tarefa['prioridade']}', '{$tarefa['prazo']}', '{$tarefa['concluida']}' ) 
					";
			
			pg_query($conexao, $sqlGravar);
		}
		
		
	?>
    </body>
</html>