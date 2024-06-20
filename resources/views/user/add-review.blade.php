@extends('layouts.account')

@section('content')
<style>
  .star {
    width: 32px;
    height: 32px;
    transition: .6s all;
  }

  #rating {
    cursor: pointer;
    display: inline-block
  }

  #review-form .input-group-addon {
    min-width: 100px;
  }

  #review-form .btn {
    min-width: 100px;
  }

  #review-form input[type="text"],
  #review-form textarea {
    width: 100%;
  }

  #review-form .form-group {
    margin-bottom: 15px;
  }

  #review-form .help-block {
    display: block;
    margin-top: 5px;
    margin-bottom: 10px;
  }

  blockquote {
    border-left: 5px solid rgb(238, 238, 238);
    padding-left: 20px;
  }

  blockquote .footer {
    display: block;
    font-size: 80%;
  }

  .stars-container {
    margin-bottom: 5px;
  }
</style>



<div class="regi-side">
  <div class="sec-title">

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
  </div>

  <div class="row">

    <div class="container">

      <form id="review-form" action="{{route('storeReview')}}" method="post">
        @csrf
        @if (empty($review))

        <h2>Write Your Review</h2>
        @else
        <h2>Your Review</h2>
        @endif
        <div id="rating">
          <svg class="star" onclick="getStars(1)" id="1" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" style="fill: #f39c12;">
            <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566"></polygon>
          </svg>
          <svg class="star" onclick="getStars(2)" id="2" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" style="fill: #f39c12;">
            <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566"></polygon>
          </svg>
          <svg class="star" onclick="getStars(3)" id="3" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" style="fill: #f39c12;">
            <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566"></polygon>
          </svg>
          <svg class="star" onclick="getStars(4)" id="4" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" style="fill: #f39c12;">
            <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566"></polygon>
          </svg>
          <svg class="star" onclick="getStars(5)" id="5" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" style="fill: #808080;">
            <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566"></polygon>
          </svg>
        </div>

        @if (!empty($review))

        <span id="starsInfo" class="help-block">
          {{$review->text_review}}
        </span>

        @else

        <span id="starsInfo" class="help-block">
          Click on a star to change your rating 1 - 5, where 5 = great! and 1 = really bad
        </span>
        <div class="form-group">
          <label class="control-label" for="review">Your Review:</label>
          <textarea class="form-control" rows="10" placeholder="Your Reivew" name="review" id="review"></textarea>
          <span id="reviewInfo" class="help-block pull-right">
            <span id="remaining">999</span> Characters remaining
          </span>
        </div>

        <input type="hidden" class="start-input" name="stars" value="">
        <input type="hidden" name="session_booking_id" value="{{$id}}">

        <input id="submitForm" type="submit" class="btn btn-primary">

        @endif


      </form>

    </div>

  </div>

</div>




@endsection

@section('script')

<script>
  getStars('{{$current_stars}}');

  function getStars(val) {

    $('.start-input').val(val);

  }

  function starsReducer(state, action) {
    switch (action.type) {
      case 'HOVER_STAR': {
        return {
          starsHover: action.value,
          starsSet: state.starsSet
        }
      }
      case 'CLICK_STAR': {
        return {
          starsHover: state.starsHover,
          starsSet: action.value
        }
      }
      break;
      default:
        return state
    }
  }

  var StarContainer = document.getElementById('rating');
  var StarComponents = StarContainer.children;

  var state = {
    starsHover: 0,
    starsSet: 4
  }

  render('{{$current_stars}}');

  function render(value) {
    for (var i = 0; i < StarComponents.length; i++) {
      StarComponents[i].style.fill = i < value ? '#f39c12' : '#808080'
    }
  }

  for (var i = 0; i < StarComponents.length; i++) {
    StarComponents[i].addEventListener('mouseenter', function() {
      state = starsReducer(state, {
        type: 'HOVER_STAR',
        value: this.id
      })
      render(state.starsHover);
    })

    StarComponents[i].addEventListener('click', function() {
      state = starsReducer(state, {
        type: 'CLICK_STAR',
        value: this.id
      })
      render(state.starsHover);
    })
  }

  StarContainer.addEventListener('mouseleave', function() {
    render(state.starsSet);
  })

  var review = document.getElementById('review');
  var remaining = document.getElementById('remaining');
  review.addEventListener('input', function(e) {
    review.value = (e.target.value.slice(0, 999));
    remaining.innerHTML = (999 - e.target.value.length);
  })
</script>
@endsection