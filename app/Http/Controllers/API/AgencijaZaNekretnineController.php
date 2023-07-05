<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AgencijaZaNekretnine;
use Illuminate\Http\Request;
use App\Http\Resources\AgencijaZaNekretnineResource;
use Illuminate\Support\Facades\Validator;

class AgencijaZaNekretnineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencije = AgencijaZaNekretnine::all();
         return AgencijaZaNekretnineResource::collection($agencije);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
         'naziv' => 'required|string',
         'adresa' => 'required|string',
         'email' => 'required|email',
         'website' => 'required|string',
         'brojTelefona' => 'required|string',
       ]);

       if ($validator->fails()) {
             return response()->json(['Greska pri validaciji!', $validator->errors()]);
     }

         $agencijanekretnine = AgencijaZaNekretnine::create([
                'naziv' => $request->naziv,
                'adresa' => $request->adresa,
                'email' => $request->email,
                'website' => $request->website,
                'brojTelefona' => $request->brojTelefona
             ]);

         return response()->json(['Agencija je dodata!.', new AgencijaZaNekretnineResource($agencijanekretnine)]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgencijaZaNekretnine  $agencijaZaNekretnine
     * @return \Illuminate\Http\Response
     */
   +



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgencijaZaNekretnine  $agencijaZaNekretnine
     * @return \Illuminate\Http\Response
     */
    public function edit(AgencijaZaNekretnine $agencijaZaNekretnine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgencijaZaNekretnine  $agencijaZaNekretnine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgencijaZaNekretnine $agencijaZaNekretnine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgencijaZaNekretnine  $agencijaZaNekretnine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencija = AgencijaZaNekretnine::find($id);
         if ($agencija) {
         $agencija->delete();
         return response()->json(['Uspesno ste obrisali agenciju!', new AgencijaZaNekretnineResource($agencija)]);
          }
         else {
         return response()->json('Agencija koju zelite da obrisete ne postoji u bazi!');
          }
    }
}
