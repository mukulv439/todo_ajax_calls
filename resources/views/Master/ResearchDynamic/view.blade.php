@extends('layouts.Sidebar')
@section('content')

    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class=" row px-3 pt-3">
                        <div class="col-9">
                            <h6 class="m-0 font-weight-bold text-primary">ResearchDynamic Page</h6>

                        </div>
                        <div class="col-3">
                            @include('sweetalert::alert')
                            <div class="d-flex justify-content-center">
                                <div>
                                    <a href="{{ url('/cms/addblog') }}" class="btn btn-danger">Add
                                        Content</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th> Sno </th>
                                                        <th> Heading </th>
                                                        <th>Status</th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($data))
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($data as $result)
                                                            <tr>
                                                                <td>{{ $i }}</td>

                                                                <td>{{ $result->heading }}</td>
                                                                {{--  <td>{{ $result->sub_heading }}</td>  --}}


                                                                <td>
                                                                    <input data-id="{{ $result->id }}"
                                                                        class="toggle-class  custom-control custom-switch"
                                                                        type="checkbox" data-onstyle="success"
                                                                        data-offstyle="danger" data-toggle="toggle"
                                                                        data-on="Enabled" data-off="Disabled" name="Status"
                                                                        verified_id="{{ $result->id }}"
                                                                        {{ $result->status ? 'checked' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content">
                                                                        <div style="margin-right: 7px">
                                                                            <a href="{{ url('/blog/' . $result->slug) }}"
                                                                                target="_blank"
                                                                                class="btn btn-secondary ">Preview</a>
                                                                        </div>
                                                                        <div style="margin-right: 7px">
                                                                            <a href="{{ url('/cms/editblog/' . $result->id) }}"
                                                                                class="btn btn-primary ">Edit</a>
                                                                        </div>
                                                                        <div>
                                                                            <form method="POST"
                                                                                action="{{ url('/cms/deleteblog/' . $result->id) }}">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="btn btn-xs btn-danger btn-flat show_confirm"
                                                                                    data-toggle="tooltip"
                                                                                    title='Delete'>Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <div class="d-flex justify-content-center">
                                                            <h6>No Content Available</h6>
                                                        </div>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        {{--  <script>
            $(document).ready(function(e) {
                $('.toggle-class').change(function(e) {
                    var read_data = $(this).is(":checked");
                    const verified_id = $(this).attr('verified_id');
                    $.ajax({
                        url: "{{ url('/cms/blogchangestatus') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'verified_id': verified_id,
                            'read_data': read_data
                        },
                        dataType: 'json',
                        beforeSend: function() {},
                        complete: function() {},
                        success: function(json) {
                            if (json['success'] == true) {}
                            if (json['success'] == false) {
                                if (json['errors']['warning']) {
                                    alert(json['errors']['warning']);
                                }
                            }
                        },
                        error: function(data) {
                            var errors = data.responseJSON;
                        }
                    });
                });
            });
        </script>  --}}


    @endsection
