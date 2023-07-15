<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>رتبه بندی سایت</title>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header-footer.css">

    <link rel="stylesheet" href="css/standings.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
     integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-0 mb-3">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="images/logo50.png" alt="" id="logo">
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
                
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-user"></i>
                    </a>

                    <div class="dropdown-menu text-center">
                        <span>mahdi shokrzadeh</span>

                        <div class="dropdown-divider"></div>
                        
                        
                        <a href="profile.html" class="dropdown-item text-right icon text-center">
                            <i class="fa fa-user-circle-o"></i> پروفایل عمومی
                        </a>
                        
                        <a href="#" class="dropdown-item text-right icon text-center">
                            <i class="fa fa-cog"></i> تنظیمات
                        </a>

                        <a href="#" class="dropdown-item text-right icon text-center">
                            <i class="fa fa-sign-out-alt"></i> خروج
                        </a>

                    </div>

                </li>

            </ul>
        
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        
        <div class="col-md-9">

            <div>
                <div class="text-center border-bottom mt-3">
                    <h5>رتبه بندی</h5>
                </div>

                <table class="table table-striped mt-4 table-bordered table-custom text-center mb-3 ">
                    <thead class="thead-white">

                    <tr>
                        <th>رتبه</th>
                        <th>نام</th>
                        <th>امتیاز</th>

                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $counter = 0;
                    @endphp

                    @foreach($users as $user) 
                        @php
                            $counter+= 1 ;
                        @endphp
                        <tr>
                            <td>{{$counter}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->score}}</td>
                            
                        </tr>
                    @endforeach
                    
                    
                    </tbody>
                </table>

            </div>
            

        </div>

        <div class="col-md-3 mt-3">
            <div class="text-center border-bottom">
                <h5>برترین ها<i class="fa fa-star ml-2"></i></h5>
            </div>

            <table class="table table-striped mt-4 table-bordered table-custom text-center">
                <thead class="thead-white">
                  <tr>
                    <th>رتبه</th>
                    <th>نام</th>
                    <th>امتیاز</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                  @php
                        $counter = 0;
                    @endphp

                    @foreach($users as $user) 
                        @php
                            $counter+= 1 ;
                        @endphp
                        <tr>
                            <td>{{$counter}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->score}}</td>
                            
                        </tr>
                    @endforeach

                  <tr>
                    <td>
                        
                    </td>
                    <td>
                        <a href="{{route('standings')}}"><i class="fa fa-trophy mr-2"></i>رتبه بندی کامل</a>
                    </td>
                    <td>
                        
                    </td>
                  </tr>
                  
                </tbody>
            </table>



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
    
</body>
</html>