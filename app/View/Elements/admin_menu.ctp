<nav class="<?php echo $class ?>">
	<ul>
		<li><?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Usuários', array('controller' => 'users', 'action' => 'index')); ?></li>
	</ul>
</nav>