<?php
if (!function_exists('permission')) {
    function permission($name)
    {
        return backpack_user()->permission($name);
    }
}
if (!function_exists('setting')) {
    function setting($name)
    {
        try {
            $setting = \App\Models\Setting::query()->where("name", $name)->first();
            if (isset($setting->id)) {
                return $setting->value ?? null;
            }
            return null;
        } catch (Exception $exception) {
            return null;
        }
    }
}
