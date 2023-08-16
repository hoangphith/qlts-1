<?php
use yii\bootstrap5\ActiveForm;
?>
<div class="card custom-card">
	<div class="card-header rounded-bottom-0 card-header bg-light text-dark">
		<h5 class="mt-2">Panel with footer</h5>
	</div>
	<div class="card-body pe-0 ps-0 pt-0 pb-0">
	
	 <?php $form = ActiveForm::begin([
	        'id'=>'frmHeThong',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm form-horizontal'
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => '<div class="col-sm-4">{label}</div><div class="col-sm-8">{input}{error}</div>',
                'labelOptions' => ['class' => 'col-md-12 control-label'],
            ],
      	]); ?>	
			<input id="txtHidden" name="ThietBiSearch[id_he_thong]" type="hidden" value="" />
				<div data-bs-spy="scroll" data-bs-target="#navbar-example3" class="scrollspy-example-2 bd-x-0 bd-y-0 bg-white" style="height:600px;border-radius: 0px;" data-bs-offset="0" tabindex="0">
					
					<ul id="treeview1">
        				<li><a href="javascript:void(0);">TECH</a>
        					<ul>
        						<li data-value="6">Company Maintenance -->6</li>
        						<li>Employees
        							<ul>
        								<li data-value="50">Reports-->5</li>
        							</ul>
        						</li>
        						<li>Human Resources</li>
        					</ul>
        				</li>
        				<li>XRP
        					<ul>
        						<li>Company Maintenance</li>
        						<li>Employees
        							<ul>
        								<li>Reports</li>
        							</ul>
        						</li>
        						<li>Human Resources</li>
        					</ul>
        				</li>
        			</ul>

				</div>
				
			<?php ActiveForm::end(); ?>
	</div>
</div>

<?php
$script = <<< JS
    $('#treeview1 ul li').on('click', function(){
        //alert($(this).attr('data-value'));
        var myVal = Number($(this).attr('data-value'));
        if(myVal > 0) {
            $('#txtHidden').val(myVal);
            $('#frmHeThong').submit();
        }
    });
JS;
$this->registerJs($script);
?>


