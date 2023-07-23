<?php
namespace app\widgets;

use yii\base\Widget;

class FilterFormWidget extends Widget{
    public $title;
    public $description;
    public $content;
    
    public function init(){
        parent::init();
    }
    
    public function run(){
        return '
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
        	aria-labelledby="offcanvasRightLabel">
        	<div class="offcanvas-header text-primary">
        		<h5 id="offcanvasRightLabel">'.
        		($this->title!=null?$this->title:'Tìm kiếm')
        		.'</h5>
        		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
        			aria-label="Close"><i class="fe fe-x fs-18"></i></button>
        	</div>
        	<div class="offcanvas-body">
        		<p>'.
        		($this->description!=null?$this->description:'')
        		.'</p>        			
        			
        	' . $this->content . '        			
        	</div>
        </div>
        ';        
    }
}
?>