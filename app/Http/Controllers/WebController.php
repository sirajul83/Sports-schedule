<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\SportCategory;
use App\Models\Event;
use App\Models\Contact;
use DB;

class WebController extends Controller
{
    public $event_model;
    public function __construct() {
        $this->event_model = new Event();
    }
    public function index(){
        $slider_news = News::orderBy('id', 'DESC')->take(3)->get();
        $rightside_news = News::orderBy('id', 'DESC')->skip(3)->take(3)->get();
        $list_news = News::orderBy('id', 'DESC')->skip(6)->take(3)->get();
        $right_news = News::orderBy('id', 'DESC')->skip(9)->take(2)->get();
        return view('web.web', compact('slider_news','rightside_news','list_news','right_news'));
    }
    public function news_details($id){
        
        
        $details_news = News::find($id);
        return view('web.news_details', compact('details_news'));
    }
    public function sports(){
        $from_date = date('Y-m-d', strtotime(' -7 day'));
        $to_date = date('Y-m-d', strtotime(' +7 day'));
        $dates = Event::select(DB::raw('DATE(play_time) as date'))
                        ->whereBetween('play_time', [$from_date, $to_date])
                        ->groupBy(DB::raw('DATE(play_time)'))
                        ->orderBy('play_time', 'DESC')
                        ->get();

        $sports_category_list = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->take(13)->get();
        $event_list = $this->event_model->play_event();
       
        // echo "<pre>";
        // print_r($dates);exit;
       

        return view('web.sports', compact('sports_category_list', 'dates', 'event_list'));
    }
    public function sports_category($name){
        $sports_category = SportCategory::where('name', $name)->first();
        $sport_id = $sports_category->id;
        $from_date = date('Y-m-d', strtotime(' -7 day'));
        $to_date = date('Y-m-d', strtotime(' +7 day'));
        $dates = Event::select(DB::raw('DATE(play_time) as date'))
                        ->whereBetween('play_time', [$from_date, $to_date])
                        ->groupBy(DB::raw('DATE(play_time)'))
                        ->orderBy('play_time', 'DESC')
                        ->get();

        $event_list = $this->event_model->play_event_category($sport_id);
       
        return view('web.sports_category', compact('sports_category', 'dates', 'event_list'));
    }

    public function sports_date($date){
      
        $dates = Event::select(DB::raw('DATE(play_time) as date'))
                        ->whereDate('play_time', '=', date('Y-m-d', strtotime($date)))
                        ->first();

        $sports_category_list = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->take(13)->get();
        $event_list = $this->event_model->play_event_date_wise($date);

        return view('web.sports_date_wise', compact('sports_category_list', 'dates', 'event_list'));     
    }
    public function date_wise_search(Request $request){
        $date = date("Y-m-d", strtotime($request->sports_date));
        $dates = Event::select(DB::raw('DATE(play_time) as date'))
                        ->whereDate('play_time', '=', date('Y-m-d', strtotime($date)))
                        ->first();

        $sports_category_list = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->take(13)->get();
        $event_list = $this->event_model->play_event_date_wise($date);

        return view('web.sports_date_wise', compact('sports_category_list', 'dates', 'event_list'));     
    }

    public function others_sports(){
        $from_date = date('Y-m-d', strtotime(' -7 day'));
        $to_date = date('Y-m-d', strtotime(' +7 day'));
        $dates = Event::Select('play_time')->whereBetween('play_time', [$from_date, $to_date])->get();

        $sports_category_list = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->skip(13)->take(15)->get();
            
        $event_list = $this->event_model->play_event();
       
        return view('web.others_sports', compact('sports_category_list', 'dates', 'event_list'));
    }
    
    public function match_details($id){
        $match_details = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->get();
        $event_get = $this->event_model->play_event_get($id);
        //      echo "<pre>";
        // print_r($event_get);exit;
        return view('web.match_details', compact('event_get'));
    }
    public function entertainment(){
        return view('web.entertainment');
    }
    public function health_tips(){
        return view('web.health_tips');
    }
    public function contact(){
        return view('web.contact');
    }
    public function privacy_policy(){
        return view('web.privacy_policy');
    }
    public function terms_of_service(){
        return view('web.terms_of_service');
    }

    public function contact_save(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'email'  => ['required'],
        ]);
    
        $contact_data = new Contact();
        $contact_data->name = $request->name;
        $contact_data->email = $request->email;
        $contact_data->message = $request->message;

        $save =  $contact_data->save();

        if($save){
            return redirect()->route('contact')->with('flash.message', 'Send Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('contact')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }

    }
}
