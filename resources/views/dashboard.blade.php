<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quizzonline</title>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/dashboard.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- noty -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js" 
    integrity="sha512-lOrm9FgT1LKOJRUXF3tp6QaMorJftUjowOWiDcG5GFZ/q7ukof19V0HKx/GWzXCdt9zYju3/KhBNdCLzK8b90Q==" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" 
    integrity="sha512-NXUhxhkDgZYOMjaIgd89zF2w51Mub53Ru3zCNp5LTlEzMbNNAjTjDbpURYGS5Mop2cU4b7re1nOIucsVlrx9fA==" 
    crossorigin="anonymous" />

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>



</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 mb-4">
        <div class="container">
            <a href="{{route('home')}}" class="navbar-brand">
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
                    
                    <li class="navbar-item icon disabled">
                        <i class="fas fa-blog"></i>
                        <a href="#" class="nav-link" href="index.html" >وبلاگ</a>
                    </li>

                </ul>

                <ul class="navbar-nav profile">
                    
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-user"></i>
                        </a>
                        
                        <div class="dropdown-menu text-center">

                            
                            <span class="user_name badge badge-light">{{ $user->name }}</span>

                            <div class="dropdown-divider"></div>
                            
                            
                            <a href="{{route('profile' , ['url' => $user->profile_url ] )}}" class="dropdown-item text-right icon text-center">
                                <i class="fa fa-user-circle-o"></i> پروفایل عمومی
                            </a>
                            
                            <a href="{{route('settings')}}" class="dropdown-item text-right icon text-center">
                                <i class="fa fa-cog"></i> تنظیمات
                            </a>

                            <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="خروج" class="dropdown-item text-right icon text-center" >
                            </form>

                        </div>

                    </li>

                </ul>
            
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row user-informations">
                    
                        <div class="col-4 text-center">
                            <span class="badge badge-info mx-auto p-2"><i class="fa fa-star mr-2"></i> امتیاز : {{$user->score}}</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="badge badge-dark mx-auto p-2"><i class="fa fa-coins mr-2"></i>سکه : {{$user->coin}}</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="badge badge-success mx-auto p-2">رتبه : {{$user->rating}}</span>
                        </div>
                    
                </div>


                <div class="container">
                    <div class="row games-in-progress" id="game-histories">
                    
                        <div class="col-12 text-center">
                            <h5><i class="fa fa-play mr-2" ></i>بازی های در حال انجام</h5>
                        </div>
    
                        <div class="card mt-2" style="width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <img src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=40&d=retro&r=g"  
                                    alt="..." class="rounded-circle">
                                </div>
                                <div class="col-7">
                                    <div class="card-body text-center">
                                    <p class="card-text"><span class="badge badge-danger ml-2 p-1">بازی با رقیب شانسی</span><span id="demo" class="badge badge-secondary ml-3 mr-3 timer"></span></p> 
                                    
                                                                        
                                    </div>
                                    
                                </div>
                                <div class="col-3 d-flex justify-content-center">
                                    <a href="{{route('double_mode' , ['id' => 1 ] )}}" class="btn btn-outline-success my-auto">ادامه</a>
                                </div>
                            </div>
                        </div>

                        @foreach($running_games as $r)
                            <div class="card mt-2" style="width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-2 d-flex align-items-center justify-content-center">
                                        <img src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=40&d=retro&r=g"  
                                        alt="..." class="rounded-circle">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body text-center">
                                        <p class="card-text">{{$user->name}}<span id="demo" class="badge badge-dark ml-3 p-1 ">بازی شماره {{$r['id']}}</span>
                                            <span class="badge badge-primary ml-4 p-1">بازی انفرادی</span>
                                        </p>              
                                        </div>
                                        
                                    </div>
                                    <div class="col-3 d-flex justify-content-center">
                                        <a href="{{route('solo_mode' , [ 'id' => $r['id'] ] )}}" class="btn btn-outline-success my-auto">ادامه</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    </div>
                </div>



                <div class="container">
                    <div class="row game-histories" id="game-histories">
                    
                        <div class="col-12 text-center">
                            <h5><i class="fa fa-history mr-2" ></i>تاریخچه بازی ها</h5>
                        </div>
                        
                        @foreach($game_history as $g)
                            <div class="card mt-2" style="width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-2 d-flex align-items-center justify-content-center">
                                        <img src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=40&d=retro&r=g"  
                                        alt="..." class="rounded-circle">
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body text-center">
                                        <p class="card-text">{{$user->name}} <span class="badge badge-warning ml-3 p-1" >بازی شماره  {{$g['id']}}</span></p> 
                                                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col-3 d-flex justify-content-center">
                                        <a href="{{route('solo_mode' , [ 'id' => $g['id'] ] )}}" class="btn btn-outline-primary my-auto">جزییات</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
       
                    
                    </div>
                </div>
                
                

            </div>

            <div class="col-lg-3 text-center side-bar mt-4">
                <div class="part-1">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('categories')}}" class="btn btn-outline-danger mt-3 mb-2">شروع بازی جدید<i class="fa fa-gamepad ml-2"></i></a>
                        </div>
                        <div class="col-12">
                               
                            <button data-toggle="modal" data-target="#addPostModal" class="btn btn-outline-dark mt-3 mb-2" >ارسال سوال<i class="fa fa-pen ml-2"></i></button>
                        </div>
                        <div class="col-12">
                            <button href="#" class="btn btn-outline-dark mt-3 mb-3" disabled="disabled" >بررسی سوالات ارسالی<i class="fa fa-check ml-2"></i></button>
                        </div>

                    </div>
                    
                    
                </div>

                <div class="part-2 mt-5">
                    <h5>دوستان</h5>
                    <div class="friends-list mb-1">
                        <div class="card mt-2" style="width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <img src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=40&d=retro&r=g"  
                                    alt="..." class="rounded">
                                </div>
                                <div class="col-8">
                                    <div class="card-body text-center">
                                        <span style="font-size : 14px;">ali</span>
                                                                                                           
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <img src="https://secure.gravatar.com/avatar/3b7db5896a4afa3d5c9c56f5c8bfedb1.jpg?s=40&d=retro&r=g"  
                                    alt="..." class="rounded">
                                </div>
                                <div class="col-8">
                                    <div class="card-body text-center">
                                    <span style="font-size : 14px;">Amir</span>                                     
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <img src="https://secure.gravatar.com/avatar/8a8c350603c48db726fa90b6862dd826.jpg?s=40&d=retro&r=g  
                                    alt='...' class="rounded">
                                </div>
                                <div class="col-8">
                                    <div class="card-body text-center">
                                    <span style="font-size : 14px;">Alireza</span> 
                                                                                                           
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    
                    <a href="#" class="btn btn-outline-primary mt-4 rounded-pill" data-toggle="modal" data-target="#search-user">جستجوی نام<i class="fa fa-search ml-2"></i></a>
                </div>

        
            </div>
            
            
        </div>


    </div>


    <div class="news mt-5">
        <div class="container">
            <div class="news-header">   
                <div class="row p-2">
                    <div class="right-part mr-auto text-center">
                        <i class="fa fa-newspaper "></i>
                        <h5>آخرین رویداد ها</h5>
                    </div>
                    <div class="left-part justify-content-center">
                        <button type="button" class="btn btn-outline-success" disabled="disabled" style="font-size: 13px;">آرشیو اخبار</button>
                    </div>
                </div>
            </div>
    
            <div class="news-items">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6 mb-2">

                        <div class="card text-center">
                            <img class="card-img-top rounded" src="pictures/news1.jpg" alt="Card image cap">
                            <div class="card-body py-2">
                                <h5 class="card-title">عنوان خبر یا رویداد</h5>
                                <p class="card-text">خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .</p>
                            </div>
                            <button class="btn btn-outline-info m-auto" disabled="disabled" style="font-size: 13px;">ادامه مطلب</button>
                            <div class="card-footer py-2 mt-2">
                                <small class="text-muted">انتشار در 12 اردیبهشت</small>
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="col-lg-3 col-md-6 mb-2">

                        <div class="card text-center">
                            <img class="card-img-top rounded" src="pictures/news1.jpg" alt="Card image cap">
                            <div class="card-body py-2">
                                <h5 class="card-title">عنوان خبر یا رویداد</h5>
                                <p class="card-text">خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .</p>
                            </div>
                            <button class="btn btn-outline-info m-auto" disabled="disabled" style="font-size: 13px;">ادامه مطلب</button>
                            <div class="card-footer py-2 mt-2">
                                <small class="text-muted">انتشار در 12 اردیبهشت</small>
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="col-lg-3 col-md-6 mb-2">

                        <div class="card text-center">
                            <img class="card-img-top rounded" src="pictures/news1.jpg" alt="Card image cap">
                            <div class="card-body py-2">
                                <h5 class="card-title">عنوان خبر یا رویداد</h5>
                                <p class="card-text">خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .</p>
                            </div>
                            <button class="btn btn-outline-info m-auto" disabled="disabled" style="font-size: 13px;">ادامه مطلب</button>
                            <div class="card-footer py-2 mt-2">
                                <small class="text-muted">انتشار در 12 اردیبهشت</small>
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="col-lg-3 col-md-6 mb-2">

                        <div class="card text-center">
                            <img class="card-img-top rounded" src="pictures/news1.jpg" alt="Card image cap">
                            <div class="card-body py-2">
                                <h5 class="card-title">عنوان خبر یا رویداد</h5>
                                <p class="card-text">خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .خلاصه و توضیح کلی خبر .</p>
                            </div>
                            <button class="btn btn-outline-info m-auto" disabled="disabled" style="font-size: 13px;">ادامه مطلب</button>
                            <div class="card-footer py-2 mt-2">
                                <small class="text-muted">انتشار در 12 اردیبهشت</small>
                            </div>
                
                        </div>
                
                    </div>
    
    
    
    
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



    
<!-- serach modal -->

<div class="modal fade" id="search-user">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-light text-black">
          <h5 class="modal-title">جستجوی نام</h5>
          <button class="close ml-0" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form>
            <div class="form-group">
              <label for="title"> نام </label>
              <input type="text" class="form-control">
            </div>
            
          </form>
        </div>
        <div class="modal-footer justify-content-start">
          <button class="btn btn-primary" data-dismiss="modal">جستجو</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">ایجاد سوال جدید</h5>
          <button class="close ml-0" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form>
            <div class="form-group">
              <label for="category"> دسته بندی </label>
              <select class="form-control">
                <option value=""> اطلاعات عمومی </option>
                <option value=""> زبان انگلیسی </option>
                <option value=""> ریاضی </option>
                <option value=""> ادبیات فارسی </option>
                <option value=""> اطلاعات تاریخی </option>
                <option value=""> اطلاعات مذهبی </option>
                <option value=""> اطلاعات ورزشی </option>
                <option value=""> موسیقی و ترانه </option>
                <option value=""> بازی های کامپیوتری </option>

              </select>
            </div>
            
            <div class="form-group">
                <label for="body"> متن سوال </label>
                <textarea name="body" class="form-control"></textarea>
                <div class="row mt-4 mb-3">
                    <div class="col-6 mb-2 ">
                    <input type="text" placeholder="گزینه ی اول" style=" border-radius: 7px;">
                    </div>

                    <div class="col-6 mb-2">
                        <input type="text" placeholder="گزینه ی دوم" style=" border-radius: 7px;" >

                    </div>

                    <div class="col-6 mb-2">
                        <input type="text" placeholder="گزینه ی سوم" style=" border-radius: 7px;" >
                    </div>

                    <div class="col-6 mb-2">
                        <input type="text" placeholder="گزینه ی چهارم" style=" border-radius: 7px;" >
                    </div>

                    <div class="col-6">
                        <input type="text" placeholder="گزینه ی صحیح" style=" border-radius: 7px;" >
                    </div>

                </div>
                
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-start">
          <button class="btn btn-primary" data-dismiss="modal" onclick="send_question()"> ارسال سوال </button>
        </div>
      </div>
    </div>
</div>


<script>

    var countDownDate = new Date("may 9, 2021 0:2:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    if (seconds < 0 || minutes < 0 || hours < 0)  {
        document.getElementsById("demo").className = "badge badge-danger ml-3 timer" ;
        document.getElementById("demo").innerHTML = "EXPIRED";
    } 
    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = seconds + " : " + minutes + " : " + hours;

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementsById("demo").className = "badge badge-danger ml-3 timer" ;
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);


    function send_question(){
        new Noty({
            type: 'success',
            text: "سوال شما با موفقیت ارسال شد!",
            theme: "light" ,
            timeout: 5000 ,
            layout: "bottomLeft",
        }).show();
    };

</script>




</body>
</html>