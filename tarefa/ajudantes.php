<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
    
    function traduz_prioridade($codigo) {
    	$prioridade = '';
    	switch ($codigo) {
    		case 1:
    			$prioridade = 'Baixa';
    			break;
    		case 2:
    			$prioridade = "Media";
    			break;
    		case 3:
    			$prioridade = "Alta";
    			break;
    	}
    	return $prioridade;
    }
    
    function traduz_data_para_banco ($data) {
    	if ($data == "") {
    		return "";
    	} else {
    		$dados = explode("/", $data);
    		if (count($dados) != 3) {
    			return $data;
    		}
    		$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    		return $data_mysql;
    	}
    	
    } //fim do data banco
    
    function traduz_data_para_exibir($data) {
    	if ($data == '' or $data == '0000-00-00') {
    		return '';
    	} else {
    		$dados = explode('-', $data);
    		if (count($dados) !=3) {
    			return $data;
    		}
    		$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    		return $data_exibir;
    	}
    
    }
    function traduz_concluida($concluida) {
    	if ($concluida == 't') {
    		return 'sim';
    	}
    	return 'não';
    }
    
    function tem_post() {
    	if (count($_POST) > 0) {
    		return true;
    	}
    	return false;
    }
    
    function validar_data($data) {
    	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    	$resultado = preg_match($padrao, $data);
    	if ( ! $resultado) {
    		return false;
    	}
    	$dados = explode('/', $data);
    	$dia = $dados[0];
    	$mes = $dados[1];
    	$ano = $dados[2];
    	
    	$resultado = checkdate($mes, $dia, $ano);
    	
    	return $resultado;
    	
    }
    
    require_once 'banco.php';
    function retorna_descricao($conexao, $id, $tabela, $colunaID) {
    	$sql = "SELECT * FROM " . $tabela . " WHERE " . $colunaID . " = " . $id;
    	$resultado = pg_query($conexao, $sql);
    	$resultado2 = array();
    	while ($opcoes = pg_fetch_assoc($resultado)) {
    		$resultado2[] = $opcoes;
    		
    	}
    	//return $resultado2;
    }
    
	?>
    </body>
</html>