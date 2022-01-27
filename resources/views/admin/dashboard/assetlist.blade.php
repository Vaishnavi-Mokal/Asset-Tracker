<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asset Tracker</title>
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
                  <i class="mdi mdi-table-large"></i>
                </span> Assets
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
                    <table class="table table-hover" id="example1" width="100%">
                      <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Asset Name</th>
                            <th>Asset Code</th>
                            <th>Asset Type</th>
                            <th class="text-center">Asset Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($assets as $asset)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$asset['asset_name']}}</td>
                                <td>{{$asset['asset_code']}}</td>
                                <td>{{$asset['asset_type']}}</td>
                                <td> @if($asset['is_active'] == 1)
                                  <h3><span class="badge badge-success">Active</span></h3>
                               @else 
                                <h3><span class="badge badge-warning">In Active</span></h3>
                                @endif </td>
                                <td><a href="editasset/{{ $asset['id'] }}" class="btn btn-info" role="button">Edit</a>  | <a href="javascript:void(0)" class="btn btn-danger dtlpro" aid="{{ $asset['id'] }}" role="button">Delete</a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          <table>  
          <div>
              {{$assets->links()}}
          </div>
          <style>
              .w-5{
               
                display: -webkit-flex;
                display: -ms-flexbox;
                display: none;
                padding-left: 0;
                list-style: none;
                border-radius: 0.25rem;
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
                                url:"{{url('/deleteasset')}}",
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
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <a href="#" target="_blank">vaishu12@gmail.com</a>   2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> NeoSOFT Technologies</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.includes.footer')
   
    <!-- End custom js for this page -->
  </body>
</html>