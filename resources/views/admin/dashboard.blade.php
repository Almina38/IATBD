<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body text-center">
                        <p class="welcome-message">Welcome Admin {{ Auth::user()->name }}!</p>

                        <!-- Gebruikers beheren sectie -->
                        <div class="user-management mb-5 mt-5">
                            <h3>Gebruikers Beheren</h3>
                            @foreach ($users as $user)
                                @if ($user->email !== 'admin@passenopjedier.nl')
                                    <div class="user-item mb-3">
                                        <span class="user-email">{{ $user->email }}</span>
                                        @if (!$user->blocked)
                                            <form action="{{ route('admin.users.block', ['id' => $user->id]) }}" method="POST" class="user-action-form">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Blokkeren</button>
                                            </form>
                                        @else
                                            <span class="text-danger">Geblokkeerd</span>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Oppasaanvragen beheren sectie -->
                        <div class="request-management mt-5 mb-5">
                            <h3>Oppasaanvragen Beheren</h3>
                            @foreach ($requests as $request)
                                <div class="request-item mb-3">
                                    @if ($request->pet && $request->pet->owner)
                                        <span class="request-email">{{ $request->pet->owner->email }} - {{ $request->pet->name }}</span>
                                    @else
                                        <span class="text-danger">Eigenaar niet gevonden</span>
                                    @endif
                                    <form action="{{ route('admin.requests.delete', ['id' => $request->id]) }}" method="POST" class="request-action-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Verwijderen</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <!-- Voeg hier andere inhoud van je admin dashboard toe -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
