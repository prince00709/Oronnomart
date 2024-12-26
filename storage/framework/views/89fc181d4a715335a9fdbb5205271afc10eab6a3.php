<form class="form-default" role="form" action="<?php echo e(route('addresses.update', $address_data->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="p-3">
        <!-- Address -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('Address')); ?></label>
            </div>
            <div class="col-md-10">
                <textarea class="form-control mb-3 rounded-0" placeholder="<?php echo e(translate('Your Address')); ?>" rows="2" name="address" required><?php echo e($address_data->address); ?></textarea>
            </div>
        </div>

        <!-- Country -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('Country')); ?></label>
            </div>
            <div class="col-md-10">
                <div class="mb-3">
                    <select class="form-control aiz-selectpicker rounded-0" data-live-search="true" data-placeholder="<?php echo e(translate('Select your country')); ?>" name="country_id" id="edit_country" required>
                        <option value=""><?php echo e(translate('Select your country')); ?></option>
                        <?php $__currentLoopData = get_active_countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php if($address_data->country_id == $country->id): ?> selected <?php endif; ?>>
                            <?php echo e($country->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- State -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('State')); ?></label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" name="state_id" id="edit_state"  data-live-search="true" required>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>" <?php if($address_data->state_id == $state->id): ?> selected <?php endif; ?>>
                            <?php echo e($state->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- City -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('City')); ?></label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="city_id" required>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>" <?php if($address_data->city_id == $city->id): ?> selected <?php endif; ?>>
                            <?php echo e($city->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        
        <?php if(get_setting('google_map') == 1): ?>
            <!-- Google Map -->
            <div class="row mt-3 mb-3">
                <input id="edit_searchInput" class="controls" type="text" placeholder="Enter a location">
                <div id="edit_map"></div>
                <ul id="geoData">
                    <li style="display: none;">Full Address: <span id="location"></span></li>
                    <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                    <li style="display: none;">Country: <span id="country"></span></li>
                    <li style="display: none;">Latitude: <span id="lat"></span></li>
                    <li style="display: none;">Longitude: <span id="lon"></span></li>
                </ul>
            </div>
            <!-- Longitude -->
            <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname"><?php echo e(translate('Longitude')); ?></label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_longitude" name="longitude" value="<?php echo e($address_data->longitude); ?>" readonly="">
                </div>
            </div>
            <!-- Latitude -->
            <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname"><?php echo e(translate('Latitude')); ?></label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_latitude" name="latitude" value="<?php echo e($address_data->latitude); ?>" readonly="">
                </div>
            </div>
        <?php endif; ?>

        <!-- Postal code -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('Postal code')); ?></label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="<?php echo e(translate('Your Postal Code')); ?>" value="<?php echo e($address_data->postal_code); ?>" name="postal_code" value="" required>
            </div>
        </div>

        <!-- Phone -->
        <div class="row">
            <div class="col-md-2">
                <label><?php echo e(translate('Phone')); ?></label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="<?php echo e(translate('+880')); ?>" value="<?php echo e($address_data->phone); ?>" name="phone" value="" required>
            </div>
        </div>

        <!-- Save button -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary rounded-0 w-150px"><?php echo e(translate('Save')); ?></button>
        </div>
    </div>
</form><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/partials/address/address_edit_modal.blade.php ENDPATH**/ ?>