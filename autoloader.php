<?php

spl_autoload_register(function ($className) {
   $path = preg_replace('#\\\#', '/', $className);

   require $path.'.php';
});