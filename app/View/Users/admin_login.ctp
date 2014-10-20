<h2>Login</h2>
<?php
	echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
?>
<p>
	<?php echo $this->Html->link('Cadastrar novo Usuário', array('action' => 'adicionar')); ?>
</p>