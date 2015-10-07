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
            if(is_array($a) || is_object($a))
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
        call_user_func_array('static::prnt', func_get_args());
        die;
    }
}
