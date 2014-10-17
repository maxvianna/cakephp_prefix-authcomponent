<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Editar</legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('username');
			echo $this->Form->input('email');
			echo $this->Form->input(
				'role', array(
					'options' => array(
						"admin" => "admin" , "regular" => "regular"
						),
					'label' => "Regras",
					'selected' => $user['User']['role']
					)
				);
		?>
	</fieldset>
	<?php echo $this->Form->end('ENVIAR'); ?>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Listar', array('action' => 'index')); ?></li>
	</ul>
</div>