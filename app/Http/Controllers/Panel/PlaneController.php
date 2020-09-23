<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaneStoreUpdateFormRequest;
use App\Models\Brand;
use App\Models\Plane;

class PlaneController extends Controller
{
    private $plane;
    private $totalPage = 2;

    public function __construct(Plane $plane)
    {   
        $this->plane = $plane;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Aviões';
        $planes = $this->plane->paginate($this->totalPage);
        return view('panel.plane.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Avião';
        $brands = Brand::pluck('name', 'id');
        $classes = $this->plane->classes();
        return view('panel.plane.create', compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneStoreUpdateFormRequest $request)
    {
        // dd($request->all());
        $dataForm = $request->all();
        $insert = $this->plane->create($dataForm);
        if($insert){
            return redirect()->route('planes.index')->with('success', 'Sucesso ao cadastra!');
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
        $plane = $this->plane->find($id);
        if(!$plane){
            return redirect()->back();
        }
        $brands = Brand::pluck('name', 'id');
        $classes = $this->plane->classes();
        $title = "Editar avião: {$plane->id}";

        return view('panel.plane.edit', compact('plane', 'title', 'brands', 'classes'));
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
        $plane = $this->plane->find($id);
        if(!$plane){
            return redirect()->back();
        }
        $update = $plane->update($request->all());
    
        if($update){
            return redirect()->route('planes.index')->with('success', 'Sucesso ao editar!');
        }else{
            return redirect()->back()->with('error', 'Falha ao editar!')->withInput();
        }  
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

    public function search(Request $request){
        
    }

}
