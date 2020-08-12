<?php
require "header.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Itaxi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
		<!-- Main -->
        <section id="main" class="wrapper">
            <div class="inner">
                <header class="align-center">
                    <h1>Meld je nu aan!</h1>
                </header>

					<!-- Content -->
						<h2 id="content">Chauffeursreglement</h2>
						<p>Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing nibh porttitor
                            erat risus justo adipiscing adipiscing amet placerat accumsan. Vis. Faucibus odio magna tempus adipiscing a non. In mi primis arcu u
                            t non accumsan vivamus ac blandit adipiscing adipiscing arcu metus praesent turpis eu ac lacinia nunc ac commodo gravida adipiscing eget accumsan ac
                            nunc adipiscing adipiscing.</p>

								<!-- Form -->
                <?php
                // Errormessage voor als er een fout word gemaakt.
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo '<p class="signuperror">Vul alle velden in!</p>';
                    }
                    else if ($_GET["error"] == "invaliduidmail") {
                        echo '<p class="signuperror">Invalid naam of email!</p>';
                    }
                    else if ($_GET["error"] == "invaliduid") {
                        echo '<p class="signuperror">Invalid naam!</p>';
                    }
                    else if ($_GET["error"] == "invalidmail") {
                        echo '<p class="signuperror">Invalid e-mail!</p>';
                    }
                    else if ($_GET["error"] == "passwordcheck") {
                        echo '<p class="signuperror">De wachtwoorden komen niet overeen.</p>';
                    }
                    else if ($_GET["error"] == "usertaken") {
                        echo '<p class="signuperror">Deze gebruikersnaam is al ingebruik.</p>';
                    }
                }
                // voor als het wel lukt
                else if (isset($_GET["signup"])) {
                    if ($_GET["signup"] == "success") {
                        echo '<p class="signupsuccess">Aanmelding voltooid!</p>';
                    }
                }
                ?>
                <form class="form-signup" action="includes/chauffeurs.inc.php" method="post">
                    <?php
                    //checken voor dubbele email en accounts
                    if (!empty($_GET["uid"])) {
                        echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">';
                    }
                    else {
                        echo '<input type="text" name="uid" placeholder="Username">';
                    }
                    if (!empty($_GET["mail"])) {
                        echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
                    }
                    else {
                        echo '<input type="text" name="mail" placeholder="E-mail">';
                    }
                    ?>
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <button type="submit" name="signupC-submit">Signup</button>
                </form>
				</div>
			</section>
        <?php
        require "footer.php";
        ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>