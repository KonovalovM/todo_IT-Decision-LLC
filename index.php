<?php
require_once './configs/pdo_ini.php';
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo "TO-do List";?>
        </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
    </head>

    <body>
        <div id="head">
            <div id="logo">
                <img src="images/icon.png"> <span><b>To-do </b><i>List</i></span>
            </div>
            <div id="menu">
                <?php
                include "modules/btn-login.php";
                ?>
            </div>
        </div>

        <!--    Login form -->
        <div class="enter" id="enter-form" <?php if (isset($_COOKIE["user_id"])){?> style="display: none"<?php } ?>>
            <span><b><i>--------ENTER--------</i></b></span>
            <?php
                include "modules/login.php";
            ?>
                <div class="close">X</div>
                <form action="index.php" method="POST">
                    <input type="email" id="email" name="email" placeholder="Enter you e-mail" title="Enter you e-mail">
                    <input type="password" id="password" name="password" placeholder="Enter you pasword" title="Enter you pasword">
                    <button type="submit" id="enter"><b>ENTER</b></button>
                    <a href="#" id="open-registration"><b>Registration</b></a>
                </form>
        </div>

        <!--    Registration form-->
        <div class="registration" id="registration-form">
            <span><b><i>--Registration form--</i></b></span>
            <?php
                include "modules/registration.php";
            ?>
                <div class="close2">X</div>
                <form method="POST">
                    <input type="text" id="name" name="name" placeholder="Enter you name" title="Enter you name">
                    <input type="email" id="email2" name="email" placeholder="Enter you e-mail" title="Enter you e-mail">
                    <input type="password" id="password2" name="password" placeholder="Enter you pasword" title="Enter you pasword">
                    <input type="password" id="password3" name="password3" placeholder="Enter you pasword again" title="Enter you pasword again">
                    <button type="submit" id="sign-up"><b>Sign up</b></button>
                </form>
        </div>
        <?php

        if (isset($_COOKIE["user_id"])){
              ?>
                <!--List task-->
            <div id="content">
                <div id="lists">
                    <form id="addTask" enctype="multipart/form-data" action="./modules/add_task.php" method="POST">
                        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                        <!-- Название элемента input определяет имя в массиве $_FILES -->
                        <input name="userfile" type="file" />
                        <button name="addTaskBtn"> <img src="images/add.png"></button>
                    </form>
                    <div id="list">
                        <ul id="task_list">
                            <?php
                    include "modules/list.php";
                            ?>
                        </ul>
                    </div>
                </div>

                <!--Tasks-->
                <div id="tasks">
                    <?php
                  if (isset($_GET["listId"])){
                      include "modules/tasks.php";
                      }
                  ?>
                </div>
            </div>
            <?php
        }
              ?>

                <script src="js/var.js"></script>
                <script src="js/script.js"></script>
                <script src="js/ajax.js"></script>

    </body>

    </html>
