<div class="parkLists index">
	<h2><?php echo __('Park Lists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('Number'); ?></th>
			<th><?php echo $this->Paginator->sort('park_name'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('area'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('toillet'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parkLists as $parkList): ?>
	<tr>
		<td><?php echo h($parkList['ParkList']['id']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['kind']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['Number']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['park_name']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['controller']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['address']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['area']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['description']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['toillet']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['url']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['created']); ?>&nbsp;</td>
		<td><?php echo h($parkList['ParkList']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parkList['ParkList']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parkList['ParkList']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parkList['ParkList']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $parkList['ParkList']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Park List'), array('action' => 'add')); ?></li>
	</ul>
</div>
