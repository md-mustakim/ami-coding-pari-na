@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh;">
        <div class="card shadow m-md-3" style="min-width: 500px; max-width: 50vw;">
            <div class="card-header">
                <div class="card-title font-weight-bold h1 text-capitalize">Khoj the search Page</div>
            </div>
            <div class="card-body p-3 mx-4">
                <form action="{{ route('khoj.store') }}" method="POST">
                    @csrf

                    <div class="my-5 mx-2">
                        <label for="input_values" class="h4">Input values</label>
                        <input type="text"
                               id="input_values"
                               name="input_values"
                               value="{{ old('input_values') }}"
                               class="form-control @error('input_values') is-invalid @enderror"
                               placeholder="Add some number with coma(,) separator"
                               autofocus>
                        @error('input_values')
                        <p class="invalid-feedback" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="my-5 mx-2">
                        <label for="search_value"  class="h4">Search value</label>
                        <input type="text"
                               id="search_value"
                               name="search_value"
                               value="{{ old('search_value') }}"
                               placeholder="Search Number"
                               class="form-control @error('search_value') is-invalid @enderror"
                               autofocus>
                        @error('search_value')
                        <p class="invalid-feedback" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="my-4 d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary font-weight-bold" style="font-size: 20px">Khoj</button>
                    </div>
                    @if(Session::has('searchResult'))
                        <div class="">
                            <b>Result</b> : {{ Session::get('searchResult') }}
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
@endsection
