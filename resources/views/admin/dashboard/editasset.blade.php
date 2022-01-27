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
                  <i class="mdi mdi-plus"></i>
                </span> Add Asset 
              </h3>
            </div>

            <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success')}} </div>
            @endif
            @if(Session::has('errMesg'))
                <div class="alert alert-danger"> {{Session::get('errMesg')}} </div>
            @endif

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <form class="forms-sample" action="{{route('postaddasset')}}" method="post" enctype="multipart/form-data">
                        @csrf()
                        <input type="hidden" name="assetid" value="{{$assets['id']}}"/>
                        <input type="hidden" name="assetcode" value="{{$assets['asset_code']}}"/>
                      <div class="form-group">
                        <label for="exampleInputName1">Asset Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Asset Name" name="asset_name" value="{{$assets['asset_name']}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectAssetType">Asset Type</label>
                        <select class="form-control" id="exampleSelectAssetType" name="asset_type">
                            <!-- foreach render types  -->
                            <option value="{{$selectedtype['id']}}" selected>{{$selectedtype['asset_type']}} </option>
                            @foreach($assets as $asset)
                          <option value="{{$assets->id}}">{{$asset['asset_type']}}</option>
                          @endforeach
                          
                          
                        </select>
                      </div>                      
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="asset_image[]" class="form-control file-upload-info" multiple>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Is Active</label>
                        <select class="form-control" id="exampleSelectGender" name="is_active">
                            <!-- foreach render types  -->
                          <option value="1" selected>Active</option>
                          <option value="0">In Active</option>
                        </select>
                      </div>
                      
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



            </div>
          </div>
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
    <!-- End custom js for this page -->
  </body>
</html>