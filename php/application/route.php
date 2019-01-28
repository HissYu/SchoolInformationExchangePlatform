<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    // ':module/:controller/:action' => ':module/:controller/:action',
    'test'=>'index/index/test',
    'fetchLocation'=>'index/system/location',
    'imageCollect'=>'index/image/imageCollect',
    'checkRepetation'=>'index/user/checkRepetation',
    'userRegister'=>'index/user/register',
    'userLogin'=>'index/user/login',
    '__miss__' => 'index/index/miss',
    'greet' => 'index/index/greet',
];
