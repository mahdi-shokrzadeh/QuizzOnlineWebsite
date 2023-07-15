<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $profile_inf['name'] }} | quizzonline</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/proflie.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header-footer.css">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
     integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
     
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>

    <!-- chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
    integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"
    integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" />


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white py-0 mb-4">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="../images/logo50.png" alt="" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="نمایش فهرست"  >
                <Span class="navbar-toggler-icon"></Span>
            </button>
            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav right-side mr-auto " >
                    <li class="navbar-item active icon" >
                        <i class="fas fa-house-user"></i>
                        <a href="{{route('dashboard')}}" class="nav-link" href="index.html">خانه</a>
                    </li>
                    <li class="navbar-item icon ">
                        <i class="fas fa-trophy"></i>
                        <a href="{{route('categories')}}" class="nav-link" href="index.html">مسابقات</a>
                    </li>
                    <li class="navbar-item icon">
                        <i class="fas fa-medal"></i>
                        <a href="{{route('standings')}}" class="nav-link" href="index.html">نفرات برتر</a>
                    </li>

                    <li class="navbar-item ">
                        <a href="#" class="nav-link" href="index.html">ایجاد کوئیز</a>
                    </li>
                    
                    
                    <li class="navbar-item icon ">
                        <i class="fas fa-blog"></i>
                        <a href="#" class="nav-link" href="index.html">وبلاگ</a>
                    </li>

                </ul>

                <ul class="navbar-nav profile">
                    @if ($user!= null)
                        <li class="nav-item dropdown mr-3">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                                <i class="fas fa-user"></i>
                            </a>
                            
                            <div class="dropdown-menu text-center">

                                
                                <span>{{ $user['name'] }}</span>

                                <div class="dropdown-divider"></div>
                                
                                
                                <a href="{{route('profile' , ['url' => $user['url']  ] )}}" class="dropdown-item text-right icon text-center">
                                    <i class="fa fa-user-circle-o"></i> پروفایل عمومی
                                </a>
                                
                                <a href="#" class="dropdown-item text-right icon text-center">
                                    <i class="fa fa-cog"></i> تنظیمات
                                </a>

                                <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <input type="submit" value="خروج" class="dropdown-item text-right icon text-center" >
                                </form>

                            </div>

                        </li>
                    @else 
                    <ul class="navbar-nav buttons">
                    
                    <li class="nav-item mr-2 text-center">
                        <a href="{{route('register')}}" class="btn btn-outline-success m-1">عضویت</a>                       
                        <a href="{{route('login')}}" class="btn btn-outline-info m-1">ورود</a>
                    </li>
 
                    </ul>
                    @endif

                </ul>
            
            </div>
        </div>
    </nav>

    <div class="profile ">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center mt-0 mb-auto" >
                    <div class="card text-center" style="width: 18rem;">
                        <img class="card-img-top rounded" src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=300&d=retro&r=g"
                        alt="Card image cap">
                        <div class="card-body py-2">
                            <h5 class="card-title">{{ $profile_inf['name'] }}</h5>
                            <span class="card-text text-muted">عضویت در 8 فروردین 1400</span>
                        </div>
                        <span class="badge badge-info mx-auto p-2 mb-2">رتبه : {{ $profile_inf['rating'] }}</span>
                        <span class="badge badge-danger mx-auto p-2">امتیاز : {{ $profile_inf['score'] }}</span>
                        <div class="card-footer py-2 mt-2">
                            <small class="text-muted"><i class="fa fa-coffee mr-1"></i>در 0 مسابقه شرکت کرده.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 align-self-center text-center">
                    <div class="chart-container mt-4">
                        <canvas id="chart-1" ></canvas>
                    </div>
                    <span>امتیازات</span>

                    <table class="table table-striped mt-4 table-bordered">
                        <thead class="thead-dark">
                          <tr>
                            <th></th>
                            <th>موضوع</th>
                            <th>درصد پاسخگویی</th>

                          </tr>
                        </thead>
                        <tbody>
                            @php 
                                $count = 0 ;
                            @endphp

                            @foreach($profile_inf['statistic'] as $s)

                                @php 
                                    $count += 1 ;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$s[0]}}</td>
                                    <td>{{$s[1]}}</td>
                                    
                                </tr>
                            @endforeach
                            
                          
                          
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
        
    </div>

    <footer class="bg-light text-center text-black mt-4">
        <div class="container p-4">
        <section class="mb-4">
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-telegram"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
            ></a>

            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
            ></a>

        </section>
    
        <section class="mt-2">
            <form action="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                <p class="pt-2">
                    <strong>عضویت در خبرنامه</strong>
                </p>
                </div>
    
                <div class="col-md-5 col-12">
                <!-- Email input -->
                <div class="form-outline form-white mb-4">
                    <input type="email" class="form-control" placeholder="آدرس ایمیل" />
                </div>
                </div>
                <!--Grid column-->
    
                <!--Grid column-->
                <div class="col-auto">
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-dark mb-4">
                    عضویت
                </button>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
    
        <!-- Section: Text -->
        <section class="mb-4">
            <p class="text-justify text-center">
                سرگرمی به همراه یادگیری !
            </p>
        </section>

            <section class="">
                <!--Grid row-->
                <div class="row">
                <!--Grid column-->
                <div class="col-md-4  mb-4 mb-md-0">
                    <h5>دسترسی سریع</h5>
        
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{route('dashboard')}}" class="text-black">خانه</a>
                        </li>
                        <li>
                            <a href="{{route('categories')}}" class="text-black">مسابقات</a>
                        </li>
                        <li>
                            <a href="{{route('standings')}}" class="text-black">نفرات برتر</a>
                        </li>
                        <li>
                            <a href="" class="text-black disabled">ساخت کوئیز</a>
                        </li>
                        <li>
                            <a href="" class="text-black disabled">وبلاگ</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
        
        
                <!--Grid column-->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>همراه شوید</h5>
        
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="" class="text-black">درباره ما</a>
                    </li>
                    <li>
                        <a href="" class="text-black">ارتباط با ما</a>
                    </li>
                    <li>
                        <a href="" class="text-black">سوالات رایج</a>
                    </li>
                        <a href="" class="text-black">همکاری در تولید محتوا</a>
                    </ul>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>دسته بندی</h5>
        
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{route('categories')}}" class="text-black">بازی انفرادی</a>
                    </li>
                    <li>
                        <a href="{{route('categories')}}" class="text-black">بازی با رقیب شانسی</a>
                    </li>
                    <li>
                        <a href="" class="text-black disabled">بازی گروهی</a>
                    </li>
                    
                    </ul>
                </div>
                
                </div>
            </section>
        </div>
  
    <!-- Copyright -->
        <div class="text-center p-3"  style="font-size: 14px;">
         All rights reserved 1399 -1400 © 
        </div>
    </footer>

    <script>
        var speedCanvas = document.getElementById("chart-1").getContext('2d');

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var speedData = {
        labels: ["jan", "feb", "march", "april", "june", "july", "aguest"],
        datasets: [{
            label: "امتیاز کسب شده",
            data: [0, 59, 75, 20, 20, 55, 40],
            lineTension: 0.3,
            fill: true,
            borderColor: 'rgb(15, 219, 182)' ,
            backgroundColor: 'transparent',
            pointBorderColor: 'red',
            pointBackgroundColor: 'rgba(255,150,0,0.5)',
            pointRadius: 4,
            pointHoverRadius: 5,
            pointHitRadius: 30,
            pointBorderWidth: 2,
            pointStyle: 'rectRounded'
        }]
        };

        var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'black'
            }
        }
        };

        var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                }
                }
            }
        }
        });
    </script>

</body>



</html>