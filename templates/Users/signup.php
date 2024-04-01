<?php //templates/Users/signup.php ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<h1>Créer un compte</h1>
<?= $this->Form->create($user) ?>

	<?= $this->Form->control('pseudo') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->submit('Valider') ?>


<?= $this->Form->end() ?>
