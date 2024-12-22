<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuans extends Model
{
    use HasFactory;

    protected $table = 'temuanproyek'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_agenda',
        'temuan',
        'file_dokumen_temuan',
        'keterangan'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function agenda()
    {
        return $this->belongsTo(Agendas::class, 'id_agenda', 'id');
    }
    
    public function createdBy()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function proyek()
    {
        // Relasi Temuans ke Agendas (bisa menggunakan 'id_proyek' sebagai foreign key)
        return $this->belongsTo(Agendas::class, 'id_proyek', 'id');
    }
}
