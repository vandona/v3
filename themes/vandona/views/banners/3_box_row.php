	<div class="col3-banners">
		<div class="container">
			<ul class="row list-unstyled">
                            <?php foreach($banners as $banner):?>
				<li class="col-sm-4">
					<?php
		
		$box_image	= '<img src="'.base_url('uploads/'.$banner->image).'" alt="'.$banner->name.'" class="img-responsive"/>';
		if($banner->link != '')
		{
			$target	= false;
			if($banner->new_window)
			{
				$target = 'target="_blank"';
			}
			echo '<a href="'.$banner->link.'" '.$target.' >'.$box_image.'</a>';
		}
		else
		{
			echo $box_image;
		}
		?>
				</li>
                            <?php endforeach;?>    
			</ul>
		</div>
	</div>
