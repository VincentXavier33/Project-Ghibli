<h1>Inscription</h1>
<form action="" method="POST">
<?php include '_errors.php' ?>
  <label for="Pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo" required>
  <label for="birthday">Date de naissance</label>
  <input type="date" id="birthday" name="birthday" required>
  <label for="email">Adresse email</label>
  <input type="email" id="email" name="email" required>
  <div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm_password">Répétez votre mot de passe</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
  </div>
  <button type="submit">S'inscrire</button>
</form>