<!DOCTYPE html>
<html lang="en" dir="ltr"> 
    <head>
    <meta charset="utf-8"> 
    <title>How Secure Your Password</title>
    <link rel="stylesheet" href="style.css">
        <div class="head">
            <div>
                <img src="header.jpg" alt="header website">
            </div>
        </div>
    </head>
    <body>
    <form class="box" action="index.php" method="post">
    <h1>Please Enter Your Password</h1> 
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="submit">
    <?php
        ini_set('display_errors',0); // hide warning
        $ifhave = $_POST['password'];
        if (isset($ifhave)) {
            include("chccond.php");
            include("passstrcal.php");
        }
    ?>
    <h1>Result</h1>
    <p style="font-size:30px"><?php echo $echolen; ?></p>
    <p style="font-size:30px"><?php if(isset($echobrut)){ echo "Brute force about " . $echobrut . "."; } ?></p>
    <p style="font-size:30px"><?php echo $echoalb; ?></p>
    <p style="font-size:30px"><?php echo $echoskl; ?></p>
    <p style="font-size:30px"><?php echo $echozzk; ?></p>
    <p style="font-size:30px"><?php echo $echonms; ?></p>
    <p style="font-size:30px"><?php echo $echovcb; ?></p>
    <p style="font-size:30px"><?php echo $echorpt; ?></p>
    <p style="font-size:30px"><?php echo $echoloc; ?></p>
    <p style="font-size:30px"><?php echo $echoupc; ?></p>
    <p style="font-size:30px"><?php echo $echospc; ?></p>
    <p style="font-size:30px"><?php echo $echonuc; ?></p>
    <p style="font-size:30px"><?php echo $echopaspas; ?></p>
    <output name="P" for="Password"></output>
     </form>
    </body> </html>
    