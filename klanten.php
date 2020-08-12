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

            <!-- Content -->
            <?php
            if (!isset($_SESSION['id'])) {
                echo '<h2 id = "content" > Registreer je nu als klant </h2>';
            }
            ?>

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
            <?php
            if (!isset($_SESSION['id'])) {
                echo '<form class="form-signup" action="includes/signup.inc.php" method="post">';

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
                echo  '<input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>';
            }
            ?>
            <h2 id = "content"> Wijzig uw gegevens!
            <?php
            if (isset($_SESSION['id'])) {
                echo $_SESSION['uid'];
                echo '<form class="form-signup" action="includes/#.inc.php" method="post">';
                ?>
                <input type="text" name="uid" placeholder="<?php echo $_SESSION['uid']; ?>">
                <input type="text" name="mail" placeholder="<?php echo $_SESSION['email']; ?>">
                <?php
                echo '<button type="submit" name="wijzig-submit">Wijzig gegevens</button>
            </form>';
            }
            ?>
            </h2>
            <!-- Content -->
            <h2 id="content">Klantenreglement</h2>
            <p>Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing nibh porttitor
                erat risus justo adipiscing adipiscing amet placerat accumsan. Vis. Faucibus odio magna tempus adipiscing a non. In mi primis arcu u
                t non accumsan vivamus ac blandit adipiscing adipiscing arcu metus praesent turpis eu ac lacinia nunc ac commodo gravida adipiscing eget accumsan ac
                nunc adipiscing adipiscing.</p>
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