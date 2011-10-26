<div class="stores index">
	<h2><?php __('Stores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('slug');?></th>
			<th><?php echo $this->Paginator->sort('desc');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stores as $store):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $store['Store']['id']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['name']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['slug']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['desc']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['email']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['phone']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['address']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($store['City']['name'], array('controller' => 'cities', 'action' => 'view', $store['City']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($store['Category']['name'], array('controller' => 'categories', 'action' => 'view', $store['Category']['id'])); ?>
		</td>
		<td><?php echo $store['Store']['created']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['modified']; ?>&nbsp;</td>
		<td><?php echo $store['Store']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $store['Store']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $store['Store']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $store['Store']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $store['Store']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Store', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>