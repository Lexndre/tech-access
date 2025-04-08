<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.index');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'purchase_frequency' => 'required|string',
            'accessories' => 'required|array',
        ]);

        // Création d'une nouvelle entrée dans la base de données
        $survey = Survey::create([
            'name' => $request->name,
            'email' => $request->email,
            'profession' => $request->profession,
            'it_professional' => $request->it_professional,
            'purchase_frequency' => $request->purchase_frequency,
        ]);

        // Enregistrement des réponses détaillées
        $this->saveResponses($survey, $request);

        return redirect()->route('survey.thank-you');
    }

    public function thankYou()
    {
        return view('survey.thank-you');
    }

    private function saveResponses($survey, $request)
    {
        // Accessoires
        if ($request->has('accessories')) {
            foreach ($request->accessories as $accessory) {
                SurveyResponse::create([
                    'survey_id' => $survey->id,
                    'question' => 'accessories',
                    'answer' => $accessory
                ]);
            }
        }

        // Autres réponses
        $fields = [
            'it_role', 'company_size', 'budget_monthly', 'subscription',
            'purchase_motivation', 'other_accessory', 'keyboard_type',
            'keyboard_connection', 'mouse_type', 'mouse_dpi', 'trends',
            'eco_premium', 'eco_materials', 'eco_packaging', 'eco_energy',
            'eco_longevity', 'market_opinion'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $value = $request->$field;

                // Si c'est un tableau, enregistrer chaque valeur séparément
                if (is_array($value)) {
                    foreach ($value as $item) {
                        SurveyResponse::create([
                            'survey_id' => $survey->id,
                            'question' => $field,
                            'answer' => $item
                        ]);
                    }
                } else {
                    SurveyResponse::create([
                        'survey_id' => $survey->id,
                        'question' => $field,
                        'answer' => $value
                    ]);
                }
            }
        }
    }
}
