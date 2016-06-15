<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		
    	class Tarefas
    	{
    		public $conexao;
    		public $tarefa;
    		public $tarefas = array();
    		
    		public function __construct($nova_conexao) {
    			$this-> conexao = $nova_conexao;
    		}
    		
    		function buscar_tarefas() {
    			$sqlBusca = 'SELECT * FROM tarefas';
    			$resultado = pg_query($this->conexao, $sqlBusca);
    				
    			$this->tarefas = array();
    				
    			while ($tarefa = pg_fetch_assoc($resultado)) {
    				$this->tarefas[] = $tarefa;
    			}
    			
    		} //fim da funcao buscar
    		
    		function  buscar_tarefa($id) {
    			$sqlBusca = "SELECT * FROM tarefas WHERE id = " . $id;
    			$resultado = pg_query($this->conexao, $sqlBusca);
    			$this->tarefa =  pg_fetch_assoc($resultado);
    		} //fim da funcao buscar tarefa
    		
    		
    		function gravar_tarefas($tarefa) {
    			$sqlGravar = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida) VALUES
    			('{$tarefa['nome']}', '{$tarefa['descricao']}',
    			'{$tarefa['prioridade']}', '{$tarefa['prazo']}', '{$tarefa['concluida']}' )
    			";
    				
    			pg_query($this->conexao, $sqlGravar);
    		}
    		
    		
    		
    		function editar_tarefa ($tarefa) {
    			$sql = "UPDATE tarefas SET
    			nome = '{$tarefa['nome']}',
    			descricao = '{$tarefa['descricao']}',
    			prioridade = '{$tarefa['prioridade']}',
    			prazo = '{$tarefa['prazo']}',
    			concluida = '{$tarefa['concluida']}' WHERE
    			id = '{$tarefa['id']}'
    				
    			";
    			pg_query($this->conexao, $sql);
    		}
    		
    	}
	?>
    </body>
</html>