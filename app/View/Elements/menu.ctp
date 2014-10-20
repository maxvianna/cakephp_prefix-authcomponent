<nav class="<?php echo $class ?>">
	<ul>
		<li><?php echo $this->Html->link('Posts', array('controller' => 'admin/posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Usuários', array('controller' => 'admin/users', 'action' => 'index')); ?></li>
	</ul>
</nav>