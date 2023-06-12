<?php
    
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class TipoActo extends Model {
        protected $table = 'tipo_acto';
        
        protected $primaryKey = 'Id_tipo_acto';
        
        public $timestamps = false;
        
        protected $fillable = ['Descripcion'];
    }
    
