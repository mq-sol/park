<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Detail');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($detail['Detail']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Park List'); ?></dt>
			<dd>
				<?php echo $this->Html->link($detail['ParkList']['id'], array('controller' => 'park_lists', 'action' => 'view', $detail['ParkList']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($detail['Detail']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Permit Flag'); ?></dt>
			<dd>
				<?php echo h($detail['Detail']['permit_flag']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($detail['Detail']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($detail['Detail']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Detail')), array('action' => 'edit', $detail['Detail']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Detail')), array('action' => 'delete', $detail['Detail']['id']), null, __('Are you sure you want to delete # %s?', $detail['Detail']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Details')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Detail')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Park Lists')), array('controller' => 'park_lists', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Park List')), array('controller' => 'park_lists', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

