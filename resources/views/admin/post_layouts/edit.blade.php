@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="text-uppercase">Update </h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active"> Posts/update/{{ $post->id }}</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Update {{ $post->title }} from posts</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data" class="from">
                        @csrf
                        @method('PUT')
                          <label for="id">
                            ID :
                          </label>
                          <input  class="form-control" type="text" name="id" id="id" value="{{ $post->id }}" readonly>
                        
                          <label for="id_u">
                            ID_U :
                           </label>
                            <input class="form-control" type="text" name="id_u" id="id_u" value="{{ $post->id_u }}" readonly>
                            

                            <label for="name">
                              Name :
                          </label>
                          <input class="form-control" type="text" name="name" id="name" value="{{ $post->name }}" >
                          
                          <label for="category">
                              Category :
                          </label>
                          <input class="form-control" type="text" name="category" id="category" value="{{ $post->category->name }}" readonly>
                          
                          <label for="title">
                            Title :
                          </label>
                          <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
                          
                          <label for="content">
                            Content :
                          </label>
                          <input class="form-control" type="text" name="content" id="content" value="{{ $post->content }}">
                          
                          <div class="d-flex flex-column">
                          <label for="image">
                            Image :
                          </label>
                          <img src="{{  asset('assets/images/img_database').'/'. $post->image_path }}" alt="" class="img-thumbnail">
                          <input type="file" name="image" id="image" value="">
                          </div>
                        <button class="btn btn-primary mt-4 float-right" name="submit" type="submit"> Update </button>
                        <button class="btn btn-danger mt-4 mr-4 float-right"> back </button>
                      </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection