<div class="parkLists form">
<?php echo $this->Form->create('ParkList'); ?>
	<fieldset>
		<legend><?php echo __('Edit Park List'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kind');
		echo $this->Form->input('Number');
		echo $this->Form->input('park_name');
		echo $this->Form->input('controller');
		echo $this->Form->input('address');
		echo $this->Form->input('start_date');
		echo $this->Form->input('area');
		echo $this->Form->input('description');
		echo $this->Form->input('toillet');
		echo $this->Form->input('url');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ParkList.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ParkList.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Park Lists'), array('action' => 'index')); ?></li>
	</ul>
</div>
