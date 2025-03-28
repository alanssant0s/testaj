<div class="row">
    <!-- Informações da tabela -->
    <div class="col-sm-12 col-lg-6 mt-4" id="DataTables_Table_0_info" role="status" aria-live="polite">
        <?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, de um total de {{count}}')) ?>
    </div>

    <!-- Links de paginação -->
    <div class="dataTables_paginate paging_simple_numbers col-5" id="DataTables_Table_0_paginate">
        <ul class="pagination">
            <?= $this->Paginator->prev('←', [
                'class' => 'paginate_button page-item previous',
                'aria-controls' => 'DataTables_Table_0',
                'data-dt-idx' => '0',
                'tabindex' => '0',
                'escape' => false,
                'templates' => [
                    'prevActive' => '<li class="paginate_button page-item previous"><a href="{{url}}" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">{{text}}</a></li>',
                    'prevDisabled' => '<li class="paginate_button page-item previous disabled"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">{{text}}</a></li>'
                ]
            ]) ?>
            <?= $this->Paginator->numbers([
                'class' => 'paginate_button page-item',
                'currentClass' => 'active',
                'aria-controls' => 'DataTables_Table_0',
                'data-dt-idx' => '1',
                'tabindex' => '0',
                'templates' => [
                    'number' => '<li class="paginate_button page-item"><a href="{{url}}" aria-controls="DataTables_Table_0" data-dt-idx="{{text}}" tabindex="0" class="page-link">{{text}}</a></li>',
                    'current' => '<li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="{{text}}" tabindex="0" class="page-link">{{text}}</a></li>'
                ]
            ]) ?>
            <?= $this->Paginator->next('→', [
                'class' => 'paginate_button page-item next',
                'aria-controls' => 'DataTables_Table_0',
                'data-dt-idx' => '2',
                'tabindex' => '0',
                'escape' => false,
                'templates' => [
                    'nextActive' => '<li class="paginate_button page-item next"><a href="{{url}}" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">{{text}}</a></li>',
                    'nextDisabled' => '<li class="paginate_button page-item next disabled"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">{{text}}</a></li>'
                ]
            ]) ?>
        </ul>
    </div>
</div>