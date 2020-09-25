<?php

namespace App\Http\Controllers\Panel;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{

    private $flight;
    private $totalPages = 2;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    public function index()
    {
        $title = 'Voos Disponíveis';

        $flights = $this->flight->getItems();

        return view('panel.flights.index', compact('title', 'flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Voo';
        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');
        return view('panel.flights.create', compact('title', 'planes', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameFile = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();;

            if(!$request->image->storeAs('flights', $nameFile)){
                return redirect()->back()->with('error', 'Falha ao fazer upload!')->withInput();
            }
        }
        if($this->flight->newFlight($request, $nameFile)){
            return redirect()->route('flights.index')->with('success', 'Cadastro realizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao cadastrar!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        if(!$flight){
            return redirect()->back();
        }
        $title = "Detalhes do voo {$flight->id}";

        return view('panel.flights.show', compact('title', 'flight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        if(!$flight){
            return redirect()->back();
        }
        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');
        $title = "Editar Marca: {$flight->name}";
        return view('panel.flights.edit', compact('title', 'flight', 'planes', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        if(!$flight){
            return redirect()->back();
        }

        $nameFile = $flight->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()){

            if ($flight->image){
                $nameFile = $flight->image;
            }else{
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();;
            }

            if(!$request->image->storeAs('flights', $nameFile)){
                return redirect()->back()->with('error', 'Falha ao fazer upload!')->withInput();
            }
        }

        if($flight->updateFlight($request, $nameFile)){
            return redirect()->route('flights.index')->with('success', 'Sucesso ao atualizar!');
        }else{
            return redirect()->back()->with('error', 'Falha ao atulizar!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        if(!$flight){
            return redirect()->back();
        }
        if($flight->delete()){
            return redirect()->route('flights.index')->with('success', 'Deletado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
    }

    public function search(){

    }
}
