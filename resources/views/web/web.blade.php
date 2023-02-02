@extends('web.layouts.master')
@section('meta_keywords', "Sports, News, Time ,TV Schedule Score")
@section('meta_title', "TV Schedule Score, Time Match Result")
@section('meta_description', "News | TV Schedule Score - live score, Fixtures & Results")
@section('meta_image', url('/')."/public/web/assets/img/metaimage.jpg")
@section('title', "News | TV Schedule Score")
@section('main_content')
<div class="row">
    <div class="col-md-8 newsContentSlider">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($slider_news as $key=> $item)
                    @php  $title = str_replace(' ', '-', $item->meta_title); @endphp
                    <div class="carousel-item @if($key==0) active  @endif">
                        <img src="{{ asset('public/admin/images/news')}}/{{$item->image}}" class="d-block w-100" alt="{{$item->meta_title}}" />
                        <div class="carousel-caption d-none d-md-block">
                            <a class="sliderlink" href="{{ url("news-details/".$item->id."/".$title)}}"> 
                                <h5>  @php echo substr($item->title,0,120);  @endphp </h5>
                                <p> @php echo substr($item->description,0,200);  @endphp </p>
                            </a> 
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 latestContent">
            @foreach ($rightside_news as  $value)
            @php  $title = str_replace(' ', '-', $value->meta_title); @endphp
            <div class="newlatestitem">
                <div class="latestContentLeft">
                <p><a href="{{ url("news-details/".$value->id."/".$title)}}"> {{$value->title}} </a></p>
               
                </div>
                <div class="latestContentRight">
                    <a href="{{ url("news-details/".$value->id."/".$title)}}"> 
                        <img src="{{ asset('public/admin/images/news')}}/{{$value->image}}" class="img-responsive " alt="{{$title}}" />
                    </a>
                </div>
            </div>
            @endforeach
    </div>
</div><br /><br />
<div class="row">
    <div class="col-md-8 newsContent">
        @foreach ($slider_news as  $value)
        @php  $title = str_replace(' ', '-', $value->meta_title); @endphp
        <a href="{{ url("news-details/".$value->id."/".$title)}}">
           <h2>{{$value->title}} </h2>
           <h6> {{!empty($value->meta_description) ? $value->meta_description : '' }}</h6>
        </a>
       <p> {{ date('d-M-Y', strtotime($value->date))}}  &nbsp; by : Jan Kabir</p>
       <a href="{{ url("news-details/".$value->id."/".$title)}}"><img src="{{ asset('admin/images/news')}}/{{$value->image}}" alt="{{$title}}"> </a>
       <p> @php echo substr($value->description,0,270);  @endphp <a href="{{ url("news-details/".$value->id."/".$title)}}"> Read More... </a></p>
       @endforeach
    </div>
    <div class="col-md-4 addContent">
        @foreach ($right_news as  $value)
        @php  $title = str_replace(' ', '-', $value->meta_title); @endphp
      <h6> <a href="{{ url("news-details/".$value->id."/".$title)}}"> {{$value->title}} </a> </h6>
     <a href="{{ url("news-details/".$value->id."/".$title)}}"> <img src="{{ asset('admin/images/news')}}/{{$value->image}}" alt="{{$value->title}}" alt="{{$title}}"> </a><br /><br />
      @endforeach
      
    </div>
  </div>
@endsection