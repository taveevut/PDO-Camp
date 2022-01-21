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

if (!function_exists('alert')) {
   function alert()
   {
      $response = '';
      if (!empty($_SESSION['alt'])) {
         $response = '
            <div class="alert alert-dismissible alert-' . $_SESSION['alt']['type'] . '">
               <button class="close" type="button" data-dismiss="alert">×</button>
               ' . $_SESSION['alt']['message'] . '
            </div>
         ';
         unset($_SESSION['alt']);
      }

      return $response;
   }
}
