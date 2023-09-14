<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Falcontect</title>
 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body style="background: #587498">
    <div class="container-scroller" style="margin: 8rem 0;box-shadow:10px gray;">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto ">
             
              <div class="card-body px-5 py-5 ">
                   {{-- display message --}}
                   @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li style="list-style: none">{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
              <img src="{{asset('frontend/img/fal.png')}}" alt="" class="img-fluid w-50" style="margin: auto 5rem" >
                <h3 class="card-title text-left mb-3"style="margin: auto 5rem;">Admin Login</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" id="email" name="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" id="password" type="password" name="password" >
                  </div>
               
                  <div class="text-center">
                    <input type="submit" style="background: #587498;color:white;font-weight:bold;border:none;outline:none;padding:.5rem 2rem;margin-top:2rem;display:block;width:100%" value="Login">
                  </div>
    
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- endinject -->
  </body>
</html>


