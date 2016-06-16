<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Conexão ao BANCO do SIGPAD</title>
</head>
    <body>
    <?php
		$servidor = "localhost";
		$porta = "5432";
		$user = "postgres";
		$password = "123456";
		$dbname = "prf";
		
		//$con_string = "host=localhost port=5432 dbname=tarefas user=postgres password=123456";
		$con_string2 = "host=".$servidor . " port=".$porta . " dbname=".$dbname . " user=".$user . " password=".$password; 
		
		$conexao = pg_connect($con_string2);
		
		echo "Conexão efetuada com sucesso!!";
		
	?>
    </body>
</html>
