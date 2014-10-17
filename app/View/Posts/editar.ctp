<div class="users form">
	<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend>Adicionar</legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('body');
		?>
	</fieldset>
	<?php echo $this->Form->end('ALTERAR POST'); ?>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Listar', array('action' => 'index')); ?></li>
	</ul>
</div>