<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le monde de Ghibli</title>
  <link rel="apple-touch-icon" sizes="180x180" href="./public/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon/favicon-16x16.png">
  <link rel="manifest" href=".public/favicon/site.webmanifest">
  <link href="http://fonts.cdnfonts.com/css/ghibli" rel="stylesheet">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/config.css">
  <link rel="stylesheet" href="public/css/reboot.css">
  <link rel="stylesheet" href="public/css/layout.css">
  <link rel="stylesheet" href="public/css/utilities.css">
  <link rel="stylesheet" href="public/css/components.css">
</head>
<body>
  <?php require './views/partials/_header.php'; ?>
  <main>
    <?php require $templatePath; ?>
  </main>
  <?php require './views/partials/_footer.php'; ?>
  <script src="public/js/app.js"></script>
</body>
</html>