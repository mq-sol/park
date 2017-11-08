<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Detail', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Detail')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('park_list_id', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('name');
				echo $this->BootstrapForm->input('permit_flag', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Details')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Park Lists')), array('controller' => 'park_lists', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Park List')), array('controller' => 'park_lists', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>