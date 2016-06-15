<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		$servidor = "localhost";
		$porta = "5432";
		$user = "postgres";
		$password = "123456";
		$dbname = "tarefas";
		
		//$con_string = "host=localhost port=5432 dbname=tarefas user=postgres password=123456";
		$con_string2 = "host=".$servidor . " port=".$porta . " dbname=".$dbname . " user=".$user . " password=".$password; 
		
		$conexao = pg_connect($con_string2);
		
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
		
		function  buscar_tarefa($conexao, $id) {
			$sqlBusca = "SELECT * FROM tarefas WHERE id = " . $id;
			$resultado = pg_query($conexao, $sqlBusca);
			return pg_fetch_assoc($resultado);
		}
		
		function editar_tarefa ($conexao, $tarefa) {
			$sql = "UPDATE tarefas SET 
					nome = '{$tarefa['nome']}',
					descricao = '{$tarefa['descricao']}',
					prioridade = '{$tarefa['prioridade']}',
					prazo = '{$tarefa['prazo']}',
					concluida = '{$tarefa['concluida']}' WHERE 
						id = '{$tarefa['id']}'
							
							";
			pg_query($conexao, $sql);
		}
		
		function remover_tarefa($conexao, $id) {
			$sqlRemover = "DELETE FROM tarefas WHERE ID = {$id}";
			pg_query($conexao, $sqlRemover);
		}
		
	?>
    </body>
</html>
