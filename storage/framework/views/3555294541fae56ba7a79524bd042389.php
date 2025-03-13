<?php $__env->startSection('body'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/home.js', 'resources/css/home.css']); ?>

    <!--------- Gharabawy icons link ----------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/fontawesome-free-6.5.1-web/css/all.min.css']); ?>
    <!------------------------------------------>

    
    <div class="col-6 col-md-10 col-lg-6 col-sm-12 d-flex flex-column align-items-center">
        <!------------------------------- Menu of statue ------------------------------>
        <div class="cover">
            <button class="left">
                <i class="fas fa-angle-left"></i>
            </button>
            <div class="scroll-images d-flex align-items-start">
                <?php $__currentLoopData = $suggestedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($suggestedUser->is_admin != 1): ?>
                        <div class="d-flex flex-column align-items-center m-2">
                            <a 
                            href="<?php echo e(url('profile/' . $suggestedUser->id)); ?>" 
                            type="button">
                                <img src="<?php echo e($suggestedUser->image); ?>"
                                    class="rounded-circle status-avatar" width="65px" height="65px" alt="Avatar" />
                            </a>
                            <p><?php echo e(Str::limit($suggestedUser->name, 12)); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="right">
                <i class="fas fa-angle-right"></i>
            </button>
        </div>

        <?php if($followingPosts->count() == 0): ?>
            <div class="d-flex flex-column justify-content-center text-secondary no-posts-message">
                <h1><i>You don't have any post ,</i></h1><br>
                <h1><i>Try to follow any one to see more posts</i></h1>
            </div>
        <?php endif; ?>

        <!------- Posts side -------->
        <?php $__currentLoopData = $followingPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card w-50 col-sm-12 col-lg-6 mt-0 mb-0 main-post-div">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <div class="row m-0">
                        <div class="col-md-12 d-flex align-items-center p-0">
                            <div class="col-12 d-flex pt-3 px-0 p-0 justify-content-start align-items-center">
                                <div class="avatar-container col-12 d-flex position-relative mb-2 mx-0">
                                    <img src="<?php echo e($post->user->image); ?>"
                                        class="rounded-circle avatar" width="50px" height="50px" alt="Avatar" />
                                        <div class="w-100 d-flex flex-column justify-content-center px-2">
                                            <div class="d-flex align-ite">
                                                <a 
                                                href="<?php echo e(url('profile/' . $post->user->id)); ?>" 
                                                type="button" 
                                                class="text-decoration-none text-dark user-name-btn">
                                                    <p class="m-0 user_name_post">
                                                        <b><?php echo e($post->user->name); ?></b>
                                                    </p>
                                                </a>
                                                <?php
                                                    $posts_time = function($timestamp) {
                                                        $now = \Carbon\Carbon::now();
                                                        
                                                        $diffInMinutes = $timestamp->diffInMinutes($now);
                                                        $diffInHours = $timestamp->diffInHours($now);
                                                    
                                                        if ($diffInMinutes < 60) {
                                                            return $diffInMinutes . ' minutes ago';
                                                        } elseif ($diffInHours < 24) {
                                                            return $diffInHours . ' hours ago';
                                                        } else {
                                                            return $timestamp->format('j M Y'); 
                                                        }
                                                    };
                                                ?>
                                                <p class="m-0 h6 text-secondary user_name_post">
                                                    <i>.<?php echo e($posts_time($post->created_at)); ?></i>
                                                </p>
                                            </div>
                                            <p class="m-0 mt-2 text-secondary fs-6 h6"><i><?php echo e(Str::limit($post->user->bio, 20)); ?></i></p>
                                        </div>

                                    

                                    <div class="profile-details-card position-absolute p-0 mt-5">
                                        <!-- Profile details content goes here -->
                                        <div class="card w-100 px-1 pt-0 details-card">
                                            <div class="bg-image hover-overlay" data-mdb-ripple-init
                                                data-mdb-ripple-color="light">
                                                <div class="row m-0 p-0">
                                                    <div class="col-9 d-flex align-items-center p-0">
                                                        <div
                                                            class="col-3 d-flex pt-3 justify-content-center align-items-center">
                                                            <div class="avatar-container position-relative">
                                                                <img src="<?php echo e($post->user->image); ?>"
                                                                    class="rounded-circle mb-3 avatar" width="50px"
                                                                    height="50px" alt="Avatar" />
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mx-3">
                                                            <div class="d-flex">
                                                                <p class="mb-0 h6">
                                                                    <?php echo e($post->user->name); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <p class="m-0">
                                                            <?php echo e($users->where('id', $post->user->id)->first()->posts_count); ?>

                                                        </p>
                                                        <p class="m-0">Posts</p>
                                                    </div>

                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <?php $__currentLoopData = $usersWithFollowersCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($user->id === $post->user->id): ?>
                                                                <div class="col-4 d-flex flex-column align-items-center">
                                                                    <p class="m-0"><?php echo e($user->followers_count); ?></p>
                                                                </div>
                                                                <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="m-0">followers</p>
                                                    </div>

                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <?php $__currentLoopData = $usersWithFollowingCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($user->id === $post->user->id): ?>
                                                            <div class="col-4 d-flex flex-column align-items-center">
                                                                <p class="m-0"><?php echo e($user->following_count); ?></p>
                                                            </div>
                                                            <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="m-0">following</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row d-flex">
                                                    <?php $__currentLoopData = $threePosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $posts = $t_post->posts->take(3);
                                                        ?>
                                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($image->user_id == $post->user->id): ?>
                                                                <div class="col-4">
                                                                    <img src="<?php echo e($image->image_url); ?>" width="80vh" height="100vh">
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-6 flex-grow-1">
                                                        <a
                                                        type="button"
                                                        href="<?php echo e(url('profile/' . $post->user->id)); ?>" 
                                                        class="btn btn-primary w-100 h-100">
                                                            <i class="fa-solid fa-user"></i>
                                                            View Profile
                                                        </a>
                                                    </div>
                                                    <?php if($post->user->id != Auth::id()): ?>
                                                    
                                                        <div class="col-6">
                                                            <?php if($post->user->followers->contains(Auth::id())): ?>
                                                                <button
                                                                type="button"
                                                                id="follow-btn-<?php echo e($post->user->id); ?>"
                                                                data-bs-follow = "<?php echo e($post->user->id); ?>"
                                                                data-bs-type="unfollow"
                                                                class="btn btn-secondary w-100 follow-btn">
                                                                    Unfollow
                                                                </button>
                                                            <?php else: ?>
                                                                <button
                                                                type="button"
                                                                id="follow-btn-<?php echo e($post->user->id); ?>"
                                                                data-bs-follow = "<?php echo e($post->user->id); ?>"
                                                                data-bs-type="follow"
                                                                class="btn btn-primary w-100 follow-btn"><i class="fa-solid fa-user-plus"></i>follow</button>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------- End of details card ----------->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php if($post->video == 0): ?>
                        <img src="<?php echo e($post->image_url); ?>" class="w-100 img-fluid" />
                    <?php else: ?>
                        <video controls autoplay src="<?php echo e($post->image_url); ?>" class="img-fluid"></video>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center justify-content-between">

                            <a type="button" class="post-like"
                                data-img-src-default="<?php echo e(asset("/images/heart_black.png")); ?>"
                                data-img-src="<?php echo e(asset("/images/heart.png")); ?>"
                                <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::id() == $like->user_id && $post->id == $like->post_id): ?>
                                style="color:red !important;"
                                data-bs-like="<?php echo e($like->id); ?>"
                                <?php endif; ?> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                data-bs-post="<?php echo e($post->id); ?>" id="postLike-<?php echo e($post->id); ?>">

                                    <img 
                                    <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::id() == $like->user_id && $post->id == $like->post_id): ?>
                                    src="<?php echo e(asset("/images/heart.png")); ?>"
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    src="<?php echo e(asset("/images/heart_black.png")); ?>"
                                    alt="">

                            </a>

                            <a type="button" class="comment-btn" data-toggle="modal"
                                data-bs-commentBtn = "<?php echo e($post->id); ?>" data-target="#commentsModal">
                                <img src="<?php echo e(asset("/images/chat.png")); ?>" alt="">
                            </a>

                            <a type="button">
                                <img src="<?php echo e(asset("/images/send.png")); ?>" alt="">
                            </a>


                        </div>
                        <div class="col-8 col-lg-8 col-md-6 col-sm-6 d-flex align-items-center justify-content-end">
                            <a type="button"
                            data-img-src-default="<?php echo e(asset("/images/bookmark_blak.png")); ?>"
                            data-img-src="<?php echo e(asset("/images/bookmark.png")); ?>"
                            <?php $__currentLoopData = $post->savedposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::id() == $mark->id): ?>
                                    style="color:orange !important;"
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            id="book-mark-btn-<?php echo e($post->id); ?>"
                            data-bs-post="<?php echo e($post->id); ?>"
                            class="post-book-mark"
                            >
                                    <img 
                                    <?php $__currentLoopData = $post->savedposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::id() == $mark->id): ?>
                                    src="<?php echo e(asset("/images/bookmark.png")); ?>"
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    src="<?php echo e(asset("/images/bookmark_blak.png")); ?>"
                                    alt="">
                            </a>
                        </div>
                        
                    </div>
                    <div class="mt-1 d-flex align-items-start post-caption" id="<?php echo e($post->id); ?>">
                        <p>
                            <a 
                            href="<?php echo e(url('profile/' . $post->user->id)); ?>" 
                            class="text-decoration-none text-dark user-name-btn"
                            type="button">
                                <b><?php echo e($post->user->name); ?></b>
                            </a>
                            <?php
                                $words = explode(' ', $post->caption);
                            ?>

                            <?php $__currentLoopData = $words; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Str::startsWith($word, '#')): ?>
                                    <a href="<?php echo e(url('/hashtags/' . Str::replace("#","",$word))); ?>" class=" text-decoration-none text-secondary"><?php echo e($word); ?></a>
                                <?php else: ?>
                                    <?php echo e($word); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    </div>
                    <div class="d-flex" id="main-likes-container-<?php echo e($post->id); ?>">
                        <?php
                            $allLikes = $post->likes;
                        ?>
                        <p class="m-1 mx-0 likes-count-<?php echo e($post->id); ?>"><?php echo e(count($allLikes)); ?> Likes</p>
                        <?php if(count($allLikes) <= 0): ?>
                            <div class="likess" id="likes-<?php echo e($post->id); ?>">
                               
                            </div>
                        <?php else: ?>

                                <p class="m-1" id="you-like-blade-<?php echo e($post->id); ?>">
                                    <b>
                                        <?php
                                            $foundUser = $post->likes[0]->user->name;
                                            $flag = 0;
                                        ?>
                                        <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(Auth::id() == $like->user_id ): ?>
                                                    You
                                                    <?php
                                                        $flag = 1;
                                                    ?>
                                                <?php endif; ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($flag == 0): ?>
                                            <?php echo e($foundUser); ?>

                                        <?php endif; ?>
                                    </b>
                                </p>
                            <div class="likess othersContent-<?php echo e($post->id); ?>" id="likes-<?php echo e($post->id); ?>">
                                <p class="m-1">and</p>
                                <a type="button"  
                                data-toggle="modal"
                                data-bs-othersLikesPost = "<?php echo e($post->id); ?>"
                                class = "others-post text-dark text-decoration-none"
                                data-target="#postOthersLikesAlert">
                                    <p class="m-1"><b>others</b></p>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                        <a 
                        type="button"
                        class="comment-btn text-decoration-none"
                        data-toggle="modal"
                        data-bs-commentBtn = "<?php echo e($post->id); ?>"
                        data-target="#commentsModal">
                            <p class="text-secondary m-0" id="view-all-comments-<?php echo e($post->id); ?>">View all <?php echo e($post->comments->count()); ?> comments</p>
                        </a>
                        <?php if(count($post->comments) > 0): ?>
                            <div id="post-<?php echo e($post->id); ?>">
                                <div class="comments-container">
                                    <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($post->id == $comment->post_id && $comment->user_id == Auth::id()): ?>  
                                            <div class="col-md-12 mb-0 aligh-items-center d-flex justify-content-between user-comment-<?php echo e($comment->id); ?>">
                                                <div class="d-flex col-10 align-items-center">
                                                        <p class="w-100">
                                                            <a 
                                                            href="<?php echo e(url('profile/' . $post->user->id)); ?>" 
                                                            class="text-decoration-none text-dark user-name-btn"
                                                            type="button">
                                                                <b><?php echo e($comment->user->name); ?></b>
                                                            </a>
                                                            <?php echo e($comment->comment_text); ?>

                                                        </p>
                                                    
                                                </div>


                                                <a type="button" 
                                                data-img-src-default="<?php echo e(asset("/images/heart2.png")); ?>"
                                                data-img-src="<?php echo e(asset("/images/heart1.png")); ?>"
                                                    class="comment-like m-2"
                                                    id="comment-like-<?php echo e($comment->id); ?>"
                                                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(Auth::id() == $comment_like->user_id && $post->id == $comment_like->post_id && $comment->id == $comment_like->comment_id): ?>
                                                                    data-bs-commentLike="<?php echo e($comment_like->id); ?>"
                                                                    style="color:red !important;"
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    data-bs-postCommment="<?php echo e($comment->id); ?>"
                                                    data-bs-postId="<?php echo e($post->id); ?>">

                                                        <img 
                                                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(Auth::id() == $comment_like->user_id && $post->id == $comment_like->post_id && $comment->id == $comment_like->comment_id): ?>
                                                        src="<?php echo e(asset("/images/heart1.png")); ?>"
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                        src="<?php echo e(asset("/images/heart2.png")); ?>"
                                                        alt="">

                                                </a>

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <h4 id="No-Comment-<?php echo e($post->id); ?>"><b>No Comments</b></h4>
                            <div id="post-<?php echo e($post->id); ?>">
                                <div class="comments-container">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row d-flex align-item-center">
                        <div class="col-10 d-flex">
                            <input type="text" name="comment" data-bs-comment="<?php echo e($post->id); ?>" id="text-post-<?php echo e($post->id); ?>" placeholder="Add a comment..."
                                class="comment-txt w-100 fs-6">
                        </div>
                        <div class="col-2 d-flex align-items-center">
                            <a type="button" 
                            class="commentBtn mx-1">Post</a>
                            <div class="dropdown">
                                <a id="btn-emotion" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" class="text-secondary">
                                    <svg aria-label="Emoji" class="x1lliihq x1n2onr6 x1roi4f4"
                                        fill="currentColor" height="20" role="img"
                                        viewBox="0 0 24 24" width="20">
                                        <title>Emoji</title>
                                        <path
                                            d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z">
                                        </path>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="btn-emotion">
                                    <div class="container">
                                        <ul class="list-inline emotion-list scrollable-menu" data-bs-emoo="<?php echo e($post->id); ?>" id="emoji-<?php echo e($post->id); ?>">
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😍</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😂</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😢</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👏</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🔥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🎉</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💯</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">❤️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😮</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😍</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😂</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😢</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👏</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🔥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🎉</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💯</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">❤️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥰</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😘</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😭</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🕴</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🧗</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🧗‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🧗‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏇</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">⛷</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏂</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏌</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏌️‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏌️‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏄</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏄‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏄‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🚣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🚣‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🚣‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏊‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏊‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">⛹</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">⛹️‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">⛹️‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏋</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🏋️‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙈</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙉</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💫</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💦</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💨</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐵</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐒</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🦊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🦝</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐱</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐤</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐸</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐬</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🐟</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌸</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌹</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥀</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌺</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌼</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌷</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌑</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌒</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌓</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌘</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌙</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌚</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌛</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌜</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🌝</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">⭐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😚</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😙</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😋</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😛</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😜</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤪</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😝</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤑</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤗</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤭</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤫</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤔</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤨</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😑</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😶</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😏</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😒</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙄</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😬</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😌</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😔</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😪</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤤</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😴</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😷</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤒</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤕</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤢</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤮</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤧</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥵</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥶</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥴</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😵</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤯</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤠</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥳</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😎</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤓</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🧐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😕</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😟</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙁</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">☹</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😮</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😯</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😲</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😳</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🥺</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😦</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😧</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😨</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😰</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😥</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😢</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😭</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😱</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😖</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😣</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😞</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😓</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😩</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😫</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😤</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😡</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😠</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤬</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😈</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👿</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💀</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">☠</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💩</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤡</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👹</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👺</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👻</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👽</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👾</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😺</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😸</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😹</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😻</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😼</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😽</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙀</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😿</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">😾</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💋</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👋</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤚</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🖐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">✋</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🖖</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👌</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">✌</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤞</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤟</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤘</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤙</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👈</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👉</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👆</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🖕</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👇</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">☝</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👍</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👎</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">✊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👊</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤛</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤜</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👏</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙌</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👐</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤲</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤝</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙏</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">✍</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">💪</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🦵</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🦶</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👂</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👀</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👅</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👶</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🧒</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👦</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙋‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🙇‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤦</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤦‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤦‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤷</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤷‍♂️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">🤷‍♀️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👨‍⚕️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👨‍⚖️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👩‍⚖️</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👨‍🌾</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👩‍🌾</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👨‍🔧</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👩‍🔧</li>
                                            <li class="list-inline-item list-inline-item-<?php echo e($post->id); ?>">👨‍🏭</li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-------------------------------------------- End of Posts side ------------------------------------------->


    
    <div class="col-3 d-none d-lg-block mt-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3 d-flex">
                    <a 
                    href="<?php echo e(url('profile/' . $loggedInUser->id)); ?>" 
                    href="#">
                        <?php if($loggedInUser->image == null): ?>
                            <img class="img-fluid rounded-circle test" src="https://cdn-icons-png.flaticon.com/128/15375/15375366.png" alt="ahmed" id="avatar-image">
                        <?php else: ?>
                            <img class="img-fluid rounded-circle test" src="<?php echo e($loggedInUser->image); ?>" alt="dog">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-md-9 d-flex flex-column align-items-center justify-content-center">
                        <h6 class="card-title mb-0"><?php echo e($loggedInUser->name); ?></h6>
                        <p class="card-text mb-2"><small class="text-muted">Suggested For You</small></p>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="suggested">Suggested for you</h6>
            <button class="btn btn-sm">See All</button>
        </div>
        
        <div class="card mb-3 pb-3 pt-3">
            <?php $__currentLoopData = $suggestedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($suggestedUser->id != Auth::id() && !$followingsIds->contains($suggestedUser->id) && $suggestedUser->is_admin != 1): ?>
            
                    <div class="row g-0">
                        <div class="col-md-4 w-100 d-flex">
                            <div class="avt-container m-1 d-flex align-items-center rounded-circle">
                                <div class="avatar-container position-relative">
                                    <a type="button" class="avatar-link rounded-circle m-1">
                                    <img src="<?php echo e($suggestedUser->image); ?>"
                                            class="rounded-circle mb-3 avatar" width="50px"
                                            height="50px" alt="Avatar" />
                                        </a>
                                </div>
                                <div class="popup p-0" id="popup">
                                    

                                    <!-- Profile details content goes here -->
                                        <div class="card w-100 px-1 pt-0 details-card">
                                            <div class="bg-image hover-overlay" data-mdb-ripple-init
                                                data-mdb-ripple-color="light">
                                                <div class="row m-0 p-0">
                                                    <div class="col-9 d-flex align-items-center p-0">
                                                        <div class="col-3 d-flex pt-3 justify-content-center align-items-center">
                                                            <div class="avatar-container position-relative">
                                                                <img src="<?php echo e($suggestedUser->image); ?>"
                                                                    class="rounded-circle mb-3 avatar" width="50px"
                                                                    height="50px" alt="Avatar" />
                                                            </div>
                                                        </div>
                                                        <div class="col-11 mx-3">
                                                            <div class="d-flex">
                                                                <a
                                                                href="<?php echo e(url('profile/' . $suggestedUser->id)); ?>" 
                                                                type="button" 
                                                                class="text-decoration-none text-dark">
                                                                    <p class="mb-0 h6">
                                                                        <?php echo e($suggestedUser->name); ?>

                                                                    </p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <p class="m-0">
                                                            <?php echo e($suggestedUser->posts_count); ?>

                                                        </p>
                                                        <p class="m-0">Posts</p>
                                                    </div>
        
                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <?php $__currentLoopData = $usersWithFollowersCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($user->id === $suggestedUser->id): ?>
                                                                <div class="col-4 d-flex flex-column align-items-center">
                                                                    <p class="m-0"><?php echo e($user->followers_count); ?></p>
                                                                </div>
                                                                <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="m-0">followers</p>
                                                    </div>
                                                    
        
                                                    <div class="col-4 d-flex flex-column align-items-center">
                                                        <?php $__currentLoopData = $usersWithFollowingCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($user->id === $suggestedUser->id): ?>
                                                            <div class="col-4 d-flex flex-column align-items-center">
                                                                <p class="m-0"><?php echo e($user->following_count); ?></p>
                                                            </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="m-0">following</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row d-flex">
                                                   <?php $__currentLoopData = $threePosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $posts = $t_post->posts->take(3);
                                                            ?>
                                                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($image->user_id == $suggestedUser->id): ?>
                                                                    <div class="col-4">
                                                                        <img src="<?php echo e($image->image_url); ?>"
                                                                        width="80vh" height="100vh">
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                
                                                <div class="row mt-3">
                                                    <div class="col-6 mt-4">
                                                        <a 
                                                        href="<?php echo e(url('profile/' . $suggestedUser->id)); ?>" 
                                                        type="button" 
                                                        class="btn btn-primary m-0 h-100 w-100">
                                                            <i class="fa-solid fa-user"></i>
                                                            Profile
                                                        </a>
                                                    </div>
                                                    <?php if($suggestedUser->id != Auth::id()): ?>
                                                        <div class="col-6 mt-4">
                                                            <?php if($suggestedUser->followers->contains(Auth::id())): ?>
                                                                <button
                                                                type="button"
                                                                id="follow-btn-suggest-<?php echo e($suggestedUser->id); ?>"
                                                                data-bs-follow = "<?php echo e($suggestedUser->id); ?>"
                                                                data-bs-type="unfollow"
                                                                class="btn btn-secondary w-100 follow-btn">
                                                                    Unfollow
                                                                </button>
                                                            <?php else: ?>
                                                                <button
                                                                type="button"
                                                                id="follow-btn-suggest-<?php echo e($suggestedUser->id); ?>"
                                                                data-bs-follow = "<?php echo e($suggestedUser->id); ?>"
                                                                data-bs-type="follow"
                                                                class="btn btn-primary w-100 follow-btn"><i class="fa-solid fa-user-plus"></i>follow</button>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!---------- End of details card ----------->
                                </div>



                            </div>
                            <div class="col-md-12 d-flex col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a
                                    href="<?php echo e(url('profile/' . $suggestedUser->id)); ?>" 
                                    type="button" 
                                    class="text-decoration-none text-dark">
                                        <h6 class="card-title mb-0"><?php echo e($suggestedUser->name); ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                
            </div>
        </div>
    </div>
        
    </div>
        <!-------------------- post options Modal ------------------>
    </div>
</div>
<!------------------- End of post options modal --------------------->

        <!-------------------- post likes others Modal ------------------>
        <div class="modal fade others-likes-modal" id="postOthersLikesAlert" tabindex="-1" role="dialog" data-bs-backdrop="static" 
        aria-hidden="true">
            
        </div>
        <!------------------- End of post options modal --------------------->

        <!------------------------- Comments Modal -------------------------->
        
            <div class="modal fade bg-none" id="commentsModal" tabindex="-1" role="dialog"
            aria-labelledby="commentsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl h-100" role="document">
                <div class="modal-content">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp" class="img-fluid" />
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center">

                        <div class="container-fluid">
                            <!------------------- User's profile --------------------->
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <div class="row m-0 p-0">
                                    <div class="col-9 d-flex align-items-center p-0">
                                        <div class="col-3 d-flex pt-3 justify-content-center align-items-center">
                                            <div class="avatar-container position-relative">
                                                <img src="https://cdn-icons-png.flaticon.com/128/15375/15375366.png"
                                                    class="rounded-circle mb-3 avatar" width="65px" height="65px"
                                                    alt="Avatar" />
                                            </div>
                                        </div>
                                        <div class="col-12 mx-3">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 h6">
                                                    Ahmed
                                                </p>
                                                <a type="button" data-toggle="modal" data-target="">
                                                    <svg aria-label="More options" class="x1lliihq x1n2onr6 x5n08af"
                                                        height="24" role="img" viewBox="0 0 24 24"
                                                        width="24">
                                                        <title>More options</title>
                                                        <circle cx="12" cy="12" r="1.5" fill="black">
                                                        </circle>
                                                        <circle cx="6" cy="12" r="1.5" fill="black">
                                                        </circle>
                                                        <circle cx="18" cy="12" r="1.5" fill="black">
                                                        </circle>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-------------------------------------------------------->
                            <hr class="mt-0">
                            <!----------------------------- Icons ---------------------->

                            <div class="row">
                                <div
                                    class="col-4 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center justify-content-between">

                                    <a type="button" class="like-btn" id="like-btn">
                                        <h4><b><i id="like-icon" class="fa-regular fa-heart"></i></b></h4>
                                    </a>

                                    <a type="button" id="commenr-btn">
                                        <h4><b><i class="fa-regular fa-comment"></i></b></h4>
                                    </a>

                                    <a type="button">
                                        <h4><b><i class="far fa-paper-plane"></i></b></h4>
                                    </a>


                                </div>
                                <div
                                    class="col-8 col-lg-8 col-md-6 col-sm-6 d-flex align-items-center justify-content-end">
                                    <a type="button" class="bookmark-btn" id="book-mark-btn">
                                        <h4><b><i id="book-mark-icon" class="fa-regular fa-bookmark"></i></b></h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex">
                                <p class="m-1 mx-0">Liked by</p>
                                <a type="button">
                                    <p class="m-1"><b>_8arabawy</b></p>
                                </a>
                                <p class="m-1">and</p>
                                <a type="button">
                                    <p class="m-1"><b>others</b></p>
                                </a>
                            </div>
                            <div class="d-flex">
                                <a type="button">
                                    <p class="text-secondary m-0">View all 23 comments</p>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" name="comment" placeholder="Add a comment..."
                                        class="comment-txt fs-6">
                                </div>
                                <div class="col-2">
                                    <a type="button">Post</a>
                                </div>
                            </div>

                            <!---------------------------------------------------------->
                            

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!----------------------- End of Comments modal ------------------------>



    <!---------------------------------------------------------- For the modal ---------------------------------------------------------------->
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Instagram-Clone\resources\views/home.blade.php ENDPATH**/ ?>