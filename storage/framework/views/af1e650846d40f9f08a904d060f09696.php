<?php $__env->startSection('title', 'Edit'); ?>
<?php $__env->startSection('body'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/edit-profile.css']); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/editprofile.js']); ?>
    
    <div class="col-10">
        
        <div class="col-md-9">
            <div class="d-flex align-items-start col-12">
                <div class="nav flex-column nav-pills me-5 col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="m-3">
                        <h5>Settings</h5>

                    </div>
                    
                    <div class="mt-4 mx-3 text-start">
                        <p>How you use Instagram</p>
                    </div>
                    <button class="nav-link active text-start link" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true"><i class="fa-regular fa-user me-2"></i> Edit profile</button>
                    <button class="nav-link text-start link" id="v-pills-profile-tab " data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false"><i class="fa-solid fa-ban me-2"></i>
                        Blocked</button>
                </div>
                <div class="tab-content col-7" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        <h5 class="m-3"><strong>Edit Profile</strong></h5>
                        <div class="card gray">

                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <img class="rounded-circle " id="profile-pic" width="50px" height="50px"
                                        src="<?php echo e(auth()->user()->image); ?>" alt="gloo">
                                    <span class="mx-2 "><strong><?php echo e(auth()->user()->username); ?></strong></span>
                                </div>
                                <!-- Button trigger modal -->
                                

                                
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" name="image"
                                    data-bs-target="#staticBackdropghrabawy" id="ghrabaawy">
                                    Change photo
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade " id="staticBackdropghrabawy" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class=" modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                            <div class="modal-header justify-content-center">
                                                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Change
                                                    Profile photo</h1>
                                            </div>
                                            <div class="modal-body text-light d-flex flex-column align-item-center">
                                                <form id="form-photo-profile" action="<?php echo e(route('profile.changephoto')); ?>"
                                                    method="POST" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="text-center">
                                                        <button class="btn-navbar btn">Select form computer</button>
                                                        <input class="upload-img-navbar" type="file" id="chgphoto"
                                                            name="chgphoto" />
                                                    </div>
                                                </form>
                                            </div>
                                            <hr>
                                            <div class="text-center">
                                                <form id="form-photo-profile" action="<?php echo e(route('profile.removeimage')); ?>"
                                                    method="POST" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="upload-btn-wrapper text-center">
                                                        <button class="btn2  text-danger" type="submit">Remove profile
                                                            image</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <hr>
                                            <div class=" text-center ">
                                                <button type="button" class="btn text-dark mb-2 w-100"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            
                            <form action="<?php echo e(route('profile.edit')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label class="mt-3 h5"for="formGroupExampleInput2">Bio</label>
                                    <input type="text" class="form-control mt-1" id="formGroupExampleInput2"
                                        name="bio" placeholder="Bio" value="<?php echo e(auth()->user()->bio); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label class="mt-3 h5"for="inputState">Gender</label>
                                    <select id="inputState" class="form-control mt-1" name="gender">
                                        <option value="Male" <?php echo e(auth()->user()->gender == 'Male' ? 'selected' : ''); ?>>
                                            Male</option>
                                        <option value="Female" <?php echo e(auth()->user()->gender == 'Female' ? 'selected' : ''); ?>>
                                            Female</option>
                                        <option value="Custom" <?php echo e(auth()->user()->gender == 'Custom' ? 'selected' : ''); ?>>
                                            Custom</option>
                                    </select>
                                    <p class="text-muted mt-1 small">This won’t be part of your public profile.
                                    </p>
                                </div>
                                
                        </div>
                        <div class="d-flex justify-content-end flex-row ">
                            <button type="submit" class="btn btn-primary mt-3 w-50">Submit</button>
                        </div>
                        
                        </form>

                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h5 class="m-4"><strong>Blocked Accounts</strong></h5>
                        <p class="text-muted">You can block people anytime from their profiles.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Instagram-Clone\resources\views/profile/edit.blade.php ENDPATH**/ ?>