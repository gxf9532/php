<?php

class MemSession
{
    // 成员属性 
    public static $mem; // memcache对象
    public static $ctime; // 当前时间
    public static $maxlifetime; // 最大生存时间

    public static function start(Memcache $mem)
    {
        self::$mem = $mem;
        self::$ctime = time();
        self::$maxlifetime = ini_get('session.gc_maxlifetime');
        ini_set('session.save_handler', 'memcache');
        ini_set('session.save_path', '127.0.0.1:11211');

        // 注册自定义session函数
        session_set_save_handler(
            array(__CLASS__, 'open'),
            array(__CLASS__, 'close'),
            array(__CLASS__, 'read'),
            array(__CLASS__, 'write'),
            array(__CLASS__, 'destory'),
            array(__CLASS__, 'gc')
        );
      
        // 开启session
        session_start();
    }

    // 成员方法
    public static function open($path, $name)
    {
        return true;
    }

    public static function close()
    {
        return true;
    }

    public static function read($id)
    {
        $data = self::$mem->get($id);

        return !empty($data) ? $data : '';
    }

    public static function write($id, $data)
    {
        // 将数据写入memcache 
        return self::$mem->set($id, $data, 0, self::$maxlifetime);
    }

    public static function destory($id)
    {
        return self::$mem->delete($id);
    }
    public static function gc($maxlifetime)
    {
        return true;
    }
}

$mem = new Memcache();
$mem->connect('localhost', 11211);
MemSession::start($mem);
