<?php if ( $filters != null ): ?>
<fieldset id="filters">

	<legend><?php echo lang('global:filters'); ?></legend>

	<?php echo form_open(); ?>

	<ul>  
		<?php foreach ( $filters as $k=>$filter ): ?>
		<li>
		<?php

			if ( is_array($filter) )
			{

				// Dropdown type
				echo '<label>'.$stream_fields->{$k}->field_name.':&nbsp;</label>';
				echo form_dropdown('f_'.$stream_fields->{$k}->field_slug, $filter, isset($filter_data['filters']['f_'.$stream_fields->{$k}->field_slug]) ? $filter_data['filters']['f_'.$stream_fields->{$k}->field_slug] : null);
			}
			else
			{

				// Switch for the normal ones
				switch ( $stream_fields->{$filter}->field_type )
				{

					// Text type fields
					case 'text':
					case 'textarea':
					case 'email':
					case 'choice';
					case 'wysiwyg':
						echo '<label>'.$stream_fields->{$filter}->field_name.':&nbsp;</label>';
						echo form_input('f_'.$stream_fields->{$filter}->field_slug, isset($filter_data['filters']['f_'.$stream_fields->{$filter}->field_slug]) ? $filter_data['filters']['f_'.$stream_fields->{$filter}->field_slug] : '');
						break;

					default: break;
				}
			}

		?>
		</li>
		<?php endforeach; ?>

		<li><?php echo form_submit('filter', lang('buttons.filter'), 'class="button btn"'); ?></li>
		<li><?php echo form_submit('clear_filters', lang('buttons.clear'), 'class="button btn"'); ?></li>
	</ul>
	<?php echo form_close(); ?>
</fieldset>
<?php endif; ?>