@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('contact.index')}}">Contact</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Edit</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit user</h6>
            </div>
            <div class="card-body pt-0 pb-2 ">
              <form method="POST" action="{{ route('contact.update', $contact->id) }}">
                @csrf @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $contact->name }}" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" id="exampleFormControlInput1" placeholder="Phone">
                </div>
                <button type="submit" class="btn bg-gradient-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                 
              </div>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
  </main>
  
@endsection