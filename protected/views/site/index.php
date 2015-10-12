<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<strong>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></strong>


<p>
<div class="panel panel-primary">
  <div class="panel-heading">
      Landing Page
  </div>
     
  <div class="panel-body">
      <?php //print_r($data); ?>
      
      
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'course-master-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id',          // display the 'title' attribute
        'course_name',
        'course_price',
        'course_duration',
        
        #lecturer relationship lookup
        array(
            'name'=>'lecturer_id',
            'value'=>'$data->lecturer->name',
        ),
      

         

    ),

));

?>
  </div>
 
  
</div>
