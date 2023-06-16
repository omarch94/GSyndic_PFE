@extends('adminlte::page')
{{-- @extends('layouts.app') --}}
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        
        <div class="container">
            <div class="py-4">
                <h1 class="text-2xl">Video Chat Application</h1>
            </div>

            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-5">
                        <form method="post" action="{{ route('validateMeeting') }}">
                          {{ csrf_field() }}
                          <div class="input-group mb-3">
                            <span class="input-group-text">
                              <svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 5a4 4 0 118 0 4 4 0 01-8 0zm9 0a5 5 0 11-10 0 5 5 0 0110 0zM10 13a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                <path d="M10 18a9.978 9.978 0 01-7-2.757A7.977 7.977 0 003 13a8 8 0 1116 0c0 .691-.086 1.366-.243 2.003A9.978 9.978 0 0110 18zm2.768-3.243A8.004 8.004 0 0110 15c-2.414 0-4.586-.876-6.268-2.328A7.992 7.992 0 013 13c0-2.317.878-4.389 2.318-6.268C5.74 5.877 7.813 5 10 5c2.187 0 4.26.877 5.682 2.732C17.122 8.61 17 9.289 17 10a7.99 7.99 0 01-.232 1.757z"/>
                              </svg>
                            </span>
                            <input type="text" name="meetingId" id="meetingId" class="form-control" placeholder="Meeting ID">
                            <button type="submit" class="btn btn-primary">Join Meeting</button>
                          </div>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <span class="text-uppercase font-weight-bold text-gray-400">OR</span>
                    </div>
                    <div class="col-md-2">
                        <form method="post" action="{{ route('createMeeting') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Create New Meeting</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    </body>
</html>
@endsection
