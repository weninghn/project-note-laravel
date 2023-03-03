<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    public $timestamp = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'client_id',
        'user_id',
        'status_project',
        'name_project',
        'spk',
        'work',
        'status_note',
        'status_payment',
        'price',
        'start_project',
        'end_project',
        'start_garansi',
        'end_garansi'
    ];

    protected $appends = [
        'status_project_text',
        'status_note_text',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function garansi()
    {
        return $this->hasMany(Garansi::class);
    }

    public function getStatusProjectTextAttribute() {
        $status_array = [
            'Baru',
            'Update'
        ];

        return $status_array[$this->status_project];
    }

    public function getStatusNoteTextAttribute() {
        $status_array = [
            'PKP',
            'Tunggal'
        ];

        return $status_array[$this->status_note];
    }

    public function getStatusPaymentTextAttribute() {
        $status_array = [
            'Belum Lunas',
            'Lunas'
        ];
        return $status_array[$this->status_payment];
    }

    public function getTotalInstallmentAttribute(){
        return $this->payments->sum('amount_payment');
    }

    public function getRemainPaymentAttribute(){
        return $this->price - $this->total_installment;
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
