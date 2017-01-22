<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8','root','');
$prof =$bdd->query('SELECT * FROM BDD');



 ?>
 <style>
   table, th, td {
   border: 1px solid black;
   border-collapse: collapse;
   }
 </style>
 <script>
 var nb = 10 ;
 timer = window.setTimeout(" window.refresh();", 1000*nb, "JavaScript");
 </script>
 <title>Prof absent</title>

<table>
  <?php while ($p = $prof->fetch()) {?>
    <tr>
        <input style="display:none;" type="text" name="id" value="<?= $p['id']?>"/>
        <td><?= $p['name']?></td>
        <td><?= $p['1date']?></td>
        <td><?= $p['2date']?></td>
        <td><?= $p['1hour']?></td>
        <td><?= $p['2hour']?></td>
        </tr>
        <?php } ?>
      </table>
