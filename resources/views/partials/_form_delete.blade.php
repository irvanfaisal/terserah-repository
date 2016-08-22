<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">delete</button>
<div id="delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>This action is irreversible. Are you sure?</p>
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            </div>
        </div>
    </div>
</div>
            