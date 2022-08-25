@extends('web.layouts.master')
@section('title', $details_news->title." | TV Schedule Score")
@section('meta_keywords', !empty($details_news->meta_keywords) ? $details_news->meta_keywords : '')
@section('meta_title', !empty($details_news->meta_title) ? $details_news->meta_title : '')
@section('meta_description', !empty($details_news->meta_description) ? $details_news->meta_description : '')
@section('meta_image', url('/')."/public/admin/images/news/".$details_news->image)

@section('main_content')
    <header>
        <h1> News </h1><hr />
        <div class="row">
            <div class="col-md-8 newsContent">
                <h2> {{$details_news->title}} </h2>
                <h6> {{!empty($details_news->meta_description) ? $details_news->meta_description : '' }}</h6>
                <p>  {{ date('d-M-Y', strtotime($details_news->date))}}  &nbsp; by : Jan Kabir </p>
                <img src="{{ asset('public/admin/images/news')}}/{{$details_news->image}}" alt="{{$details_news->title}}">
                <p> {!! $details_news->description!!} </p>                        
            </div>
            <div class="col-md-4 addContent">

            </div>
        </div>
    </header>
@endsection