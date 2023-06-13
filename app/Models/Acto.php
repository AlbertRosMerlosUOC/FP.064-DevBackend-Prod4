<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use App\Models\User;


    class Acto extends Model {

        protected $table = 'actos';
        protected $primaryKey = 'Id_acto';
        public $timestamps = false;

        protected $fillable = [
            'Fecha',
            'Hora',
            'Titulo',
            'Descripcion_corta',
            'Descripcion_larga',
            'Num_asistentes',
            'Id_tipo_acto',
        ];

        public function tipoActo()
        {
            return $this->belongsTo(TipoActo::class, 'Id_tipo_acto');
        }

        public function usuarios()
        {
            return $this->belongsToMany(User::class, 'personas_actos', 'Id_acto', 'Id_persona')
                        ->withPivot('Ponente');
        }
    }

