@component('mail::message')
    # Permintaan Validasi Anggota

    Halo {{ $name }},

    Anda telah mendaftar sebagai anggota. Silakan klik tautan di bawah ini untuk melakukan validasi email.

    @component('mail::button', ['url' => $approvalLink])
        Validasi Email
    @endcomponent

    Terima kasih,<br>
    {{ config('app.name') }}
@endcomponent
