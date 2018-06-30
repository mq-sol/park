<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>みんなで作るおさんぽマップ</title>

    <!-- Bootstrap -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('main'); ?>
    <?php // echo $this->Html->css('common'); ?>

    <!-- Le styles -->
    <style>
    body {
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?php echo $this->Html->css('/css/colorbox/colorbox.css'); ?>
    <?php echo $this->Html->script('/js/colorbox/jquery.colorbox.js'); ?>
    <?php echo $this->Html->script('/js/colorbox/i18n/jquery.colorbox-ja.js'); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->fetch('script'); ?>
    <?php echo $this->element('header'); ?>

    <?php echo $this->Session->flash(); ?>

    <?php echo $this->fetch('content'); ?>
    <?php //echo $this->element('footer'); ?>
  </body>
</html>
