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
                    <li class="breadcrumb-item active"> Category/Create</li>
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
                      <h3 class="card-title">Create from Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="/admin/category" method="post"  class="from">
                        @csrf     
                            <label for="title">
                                Name :
                              </label>
                              <input class="form-control" type="text" name="name" id="name" value="">

                        <button class="btn btn-primary mt-4 float-right" name="submit" type="submit"> Create </button>
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