<?php

namespace App\Http\Requests\RoadName;

use App\Models\RoadName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoadNameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $ward = $this->get('ward');
        $roadCode = $this->get('road_code');
        $roadName = $this->get('road_name');

        $rule = [
            'ward' => 'required',
            'road_name' => 'required|max:100',
            'road_code' => [
                'required',
                Rule::unique('road_names')->where(function ($query) use ($ward, $roadCode) {
                    return $query->where('ward', $ward)
                        ->where('road_code', $roadCode);
                }),
            ]
        ];

        if ($this->routeIs('road-names.update')) {
//            $rule['road_code'] = [
//                'max:3',
//                'min:3',
//                function ($attribute, $value, $fail) use ($ward, $roadCode, $roadName) {
//                    $query = RoadName::where('road_code', $roadCode)->where('ward', $ward);
//                    $row = $query->first();
//                    if ($query->count() > 0 && $row->road_name == $roadName) {
//                        $fail('The :attribute must be unique');
//                    }
//                },
//            ];

            $rule = [
                'road_name' => 'max:100',
                'road_code' => [
                    'max:3',
                    'min:3',
                    function ($attribute, $value, $fail) use ($ward, $roadCode, $roadName) {
                        $query = RoadName::where('road_code', $roadCode)->where('ward', $ward);
                        $row = $query->first();
                        if ($query->count() > 0 && $row->road_name == $roadName) {
                            $fail('The :attribute must be unique');
                        }
                    },
                ]
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return
            [
                'road_code.required' => 'Road code is required',
                'road_code.unique' => 'Road code already taken',
            ];
    }

}
