
<?php


	$dbhost = 'jiardsdb.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com';
	$dbport = '3306';
	$dbname = 'JIA_DB';
	$charset = 'utf8';
try
{
	$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
	$user = 'JIAUSER';
	$password = 'JIAPASSWORD';
	
	
	
	$dbh=new PDO($dsn, $user, $password);
	
	$sql='select created_at, info from site_view_history order by created_at';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();

	$dbh=null;
	while(true)
	{
		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false)
		{
			break;
		}
		$brr='<br>';
		print $rec['created_at'];
		print '<br>';
		print $rec['info'];

	}
}
catch (Exception $e)
{
	 print 'データーベース接続エラー発生';
	 exit();
}

?>
