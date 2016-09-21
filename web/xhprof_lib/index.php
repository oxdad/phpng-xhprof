<?php
/**
 * Created by PhpStorm.
 * User: oxdad
 * Date: 16/9/21
 * Time: 19:05
 */

namespace app\common;

class Xhprof
{
    public static function run() {
        xhprof_enable();

        register_shutdown_function(function(){
            file_put_contents((ini_get('xhprof.output_dir') ? : '/tmp') . '/' . uniqid() . '.xhprof.xhprof', serialize(xhprof_disable()));
        });
    }
}

Xhprof::run();
