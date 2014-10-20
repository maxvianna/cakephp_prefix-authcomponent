<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<style type="text/css">	.menu-superior ul { list-style: none; margin-bottom: 1em; font-size: 20px; font-weight: bold; }	.menu-superior li { display: inline-block; margin-right: .5em }	.menu-superior a { color: #E32; text-decoration: none }
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<?php echo $this->element('admin_menu', array('class' => 'menu-superior')) ?>
		<div id="content">
			<!-- AuthComponent -->
			<div style="text-align: right">
				<?php if($logged_in): ?>
					Welcome <?php echo $current_user['username']; ?>! - <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
				<?php else: ?>
					<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
				<?php endif; ?>	
			</div>
			<!-- End of AuthComponent -->
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>