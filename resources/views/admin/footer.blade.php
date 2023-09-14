@php
// use APP\models\frontendsetting;
// $data=frontendsetting::find(1);
    $data=DB::table('frontendsettings')->where('id',1)->get();
foreach ($data as $key => $value) {
$copy=$value->copyright;
$develop=$value->developed;

}
@endphp
<footer class="site-footer">
    <div class="footer-inner bg-white">
       <div class="row">
          <div class="col-sm-6">
             Copyright &copy; @php
                echo date('Y')
             @endphp {{ $copy}}
          </div>
          <div class="col-sm-6 text-right">
          Designed by <a href="https://infozey.com/">{{$develop}}</a>
          </div>
       </div>
    </div>
 </footer>