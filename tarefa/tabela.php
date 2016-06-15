<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>tabela</title>
</head>
    <body>
    	<table>
    	<tr>
    		<th>Tarefas</th>
    		<th>Descricao</th>
			<th>Prazo</th>
			<th>Prioridade</th>
			<th>Concluída</th>
			<th>Opções</th>
    	</tr>
    	<?php foreach ($lista_tarefas as $tarefa) :?>
    	<tr>
    		<td><?php echo $tarefa['nome']; ?> </td>
    		<td><?php echo $tarefa['descricao'];?></td>
    		<td><?php echo traduz_data_para_exibir($tarefa['prazo']);?></td>
    		<td><?php echo traduz_prioridade($tarefa['prioridade']);?> </td>
    		<td><?php echo $tarefa['concluida'];?></td>
    		<td><a href="editar.php?id=<?php echo $tarefa['id'];?>">Editar </a></td>
    	</tr>
    	<?php endforeach;?>
    </table>
    
    <?php

	?>
    </body>
</html>