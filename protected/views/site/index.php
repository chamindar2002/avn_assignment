<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<strong>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></strong>


<p>
<div class="panel panel-primary">
  <div class="panel-heading">
      User
  </div>
     
  <div class="panel-body">
      <?php print_r($data); ?>
  </div>
 
  
</div>
