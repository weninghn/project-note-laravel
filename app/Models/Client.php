<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timestamp = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name_client',
        'email',
        'phone',
        'address'
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
