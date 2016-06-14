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
    		$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    		return $data_mysql;
    	}
    	
    } //fim do data banco
    
    function traduz_data_para_exibir($data) {
    	if ($data == '' or $data == '0000-00-00') {
    		return '';
    	} else {
    		$dados = explode('-', $data);
    		$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    		return $data_exibir;
    	}
    	
    	function traduz_concluida($concluida) {
    		if ($concluida == 1) {
    			return 'sim';
    		}
    			return 'não';
    	}
    }
	?>
    </body>
</html>