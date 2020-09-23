<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreUpdateFormRequest;
use App\Models\Brand;


class BrandController extends Controller
{
    private $brand;
    protected $totalPage = 2;
    
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $title = 'Marcas de Aviões';
        $brands = $this->brand->paginate($this->totalPage);
        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Avião';
        return view('panel.brands.create_edit', compact('title'));
    }

    public function store(BrandStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->brand->create($dataForm);

        if($insert){
            return redirect()->route('brands.index')->with('success', 'Cadastro realizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao cadastrar!');
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
        $brand = $this->brand->find($id);
        if(!$brand){
            return redirect()->back();
        }
        $title = "Detalhes da Marca: {$brand->name}";
        return view('panel.brands.show', compact('title', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        if(!$brand){
            return redirect()->back();
        }
        $title = "Editar Marca: {$brand->name}";
        return view('panel.brands.create_edit', compact('title', 'brand'));
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
        $brand = $this->brand->find($id);
        if(!$brand){
            return redirect()->back();
        }

        $update = $brand->update($request->all());

        if($update){
            return redirect()->route('brands.index')->with('success', 'Edição realizada com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao cadastrar!');
        }
    }

    public function destroy(Brand $brand)
    {
        if(!$brand){
            return redirect()->back();
        }
        if($brand->delete()){
            return redirect()->route('brands.index')->with('success', 'Deletado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
        
    }

    public function search(Request $request){
        $dataForm = $request->except('_token');
        $brands = $this->brand->search($request->key_search, $this->totalPage);
        $title = "Brands, filtros para: {$request->key_search}";
        return view('panel.brands.index', compact('title', 'brands', 'dataForm'));
    }
}