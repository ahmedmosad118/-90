<?php $__env->startSection("container"); ?>
</br>
</br>
<div class="container">
  <h2>Product Table</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($prop->name); ?></td>
        <td><?php echo e($prop->price); ?></td>
        <td><?php echo e($prop->category->name); ?></td>
        <td>  <button type="button" class="btn btn-info"><a href="/product-edit/<?php echo e($prop->id); ?>">Edit<a></button>
  <button type="button" class="btn btn-danger"><a href="/product-delete/<?php echo e($prop->id); ?>">Delete</a></button>
</td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>