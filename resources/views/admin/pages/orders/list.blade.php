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


                                    <tr class="row-id-{{$item->id}}">
                                        <?php
                                        foreach ($cols as $key => $value) {
                                            // if ($key == "category") {
                                            //     $item[$key] = $item->category->title;
                                            // }

                                            if ($key == "status") {
                                                $item[$key] = ' <select class="change-status-order" onchange="changeOderStatus(this,'.$item->id.')">
                                                    <option value="">Select</option>
                                                        <option value="New" '. ($item->status == "New" ? "selected":"").'>New</option>
                                                        <option value="In Progress" '.($item->status == "In Progress" ? "selected":"").'>In Progress</option>
                                                        <option value="Complete" '.($item->status == "Complete" ? "selected":"").'>Complete</option>
                                                        
                                                </select>';
                                                                                              
                                                // $item[$key] = "<select class='change-status' data-categoryid='" . $item->id . "'>
                                                //                 <option value='active' " . ($item->status == 'active' ? 'selected' : '') . ">Active</option>
                                                //                 <option value='in-active' " . ($item->status == 'in-active' ? 'selected' : '') . ">In-active</option>
                                                //                 </select>";
                                            }

                                            if ($key == "designer") {

                                                $option = '<select name="designer_id" class="chnage_designer" data-orderid="'.$item->id.'">';
                                                $option .= '<option value="">Select</option>';
                                     
                                                foreach($designersData as $designer):
                                                    
                                                    $option .= '<option value="'.$designer->id.'" '. ($item->designer_id == $designer->id ? 'selected' : "") .'>'.$designer->name.'</option>';
                                                endforeach;
                                                $option .= '</select>';

                                                $item[$key] = $option;
    
                                            }
                                            
                                            if ($key == "action") {
                                                $item[$key] = "<a class='btn btn-info' href='".route('order.details',$item->id)."'>View</a>";
                                            }
                                            echo "<td>" . $item[$key] . "</td>";
                                        }
                                        ?>
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
        function changeOderStatus(val,orderId){

    // console.log(orderId , 'orderId');
    
    $.ajax({
                url: '{{route("order.statusChange")}}',
                type: 'GET',
                data: {status:val.value,order_id:orderId},
                dataType: 'json',
                // cache: false,
                // contentType: false,
                // processData: false,
                success: function(response) {
                    // alert("Order successfully");
                    
                    // handle success response
                },
                error: function(xhr, status, error) {
                    // handle error response
                }
            });
            
}


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
            "order": [
                [0, 'desc']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');



        $(".change-status").change(function(e) {
            var id = $(this).data('categoryid');
            var status = $(this).val();
            $.ajax({
                type: "GET",
                url: '',
                data: {
                    id: id,
                    status: status
                },
                // contentType: false,
                success: function(data) {

                    let message = data.message;
                    $.notify('Success: ' + message, 'success');

                    setTimeout(function() {
                        // location.reload();
                        // window.location.href = "}";
                    }, 2000);
                },
                error: function(e) {

                    var parseData = JSON.parse(e.responseText);
                    let message = parseData.data;

                    Object.keys(message).forEach(key => {
                        $.notify('Warning: ' + message[key]);
                        // $('#formData').find('input[name="' + key + '"]').css('border', '1px solid red');

                    });

                }
            });

        });


        $(".chnage_designer").change(function(e) {
            var id = $(this).data('orderid');
            var designer_id = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{route("order.assign.designer")}}',
                data: {
                    id: id,
                    designer_id: designer_id
                },
                // contentType: false,
                success: function(data) {

                    let message = data.message;
                    $.notify('Success: ' + message, 'success');

                    setTimeout(function() {
                        // location.reload();
                        // window.location.href = "}";
                    }, 2000);
                },
                error: function(e) {

                    var parseData = JSON.parse(e.responseText);
                    let message = parseData.data;

                    Object.keys(message).forEach(key => {
                        $.notify('Warning: ' + message[key]);
                        // $('#formData').find('input[name="' + key + '"]').css('border', '1px solid red');

                    });

                }
            });

        });
        






        $('.delete-btn').click(function(e) {
            var postid = $(this).data('postid');
            var action = $(this).data('action');

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: action,
                data: {},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {


                    $(".row-id-"+postid).remove();
                    console.log(postid , "postid")
                    let message = data.message;
                    $.notify('Success: ' + message, 'success');

                    setTimeout(function() {
                        // location.reload();
                        // window.location.href = "}";
                    }, 2000);
                },
                error: function(e) {

                    var parseData = JSON.parse(e.responseText);
                    let message = parseData.data;

                    Object.keys(message).forEach(key => {
                        $.notify('Warning: ' + message[key]);
                        // $('#formData').find('input[name="' + key + '"]').css('border', '1px solid red');

                    });

                }
            });

            e.preventDefault();


        });

    });
</script>

@endsection