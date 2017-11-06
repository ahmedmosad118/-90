<?php $__env->startSection("container"); ?>
<br/><br/><br/>
<form class="col-md-12" method="post" action="/upload-product" enctype="multipart/form-data">
  <?php echo e(csrf_field()); ?>

  <div class="form-group">
    <label >Product Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Product Name" required>
  </div>
  <div class="form-group">
    <label >Price</label>
    <input type="number" class="form-control" name="price" placeholder="Product Price" min="0" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category</label>
    <select class="form-control" id="category" name="category_id">
      <<option value=""></option>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="property">
    <button class="add_field_button">Add More Fields</button>
    <div class="form-group">
        <label for="title">Select Property:</label>
        <select name="property_id[]" class="form-control" id="property">
          <option value=""></option>
        </select>
    </div>
    <div class="form-group">
      <label >Value</label>
      <input type="text" class="form-control" name="value[]"  required>
    </div>
</div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Add New</button>
  </div>


</form>
<script type="text/javascript">
$("#category").on("change",function(e){
  var category_id=e.target.value;

  $.get('/myform/ajax?category_id=' +category_id, function(data){
    $("#property").empty();
    $.each(data,function(index, property){
      $("#property").append('<option value="'+property.id+'">'+property.name+'</option>');
    });

  });
});
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".property"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(`<div class="form-group">
                    <label for="title">Select Property:</label>
                    <select name="property_id[]" class="form-control" id="property">
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="form-group">
                  <label >Value</label>
                  <input type="text" class="form-control" name="value[]"  required>
                </div>
`
); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
</br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>