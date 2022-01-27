<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asset Tracker</title>
    <!-- plugins:css -->
    @include('admin.includes.header')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.includes.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-chart-bar"></i>
                </span> Assets Type
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Assets Table</h4>
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                            
                            <th>Asset Type</th>
                            <th>Asset Description</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($asset_types as $assettype)
                        <tr>
                          <td>{{$assettype->asset_type}}</td>
                          <td>{{$assettype->asset_description}}</td>
                          <td><a href="editassettype/{{ $assettype['id'] }}" class="btn btn-info" role="button">Edit</a>  | <a href="javascript:void(0)" class="btn btn-danger dtlpro" aid="{{ $assettype['id'] }}" role="button">Delete</a></td>
                        </tr>
                      @endforeach
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          <table>  
          <div>
          {{$asset_types->links()}}
          </div>
          <style>
              .w-5{
                  display: none;
              }
          </style>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $(".dtlpro").click(function(e){
                        var aid = $(this).attr("aid");
                        if(confirm(" Your Asset will be deleted !!")){
                            //alert(aid);
                            $.ajax({
                                url:"{{url('/deleteassettype')}}",
                                type:'post',
                                method:'patch',
                                data:{_token:'{{csrf_token()}}',aid:aid},
                                success:function(response){
                                  window.location.reload();
                              },
                              error: function(jqXHR, status, err){
                                  window.location.reload();
                              }
                            })
                        }
                        else{
                            alert(" Action Cancelled !")
                        }
                    })
                })
                $(function () {
                  $("#example1").DataTable({
                    "responsive": true, "lengthChange": true, "autoWidth": true,
                    "buttons": ["copy", "csv", "excel", "pdf"]
                  }).buttons().container().appendTo('#example1_wrapper');
                });
            </script>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @include('admin.includes.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.includes.foot')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>