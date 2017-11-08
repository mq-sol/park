<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Details'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('park_list_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('permit_flag');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($details as $detail): ?>
			<tr>
				<td><?php echo h($detail['Detail']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($detail['ParkList']['id'], array('controller' => 'park_lists', 'action' => 'view', $detail['ParkList']['id'])); ?>
				</td>
				<td><?php echo h($detail['Detail']['name']); ?>&nbsp;</td>
				<td><?php echo h($detail['Detail']['permit_flag']); ?>&nbsp;</td>
				<td><?php echo h($detail['Detail']['created']); ?>&nbsp;</td>
				<td><?php echo h($detail['Detail']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $detail['Detail']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detail['Detail']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detail['Detail']['id']), null, __('Are you sure you want to delete # %s?', $detail['Detail']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Detail')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Park Lists')), array('controller' => 'park_lists', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Park List')), array('controller' => 'park_lists', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>