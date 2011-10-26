<div class="stores form">
<?php echo $this->Form->create('Store');?>
	<fieldset>
		<legend><?php __('Admin Add Store'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('desc');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('city_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stores', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>