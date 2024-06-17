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
                        <h6 class="m-0 font-weight-bold text-primary">Home Page</h6>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-material" method="POST" action="{{ url('/cms/home_update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class='form-group form-default'>
                                                <div class="form-group ">
                                                    <label class="float-label"> Banner Text</label>
                                                    <input name="banner_text" class="form-control"
                                                        value="{{ $data->banner_text }}">
                                                    @error('banner_text')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>


                                                <div class="form-group ">
                                                    <label class="float-label">Research Articles
                                                        Heading</label>
                                                    <input name="res_article" value="{{ $data->res_article }}"
                                                        class="form-control">
                                                    @error('res_article')
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
                                                    <label class="float-label">Policy Briefs Heading </label>
                                                    <input name="pol_brief" value="{{ $data->pol_brief }}"
                                                        class="form-control">
                                                    @error('pol_brief')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label"> Policy Briefs Content </label>
                                                    <input name="pol_brief_desc" value="{{ $data->pol_brief_desc }}"
                                                        class="form-control">
                                                    @error('pol_brief_desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label">Easy Reads Heading</label>
                                                    <input name="easy_reads" value="{{ $data->easy_reads }}"
                                                        class="form-control">
                                                    @error('easy_reads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group ">
                                                    <label class="float-label">Easy Reads Content</label>
                                                    <input name="easy_reads_desc" value="{{ $data->easy_reads_desc }}"
                                                        class="form-control">
                                                    @error('easy_reads_desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Video Gallery Heading</label>
                                                    <input name="vid_gall" value="{{ $data->vid_gall }}"
                                                        class="form-control">
                                                    @error('vid_gall')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Video Gallery Content</label>
                                                    <input name="vid_gall_desc" value="{{ $data->vid_gall_desc }}"
                                                        class="form-control">
                                                    @error('vid_gall_desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Action Reaserch Heading</label>
                                                    <input name="action_reserch_head"
                                                        value="{{ $data->action_reserch_head }}" class="form-control">
                                                    @error('action_reserch_head')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Action Reaserch Text</label>
                                                    <input name="action_reserch_text"
                                                        value="{{ $data->action_reserch_text }}" class="form-control">
                                                    @error('action_reserch_text')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group">
                                                    <label for="action_image" class="col-form-label">
                                                        Acion Image
                                                    </label>
                                                    </br>
                                                    <img src="{{ asset('images/Webimages/' . $data->action_image) }}"
                                                        alt="img" class="img-fluid img-thumbnail col-1" />
                                                    <input type="hidden" value="{{ $data->action_image }}"
                                                        name="old_action_image" />
                                                    <input
                                                        class="@error('new_action_image') is-invalid @enderror form-control"
                                                        type="file" name="new_action_image" id="new_action_image" />
                                                    @error('new_action_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="action_image_2" class="col-form-label">
                                                        Acion Image 2
                                                    </label>
                                                    </br>
                                                    <img src="{{ asset('images/Webimages/' . $data->action_image_2) }}"
                                                        alt="img" class="img-fluid img-thumbnail col-1" />
                                                    <input type="hidden" value="{{ $data->action_image_2 }}"
                                                        name="old_action_image_2" />
                                                    <input
                                                        class="@error('new_action_image_2') is-invalid @enderror form-control"
                                                        type="file" name="new_action_image_2" id="new_action_image_2" />
                                                    @error('new_action_image_2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Action Reaserch Heading</label>
                                                    <input name="action_desc_head" value="{{ $data->action_desc_head }}"
                                                        class="form-control">
                                                    @error('action_desc_head')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group ">
                                                    <label class="float-label">Action Reaserch Para</label>
                                                    <input name="action_desc_para" value="{{ $data->action_desc_para }}"
                                                        class="form-control">
                                                    @error('action_desc_para')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group">
                                                    <label class="float-label">Action Reaserch Link</label>
                                                    <input name="action_desc_link" value="{{ $data->action_desc_link }}"
                                                        class="form-control">
                                                    @error('action_desc_link')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="d-flex justify-content-centre">
                                                    <div class="col-11 align-items-centre">
                                                        <a href="{{ url('/cms') }}" class="btn btn-danger">Back</a>
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
