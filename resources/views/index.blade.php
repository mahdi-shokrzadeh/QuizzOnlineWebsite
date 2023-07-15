<html lang="fa">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header-footer.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
     integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>



</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container">
            <a href="http://localhost:8000" class="navbar-brand">
                <img src="images/logo50.png" alt="" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="نمایش فهرست"  >
                <Span class="navbar-toggler-icon"></Span>
            </button>
            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav right-side mr-auto " >
                    <li class="navbar-item active icon" >
                        <i class="fas fa-house-user"></i>
                        <a href="http://localhost:8000" class="nav-link" href="index.html">خانه</a>
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

                <ul class="navbar-nav buttons">
                    
                    <li class="nav-item mr-2 text-center">
                        <a href="{{route('register')}}" class="btn btn-outline-success m-1">عضویت</a>                       
                        <a href="{{route('login')}}" class="btn btn-outline-info m-1">ورود</a>
                    </li>
 
                </ul>
            
            </div>
        </div>
    </nav>

    <section id="showcase" class="py-5">

        <div class="container">
            <div id="showcase-height" class="row justify-content-center align-items-center">
                <div class="col-lg-6 text-center">
                    <p class="lead">
                        مسابقه ، سرگرمی ، تفریح و یادگیری در کنار هم !
                    </p>
                    <a href="{{route('register')}}" class="btn btn-primary bt-lg" id="arrowright">
                        همین حالا شروع کن <i class="fas fa-arrow-left ml-2"></i></a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="pictures/Bibliophile-rafiki.svg" alt="" width="450px" height="450px" 
                    class="image-fluid d-lg-block m-aouto">
                </div>
            </div>

        </div>
    </section>

    <section id="actions" class="mb-4 mt-4">

        <div class="container">
    
          <div class="row">
    
            <div class="col-lg-4 mb-3">
    
                <div class="card border-primary shadow py-2">
    
                    <div class="card-body">
    
                        <div class="col align-items-center">
                            <div class="row justify-content-center align-items-center">
                                <h5 class="font-weight-bold text-primary mb-3"><i class="fas fa-pencil-alt text-muted"> </i> پست ها
                                </h5>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center">
                            <h2 class="count mb-0 font-weight-bold text-muted"> 0 </h2>                   
                                      
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="col-lg-4 mb-3">
    
              <div class="card border-success shadow py-2">
    
                <div class="card-body">
    
                  <div class="col align-items-center">
                    <div class="row justify-content-center align-items-center">
                        <h5 class="font-weight-bold text-success mb-3"><i class="fas fa-question text-muted"></i> تعداد سوالات
                            </h5>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <h2 class="count mb-0 font-weight-bold text-muted"> 25 </h2>
                    </div>
                    
                  </div>
    
                </div>
    
              </div>
    
            </div>
    
            <div class="col-lg-4">
              <div class="card border-info shadow py-2">
                <div class="card-body">
                  <div class="col align-items-center ">
                    <div class="row justify-content-center align-items-center">
                        <h5 class="font-weight-bold text-info mb-3"><i class="fas fa-users text-muted"></i> تعداد کاربران
                        </h5>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <h2 class="count mb-0 font-weight-bold text-muted"> 6 </h2>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    
        </div>
    
    </section>

    <div class="main-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-3">
                    <div class="card text-center border-warning">
                        <div class="card-header">
                            <h5>داغ ترن ها</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>اطلاعات عمومی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>ریاضی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>زبان انگلیسی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>ادبیات فارسی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>اطلاعات مذهبی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>اطلاعات تاریخی</li>
                            <li class="list-group-item"><i class="fas fa-fire mr-2"></i>غذا و نوشیدنی</li>

                        </ul>
                        
                    </div>
                </div>

                <div class="col-lg-8"  >
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="tab">
                            <a href="#tab1" class="nav-link active" role="tab" data-toggle="tab">جدیدترین ها</a>
                        </li>
                        <li class="nav-item" role="tab">
                            <a href="#tab2" class="nav-link" role="tab" data-toggle="tab">انجام نشده ها</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active p-1" id="tab1">
                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">ادبیات فارسی</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5 justify-content-center">
                                    <img src="pictures/quiz2.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>

                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">اطلاعات عمومی</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <img src="pictures/quiz2.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>

                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">مذهبی</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <img src="pictures/quiz2.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>
                            
                            
                        </div>
                        <div role="tabpanel" class="tab-pane  p-1" id="tab2">
                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">ورزشی</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <img src="pictures/quiz5.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>

                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">ریاضی</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <img src="pictures/quiz5.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>

                            <div class="row flex-column-reverse flex-md-row align-items-center mt-2">
                                <div class="col-md-7 text-center ">
                                    <div class="informations">
                                        <h5>رویداد</h5>
                                        <a href="#">
                                            <span class="badge badge-primary">کامپیوتر</span>
                                        </a>
                                        <p class="text-justify">
                                            لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی.لورم اپسیوم متن ساختگی بی معنیلورم اپسیوم متن ساختگی بی معنی
                                        </p>
                                        <a href="#" class="btn btn-danger bt-lg"><i class="fas fa-gamepad "></i></a>
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <img src="pictures/quiz5.jpg" alt="" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                        
                    </div>


                </div>


            </div>
            
        </div>
    </div>

    <div class="news mt-4">
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

    <script>
        $(document).ready(function () {
    
          $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
              Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                  $(this).text(Math.ceil(now))
                }
              });
          });
    
        });
    </script>
</body>

</html>