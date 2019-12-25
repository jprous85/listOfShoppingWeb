@extends('home')
@section('body')
    <div class="row mt-4" id="bodyUsers" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-md-12">
            <div class="float-right">
                <a href=""
                   class="btn btn-outline-primary"
                   data-toggle="modal"
                   data-target="#createUserModal">
                    {{ __('create new user') }}
                </a>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <table class="table" v-if="users.length != 0">
                <thead class="thead-light">
                <tr>
                    <th class="users-td-1">{{ __('user') }}</th>
                    <th class="users-td-2">{{ __('options') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="r in users.data">
                    <td class="users-td-1">@{{ r.name }}</td>
                    <td class="users-td-2">
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
    </div>

@endsection

@section('scripts')
    <script>
        let http = window.location;
        let id_value = "";
        let realApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';

        console.log(realApiPath);

        let vue = new Vue({
            el: '#bodyUsers',
            data: {
                users: [],
                infousers: []
            },
            created: function () {
                this.getData();
            },
            methods: {
                getData() {
                    axios.get(realApiPath)
                        .then(res => {
                            this.users = res.data;
                        });
                },
                createData() {
                    axios.post(realApiPath, {
                        'user': $('#name').val()
                    })
                        .then(res => {
                            // TODO:: make to toastr changes
                            if (res.data === 'ok') {
                                console.log(res.data);
                            } else {
                                console.log(res.data);
                            }
                            this.getData();
                            $('#createUserModal').modal('hide');
                        });
                },
                updatedData: function () {
                    id_value = "/" + this.infousers.id;
                    let newRealApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';
                    axios.post(newRealApiPath, this.infousers).then(res => {
                        // TODO:: make to toastr changes

                        if (res.data === 'ok') {
                            console.log(res.data);
                        } else {
                            console.log(res.data);
                        }
                    });
                    id_value = "";
                    this.infousers = [];
                    $('#updateRoleModal').modal('hide');
                },
                deleteRole: function () {
                    id_value = "/" + this.infousers.id;
                    let newRealApiPath = http.origin + "/api" + http.pathname + id_value + "?api_token=" + '{{ $user->api_token }}';
                    axios.delete(newRealApiPath).then(res => {
                        // TODO:: make to toastr changes
                        if (res.data === 'ok') {
                            console.log(res.data);
                        } else {
                            console.log(res.data);
                        }

                        $('#deleteModalUser').modal('hide');
                        this.getData();
                    });
                    this.infousers = [];
                    id_value = "";
                },
                editData: function (e) {
                    this.infousers = e;
                    $('#updateUserModal').modal('show');
                },
                deleteData: function (e) {
                    this.infousers = e;
                    $('#deleteModalUser').modal('show');
                }
            }
        });
    </script>
@endsection