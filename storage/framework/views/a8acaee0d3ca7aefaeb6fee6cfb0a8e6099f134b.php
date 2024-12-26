<?php $__env->startSection('content'); ?>
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3"><?php echo e(translate('Carrier Informations')); ?></h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="<?php echo e(route('carriers.index')); ?>" class="btn btn-primary">
                    <span><?php echo e(translate('Back')); ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Carrier Information')); ?></h5>
                </div>
                <div class="card-body">
                   <form  id="carrier-form">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul class="m-0"></ul>
                        </div>

                        <input name="_method" type="hidden" value="PATCH">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label"><?php echo e(translate('Carrier Name')); ?> <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="carrier_name" value="<?php echo e($carrier->name); ?>" placeholder="<?php echo e(translate('Carrier Name')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label"><?php echo e(translate('Transit Time')); ?> <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="transit_time" value="<?php echo e($carrier->transit_time); ?>" placeholder="<?php echo e(translate('Transit Name')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label"><?php echo e(translate('Logo')); ?> <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                    <input type="hidden" name="logo" class="selected-files" value="<?php echo e($carrier->logo); ?>">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label"><?php echo e(translate('Free Shipping')); ?> ? </label>
                            <div class="col-md-9">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="shipping_type" onchange="freeShipping(this)" id="shipping_type" <?php if($carrier->free_shipping == 1): ?> checked <?php endif; ?>>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group row" id="billing_type_section">
                            <label class="col-md-2 col-from-label"><?php echo e(translate('Billing Type')); ?> <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="billing_type" onchange="update_price_range_form()" data-selected="<?php echo e($carrier->carrier_ranges->first()->billing_type ?? ''); ?>"  id="billing_type" data-live-search="true">
                                    <option value="weight_based"><?php echo e(translate('According to Weight')); ?></option>
                                    <option value="price_based"><?php echo e(translate('According to Price')); ?></option>
                                </select>
                            </div>
                        </div>

                        
                        <div id="price_range_form">
                            <div class="card-header mb-2 pl-0">
                                <h3 class="h6 carrier_range_form_header_text"></h3>
                            </div>
                            <table id="price-range-table" class="table table-responsive mb-0">
                                <tbody>
                                    
                                    <tr style="background-color: #c9c9d4">
                                        <td class="price_range_text"></td>
                            
                                        <td> >= </td>
                                        <?php $__currentLoopData = $carrier->carrier_ranges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier_range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bill_based_on"></div>
                                                    </div>
                                                    <input type="number" class="form-control delimiter1" name="delimiter1[]" value="<?php echo e($carrier_range->delimiter1); ?>" step="0.01">
                                                </div>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($carrier->carrier_ranges)==0): ?>
                                            <td>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bill_based_on"></div>
                                                    </div>
                                                    <input type="number" class="form-control delimiter1" name="delimiter1[]"
                                                        value="0.00" step="0.01">
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr style="background-color: #c9c9d1">
                                        <td class="price_range_text"></td>
                                        <td> < </td>
                                        <?php $__currentLoopData = $carrier->carrier_ranges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier_range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bill_based_on"></div>
                                                    </div>
                                                    <input type="number" class="form-control delimiter2" name="delimiter2[]" value="<?php echo e($carrier_range->delimiter2); ?>" step="0.01">
                                                </div>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($carrier->carrier_ranges)==0): ?>
                                            <td>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bill_based_on"></div>
                                                    </div>
                                                    <input type="number" class="form-control delimiter2" name="delimiter2[]"
                                                        value="0.00" step="0.01">
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                            
                                    <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span class="mt-2"><?php echo e($zone->name); ?></span>
                                            </td>
                                            <?php 
                                                $selected_zones = $carrier->carrier_range_prices->unique('zone_id')->pluck('zone_id')->toArray();
                                            ?>
                                            <td>
                                                <input class="aiz-square-check zone_enable mt-2" type="checkbox" name="zones[]" value="<?php echo e($zone->id); ?>" <?php if(in_array($zone->id, $selected_zones)): ?> checked <?php endif; ?>>
                                            </td>
                                            <?php $__currentLoopData = $carrier->carrier_ranges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $carrier_range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $carrier_range_price = $carrier_range->carrier_range_prices->where('zone_id',$zone->id)->first(); 
                                                ?>
                                                <td>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="number" class="form-control shipping_cost" name="carrier_price[<?php echo e($zone->id); ?>][]" value="<?php echo e($carrier_range_price->price ?? null); ?>" placeholder="<?php echo e(translate('cost')); ?>" <?php if(! in_array($zone->id, $selected_zones)): ?> disabled <?php endif; ?> required>
                                                    </div>
                                                </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count($carrier->carrier_ranges)==0): ?>
                                                <td>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="number" class="form-control shipping_cost"
                                                            name="carrier_price[<?php echo e($zone->id); ?>][]"
                                                            placeholder="<?php echo e(translate('cost')); ?>" disabled required>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <?php $__currentLoopData = $carrier->carrier_ranges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $carrier_range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <?php if($key == 0): ?> 
                                                    <?php continue; ?>
                                                <?php endif; ?>
                                                <button type="button" id="disablebtn" class="btn btn-primary btn-sm delete-range">Delete</button>
                                            </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary btn-sm" id="addNewRange"><?php echo e(translate('Add new range')); ?></button>
                        </div>
                       

                        <div class="form-group mb-0 text-right">
                            <button type="button" class="btn btn-primary" id="carrier-submit-btn"><?php echo e(translate('Update Carrier Informations')); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    $(document).ready(function(){
        update_price_range_form();
        freeShipping();
    });

    function freeShipping(){
        var billing_type = "<?php echo e($carrier->carrier_ranges->first()->billing_type ?? 'weight_based'); ?>";
        if($('#shipping_type').is(":checked")){
            $("#billing_type_section").hide();
            $("#price_range_form").hide();
            $("#billing_type").val().change();
        }
        else{
            $("#billing_type_section").show();
            $("#price_range_form").show();
            $("#billing_type").val(billing_type).change();
        }
    }
    
    // update price range form data based on billing type
    function update_price_range_form(){
        var billing_type = $('#billing_type').val();
        
        $(".carrier_range_form_header_text").html(billing_type === 'weight_based' 
            ? "<?php echo e(translate('Weight based carrier price range')); ?>" 
            : "<?php echo e(translate('Price based carrier price range')); ?>");
        $(".price_range_text").html(billing_type === 'weight_based' 
            ? "<?php echo e(translate('Will be applied when the weight is')); ?>" 
            : "<?php echo e(translate('Will be applied when the price is')); ?>");
        $(".bill_based_on").html(billing_type === 'weight_based' ? "<?php echo e(translate('kg')); ?>" : "$");
     
    }

    // disabled untill check
    $(document).on("change", ".zone_enable", function() {
        $(this).closest("tr").find('.shipping_cost').prop("disabled", !this.checked);
    });


    $(document).on("click", "#addNewRange", function() {
        //table body
        var tablebody = $("#price-range-table").find("tbody");
        var tdlenght = tablebody.find("tr td").length;
        // console.log(tdlenght);


        // last td input 
        var first_lasttd = $("#price-range-table").find("tr:nth-child(1)").find("td:last").find("input").val();
        var second_lasttd = $("#price-range-table").find("tr:nth-child(2)").find("td:last").find("input").val();

        if ((second_lasttd == 0) || (second_lasttd == first_lasttd) ||
            ((second_lasttd - first_lasttd) < 0)) {
            alert('Please validate the last range before creating a new one.')
        } else {
            // clonning last tds
            fnclone(tablebody, second_lasttd);
        }

    });

    // last td remove
    $(document).on("click", ".delete-range", function() {
        var iIndex = $(this).closest("td").prevAll("td").length;
        $(this).parents("#price-range-table").find("tr").each(function() {
            $(this).find("td:eq(" + iIndex + ")").remove();
        });
    });


    // last td clone function
    function fnclone(tablebody, second_lasttd) {
        tablebody.find("td:nth-last-child(1)").each(function() {
            $(this).clone()
            .find("input").val("").end()
            .insertAfter(this);
        }); 

        $('#price-range-table tr:last td:last').html('<button type="button" id="disablebtn" class="btn btn-primary btn-sm delete-range">Delete</button>');

        var first_lasttd = $("#price-range-table").find("tr:nth-child(1)").find("td:last").find("input");
        first_lasttd.val(parseFloat(second_lasttd).toFixed(2));
    }

    $("#carrier-submit-btn").click(function() {
            var data = new FormData($('#carrier-form')[0]);
            if(!$('input[name=shipping_type]').prop('checked')){
                var delimiter1 = $('.delimiter1');
                var delimiter2 = $('.delimiter2');

                for (let i = 0; i < delimiter1.length; i++) {
                    if (delimiter1[i].value && delimiter2[i].value) {
                        if (parseFloat(delimiter1[i].value) >= parseFloat(delimiter2[i].value)) {
                            alert('Please put the last range greater than first range.');
                            delimiter2[i].focus();
                            return false
                        }
                        if (i>0 && (parseFloat(delimiter1[i].value) != parseFloat(delimiter2[(i-1)].value))) {
                            alert('Please put the first range equal to the previous last range.');
                            delimiter1[(i)].focus();
                            return false
                        }
                    }
                }
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "<?php echo e(route('carriers.update', $carrier->id)); ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {

                }
            }).done(function(data) {
                window.location.replace("<?php echo e(route('carriers.index')); ?>");
            }).fail(function(jqXHR, textStatus, errorThrown) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(jqXHR.responseJSON.errors, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value[0] + '</li>');
                });

                $("html, body").animate({scrollTop: 0}, 800);
            });
        })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/setup_configurations/carriers/edit.blade.php ENDPATH**/ ?>