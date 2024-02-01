<div class="modal" tabindex="-1" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if (Route::is('admin/projects/*'))
                        Delete Project
                    @else
                        Delete Type
                    @endif

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (Route::is('admin/projects/'))
                    <p>Are you sure you want to delete the "<span id="title-to-delete"></span>" project ?</p>
                @else
                    <p>Are you sure you want to delete the "<span id="title-to-delete"></span>" type ?</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="action-delete" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
