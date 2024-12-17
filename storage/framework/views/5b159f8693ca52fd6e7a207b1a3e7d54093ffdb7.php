<a href="javascript:" class="d-flex align-items-center text-reset dropdown-toggle"  data-toggle="dropdown">
<?php
$showname='';
?>
<?php if(auth()->guard()->check()): ?>
<?php
$fullname = Auth::user()->name;
$showname=explode(" ",$fullname);
if(!empty($showname[2])){
    echo substr($showname[2], 0, 9). ' <i class="la la-user la-2x"></i>';

} else if (!empty($showname[1])){
    echo substr($showname[1], 0, 9). '<i class="la la-user la-2x"></i>';
} else{
   
    echo substr($showname[0], 0, 9). '<i class="la la-user la-2x"></i>';
}

?>
    <?php endif; ?>
    <?php
    
    if(empty($showname)){
        echo translate('Login'). '<i class="la la-user la-2x"></i>';
    }
    ?>
</a>
<div class="dropdown-menu">
    
                 <?php if(auth()->guard()->check()): ?>
                    <?php if(isAdmin()): ?>
                    <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(translate('My Panel')); ?></a>
                    
                    <?php else: ?>
                    <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('My Panel')); ?></a>
                    
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><?php echo e(translate('Logout')); ?></a>
                    
                    <?php else: ?>
                    <a class="dropdown-item" href="<?php echo e(route('user.login')); ?>"><?php echo e(translate('Login')); ?></a>
                    <a class="dropdown-item" href="<?php echo e(route('user.registration')); ?>"><?php echo e(translate('Registration')); ?></a>
                    <?php endif; ?>
    
  </div><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/partials/login.blade.php ENDPATH**/ ?>