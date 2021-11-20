<?php
get_proc_name();
    // Returns the full path of the current PHP executable
    function get_proc_name(){
       // Gets the PID of the current executable
       $pid = posix_getpid();

       // Returns the exact path to the PHP executable.
       $exe = exec("readlink -f /proc/$pid/exe");
       return $exe;
    }