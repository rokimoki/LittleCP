<?php
    // Load modules
    include_once('modules/configuration.php'); // this must be first
    include_once('class/Char.php'); // needed first for statusChecker
    include_once('modules/statusChecker.php');
    include_once('class/Login.php');
    $msg = ""; // message of success or error
    $error = 0; // used for style in the message
    if (isset($_POST['register'])) {
        $login = new Login();
        $birthday = $_POST['BirthYear'] . "-" . $_POST['BirthMonth'] . "-" . $_POST['BirthDay'];
        try {
            $login->createAccount($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['repass'], $birthday, $_POST['gender']);
            $msg = "Account created, you can now log in!";
            $error = 0;
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            $error = 1;
        }
    }
?>
<!DOCTYPE html>
<!--
LittleCP for registration and few more things.
By: @rokimoki
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Control Panel for <?php echo $cp_settings["name"]; ?> Ragnarok Online server">
        <meta name="keywords" content="ragnarok, online, ragnarok online, private, server, private server, <?php echo $cp_settings["type"]; ?>">
        <meta name="author" content="rokimoki">
        <link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/form.css">
        <title>Little CP for Ragnarok Online</title>
    </head>
    <body>
        <div class="container">
            <div class="top">
                <img src="img/top_banner.png" />
                <h1><?php echo $cp_settings['name']; ?></h1>
                <?php
                    if ($msg != "") {
                ?>
                    <div class="message">
                        <div class="<?php echo $error ? "error":"success"; ?>">
                            <p><?php echo $msg; ?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <h2 class="title">Server Information</h2>
                <div class="status">
                    Login-Server: <span class="<?php echo $loginServer; ?>"><?php echo $loginServer; ?></span>
                    Character-Server: <span class="<?php echo $charServer; ?>"><?php echo $charServer; ?></span>
                    Map-Server: <span class="<?php echo $mapServer; ?>"><?php echo $mapServer; ?></span>
                </div>
                <p class="statusOnline">
                    Players Online: <span class="<?php echo $players > 0 ? "online":"offline"; ?>"><?php echo $players; ?></span>
                </p>
                <div class="top-container">
                    <ul class="list">
                      <li class="element"><a class="information" href="#">Base Exp Rate: <span class="rates"><?php echo $server_settings["exp_rate"]; ?></span></a></li>
                      <li class="element"><a class="information" href="#">Job Exp Rate: <span class="rates"><?php echo $server_settings["job_rate"]; ?></span></a></li>
                      <li class="element"><a class="information" href="#">Drop Rate: <span class="rates"><?php echo $server_settings["drop_rate"]; ?></span></a></li>
                      <li class="element"><a class="information" href="#">Mvp Drop Rate: <span class="rates"><?php echo $server_settings["mvp_rate"]; ?></span></a></li>
                      <li class="element"><a class="information" href="#"><?php echo $server_settings["isRenewall"] ? "Renewall" : "Pre-RE"; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="mid">
                <h2 class="title">Register your account</h2>
                <div class="form">
                    <form id="contactform" method="POST" action="index.php"> 
                        <p class="contact">
                            <label for="name">Username</label>
                        </p> 
                        <input id="username" name="username" placeholder="Login username" required="" tabindex="1" type="text"> 

                        <p class="contact">
                            <label for="email">Email</label>
                        </p> 
                        <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

                        <p class="contact">
                            <label for="password">Create a password</label>
                        </p> 
                        <input type="password" id="pass" name="pass" required=""> 
                        <p class="contact">
                            <label for="repassword">Confirm your password</label>
                        </p> 
                        <input type="password" id="repass" name="repass" required=""> 
                        <br />
                        <label for="birthday">Birthday</label>
                        <br />
                        <fieldset>
                          <label>Day<input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>
                          <label>Month</label>
                           <label class="month"> 
                           <select class="select-style" name="BirthMonth">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03" >March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12" >December</option>
                           </label>
                          </select>    
                         <label>Year <input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>
                       </fieldset>

                        <label for="gender">Pick sex</label>
                        <br />
                        <select class="select-style gender" name="gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <br />
                        <br />
                        <input class="buttom" name="register" id="register" tabindex="5" value="Register!" type="submit"> 	 
                    </form> 
                </div>
            </div>
            <div class="bottom">
                Programmed by <a href="https://twitter.com/Rokimoki" target="_blank">rokimoki</a>, <a href="http://herc.ws/board/user/13876-rokimoki/" target="_blank">hercules profile</a>.<br />
                Contact server administrator <a href="mailto:<?php echo $cp_settings['contact']; ?>" target="_blank">email</a>
            </div>
        </div>
    </body>
</html>
