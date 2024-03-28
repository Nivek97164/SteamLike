<?php //templates/Users/signup.php ?>

<h1>Créer un compte</h1>
<?= $this->Form->create($user) ?>

	<?= $this->Form->control('pseudo') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->submit('Valider') ?>


<?= $this->Form->end() ?>
