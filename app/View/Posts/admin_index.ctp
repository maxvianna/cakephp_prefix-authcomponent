<div class="users index">
	
	<h2>Posts</h2>
	<table cellpadding="0" cellspacing="0">
		<th>Title</th>
		<th>Body</th>
		<th class="actions">Actions</th>
		</tr>
		<?php		
			$i = 0;
			foreach ($posts as $post) 
			{
				$class = null;
				if($i++ % 2 == 0)
				{
					$class = ' class="altrow"';
				}		
		?>
		<tr <?php echo $class; ?>>
			<td><?php echo $post['Post']['title']; ?></td>
			<td><?php echo $post['Post']['body']; ?></td>
			<td class='actions'>
			<?php 
				echo $this->Html->link('Editar', array('action' => 'editar', $post['Post']['id'])); 
				echo $this->Form->postLink('Deletar', array('action' => 'deletar', $post['Post']['id']), array('confirm' => 'Are you sure you want to delete that post?')); 
			?>
			</td>
		</tr>
		<?php } ?>
	</table>
	
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Novo Post', array('action' => 'adicionar')); ?></li>
	</ul>
</div>