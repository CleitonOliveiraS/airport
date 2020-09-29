<?php

namespace App\Http\Controllers\Panel;

use App\Models\Airport;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirportController extends Controller
{

    private $airport;
    private $city;
    private $totalPage = 2;

    public function  __construct(City $city, Airport $airport){
        $this->city = $city;
        $this->airport = $airport;
    }

    public function index(City $city)
    {
        if (!$city){
            return redirect()->back();
        }

        $title = "Aeroportos da cidade {$city->name}";
        $airports = $city->airports()->paginate($this->totalPage);
        return view('panel.airports.index', compact('city', 'title', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        if (!$city){
            return redirect()->back();
        }

        $title = "Cadastrar novo aeroporto na cidade {$city->name}";
        $airports = null;
        $cities = $this->city->pluck('name', 'id');
        return view('panel.airports.create', compact('city', 'title', 'cities', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
//        $dataForm = $request->all();
//
//        $insert = $this->brand->create($dataForm);
//
//        if($insert){
//            return redirect()->route('brands.index')->with('success', 'Cadastro realizado com sucesso!');
//        }else{
//            return redirect()->back()->with('error', 'Falha ao cadastrar!');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(City $city){
        //
    }
}
