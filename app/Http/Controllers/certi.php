<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;
use App\ParentEventTable as PET;
use App\EventTable as ET;
use App\Winners as W;
use App\Participant as Participant;
use App\OrganizationCommittee as OrganizationCommittee;
use App\map_winner_eevents as map_winner_eevents;
use App\map_organization_eevents as map_organization_eevents;
use App\map_participant_eevents as map_participant_eevents;


use Carbon\Carbon;

class certi extends Controller
{
    public function home(){
        
        return view('home');
    }

    public function issue(){
    
        $drop_down = DB::table('parent_event')->pluck('event_name');

        return view('issue', ['drop_down_fetched_from_DB' => $drop_down]);
    }

    // public function create()
    // {
    //     echo("haha created");
    // }

    public function store(Request $request)
    {
        $event_name                     = $request->event_name;
        $event_description              = $request->event_description;
        $created_for                    = $request->created_for;
        $created_by_id                  = $request->created_by_id;
        $issuingOrganizationName        = $request->organization;

        $firstHigherDignity             =  $request->firstHigherDignity;
        
        if($request->secondHigherDignity != null){
            $secondHigherDignity         = $request->secondHigherDignity;
        }
        if($request->thirdHigherDignity != null){
            $thirdHigherDignity         = $request->thirdHigherDignity;
        }


        $fetch_row_count = ET::count();
        $parent_event_id = PET::where('event_name',$created_for)->pluck('all_events_id');
        $parent_event_id = $parent_event_id[0];
        $mytime = Carbon::now('Asia/Colombo');
        $mytime->toDateTimeString();

        DB::table('events')->insert(array(
            'eevent_id'=> $fetch_row_count +1,
            'event_name'=> $event_name,
            'event_desc'=> $event_description,
            'created_at'=> $mytime,
            'created_for'=> $created_for,
            'all_events_id'=> $parent_event_id,
            'e_id'=> $created_by_id,
            )
        );


        // Store Winners
        if($request->winnerCSV != null){
            $winnerCSV                      = $request->file('winnerCSV');
            $csvData = file_get_contents($winnerCSV);
            $rows = array_map('str_getcsv', explode("\n",$csvData));
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $row = array_combine($header, $row);
                $addWinner = new W();
                $addWinner->winner_id = W::count()+1;
                $addWinner->certi = '';
                $addWinner->certi_id = W::count()+1;
                $addWinner->uid = $row['student-id'];
                $addWinner->position = $row['position'];
                $addWinner->save();

                $addmapping = new map_winner_eevents();
                $addmapping->winner_id = W::count();
                $addmapping->eevent_id = ET::count();
                $addmapping->save();
            }
            
        }
        if($request->oragnizationCommitteeCSV != null){
            $oragnizationCommitteeCSV      = $request->file('oragnizationCommitteeCSV');
            $csvData = file_get_contents($oragnizationCommitteeCSV);
            $rows = array_map('str_getcsv', explode("\n",$csvData));
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $row = array_combine($header, $row);

                $addOrganizationCommittee = new OrganizationCommittee();
                $addOrganizationCommittee->committee_id  = OrganizationCommittee::count()+1;
                $addOrganizationCommittee->certi = '';
                $addOrganizationCommittee->certi_id = OrganizationCommittee::count()+1;
                $addOrganizationCommittee->uid = $row['student-id'];
                $addOrganizationCommittee->save();

                $addmapping = new map_organization_eevents();
                $addmapping->committee_id  = OrganizationCommittee::count();
                $addmapping->eevent_id = ET::count();
                $addmapping->save();
            }
            
        }

        $participateCSV        = $request->file('participateCSV');
        $csvData = file_get_contents($participateCSV);
        $rows = array_map('str_getcsv', explode("\n",$csvData));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            $row = array_combine($header, $row);

            $addParticipant = new Participant();
            $addParticipant->participant_id  = Participant::count()+1;
            $addParticipant->certi = '';
            $addParticipant->certi_id = Participant::count()+1;
            $addParticipant->uid = $row['student-id'];
            $addParticipant->save();

            $addmapping = new map_participant_eevents();
            $addmapping->participant_id  = Participant::count();
            $addmapping->eevent_id = ET::count();
            $addmapping->save();
        }
        
        
        

        return redirect()->route('home')
        ->with('success','E-CERTI CREATED !');
        // echo($mytime->toDateTimeString());
    }

    public function createParentEventGet(Request $request)
    {
        
        return view('createParentEvent');
    }

    public function createParentEventPost(Request $request)
    {
        // $parent_event_name                     = $_POST['parent_event_name'];
        // $parent_event_name                     = Input::get('parent_background');

        $parent_event_name                     = $request->parent_event_name;

        // $parent_event_description              = $_POST['parent_event_description'];
        // $parent_event_description                     = Input::get('parent_event_description');
        $parent_event_description                     = $request->parent_event_description;
        
        if($request->parent_background != null){
            // $file_name = $parent_background->getClientOriginalName();
            // $mime_type = $parent_background->getMimeType();
            // $size = $parent_background->getSize();

            $parent_background                   = $request->file('parent_background');
            $parent_background = base64_encode(file_get_contents($parent_background->getRealPath()));
        }
        else{
            $parent_background                   = '';
        }

        if($request->parent_logo != null){
            // $parent_logo                           =  $request->getRemote(Input::file('logo')->getRealPath()); 
            $parent_logo                   = $request->file('parent_logo');
            $parent_logo = base64_encode(file_get_contents($parent_logo->getRealPath()));
        }
        else{
            $parent_logo                   = '';
        }
        
    
        
        // $add = new PET();
        // $fetch_row_count = DB::('parent_event')->where()
        $fetch_row_count = PET::count();

        $add_new_parent_event = new PET();
        $add_new_parent_event->all_events_id = $fetch_row_count+1;
        $add_new_parent_event->event_name = $parent_event_name;
        $add_new_parent_event->event_description = $parent_event_description;
        $add_new_parent_event->logo = $parent_logo;
        $add_new_parent_event->background = $parent_background;
        // echo($parent_event_name);
        $add_new_parent_event->save();
        return redirect()->route('issue.get');
    }

}

