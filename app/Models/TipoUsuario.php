<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class TipoUsuario extends Model
    {
        protected $table = 'tipos_usuarios';
        
        protected $primaryKey = 'Id_tipo_usuario';
        
        public $timestamps = false;
        
        protected $fillable = ['Descripcion', 'user_id'];
        
        public function user() {
            return $this->belongsTo(User::class, 'user_id');
        }
    }

