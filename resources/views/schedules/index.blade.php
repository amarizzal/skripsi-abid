@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Schedule</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Schedule</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">
      {{-- SCHEDULE --}}
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-2">
              <div class="row justify-content-center align-items-center">
                <div class="col-6">
                  <h6>Schedules table</h6>
                  
                </div>
                <div class="col-6 text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp" class="btn btn-success mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Scehdule</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($schedules->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                    <p class="text-sm text-secondary">No schedules for today or upcoming days.</p>
                </div>
              @else
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Event</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Place & Dresscode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Disposition</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Access Level</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Audience</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($schedules as $schedule)
                      <tr>
                        <td class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</span>
                            <p class="text-xs text-secondary mb-0">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</p>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm text-primary">{{ $schedule->content }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $schedule->place }}</h6>
                              <p class="text-xs text-secondary mb-0">{{ $schedule->dresscode }}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $schedule->disposition }}</p>
                          {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{ $schedule->access_level }}</span>
                        </td>
                        
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{ $schedule->audience }}</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>

                          <!-- Link-style delete using a tag -->
                          <a href="#" class="text-danger ms-3 font-weight-bold text-xs"
                              onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this schedule?')) { document.getElementById('delete-form{{$schedule->id}}').submit(); }">
                              Delete
                          </a>

                          <form id="delete-form{{$schedule->id}}" action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      {{-- FOOTER --}}
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with  <i class="fa fa-heart"></i>
                 
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

      {{-- MODAL ADD --}}
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-primary text-gradient">Add new schedule</h5>
                    <p class="mb-0">Enter schedule's description</p>
                </div>
                <div class="card-body pb-3">
                  <form action="{{ route('schedules.store') }}" method="POST" role="form text-left" enctype="multipart/form-data">
                    @csrf

                    <label>Date</label>
                    <div class="input-group mb-3">
                      <input name="date" class="form-control" type="datetime-local" value="2018-11-23" id="example-date-input">
                    </div>
                    
                    <label>Event</label>
                    <div class="input-group mb-3">
                      <input name="content" type="text" class="form-control" placeholder="event" aria-label="Name" aria-describedby="name-addon">
                    </div>

                    <label>Place</label>
                    <div class="input-group mb-3">
                      <input name="place" type="text" class="form-control" placeholder="Place" aria-label="Place" aria-describedby="email-addon">
                    </div>

                    <label>Dresscode</label>
                    <div class="input-group mb-3">
                      <input name="dresscode" type="text" class="form-control" placeholder="Dresscode" aria-label="Dresscode" aria-describedby="email-addon">
                    </div>

                    <label>Disposition</label>
                    <div class="input-group mb-3">
                        <select name="disposition" id="role" class="form-control" required>
                          <option value="" selected disabled>Select disposition</option>
                          <option value="AGENDAKAN">Agendakan</option>
                          <option value="DIWAKILI">Diwakili</option>
                        </select>
                    </div>

                    <label>Access Level</label>
                    <div class="input-group mb-3">
                        <select name="access_level" id="role" class="form-control" required>
                          <option value="" selected disabled>Select disposition</option>
                          <option value="PUBLIK">Publik</option>
                          <option value="RAHASIA">Rahasia</option>
                        </select>
                    </div>

                    <label>Audience</label>
                    <div class="input-group mb-3">
                        <select name="audience" id="role" class="form-control" required>
                          <option value="" selected disabled>Select disposition</option>
                          <option value="INTERNAL">Internal</option>
                          <option value="EKSTERNAL">Eksternal</option>
                        </select>
                    </div>

                    <label>File</label>
                    <div class="input-group mb-3">
                      <input name="file" class="form-control" type="file">
                    </div>
                    
                    {{-- <div class="form-check form-check-info text-left">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascrpt:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div> --}}
                    <div class="text-center mb-3">
                      <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Add</button>
                    </div>
                  </form>
                </div>
                {{-- <div class="card-footer text-center pt-0 px-sm-4 px-1">
                  <p class="mb-4 mx-auto">
                    Already have an account?
                    <a href="javascrpt:;" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  
@endsection