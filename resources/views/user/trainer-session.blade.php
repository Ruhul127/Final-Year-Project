@extends('layouts.account')

@section('content')




<div class="regi-side">
    <div class="sec-title">
        <h3 class="title">Sessions</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="rs-pointtable full-ranking ">
        <div class="container custom">
            <table class="ranking-wrap">
                <tbody>
                    <tr>

                        @foreach($cols as $value)
                        <th>{{$value}}</th>
                        @endforeach

                        <!-- <th>Action</th> -->



                    </tr>


                    @foreach($items as $item)


                    <tr>

                        <td>{{$item->id}}</td>
                        <td>
                            <div class="club-item">{{$item->trainer->name}}</div>
                        </td>
                        <td>
                            <div class="club-item">{{$item->user->name}}</div>
                        </td>
                        <td>
                            <div class="club-item">{{isset($item->skill->title) ? $item->skill->title : ''}}</div>
                        </td>
                        <td>
                            <div class="club-item">{{$item->start_datetime}}</div>
                        </td>
                        <td>
                            <div class="club-item">{{$item->end_datetime}}</div>
                        </td>
                        <td>
                            <div class="club-item">


                                <!-- @if ($item->status == "complete")

                                {{$item->status}} 

                                @else
                                {{$item->status}}
                                @endif -->

                                <select class="form-control" onchange="changeStatus('{{$item->id}}' , this)">
                                    <option>Select</option>
                                    <option value="complete" {{$item->status =="complete" ? "selected": ""}}>Complete</option>
                                </select>

                            </div>
                        </td>

                        <!-- <td>
                            <a href="" class="btn btn-success text-white">View</a>
                        </td> -->

                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</div>



@endsection

@section('script')

<script>
    function changeStatus(id, cha) {

        $.ajax({
            url: "{{route('change-session-status')}}",
            data: {id:id , status:cha.value},
            success: function(html) {
                
            }
        });
        console.log(id, cha.value);
    }
</script>
@endsection