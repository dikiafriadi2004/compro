@extends('frontend.layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <section>
        <div class="container mt-150">
            <h2 class="mb-4">Hubungi Kami</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message">Pesan</label>
                    <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>

    </section>
@endsection
