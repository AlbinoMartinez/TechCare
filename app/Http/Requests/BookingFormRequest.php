<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_phone' => ['nullable', 'string', 'max:25'],
            'device' => ['required', 'string', 'max:100'],
            'problem' => ['required', 'string', 'max:1000'],
            'service_name' => ['required', 'string', 'max:150'],
            'location' => ['required', 'string', 'max:200'],
            'home_service_tier' => ['nullable', 'string', 'max:100'],
            'preferred_time' => ['required', 'string', 'max:100'],
            'website_hp' => ['nullable', 'max:0'], // Honeypot: must be empty
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'device.required' => 'Jenis atau merek perangkat wajib diisi.',
            'problem.required' => 'Jelaskan kendala atau kebutuhan Anda.',
            'service_name.required' => 'Pilih layanan yang dibutuhkan.',
            'location.required' => 'Lokasi Anda wajib diisi.',
            'preferred_time.required' => 'Waktu pengerjaan yang diinginkan wajib diisi.',
            'website_hp.max' => 'Spam terdeteksi.',
        ];
    }
}
