<?php
if (!function_exists('permission')) {
    function permission($name)
    {
        return backpack_user()->permission($name);
    }
}
