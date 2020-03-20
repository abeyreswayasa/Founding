<?php $__env->startSection('content'); ?>

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
                                        class="btn btn-primary">
                                        Search Now
                                </button>
                            </div>
                        </div>

                    <?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo e($company->name); ?></h1>
					<div class="product-meta">
						<ul class="list-inline">
                            <?php $__currentLoopData = $company->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleCategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="<?php echo e(route('category', [$singleCategories->id])); ?>">
                                        <span class="label label-info label-many"><?php echo e($singleCategories->name); ?></span>
                                </a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="<?php echo e(route('search', ['city_id' => $company->city->id])); ?>"><?php echo e($company->city->name); ?></a></li>
						</ul>
					</div>
                    <br>
                    <div class="col-md-4">
                        <?php if($company->logo): ?><a href="<?php echo e(asset(env('UPLOAD_PATH').'/' . $company->logo)); ?>" target="_blank"><img class="card-img-top img-fluid" src="<?php echo e(asset(env('UPLOAD_PATH').'/thumb/' . $company->logo)); ?>"/></a><?php endif; ?>
                    </div>
					<div class="content">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">About company</h3>
								<p><?php echo e($company->description); ?></p>
							</div>
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Where to find</h3>
								<p><?php echo e($company->address); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- User Profile widget -->
					<div class="widget user">
						<h4>Other companies in this category</h4>
                        <?php $__currentLoopData = $company->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleCategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $singleCategories->companies->shuffle()->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleCompany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('company', [$singleCompany->id])); ?>"><?php echo e($singleCompany->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<!-- Map Widget -->
				</div>
			</div>
			
		</div>
	</div>
	<!-- Container End -->
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>