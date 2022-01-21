<?php
if (!function_exists('redirect_admin')) {
   function redirect_admin($url = '')
   {
      header("Location: " . ROOT_PROJECT . "/administrator/$url");
   }
}

if (!function_exists('redirect_member')) {
   function redirect_member($url = '')
   {
      header("Location: " . ROOT_PROJECT . "/member/$url");
   }
}
