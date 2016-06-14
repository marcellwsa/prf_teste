<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Formulario</title>
</head>
    <body>
    <form>
    	<fieldset>
    		<legend>Nova Tarefa</legend>
    		<label>
    			Tarefa: <input type="text" name="nome"/>
    		</label>
    		<label>
    			Descrição (Opcional): <textarea name="descricao"></textarea>
    		</label>
    		<label>
				Prazo (Opcional):
				<input type="text" name="prazo" />
				</label>
    		<fieldset>
    			<legend>Prioridade:</legend>
    			label>
    				<input type="radio" name="prioridade" value="1" checked="checked"/>Baixa
    				<input type="radio" name="prioridade" value="2"/>Media
    				<input type="radio" name="prioridade" value="3"/>Alta
    			</label>
    		</fieldset>
    		<label>
    			Tarefa concluída:
    			<input type="checkbox" name="concluida" value="1"/>
    		</label>
    			<input type="submit" value="Cadastrar"/>
    	</fieldset>
    </form>
    
    <?php
		
	?>
    </body>
</html>