@extends('home')
@section('body')
    <div class="row mt-4" id="bodyRoles" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-md-12">
            <div class="float-right">
                <a href=""
                   class="btn btn-outline-primary"
                   data-toggle="modal"
                   data-target="#createRoleModal">
                    {{ __('create new role') }}
                </a>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <table class="table table-striped" v-if="roles.length != 0">
                <thead>
                <tr>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('options') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="r in roles.data">
                    <td>@{{ r.role }}</td>
                    <td>
                        <a href=""
                           @click.prevent="editData(r)"
                           class="btn btn-warning"
                        >{{ __('edit') }}</a>
                        <a href=""
                           @click.prevent="deleteData(r)"
                           class="btn btn-danger"
                        >{{ __('delete') }}</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="alert-warning" v-else>{{ __('no data available') }}</div>
        </div>
        @component('role.create')@endcomponent
        @component('role.update')@endcomponent
        @component('role.delete')@endcomponent
    </div>

@endsection

@section('scripts')
    <script>
        let http = window.location;
        let id_value = "";
        let realApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';
        let vue = new Vue({
            el: '#bodyRoles',
            data: {
                roles: [],
                inforoles: []
            },
            created: function () {
                this.getData();
            },
            methods: {
                getData() {
                    axios.get(realApiPath)
                        .then(res => {
                            this.roles = res.data;
                        });
                },
                createData() {
                    axios.post(realApiPath, {
                        'role': $('#name').val()
                    })
                        .then(res => {
                            // TODO:: make to toastr changes
                            if (res.data === 'ok') {
                                console.log(res.data);
                            } else {
                                console.log(res.data);
                            }
                            this.getData();
                            $('#createRoleModal').modal('hide');
                        });
                },
                updatedData: function () {
                    id_value = "/" + this.inforoles.id;
                    let newRealApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';
                    axios.post(newRealApiPath, this.inforoles).then(res => {
                        // TODO:: make to toastr changes

                        if (res.data === 'ok') {
                            console.log(res.data);
                        } else {
                            console.log(res.data);
                        }
                    });
                    id_value = "";
                    this.inforoles = [];
                    $('#updateRoleModal').modal('hide');
                },
                deleteRole: function () {
                    id_value = "/" + this.inforoles.id;
                    let newRealApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';
                    axios.delete(newRealApiPath).then(res => {
                        // TODO:: make to toastr changes
                        if (res.data === 'ok') {
                            console.log(res.data);
                        } else {
                            console.log(res.data);
                        }

                        $('#deleteModalRole').modal('hide');
                        this.getData();
                    });
                    this.inforoles = [];
                    id_value = "";
                },
                editData: function (e) {
                    this.inforoles = e;
                    $('#updateRoleModal').modal('show');
                },
                deleteData: function (e) {
                    this.inforoles = e;
                    $('#deleteModalRole').modal('show');
                }
            }
        });
    </script>
@endsection