 @extends('admin.master')
 @section('content')
     <!-- ============================================================== -->
     <!-- Start Page Content here -->
     <!-- ============================================================== -->

     <div class="content-page mt-4">
         <div class="content">
             <!-- Start Content-->
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-xl-12">
                         <!-- Todo-->
                         <div class="card">
                             <div class="card-body p-0">
                                 <div class="p-3">
                                     <div class="card-widgets">
                                         <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                         <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                             aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                                 class="ri-subtract-line"></i></a>
                                     </div>
                                     <h5 class="header-title mb-0">Projects</h5>
                                 </div>

                                 <div id="yearly-sales-collapse" class="collapse show">

                                     <div class="table-responsive">
                                         <table class="table table-nowrap table-hover mb-0">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Project Name</th>
                                                     <th>Start Date</th>
                                                     <th>Due Date</th>
                                                     <th>Status</th>
                                                     <th>Assign</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr>
                                                     <td>1</td>
                                                     <td>Velonic Admin v1</td>
                                                     <td>01/01/2015</td>
                                                     <td>26/04/2015</td>
                                                     <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>
                                                 <tr>
                                                     <td>2</td>
                                                     <td>Velonic Frontend v1</td>
                                                     <td>01/01/2015</td>
                                                     <td>26/04/2015</td>
                                                     <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>
                                                 <tr>
                                                     <td>3</td>
                                                     <td>Velonic Admin v1.1</td>
                                                     <td>01/05/2015</td>
                                                     <td>10/05/2015</td>
                                                     <td><span class="badge bg-pink-subtle text-pink">Pending</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>
                                                 <tr>
                                                     <td>4</td>
                                                     <td>Velonic Frontend v1.1</td>
                                                     <td>01/01/2015</td>
                                                     <td>31/05/2015</td>
                                                     <td><span class="badge bg-purple-subtle text-purple">Work in
                                                             Progress</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>
                                                 <tr>
                                                     <td>5</td>
                                                     <td>Velonic Admin v1.3</td>
                                                     <td>01/01/2015</td>
                                                     <td>31/05/2015</td>
                                                     <td><span class="badge bg-warning-subtle text-warning">Coming
                                                             soon</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>

                                                 <tr>
                                                     <td>6</td>
                                                     <td>Velonic Admin v1.3</td>
                                                     <td>01/01/2015</td>
                                                     <td>31/05/2015</td>
                                                     <td><span class="badge bg-primary-subtle text-primary">Coming
                                                             soon</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>

                                                 <tr>
                                                     <td>7</td>
                                                     <td>Velonic Admin v1.3</td>
                                                     <td>01/01/2015</td>
                                                     <td>31/05/2015</td>
                                                     <td><span class="badge bg-danger-subtle text-danger">Cool</span></td>
                                                     <td>Techzaa Studio</td>
                                                 </tr>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div> <!-- end card-->
                     </div> <!-- end col-->
                 </div>
                 <!-- end row -->

             </div>
             <!-- container -->

         </div>
         <!-- content -->
     @endsection
