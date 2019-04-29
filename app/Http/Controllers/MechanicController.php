<?php

namespace App\Http\Controllers;

use App\Mechanic;
use Auth;
use Illuminate\Http\Request;
use PDF;
use Response;
use Validator;

class MechanicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $collection = Mechanic::where('author', Auth::id())->get()->sortBy('surname');

        // $collection = Mechanic::orderBy('surname')
        //                         ->orderBy('name')
        //                         ->get();

        //return view('mechanic.index', ['collection' => $collection]);
        return view('mechanic.index', compact('collection'));
    }

    public function create()
    {
        return view('mechanic.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'min:3', 'max:64'],
                'surname' => ['required', 'min:3', 'max:64'],
                'photo' => ['sometimes', 'required', 'max:20000', 'mimes:jpg,png,jpeg'],
            ],
            [
                'name.required' => 'Name is required',
                'surname.required' => 'Surname is required',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('mechanic.create')->withErrors($validator);
        }

        $file = $request->file('photo') ?? false;
        if ($file) {
            $photo = basename($file->getClientOriginalName()); // failo vardas
            $file->move(public_path('/img'), $photo);
        }

        $mechanic = new Mechanic;
        $mechanic->name = $request->name;
        $mechanic->surname = $request->surname;
        $mechanic->author = Auth::id();
        if (isset($photo)) {
            $mechanic->photo = $photo;
        }
        $mechanic->save();

        return redirect()->route('mechanic.index')->with('success_message', 'Mechanic ' . $mechanic->name . ' ' . $mechanic->surname . ' was created!');
    }

    public function show(Mechanic $mechanic)
    {
        //
    }

    public function edit(Mechanic $mechanic)
    {

        if ($mechanic->author != Auth::id()) {
            abort(403); //kad neuhakintu
        }

        return view('mechanic.edit', ['mechanic' => $mechanic]);
    }

    public function update(Request $request, Mechanic $mechanic)
    {
        {

            if ($mechanic->author != Auth::id()) {
                abort(403); //kad neuzhakintu

            }
            $validator = Validator::make($request->all(),
                [
                    'name' => ['required', 'min:3', 'max:64'],
                    'surname' => ['required', 'min:3', 'max:64'],
                ],
                [
                    'name.required' => 'Name is required',
                    'surname.required' => 'Surname is required',
                ]
            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->route('mechanic.edit')->withErrors($validator);
            }

            $file = $request->file('photo') ?? false;
            if ($file) {
                $photo = basename($file->getClientOriginalName()); // failo vardas
                $file->move(public_path('/img'), $photo);
            }

            $mechanic->name = $request->name;
            $mechanic->surname = $request->surname;
            if ($file) {
                $mechanic->photo = $photo;
            }
            $mechanic->save();

            return redirect()->route('mechanic.index')->with('success_message', 'Mechanic ' . $mechanic->name . ' ' . $mechanic->surname . ' was updated!');
        }}

    public function destroy(Mechanic $mechanic)
    {
        $trucksCount = $mechanic->ShowTrucks->count();

        if ($trucksCount == 0) {
            $mechanic->delete();
            return redirect()->route('mechanic.index')->with('success_message', 'Mechanic ' . $mechanic->name . ' ' . $mechanic->surname . ' was deleted!');
        }

        return redirect()->route('mechanic.index')->with('info_message', 'Mechanic ' . $mechanic->name . ' ' . $mechanic->surname . ' has ' . $trucksCount . ' truck(s)!');
    }

    public function pdf(Mechanic $mechanic)
    {
        $pdf = PDF::loadView('mechanic.pdf', ['mechanic' => $mechanic]);
        return $pdf->download('mechanic_profile_id_' . $mechanic->id . '.pdf');
    }

    public function download(Mechanic $mechanic)
    {

        $file_path = public_path('img/');

        $file = $file_path . $mechanic->photo;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $mechanic->photo . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file)); //Absolute URL

        return file_get_contents($file); //Absolute URL
    }

    public function filter()
    {
        return view('mechanic.filter');
    }

    public function getFilter(Request $request)
    {
        $id = $request->id;
        $mechanic = Mechanic::where('id', $id)->first();

        if (!$mechanic) {
            $trucks = [];
        } else {
            $trucks = $mechanic->ShowTrucks;
        }

        return Response::json([
            'message' => 'Siunciame jumi furas',
            'trucks' => $trucks,
        ], 200);

    }

}
