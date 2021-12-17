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
                    <li class="breadcrumb-item active"> Posts/Create</li>
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
                      <h3 class="card-title">Create from posts</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="/admin/posts" method="post" enctype="multipart/form-data" class="from" >
                        @csrf

                          <label for="id_u">
                            ID_U :
                           </label>
                            <input class="form-control" type="text" name="id_u" id="id_u" value="{{ Auth::user()->id }}" readonly>
                          
                            <label for="title">
                                Name :
                              </label>
                              <input class="form-control" type="text" name="name" id="name" value="">

                            <label for="title">
                                Category :
                            </label>
                            @if (!$categoies)
                              <a href="{{ route('category.create') }}" style="display:block; padding-bottom: 4px;"> Please create a new category</a>
                            @else
                            <select id="category" name="category" class="form-control">
                              @forelse ($categoies as $category)
                              <option value="{{ $category->id }}"> {{ $category->name }} </option>
                              @empty
                              <option> No category was found </option>
                              @endforelse
                            </select>
                            @endif
                           
                            
                              

                          <label for="title">
                            Title :
                          </label>
                          <input class="form-control" type="text" name="title" id="title" value="">
                          
                          <label for="content">
                            Content :
                          </label>
                          <input class="form-control" type="text" name="content" id="content" value="">
                          
                          <div class="d-flex flex-column">
                          <label for="image">
                            Image :
                          </label>
                          <input type="file" name="image" id="image" value="">
                          </div>
                        <button class="btn btn-primary mt-4 float-right" name="submit" type="submit"> Create </button>
                        <button class="btn btn-danger mt-4 mr-4 float-right"> back </button>
                      </form>

                      @if ($errors->any())
                        <div class="w-4/8 m-auto text-center">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 list-none">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </div>                
                        @endif
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