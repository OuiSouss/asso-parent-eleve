<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Contribution;
use App\Http\Requests\StoreAdherent;
use App\User;

class AdherentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents = Adherent::all();
        return view('admin.adherents.index', ['page_title' => 'Liste des adhérents', 'adherents' => $adherents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adherent = new Adherent();
        $contributions = Contribution::all();
        return view('admin.adherents.form', ['page_title' => 'Nouvel adhérent', 'adherent' => $adherent, 'contributions' => $contributions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdherent $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdherent $request)
    {
        // Create user
        $email = $request->get('email');
        $password = bcrypt(str_random(10));
        $user = User::create(['email' => $email, 'password' => $password]);

        // Create adherent
        $request->replace($request->except('email'));
        $request->merge(['user_id' => $user->id]);
        $adherent = Adherent::create($request->all());

        // Send email
        $passwordBroker = app('auth.password.broker');
        $token = $passwordBroker->createToken($user);
        $adherent->sendAccountActivationEmail($token);

        return redirect()->route('admin.adherents.show', $adherent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adherent $adherent
     * @return \Illuminate\Http\Response
     */
    public function show(Adherent $adherent)
    {
        return view('admin.adherents.show', ['page_title' => 'Informations sur l\'adhérent', 'adherent' => $adherent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adherent = Adherent::find($id);
        $contributions = Contribution::all();
        return view('admin.adherents.form', ['page_title' => 'Nouvel adhérent', 'adherent' => $adherent, 'contributions' => $contributions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdherent $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdherent $request, $id)
    {
        $adherent = Adherent::find($id);
        $user = User::find($adherent->user_id);
        $adherent->update($request->except('email'));

        $email = ['email' => $request->get('email')];
        $user->update($email);

        return redirect()->route('admin.adherents.show', $adherent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adherent = Adherent::findOrFail($id);

        foreach ($adherent->orders as $order) {
            $order->delete();
        }

        $adherent->user->delete();
        $adherent->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
