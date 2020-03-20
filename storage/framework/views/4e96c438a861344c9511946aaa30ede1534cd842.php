<?php $__env->startSection('content'); ?>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    <?php echo Form::open([ 'action' => 'HomePageController@table', 'method' => 'get']); ?>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Search company']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('name')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('name')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-3">
                                <?php echo Form::select('categories', $search_categories, null , ['placeholder' => 'Category', 'class' => 'form-control form-control-lg']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('categories')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('categories')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-3">
                                <?php echo Form::select('city_id', $search_cities, null, ['placeholder' => 'City', 'class' => 'form-control form-control-lg']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('city_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('city_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <button type="submit"
                                        class="btn btn-main">
                                        Search Now
                                </button>
                            </div>
                        </div>

                    <?php echo Form::close(); ?>

					
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
                <div class="row">
                    <?php $__currentLoopData = $categories_all->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="<?php echo e($category_all->icon); ?> icon-bg-<?php echo e($category_all->id); ?>"></i> 
                                    <h4>
                                        <a href="<?php echo e(route('category', [$category_all->id])); ?>"><?php echo e($category_all->name); ?> <p style="display: inline">(<?php echo e($category_all->companies->count()); ?>)</p></a> 
                                        
                                    </h4>
                                </div>
                                <ul class="category-list">
                                    <?php $__currentLoopData = $category_all->companies->shuffle()->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleCompany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('company', [$singleCompany->id])); ?>"><?php echo e($singleCompany->name); ?> </a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->               
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mainTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>