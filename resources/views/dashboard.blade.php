
@extends('layouts.layout')


@section('content')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Hari ini</p>
                    <h5 class="font-weight-bolder text-lg">
                      {{ $schedules->count() }}
                    </h5>
                    <p class="mb-0">
                      {{-- <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday --}}
                      Agenda
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Satu bulan kedepan</p>
                    <h5 class="font-weight-bolder">
                      {{ $schedulesNextMonth->count() }}
                    </h5>
                    <p class="mb-0">
                      {{-- <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week --}}
                      Agenda
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      
      <div class="row mt-4">
        {{-- HARI INI --}}
        <div class="col-lg-5 mb-lg-0 mb-4 d-flex flex-column">
          <div class="card flex-grow-1 d-flex flex-column">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Hari ini</h6>
              </div>
            </div>
            <div class="table-responsive flex-grow-1">
              @if ($schedules->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                  <p class="text-sm text-secondary">Belum ada agenda untuk hari ini.</p>
                </div>
              @else
                <table class="table align-items-center ">
                  <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                      <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Time:</p>
                          <h6 class="text-sm mb-0 text-danger">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</h6>
                        </div>
                      </td>
                      <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Agenda:</p>
                            <h6 class="text-sm mb-0 text-primary">{{ $schedule->content }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Place:</p>
                          <h6 class="text-sm mb-0">{{ $schedule->place }}</h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <p class="text-xs font-weight-bold mb-0">Audience:</p>
                          <h6 class="text-sm mb-0">{{ $schedule->audience }}</h6>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
            </div>
          </div>
        </div>
        {{-- GRAFIK --}}
        <div class="col-lg-7 mb-lg-0 mb-4 d-flex flex-column">
          <div class="card z-index-2 h-100 flex-grow-1 d-flex flex-column">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Grafik Agenda 1 Bulan terakhir</h6>
              {{-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> --}}
            </div>
            <div class="card-body p-3 flex-grow-1 d-flex flex-column">
              <div class="chart flex-grow-1">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- AGENDA BULAN DEPAN --}}
      <div class="row mt-4">
        <div class="col-12 mb-lg-0 mb-4 d-flex flex-column">
          <div class="card flex-grow-1 d-flex flex-column">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Satu bulan kedepan</h6>
              </div>
            </div>
            <div class="table-responsive flex-grow-1">
              @if ($schedulesNextMonth->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                  <p class="text-sm text-secondary">Belum ada agenda untuk satu bulan kedepan.</p>
                </div>
              @else
                <table class="table align-items-center ">
                  <tbody>
                    <tr>
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Waktu:</p>
                          </div>
                      </td>
                      <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Agenda:</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Tempat:</p>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <p class="text-xs font-weight-bold mb-0">Audiens:</p>
                        </div>
                      </td>
                    </tr>
                    @foreach ($schedulesNextMonth as $schedule)
                    <tr>
                      <td>
                          <div class="text-center">
                            <h6 class="text-sm text-danger mb-0">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}  {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</h6>
                            <h6 class="text-sm text-danger mb-0"></h6>
                          </div>
                      </td>
                      <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <h6 class="text-sm mb-0 text-primary">{{ $schedule->content }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $schedule->place }}</h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <h6 class="text-sm mb-0">{{ $schedule->audience }}</h6>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
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
                </script>,
                made with <i class="fa fa-heart"></i> 
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
    </div>
  </main>

@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $('document').ready(function() {
      // hit alert
      @if(session('welcome'))
      @if($schedulesTomorrow->count() > 0)
      Swal.fire({
        title: "<strong>Agenda Besok</strong>",
        icon: "info",
        html: `
          <table class="table align-items-center ">
            <tbody>
              @foreach ($schedulesTomorrow as $schedule)
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Agenda:</p>
                      <h6 class="text-sm mb-0 text-primary">{{ $schedule->content }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Time:</p>
                    <h6 class="text-sm mb-0 text-danger">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Place:</p>
                    <h6 class="text-sm mb-0">{{ $schedule->place }}</h6>
                  </div>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        `,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: `
          <i class="ni ni-check-bold"></i> OK!
        `,
        confirmButtonAriaLabel: "Thumbs up, great!",
      });
      @endif
      @endif

      var ctx1 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
      gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

      const chartData = @json($chartData);
      new Chart(ctx1, {
        type: "line",
        data: {
          labels: chartData.map(data => data.x),
          datasets: [{
            label: "Jumlah Agenda",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: chartData.map(data => data.y),
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#fbfbfb',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              },
              title: {
                display: true,
                text: 'Jumlah Agenda',
                color: '#ccc', // atau ganti sesuai tema
                font: {
                  size: 13,
                  family: "Open Sans",
                  style: 'bold'
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#ccc',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    });
  </script>
@endsection
