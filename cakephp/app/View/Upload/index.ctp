<h1>ファイル追加</h1>
<div class="container uploads form">
    <?php echo $this->Form->create('Upload', array('type' => 'file')); ?>
    <fieldset>
    <legend><?php echo __('CSVアップロード'); ?></legend>
    <?php echo $this->Form->file('file'); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));?>
    <pre>
    <?php print_r(empty($data) ? null : $data); ?>
    </pre>
</div>
 
