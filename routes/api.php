<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


require base_path(path: 'routes/User/UserRoute.php');
require base_path(path: 'routes/Post/PostRoute.php');
require base_path('routes/Follow/FollowRoute.php');
require base_path('routes/Comment/CommentRoute.php');