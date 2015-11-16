<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin;

class AjaxController extends AdminController {

  public function systemWelcome() {

    $return = [
      '<a href="#"><div class="pull-left"><img src="/vendor/crudadminlte/ui/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/></div><h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4><p>Why not buy a new awesome theme?</p></a>',
      '<a href="#"><div class="pull-left"><img src="/vendor/crudadminlte/ui/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/></div><h4>AdminLTE Design Team<small><i class="fa fa-clock-o"></i> 2 hours</small></h4><p>Why not buy a new awesome theme?</p></a>',
      '<a href="#"><div class="pull-left"><img src="/vendor/crudadminlte/ui/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/></div><h4>Developers<small><i class="fa fa-clock-o"></i> Today</small></h4><p>Why not buy a new awesome theme?</p></a>',
      '<a href="#"><div class="pull-left"><img src="/vendor/crudadminlte/ui/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/></div><h4>Sales Department<small><i class="fa fa-clock-o"></i> Yesterday</small></h4><p>Why not buy a new awesome theme?</p></a>',
      '<a href="#"><div class="pull-left"><img src="/vendor/crudadminlte/ui/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/></div><h4>Reviewers<small><i class="fa fa-clock-o"></i> 2 days</small></h4><p>Why not buy a new awesome theme?</p></a>'
    ];

    return response()->json($return);

	}

  public function systemWelcomeSecond() {
    return 2;
	}

}
