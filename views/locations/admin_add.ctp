<div class="locations form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
		<legend><?php __('Admin Add Location'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('lat');
		echo $this->Form->input('lng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locations', true), array('action' => 'index'));?></li>
	</ul>
</div>