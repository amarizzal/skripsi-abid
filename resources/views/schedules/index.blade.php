@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tables</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
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
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Scehdule</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($schedules->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                  <p class="text-sm text-secondary">No schedules available for today.</p>
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
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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