<x-layout>
    <x-slot:title>Contact</x-slot>

    <h3>Halaman Contact</h3>

    <center>
        <h1>Nama: {{ $nama }}</h1>
        <h1>Kelas: {{ $kelas }}</h1>
        <a href="{{ $linkedin }}" target="_blank">->Kunjungi LinkedIn<-</a>
        <br>
        <a href="{{ $github }}" target="_blank">->Kunjungi Repository GitHub<-</a>
    </center>
</x-layout>
