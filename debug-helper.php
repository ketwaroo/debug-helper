<?php

/**
 * Debug functions.
 * @author Ketwaroo D. Yaasir
 */

if(!function_exists('prnt'))
{
    /**
     * Var_dump like utility but with pre-formatting and some more useful info on objects.
     * 
     * @param mixed $args.. any number of arguments to be dumped.
     * @return void
     */
    function prnt()
    {
        if(PHP_SAPI !== 'cli')
        {
            echo '<pre style="border:1px dotted #888;border-radius:0.5em;margin:0.5em;">', PHP_EOL;
        }
        foreach(func_get_args() as $a)
        {
            if(is_object($a)){
                print_r([
                    'class'=>$a,
                    'methods'=>  get_class_methods(get_class($a)),
                ]);
            }
            elseif(is_array($a))
            {
                print_r($a);
            }
            else
            {
                var_dump($a);
            }
        }
        if(PHP_SAPI !== 'cli')
        {
            echo PHP_EOL, '</pre>';
        }
    }
}

if(!function_exists('prntd'))
{
    /**
     * Var_dump like utility but with pre-formatting and some more useful info on objects. And then die.
     * 
     * @see prnt()
     * @param mixed $args.. any number of arguments to be dumped.
     * @return void
     */
    function prntd()
    {
        call_user_func_array('prnt', func_get_args());
        die;
    }
}
if(!function_exists('dump')) {
    function dump(){
        call_user_func_array('prnt', func_get_args());
    }
}
if(!function_exists('dd')) {
    function dd(){
        call_user_func_array('prnt', func_get_args());
        die;
    }
}
