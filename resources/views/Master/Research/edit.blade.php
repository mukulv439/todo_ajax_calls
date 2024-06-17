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
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Research Static Page</h6>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-material" method="POST"
                                            action="{{ url('/cms/res_static_update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class='form-group form-default'>



                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles
                                                        Heading</label>
                                                    <input name="res_article_heading"
                                                        value="{{ $data->res_article_heading }}" class="form-control">
                                                    @error('res_article_heading')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label"> Research Articles Content</label>
                                                    <input name="res_article_desc" value="{{ $data->res_article_desc }}"
                                                        class="form-control">
                                                    @error('res_article_desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label"> Research Articles SubHeading 1 </label>
                                                    <input name="res_article_subheading_1"
                                                        value="{{ $data->res_article_subheading_1 }}" class="form-control">
                                                    @error('res_article_subheading_1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label"> Research Articles Para 1 </label>
                                                    <input name="res_article_subdesc_1"
                                                        value="{{ $data->res_article_subdesc_1 }}" class="form-control">
                                                    @error('res_article_subdesc_1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles SubHeading 2</label>
                                                    <input name="res_article_subheading_2"
                                                        value="{{ $data->res_article_subheading_2 }}" class="form-control">
                                                    @error('res_article_subheading_2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles Para 2</label>
                                                    <input name="res_article_subdesc_2"
                                                        value="{{ $data->res_article_subdesc_2 }}" class="form-control">
                                                    @error('res_article_subdesc_2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles SubHeading 3</label>
                                                    <input name="res_article_subheading_3"
                                                        value="{{ $data->res_article_subheading_3 }}" class="form-control">
                                                    @error('res_article_subheading_3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles Para 3</label>
                                                    <input name="res_article_subdesc_3"
                                                        value="{{ $data->res_article_subdesc_3 }}" class="form-control">
                                                    @error('res_article_subdesc_3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>


                                                <div class="d-flex justify-content-centre">
                                                    <div class="col-11 align-items-centre">
                                                        <a href="{{ url('/cms/res_static') }}"
                                                            class="btn btn-danger">Back</a>
                                                    </div>
                                                    <div class="align-items-centre col-1">
                                                        <button type="submit" class="btn btn-primary"
                                                            value="submit">submit</button>

                                                    </div>



                                                </div>
                                        </form>
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
