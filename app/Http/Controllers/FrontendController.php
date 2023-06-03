<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $event = $data['event'];

            $event =  Event::create([
                'name' => $event
            ]);
            return redirect('/events/details/' . $event->id)->with('flash_message_success', 'Evènement créé avec succès!');
        }
        return view('index');
    }
    public function events(Request $request)
    {
        $events = Event::orderBy('created_at', 'DESC')->get();
        return view('events.show', compact('events'));
    }
    public function detailsEvent(Request $request, $idEvent)
    {
        $event = Event::where(['id' => $idEvent])->first();

        return view('events.details')->with(compact('event'));
    }

    public function addParticipant(Request $request, $idEvent)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $telephone = $data['telephone'];
            $sexe = $data['sexe'];

            Participant::create([
                'first_name' => $firstname,
                'last_name' => $lastname,
                'email' => $email,
                'telephone' => $telephone,
                'sexe' => $sexe,
                'event_id' => $idEvent,
            ]);
            return redirect()->back()->with('flash_message_success', 'Participant ajouté avec succès!');
        }
    }

    public function editParticipant(Request $request, $idParticipant)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $telephone = $data['telephone'];
            $sexe = $data['sexe'];

            Participant::where(['id' => $idParticipant])->update([
                'first_name' => $firstname,
                'last_name' => $lastname,
                'email' => $email,
                'telephone' => $telephone,
                'sexe' => $sexe
            ]);
            return redirect()->back()->with('flash_message_success', 'Participant modifié avec succès!');
        }
    }
}
