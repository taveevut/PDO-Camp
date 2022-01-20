<?php
require_once 'vendor/autoload.php';
include('../database.php');

$stm = $db_con->prepare("INSERT INTO questions (title, detail, view, reply, member_id) VALUES (:title, :detail , :view , :reply, :member_id)");
$stm->bindParam("title", $title, PDO::PARAM_STR);
$stm->bindParam("detail", $detail, PDO::PARAM_STR);
$stm->bindParam("view", $view, PDO::PARAM_INT);
$stm->bindParam("reply", $reply, PDO::PARAM_STR);
$stm->bindParam("member_id", $member_id, PDO::PARAM_INT);

$faker = Faker\Factory::create();
for ($i = 0; $i < 500; $i++) {
   $data = [
      'title' =>  $faker->text,
      'detail' =>  $faker->paragraph,
      'view' =>  30,
      'reply' =>  rand(50, 100),
      'member_id' =>  rand(1, 20),
   ];

   $stm->execute($data);
}
