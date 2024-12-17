<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6"><?php echo e(translate('Delete Confirmation')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1 fs-14"><?php echo e(translate('Are you sure to delete this?')); ?></p>
                <button type="button" class="btn btn-secondary rounded-0 mt-2" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                <a href="" id="delete-link" class="btn btn-primary rounded-0 mt-2"><?php echo e(translate('Delete')); ?></a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
<?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/modals/delete_modal.blade.php ENDPATH**/ ?>