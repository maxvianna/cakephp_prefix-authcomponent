<div class="users index">
	
	<h2>Listar</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Username</th>
            <th>Email</th>
            <th>Role</th>
			<th class="actions">Actions</th>
		</tr>
		<?php
		
			$i = 0;
			foreach ($users as $user) 
			{
				$class = null;
				if($i++ % 2 == 0)
				{
					$class = ' class="altrow"';
				}
		
		?>
		<tr <?php echo $class; ?>>
			<td><?php echo $user['User']['id']; ?></td>
			<td><?php echo $user['User']['name']; ?></td>
			<td><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['email']; ?></td>
			<td><?php echo $user['User']['role']; ?></td>
			<td class='actions'>
				<?php 
					echo $this->Html->link('Editar', array('action' => 'editar', $user['User']['id'])); 
					echo $this->Form->postLink('Deletar', array('action' => 'deletar', $user['User']['id']), array('confirm' => 'Você tem certeza que quer excluir este usuário?')); 
				?>
			</td>
		</tr>
		<?php } ?>
	</table>
	
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Adicionar', array('action' => 'adicionar')); ?></li>
	</ul>
</div>