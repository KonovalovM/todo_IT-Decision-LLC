<?php
$sth = $pdo->prepare("SELECT * FROM lists");

$sth->setFetchMode(\PDO::FETCH_ASSOC);
$sth->execute();
$lists = $sth->fetchAll();

if (isset ($_COOKIE["user_id"])){
    foreach ($lists as $list):
?>
       <li class="list">
          <?php if ($list["done"] > 0) { ?>
              <input type="checkbox" checked="checked" data-ssylka="modules/del_done.php?doneId=<?php echo $list["id"];?>" onclick="done_del(this)">
              <a style="color:green; text-decoration:line-through;" data-ssylka="modules/tasks.php?listId=<?php echo $list["id"];?>" onclick="task(this)">
                  <h2> <?php echo $list["cat_name"];?> </h2>
                  <h2> <?php echo $list["title"];?> </h2></a>
               <?php
            } else {
               ?>
               <input type="checkbox" data-ssylka="modules/add_done.php?doneId=<?php echo $list["id"];?>" onclick="done_del(this)">
               <a style="color:red;" data-ssylka="modules/tasks.php?listId=<?php echo $list["id"];?>" onclick="task(this)">
                   <h2> <?php echo $list["cat_name"];?> </h2>
                   <h2> <?php echo $list["title"];?> </h2></a>
               <?php
               }
                ?>
        </li>
        <?php
    endforeach;
   }
