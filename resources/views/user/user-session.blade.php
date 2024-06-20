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


                                @if ($item->status == "complete")

                                {{$item->status}} --  <a href="{{route('addReview',$item->id)}}" class="btn btn-success text-white">Add Review</a>

                                @else
                                {{$item->status}}
                                @endif

                            </div>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</div>



@endsection