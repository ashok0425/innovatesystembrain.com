@php
$logo=DB::table('frontendsettings')->first();

@endphp
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dashboard Page</title>
<link rel = "icon" type = "image/png" href = "{{asset('storage/img/logo.png')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"  />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">

<style>
.active{
color:red!important;
}
</style>
</head>
<body>
{{-- including sidebar  --}}
@include('admin.sidebar')
<div id="right-panel" class="right-panel">
{{-- including header  --}}
@include('admin.header')
<div class="content pb-0">
{{-- including main-content  --}}
@yield('content')

</div>
<div class="clearfix"></div>
{{-- including footer  --}}
@include('admin.footer')

</div>



<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>


<script>

$(document).ready(function() {
    $('#summernote1').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      ['view', ['fullscreen', 'codeview']],
      ['mybutton', ['myVideo']] // custom button
    ],

    buttons: {
      myVideo: function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
          contents: '📺',
          tooltip: 'video',
          click: function() {
            var div = document.createElement('span');
            div.classList.add('embed-container');
            var iframe = document.createElement('iframe');
            iframe.src = prompt('Enter video url:');
            iframe.setAttribute('frameborder', 0);
            // iframe.setAttribute('width', '100%');
            iframe.setAttribute('allowfullscreen', true);
            div.appendChild(iframe);
            context.invoke('editor.insertNode', div);
          }
        });

        return button.render();
      }
    }
  });
  $('#summernote2').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      ['view', ['fullscreen', 'codeview']],
      ['mybutton', ['myVideo']] // custom button
    ],

    buttons: {
      myVideo: function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
          contents: '📺',
          tooltip: 'video',
          click: function() {
            var div = document.createElement('span');
            div.classList.add('embed-container');
            var iframe = document.createElement('iframe');
            iframe.src = prompt('Enter video url:');
            iframe.setAttribute('frameborder', 0);
            // iframe.setAttribute('width', '100%');
            iframe.setAttribute('allowfullscreen', true);
            div.appendChild(iframe);
            context.invoke('editor.insertNode', div);
          }
        });

        return button.render();
      }
    }
  });
});
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

</body>
</html>
