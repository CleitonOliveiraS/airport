<?php

namespace App\Http\Controllers\Panel;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
    
    private $city;
    private $state;
    private $totalPage = 2;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function index($initials)
    {
        $state = State::where('initials', $initials)->get()->first();
        if (!$state){
            return redirect()->back();
        }

        $cities = $state->cities()->paginate($this->totalPage);
        $title = "Cidades do estado {$state->name}";
        return view('panel.cities.index', compact('title', 'cities', 'state'));
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
        //
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

    public function search(Request $request, $initials)
    {
        $state = State::where('initials', $initials)->get()->first();
        if (!$state){
            return redirect()->back();
        }

        $dataForm = $request->all();
        $keySearch = $request->key_search;
        if(!$keySearch){
            return redirect()->route('state.cities.index');
        }
        $cities = $state->searchCities($keySearch, $this->totalPage);
        $title = "Filtro: Cidades do Estado: {$state->name}";
        return view('panel.cities.index', compact('title', 'state','cities', 'dataForm'));
    }

}
