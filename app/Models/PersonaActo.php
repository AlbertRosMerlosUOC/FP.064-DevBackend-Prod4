<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PersonaActo extends Model {

        protected $table = 'personas_actos';
        protected $primaryKey = ['Id_acto', 'Id_persona'];
        public $timestamps = false;

        protected $fillable = [
            'Ponente',
        ];

        public function persona() {
            return $this->belongsTo(User::class, 'Id_persona');
        }

        public function acto() {
            return $this->belongsTo(Actp::class, 'Id_acto');
        }
    }

