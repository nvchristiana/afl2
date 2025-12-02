

<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>

<h1 class="mb-4">Tambah Produk</h1>

<div class="card p-4 shadow-sm">

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <form action="<?php echo e(route('products.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Nama File Gambar</label>
            <input type="text" name="image" class="form-control" placeholder="contoh: 10.jpg">
        </div>

        
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button class="btn btn-primary">Simpan Produk</button>
    </form>

</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('products.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\LaravelProjects\afl1-products\resources\views/products/create.blade.php ENDPATH**/ ?>