<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('park_list_id');
		echo $this->Form->input('message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Park Lists'), array('controller' => 'park_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Park List'), array('controller' => 'park_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
