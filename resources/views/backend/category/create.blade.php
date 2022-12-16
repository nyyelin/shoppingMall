@extends('backendTemplate')
@section('content')
  <div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </nav>
    <a class="btn btn-primary" href="{{route('main-category.create')}}">New Category</a>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="cols-10 mx-auto">
        <div class="card recent-sales overflow-auto">

          

          <div class="card-body">
            <h5 class="card-title">New Category <span></span></h5>

            <form class="" action="{{ route('main-category.store') }}" method="POST">
              @csrf
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Dress">
                  <label for="name">New Category Name</label>
                </div>
                <div>
                    <input type="submit" class="btn btn-success" name="submit">
                </div>
            </form>
            

          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
