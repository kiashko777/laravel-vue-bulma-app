<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\Phonebook;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|Response|View
     */
    public function index()
    {
        return view('phonebook');
    }

    public function getData()
    {
        return Phonebook::orderBy('name', 'ASC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhonebookRequest $request
     * @return Phonebook
     */
    public function store(PhonebookRequest $request)
    {
        $pb = new Phonebook;
        $pb->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->save();
        return $pb;

    }

    /**
     * Display the specified resource.
     *
     * @param Phonebook $phonebook
     * @return void
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Phonebook $phonebook
     * @return void
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhonebookRequest $request
     * @return void
     */
    public function update(PhonebookRequest $request)
    {
        $pb =  Phonebook::find($request->id);
        $pb->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->save();
        return $pb;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Phonebook $phonebook
     * @return void
     */
    public function destroy(Phonebook $phonebook)
    {
        Phonebook::where('id',$phonebook->id)->delete();
    }
}
