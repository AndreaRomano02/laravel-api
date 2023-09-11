<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['type_id', 'title', 'image', 'description', 'url'];

  public function type()
  {
    return $this->belongsTo(Type::class);
  }

  public function technologies()
  {
    return $this->belongsToMany(Technology::class);
  }



  public function getAbstract()
  {
    return substr($this->description, 0, 120) . '...';
  }

  public function getYearCreated()
  {
    return date('Y', strtotime($this->created_at));
  }

  public function getImagePath()
  {
    return asset('storage/' . $this->image);
  }
}
