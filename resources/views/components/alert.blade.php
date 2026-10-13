@props(['tipe' => 'info'])

<div style="padding: 10px; margin: 10px 0; border: 1px solid #999;">
    <strong>{{ strtoupper($tipe) }}:</strong>
    {{ $slot }}
</div>
