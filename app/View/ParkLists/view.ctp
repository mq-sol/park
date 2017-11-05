<div class="parkLists view">
<h2><?php echo __('Park List'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kind'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['kind']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['Number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Park Name'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['park_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Toillet'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['toillet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($parkList['ParkList']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Park List'), array('action' => 'edit', $parkList['ParkList']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Park List'), array('action' => 'delete', $parkList['ParkList']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $parkList['ParkList']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Park Lists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Park List'), array('action' => 'add')); ?> </li>
	</ul>
</div>
