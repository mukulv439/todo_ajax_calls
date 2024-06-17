@extends('layouts.sidebar')
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
                            <h6 class="m-0 font-weight-bold text-primary">Research Static Page</h6>

                        </div>
                        <div class="col-3">
                            @include('sweetalert::alert')
                            <div class="d-flex justify-content-center">

                                @if (!empty($results[0]))
                                    <div style="margin-right: 7px;margin-left: 7px">
                                        <a href="{{ url('/cms/res_static_edit/' . $results[0]->id) }}"
                                            class="btn btn-primary ">Edit
                                            Research</a>
                                    </div>
                                    <div>

                                    </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @forelse($results as $each)
                                            <div class="form-group form-default">
                                                <div class="form-group">
                                                    <label for="Topbannerheading" class="col-form-label">Research Articles
                                                        Heading</label></br>

                                                    <label>{{ $each->res_article_heading }}</label>

                                                </div>
                                                <div class="form-group">
                                                    <label for="Topbannersubheading" class="col-form-label">Research Articles Content</label>
                                                    </br>
                                                    <label>{{ $each->res_article_desc }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="section1_heading" class="col-form-label">Research Articles SubHeading 1
                                                    </label>
                                                    </br>
                                                    <label>{{ $each->res_article_subheading_1 }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="section1_content" class="col-form-label">Research Articles Para 1
                                                    </label>
                                                    </br>
                                                    <label>{{ $each->res_article_subdesc_1 }}</label>
                                                </div>


                                            </div>

                                        @empty
                                            <div class="d-flex justify-content-center">
                                                <h6>No Resource Page Content Available</h6>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
