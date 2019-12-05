@extends('home')
@section('body')
    <div class="row mt-4" id="bodyRoles">
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
                <tr>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('options') }}</th>
                </tr>
                <tr v-for="r in roles.data">
                    <td>@{{ r.role }}</td>
                    <td></td>
                </tr>
            </table>
            <div class="alert-warning" v-else>{{ __('no data available') }}</div>
        </div>
    </div>

    @component('role.create')@endcomponent
@endsection

@section('scripts')
    <script>
        let http = window.location;
        let realApiPath = http.origin + "/api" + http.pathname + "?api_token=" + '{{ $user->api_token }}';
        let vue = new Vue({
            el: '#bodyRoles',
            data: {
                roles: []
            },
            created: function(){
                this.getData();
            },
            methods:{
                getData(){
                    axios.get(realApiPath)
                        .then(res => {
                            this.roles = res.data;
                        });

                    console.log(this.roles.data);
                },
                createData() {
                    
                }
            }
        });
    </script>
@endsection