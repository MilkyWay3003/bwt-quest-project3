<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRegistrationDataRequest;
use App\Http\Requests\ParticipantAdditionalInfoRequest;
use App\Models\Countries;
use App\Models\Participant;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Config;


class ParticipantController extends Controller
{

    private function checkForm()
    {
        $id = session('created', false);

        if ($id) {
            return view('participant-update', compact('id'));
        }

        return view('participant-create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        $members = Participant::all();
        return view('allmembers', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->checkForm();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ParticipantRegistrationDataRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRegistrationDataRequest $request)
    {
        try {
            $participant = Participant::create($request->all());
            $id = $participant->id;
            session(['created' => $id]);
        } catch (\Exception $e) {
            return response($e);
        }

        return view('forms.update-form', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ParticipantAdditionalInfoRequest $request
     * @param  \App\Participant $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantAdditionalInfoRequest $request, $id)
    {
        try {
            $participant = Participant::findOrFail($id);
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = $id . '.' . $extension;
                $path = '/images/' . $filename;
                Image::make($file->getRealPath())->resize(200, 200)->save(public_path() . $path);
            } else {
                $path = Config::get('image_path');
            }

            $updateData = $request->all();
            $updateData['photo'] = $path;
            $participant->update($updateData);

        } catch (\Exception $e) {
            return response($e);
        }

        session()->forget('created');
        return view('socials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
