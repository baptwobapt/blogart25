<!-- Load JS scripts -->

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog'Art</title>
    <!-- Load CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
</head>

</body>
<footer>
	<!-- footer -->

		<section id="footer">
			<div class="logo-footer">
				<a href="actualites.html"><img src="/src/images/logo/LOGO-MeleesBordelaises.svg" alt="logo"></a>
			</div>

			<div class="footer-bar">
				<a href="/infoleg/cgu.php">Confidentialité</a>
				<a href="/infoleg/cgu.php">CGU</a>
				<a href="/infoleg/mentionleg.php">Mentions légales</a>
			</div>

			<p>© www.meleesbordelaises.com</p>
		</section>

</footer>
</html>
<style>
	#footer {
    padding: 30px 40px 20px 0px;
    padding-bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: #1e1e1e;
    color: white;
    gap: 20px;
}

.logo-footer img {
    width: 350px;
    height: auto;
}

.footer-bar {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 20px;
    align-items: center;
}

.footer-bar a {
    text-decoration: none;
    color: white;
}

.footer-bar a:hover {
    text-decoration: underline;
}

</style>