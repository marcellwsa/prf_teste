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
	?>
    </body>
</html>