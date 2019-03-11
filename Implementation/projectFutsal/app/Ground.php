<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    //
    protected $table = "grounds";
    
    protected $fillable = [
        'ground', 'image',
    ];
    
  /**
    get Image path
  */
  public function getImagePath()
  {
      if(filter_var($this->image,FILTER_VALIDATE_URL)){
          return $this->image;
      }
      else{
          return asset('uploads/grounds/'.$this->image);
      }
  }
  

}
