<?php
// +----------------------------------------------------------------------
// | 会话设置
// +----------------------------------------------------------------------

return [
    // session name
    'name'           => 'PHPSESSID',
    // SESSION_ID的提交变量,解决flash上传跨域
    'var_session_id' => '',
    // 驱动方式 支持file cache
    'type'           => 'file',
    // 存储连接标识 当type使用cache的时候有效
    'store'          => null,
    // 过期时间
    'expire'         => 1800,
    // 前缀
    'prefix'         => '',
];

/*
 *  检查 ThinkPHP 版本与 Redis 驱动
ThinkPHP 6.0 默认是支持 Redis 驱动的，但如果你使用的是较旧版本的 ThinkPHP 或者自定义版本，可能会缺少对 Redis 的支持。

手动添加 Redis 驱动
如果你使用的是自定义版本，确保以下 Redis 驱动文件存在：

在 thinkphp/library/think/cache/driver/Redis.php 中应当存在 Redis 驱动类。
如果没有，可以手动添加 Redis 驱动，或从官方的 ThinkPHP 6.0 代码库中获取。*/



