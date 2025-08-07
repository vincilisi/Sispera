<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|date',
            'plot' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png|',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo non può superare i 255 caratteri',

            'director.required' => 'Il nome del regista è obbligatorio',
            'director.string' => 'Il nome del regista deve essere una stringa',
            'director.max' => 'Il nome del regista non può superare i 255 caratteri',

            'year.required' => "L'anno di uscita è obbligatorio",
            'year.date' => "L'anno di uscita deve essere una data valida",

            'plot.required' => 'La trama è obbligatoria',
            'plot.string' => 'La trama deve essere un testo valido',

            'img.required' => "L'immagine della locandina è obbligatoria",
            'img.image' => "Il file caricato deve essere un'immagine",
            'img.mimes' => "L'immagine deve essere in formato JPG, JPEG o PNG",
        ];
    }
}
