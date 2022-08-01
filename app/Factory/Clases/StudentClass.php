<?php 
namespace App\Factory\Clases;

use App\Factory\Intefaces\DataInterface;
use App\Models\Enrollement;
use App\Models\EnrollementMatter;

class StudentClass  {

    public int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getData()
    {
        $enrollement = Enrollement::find($this->id);
        $year_school = $enrollement->year;
        $enrollement_matter = $enrollement->matters;
        $tempo = [];
        
        foreach($enrollement_matter as $matter) {
            $tempo_partial = [];
            $enrollement_partial = EnrollementMatter::find($matter->pivot->id);
          
            foreach($enrollement_partial->partials as $partial) {
                array_push($tempo_partial, $partial);
            }
            $data = [
                'id_pivot' => $matter->pivot->id,
                'id_matter' => $matter->id,
                'name_matter' => $matter->name,
                'partials' => $tempo_partial
            ];
            $data = (object) $data;
            
            array_push($tempo, $data);
        }

        $data = [
            'enrollement' => $enrollement, 
            'year_school' => $year_school,
            'matter_and_partial' => $tempo
        ];

        return $data;
    }
}

?>