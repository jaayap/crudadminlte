<ul class="nav navbar-nav">

	{!! \aLTE::_getNotificationBuckets() !!}

	<!-- User Account -->
	<li class="dropdown user user-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<img src="{{ \aLTE::_getUserGravatar() }}" class="user-image" alt="User Image"/>
			<?php /*<span class="hidden-xs">John Smith</span>*/ ?>
		</a>
		<ul class="dropdown-menu">
			<!-- User image -->
			<li class="user-header">
				<img src="{{ \aLTE::_getUserGravatar() }}" class="img-circle" alt="User Image" />
				<p>
					Suvi Thammasarn
					<small>This Guy!</small>
				</p>
			</li>
			<!-- Menu Body -->
			<?php /*
			<li class="user-body">
				<div class="col-xs-4 text-center">
					<a href="#">Followers</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="#">Sales</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="#">Friends</a>
				</div>
			</li>
			*/ ?>
			<!-- Menu Footer-->
			<li class="user-footer">
				<div class="pull-left">
					<a href="#" class="btn btn-default btn-flat btn-sm">Profile</a>
				</div>
				<div class="pull-right">
					<a href="{{ route('logout') }}" class="btn btn-default btn-flat btn-sm">Sign out</a>
				</div>
			</li>
		</ul>
	</li>

</ul>
