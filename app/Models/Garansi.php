<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garansi extends Model
{
    use HasFactory;
    protected $table = 'garansi';
    public $timestamp = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'project_id',
        'client_id',
        'start_project',
        'end_project',
        'start_garansi',
        'end_garansi',
        // 'file'
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
