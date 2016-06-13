<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Gerenciador de tarefas</title>
</head>
    <body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
    	<fieldset>
    		<legend>Nova Tarefa</legend>
    		<label>Tarefa:
    			<input type="text" name="nome"/>
    		</label>
    		
    		<label>
    			Descrição (Opcional):
    			<textarea name="descricao"></textarea>
    		</label>
    		<label>
    			Prazo (Opcional):
    			<input type="text" name="prazo"/>
    		</label>
    		<fieldset>
    			<legend>Prioridade</legend>
    			<label>
    				<input type="radio" name="prioridade" value="Baixa" checked="checked"/>Baixa
    				<input type="radio" name="prioridade" value="Media"/>Media
    				<input type="radio" name="prioridade" value="Alta"/>Alta
    			</label>
    		</fieldset>
    		<label>
    			Tarefa concluída:
    			<input type="checkbox" name="concluida" value="sim"/>
    		</label>
    		<input type="submit" value="Cadastrar"/>
    	</fieldset>
    </form>
    <table>
    	<tr>
    		<th>Tarefas</th>
    		<th>Descricao</th>
			<th>Prazo</th>
			<th>Prioridade</th>
			<th>Concluída</th>
    	</tr>
    	<?php foreach ($lista_tarefas as $tarefa) :?>
    	<tr>
    		<td><?php echo $tarefa['nome']; ?> </td>
    		<td><?php echo $tarefa['descricao'];?></td>
    		<td><?php echo $tarefa['prazo']?></td>
    		<td><?php echo $tarefa['prioridade']?> </td>
    		<td><?php echo $tarefa['concluida']?></td>
    	</tr>
    	<?php endforeach;?>
    </table>
    <?php
		
	?>
    </body>
</html>