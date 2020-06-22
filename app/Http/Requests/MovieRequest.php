<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Package\Movie\Domain\FormRequest\MovieRequestInterface;

class MovieRequest extends FormRequest implements MovieRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getMovieName(): string
    {
        return $this->input( 'movie_name' );
    }

    public function getStartDate(): string
    {
        return $this->input( 'start_date' );
    }

    public function getEndDate(): string
    {
        return $this->input( 'end_date' );
    }

    public function getDescription(): string
    {
        return $this->input( 'description' );
    }
}
