@extends('admin.admin_master')
@section('content')
{{-- <div class="orders">
    <div class="row">
       <div class="col-xl-12">
          <div class="card">
             <div class="card-body">
                <h4 class="box-title">Orders </h4>
             </div>
             <div class="card-body--">
                <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                       <div class="card bg-dark text-white text-center py-3">
                          @php
                              $banner=DB::table('banners')->get();
                          @endphp
                     <h3>{{count($banner)}}</h3>

                     <h2>Banner's</h2>

                       </div>
                     </div>
                     <div class="col-md-3">
                        <div class="card bg-info text-white text-center py-3">
                           @php
                               $banner=DB::table('teams')->get();
                           @endphp
                      <h3>{{count($banner)}}</h3>

                      <h2>Team's</h2>

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card bg-primary text-white text-center py-3">
                           @php
                               $banner=DB::table('protfolios')->get();
                           @endphp
                      <h3>{{count($banner)}}</h3>

                      <h2>Protofolio's</h2>

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card bg-warning text-white text-center py-3">
                           @php
                               $banner=DB::table('branches')->get();
                           @endphp
                      <h3>{{count($banner)}}</h3>

                      <h2>Branch's</h2>

                        </div>
                      </div>
                  </div>
                </div>


             </div>
          </div>
       </div>
    </div>
 </div> --}}
@endsection
