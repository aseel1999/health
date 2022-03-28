@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                        <div class="card-header">
                            Filter by Doctor-id: &nbsp;
                            <div class="row">
                                <div class="col-md-10 col-sm-6">
                                    <input type="text" class="form-control datetimepicker-input" id="doctotid"
                                         name="doctorid"
                                        placeholder=@isset($doctorId) {{ $doctorId }} @endisset>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>

                        </div>
                    

                    <div class="card-body table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID-Doctor</th>
                                    <th scope="col">ID-User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $key=>$doctor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->user_id }}</td>
                                    </tr>
                                    @empty
                                    <td>There is notable on</td>
                                @endforelse

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
