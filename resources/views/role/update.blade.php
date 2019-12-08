<div class="modal fade" id="updateRoleModal" tabindex="-1" role="dialog" aria-labelledby="updateRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRoleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('roles') }}" method="put" @submit.prevent="updatedData">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ __('name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" v-model="inforoles.role">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click.prevent="updatedData">Update changes</button>
            </div>
        </div>
    </div>
</div>