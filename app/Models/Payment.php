<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    public $timestamp = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'project_id',
        // 'name_project',
        // 'price',
        'date',
        'amount_payment',
        'ket',
        'status'
    ];

    protected $appends = [
        'status_text',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function getStatusTextAttribute() {
        $status_array = [
            'Belum Lunas',
            'Lunas'
        ];
        return $status_array[$this->status];
    }

    public function remainingAmount()
    {
        $total = $this->total;
        $total_paid = $this->payments()->sum('amount_payment');

        return $total - $total_paid;
    }
}
