<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>

<?php foreach ($models as $model) { ?>
    <div class="body-container active-left">
    <div class="sport-aside">
        <div style="background: #fff; border: 1px solid #afcde3; position: relative; left:10px;top:10px; width: 30px; height: 30px;">
            <h6>No found</h6>
        </div>
        <h4 style="position: relative;top: 10px; left:10px;"><?= $model->title ?></h4>
    
    </div>
    </div>
    <br/>
<?php }
    echo LinkPager::widget(['pagination'=>$pages,]);
 ?>

