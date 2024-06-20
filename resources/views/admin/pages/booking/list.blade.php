@extends('admin.layout.master')
@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{$title}}</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">

                    <a href="{{route('booking.create')}}" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                        <!-- <i class="fa fa-plus-circle"></i>  -->
                        Create New</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$title}}</h4>
                        <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped border" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        @foreach($cols as $value)
                                        <th>{{$value}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        @foreach($cols as $value)
                                        <th>{{$value}}</th>
                                        @endforeach


                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($items as $item)


                                    <tr>

                                        <td>{{$item->id}}</td>
                                        <td>{{$item->trainer->name}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{isset($item->skill->title) ? $item->skill->title : ''}}</td>
                                        <td>{{$item->start_datetime}}</td>
                                        <td>{{$item->end_datetime}}</td>
                                        <td> <select class="form-control" onchange="changeStatus('{{$item->id}}' , this)">
                                                <option>Select</option>
                                                <option value="accept" {{$item->status =="accept" ? "selected": ""}}>Accept</option>
                                                <option value="pending" {{$item->status =="pending" ? "selected": ""}}>Pending</option>

                                                <option value="complete" {{$item->status =="complete" ? "selected": ""}}>Complete</option>
                                            </select>
                                        </td>



                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection

@section('script')

<script>
    $(function() {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
        // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');






    });
</script>

<script>
    function changeStatus(id, cha) {

        $.ajax({
            url: "{{route('change-session-status-admin')}}",
            data: {
                id: id,
                status: cha.value
            },
            success: function(html) {

            }
        });
        console.log(id, cha.value);
    }
</script>
@endsection