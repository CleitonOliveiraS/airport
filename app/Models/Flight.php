<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'plane_id',
        'airport_origin_id',
        'airport_destination_id',
        'date',
        'time_duration',
        'hour_output',
        'arrival_time',
        'old_price',
        'price',
        'total_plots',
        'is_promotion',
        'image',
        'qty_stops',
        'description',
    ];

    public function newFlight($request, $nameFile = ''){
        $data = $request->all();
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateFlight($request, $nameFile = ''){
        $data = $request->all();
        $data['image'] = $nameFile;
        return $this->update($data);
    }

    public function getItems(){
        return $this->with(['origin', 'destination'])->paginate($this->totalPages);
    }

    public function origin(){
        return $this->belongsTo(Airport::class, 'airport_origin_id');
    }

    public function destination(){
        return $this->belongsTo(Airport::class, 'airport_destination_id');
    }

//    public function getDateAttribute($value){
//        return Carbon::parse($value)->format('d/m/Y');
//    }

}
