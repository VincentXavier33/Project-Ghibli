<img src="<?= $data['avatar']->getAvatar()->getImages() ?>">

<button><a class="a"  href="index.php?page=avatar_edit">Modifier</a></button>
<button><a class="a"  href="index.php?page=avatar_delete">Supprimer</a></button>

<h1><?= $auth->getUser()->getPseudo() ?>
<input type="text" id="pseudo" name="pseudo"></h1>

<h3><?= $auth->getUser()->getEmail() ?>
<input type="email" id="email" name="email"></h3>

<h3><input type="password" id="password" name="password" value="<?= $auth->getUser()->getPassword() ?>">
<input type="password" id="password" name="password"></h3>

<h3><input type="date" id="date" name="birthday" value="<?= $auth->getUser()->getBirthday()->format('Y-m-d') ?>"><input type="date" id="date" name="birthday"></h3>

<button><a class="a"  href="index.php?page=user_edit">Modifier</a></button>
<button><a class="a"  href="index.php?page=user_delete">Supprimer</a></button>


