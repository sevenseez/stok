<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>Kullanıcılar</h3>
            </div>
            <div class="module-body table">
            <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'summaryText'=>'',
                'htmlOptions'=>array('cellpadding'=>0,'cellspacing'=>0,'border'=>0,'width'=>'100%'),
                'itemsCssClass'=>'datatable-1 table table-bordered table-striped display',
                'columns'=>array(
                    array('header'=>'Ad Soyad',
                           'name'=>'fullName',
                           'value'=>'ucwords($data->name.\' \'.$data->lastname)',
                        ),
                    'username',
                    'password',
                    'auth',
                )
            ));
            
            ?>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<!--/.span9-->
</div>
</div>
<!--/.container-->
</div>