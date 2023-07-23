<?php
use app\widgets\BoolViewWidget;
use yii\widgets\DetailView;
?>

								
										<div class="tab_wrapper second_tab left_side withControls">
											<ul class="tab_list">
												<li class="" rel="tab_1_1">Tab 1</li>
												<li rel="tab_1_2" class="active">Tab 2</li>
												<li rel="tab_1_3" class="">Tab 3</li>
												<li rel="tab_1_4" class="">Tab 4</li>
												<li rel="tab_1_5" class="">Tab 5</li>
												<li rel="tab_1_6" class="">Tab 6</li>
											</ul>

											<div class="content_wrapper">
												<div title="tab_1_1" class="accordian_header tab_1_1">Tab 1<span class="arrow"></span></div><div class="tab_content first tab_1_1" title="tab_1_1" style="display: none;">
													<p>
													<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'ma_bo_phan',
            'ten_bo_phan',
            'truc_thuoc'=>[
                'attribute'=>'truc_thuoc',
                'value'=>$model->trucThuoc
            ],
            'la_dv_quan_ly'=>[
                'attribute'=>'la_dv_quan_ly',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_quan_ly])
            ],
            'la_dv_su_dung'=>[
                'attribute'=>'la_dv_su_dung',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_su_dung])
            ],
            'la_dv_bao_tri'=>[
                'attribute'=>'la_dv_bao_tri',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_bao_tri])
            ],
            'la_dv_van_tai'=>[
                'attribute'=>'la_dv_van_tai',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_van_tai])
            ],
            'la_dv_mua_hang'=>[
                'attribute'=>'la_dv_mua_hang',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_mua_hang])
            ],
            'la_dv_quan_ly_kho'=>[
                'attribute'=>'la_dv_quan_ly_kho',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_quan_ly_kho])
            ],
            'la_trung_tam_chi_phi'=>[
                'attribute'=>'la_trung_tam_chi_phi',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_trung_tam_chi_phi])
            ],
            'id_kho_vat_tu',
            'id_kho_phe_lieu',
            'id_kho_thanh_pham',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
        'template' => "<tr><th style='width: 25%;'>{label}</th><td>{value}</td></tr>"
    ]) ?>
													
													</p>
												</div>
												<div title="tab_1_2" class="accordian_header tab_1_2 undefined active">Tab 2<span class="arrow"></span></div><div class="tab_content tab_1_2 active" title="tab_1_2" style="display: block;">
													<p>Contrary to popular belief, Lorem Ipsum is not simply random
														text. It has roots in a piece of classical Latin literature from
														45 BC, making it over 2000 years old. Richard McClintock, a
														Latin professor at
														Hampden-Sydney College in Virginia, looked up one of the more
														obscure Latin words, consectetur, from a Lorem Ipsum passage,
														and going through the cites of the word in classical literature,
														discovered
														the undoubtable source. Lorem Ipsum comes from sections 1.10.32
														and 1.10.33 of"de Finibus Bonorum et Malorum" (The Extremes of
														Good and Evil) by Cicero, written in 45 BC. This Digital Camera is a
														treatise on the
														theory of ethics, very popular during the Renaissance. The first
														line of Lorem Ipsum,"Lorem ipsum dolor sit amet..", comes from a
														line in section 1.10.32. Contrary to popular belief, Lorem Ipsum
														is not
														simply random text. It has roots in a piece of classical Latin
														literature from 45 BC, making it over 2000 years old. Richard
														McClintock, a Latin professor at Hampden-Sydney College in
														Virginia, looked
														up one of the more obscure Latin words, consectetur, from a
														Lorem Ipsum passage, and going through the cites of the word in
														classical literature, discovered the undoubtable source. Lorem
														Ipsum comes
														from sections 1.10.32 and 1.10.33 of"de Finibus Bonorum et
														Malorum" (The Extremes of Good and Evil) by Cicero, written in
														45 BC. This Digital Camera is a treatise on the theory of ethics, very
														popular during the
														Renaissance. The first line of Lorem Ipsum,"Lorem ipsum dolor
														sit amet..", comes from a line in section 1.10.32.</p>
												</div>
												<div title="tab_1_3" class="accordian_header tab_1_3 undefined">Tab 3<span class="arrow"></span></div><div class="tab_content tab_1_3" title="tab_1_3" style="display: none;">
													<p>It is a long established fact that a reader will be distracted by
														the readable content of a page when looking at its layout. The
														point of using Lorem Ipsum is that it has a more-or-less normal
														distribution
														of letters, as opposed to using 'Content here, content here',
														making it look like readable English. Many desktop publishing
														packages and web page editors now use Lorem Ipsum as their
														default model text,
														and a search for 'lorem ipsum' will uncover many web sites still
														in their infancy. Various versions have evolved over the years,
														sometimes by accident, sometimes on purpose (injected humour and
														the like)
														It is a long established fact that a reader will be distracted
														by the readable content of a page when looking at its layout.
														The point of using Lorem Ipsum is that it has a more-or-less
														normal distribution
														of letters, as opposed to using 'Content here, content here',
														making it look like readable English. Many desktop publishing
														packages and web page editors now use Lorem Ipsum as their
														default model text,
														and a search for 'lorem ipsum' will uncover many web sites still
														in their infancy. Various versions have evolved over the years,
														sometimes by accident, sometimes on purpose (injected humour and
														the like).</p>
												</div>
												<div title="tab_1_4" class="accordian_header tab_1_4 undefined">Tab 4<span class="arrow"></span></div><div class="tab_content tab_1_4" title="tab_1_4" style="display: none;">
													<p>Contrary to popular belief, Lorem Ipsum is not simply random
														text. It has roots in a piece of classical Latin literature from
														45 BC, making it over 2000 years old. Richard McClintock, a
														Latin professor at
														Hampden-Sydney College in Virginia, looked up one of the more
														obscure Latin words, consectetur, from a Lorem Ipsum passage,
														and going through the cites of the word in classical literature,
														discovered
														the undoubtable source. Lorem Ipsum comes from sections 1.10.32
														and 1.10.33 of"de Finibus Bonorum et Malorum" (The Extremes of
														Good and Evil) by Cicero, written in 45 BC. This Digital Camera is a
														treatise on the
														theory of ethics, very popular during the Renaissance. The first
														line of Lorem Ipsum,"Lorem ipsum dolor sit amet..", comes from a
														line in section 1.10.32. Contrary to popular belief, Lorem Ipsum
														is not
														simply random text. It has roots in a piece of classical Latin
														literature from 45 BC, making it over 2000 years old. Richard
														McClintock, a Latin professor at Hampden-Sydney College in
														Virginia, looked
														up one of the more obscure Latin words, consectetur, from a
														Lorem Ipsum passage, and going through the cites of the word in
														classical literature, discovered the undoubtable source. Lorem
														Ipsum comes
														from sections 1.10.32 and 1.10.33 of"de Finibus Bonorum et
														Malorum" (The Extremes of Good and Evil) by Cicero, written in
														45 BC. This Digital Camera is a treatise on the theory of ethics, very
														popular during the
														Renaissance. The first line of Lorem Ipsum,"Lorem ipsum dolor
														sit amet..", comes from a line in section 1.10.32.</p>
												</div>
												<div title="tab_1_5" class="accordian_header tab_1_5 undefined">Tab 5<span class="arrow"></span></div><div class="tab_content tab_1_5" title="tab_1_5" style="display: none;">
													<p>There are many variations of passages of Lorem Ipsum available,
														but the majority have suffered alteration in some form, by
														injected humour, or randomised words which don't look even
														slightly believable.
														If you are going to use a passage of Lorem Ipsum, you need to be
														sure there isn't anything embarrassing hidden in the middle of
														text. All the Lorem Ipsum generators on the Internet tend to
														repeat predefined
														chunks as necessary, making this the first true generator on the
														Internet. It uses a dictionary of over 200 Latin words, combined
														with a handful of model sentence structures, to generate Lorem
														Ipsum
														which looks reasonable. The generated Lorem Ipsum is therefore
														always free from repetition, injected humour, or
														non-characteristic words etc. There are many variations of
														passages of Lorem Ipsum available,
														but the majority have suffered alteration in some form, by
														injected humour, or randomised words which don't look even
														slightly believable. If you are going to use a passage of Lorem
														Ipsum, you need to
														be sure there isn't anything embarrassing hidden in the middle
														of text. All the Lorem Ipsum generators on the Internet tend to
														repeat predefined chunks as necessary, making this the first
														true generator
														on the Internet. It uses a dictionary of over 200 Latin words,
														combined with a handful of model sentence structures, to
														generate Lorem Ipsum which looks reasonable. The generated Lorem
														Ipsum is therefore
														always free from repetition, injected humour, or
														non-characteristic words etc.</p>
												</div>
												<div title="tab_1_6" class="accordian_header tab_1_6 undefined">Tab 6<span class="arrow"></span></div><div class="tab_content last tab_1_6" title="tab_1_6" style="display: none;">
													<p>Contrary to popular belief, Lorem Ipsum is not simply random
														text. It has roots in a piece of classical Latin literature from
														45 BC, making it over 2000 years old. Richard McClintock, a
														Latin professor at
														Hampden-Sydney College in Virginia, looked up one of the more
														obscure Latin words, consectetur, from a Lorem Ipsum passage,
														and going through the cites of the word in classical literature,
														discovered
														the undoubtable source. Lorem Ipsum comes from sections 1.10.32
														and 1.10.33 of"de Finibus Bonorum et Malorum" (The Extremes of
														Good and Evil) by Cicero, written in 45 BC. This Digital Camera is a
														treatise on the
														theory of ethics, very popular during the Renaissance. The first
														line of Lorem Ipsum,"Lorem ipsum dolor sit amet..", comes from a
														line in section 1.10.32. Contrary to popular belief, Lorem Ipsum
														is not
														simply random text. It has roots in a piece of classical Latin
														literature from 45 BC, making it over 2000 years old. Richard
														McClintock, a Latin professor at Hampden-Sydney College in
														Virginia, looked
														up one of the more obscure Latin words, consectetur, from a
														Lorem Ipsum passage, and going through the cites of the word in
														classical literature, discovered the undoubtable source. Lorem
														Ipsum comes
														from sections 1.10.32 and 1.10.33 of"de Finibus Bonorum et
														Malorum" (The Extremes of Good and Evil) by Cicero, written in
														45 BC. This Digital Camera is a treatise on the theory of ethics, very
														popular during the
														Renaissance. The first line of Lorem Ipsum,"Lorem ipsum dolor
														sit amet..", comes from a line in section 1.10.32.</p>
												</div>
											</div>
										<div class="controller"><span class="previous" style="">previous</span><span class="next" style="">next</span></div></div>
									
							
								

<?php 
$this->registerJsFile("@web/assets/plugins/tabs/jquery.multipurpose_tabcontent.js",[
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
$this->registerJsFile("@web/assets/plugins/tabs/tab-content.js",[
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
?>