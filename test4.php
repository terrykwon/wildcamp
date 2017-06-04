<html>
<head>
<title>New Page 1</title>
</head>
<body>
  <?php
 try {
     $dbh = new PDO('mysql:host=165.132.105.212:3306;dbname=wildcamp', 'wildcamp', 'Wildcamp1234!');
     foreach($dbh->query('SELECT * from FOO') as $row) {
         print_r($row);
     }
     $dbh = null;
 } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }
 ?>
</body>
</html>
