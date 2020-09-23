<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{

    protected $fillable = ['brand_id', 'wty_passengers', 'class'];

    public function classes($className = null){
        $classes = [
            '' => 'Escolha uma Classe',
            'economic' => 'Economica', 
            'luxury' => 'Luxo'];
        
        if(!$className){
            return $classes;
        }

        return $classes[$className];

    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function search($keySearch, $totalPage){
        return $this->where('id', $keySearch)
                    ->orWhere('wty_passengers', $keySearch)
                    ->orWhere('class', 'LIKE', "%{$keySearch}%")
                    ->paginate($totalPage);
    }
}
