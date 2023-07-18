<?php
namespace app\widgets;

use yii\base\Widget;

class FilterFormWidget extends Widget{
    public $id;
    public $title;
    public $content;
    
    public function init(){
        parent::init();
    }
    
    public function run(){
        return '
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
        	aria-labelledby="offcanvasRightLabel">
        	<div class="offcanvas-header">
        		<h5 id="offcanvasRightLabel">Offcanvas right</h5>
        		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
        			aria-label="Close"><i class="fe fe-x fs-18"></i></button>
        	</div>
        	<div class="offcanvas-body">
        		<p>It is a long established fact that a reader will be distracted by the readable
        			content of
        			a page when looking at its layout. The point of using Lorem Ipsum is that it has
        			a
        			more-or-less normal distribution of letters, as opposed to using
        			Content here, content here, making it look like readable English.</p>
        			
        			
        	' . $this->content . '        			
        	</div>
        </div>
        ';        
    }
}
?>