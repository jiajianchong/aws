

<?php
$dsn = 'mysql:host=jiardsdb.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com;dbname=JIA_DB';
$username = 'JIAUSER';
$password = 'JIAPASSWORD';

try{
        $pdo = new PDO($dsn,$username,$password);

        $sql = "select created_at, info from site_view_history order by created_at desc limit 1";

        $stmt = $pdo->prepare($sql);

        $stmt -> execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlins = "insert into site_view_history (info) values ('insert test from " . exec(hostname) . "')";

        $stmtins = $pdo->prepare($sqlins);

        $stmtins -> execute();

}catch (PDOException $e) {
}

function escape1($str)
{
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>test page for database access 4-9</title>
</head>
<body >
Last Access Time<br><br>
<?php foreach ($rec as $a):?>
        <?=escape1($a)?><br>
<?php endforeach; ?>
<br>comment by jia 4<br>
</body>
</html>

