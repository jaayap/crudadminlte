<!--// a: NOTIFICATION BUCKET -->
  <!-- {!! $options['name'] !!} -->
	<li class="dropdown {!! strToLower($options['name']).'-menu' !!}">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i class="{!! strToLower($options['icon']) !!}"></i>
      @if ($options['badge']['enabled'] == TRUE)
			<span class="label {!! strToLower('label-'.$options['badge']['color']) !!}">88</span>
      @endif
		</a>
		<ul class="dropdown-menu">
			<li class="header">You have 88 {!! strToLower($options['name']) !!}</li>
			<li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">

					<li>
						<a href="#">
							<div class="pull-left">
								<img src="/vendor/crudadminlte/ui/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
							</div>
							<h4>
								Reviewers
								<small><i class="fa fa-clock-o"></i> 2 days</small>
							</h4>
							<p>Why not buy a new awesome theme?</p>
						</a>
					</li>

        </ul>
			</li>
      @if ($options['viewall']['enabled'] == TRUE)
			<li class="footer"><a href="{!! $options['viewall']['link'] !!}">{!! $options['viewall']['label'] !!}</a></li>
      @endif
		</ul>
	</li>
<!--// z: NOTIFICATION BUCKET -->
