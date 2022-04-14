@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registration_form" onsubmit="return validationForm()" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome ristorante *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                {{-- error js --}}
                                <div id="user_input_name" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo *</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                {{-- error js --}}
                                <div id="user_input_address" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita iva *</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}"  oninput="validateNumbers(this)" maxlength="11"/>

                                {{-- error js --}}
                                <div id="user_input_piva" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Telefono *</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" oninput="validateNumbers(this)" minlength="9" maxlength="11"/>

                                {{-- error js --}}
                                <div id="user_input_telephone" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping" class="col-md-4 col-form-label text-md-right">Costi di consegna</label>

                            <div class="col-md-6">
                                <input id="shipping" type="number" class="form-control @error('shipping') is-invalid @enderror" name="shipping" value="{{ old('shipping') }}" step="0.10" min="0.90" max="99.90"/>

                                {{-- error js --}}
                                <div id="user_input_shipping" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('shipping')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_price" class="col-md-4 col-form-label text-md-right">Ordine minimo</label>

                            <div class="col-md-6">
                                <input id="min_price" type="number" class="form-control @error('min_price') is-invalid @enderror" name="min_price" value="{{ old('min_price') }}" step="0.1" min="0.90" max="99.90"/>

                                {{-- error js --}}
                                <div id="user_input_min_price" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('min_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                {{-- error js --}}
                                <div id="user_input_email" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                {{-- error js --}}
                                <div id="user_input_password" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma password') }} *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group mb-3 text-center">
                            <img src="" alt="" class="w-50 my-3 my_image d-inline">
                            <label class="d-block" for="inputGroupFile02"
                                aria-describedby="inputGroupFileAddon02">Scegli immagine * </label>
                            <input type="file" id="inputGroupFile02" name="image"
                                class="@error('image') is-invalid @enderror" onchange="previewUpload(event)">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row px-5 my-4 d-flex justify-content-center">
                            <span>Scegli categoria *</span>
                            <div class="categories text-center">
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$category->slug}}"
                                            value="{{$category->id}}" name="categories[]" @if (in_array($category->id, old('categories', []))) checked @endif>
                                        <label class="form-check-label" for="{{$category->slug}}">{{$category->name}}</label>
                                    </div>
                                @endforeach
                            </div>

                            {{-- error js --}}
                            <div id="user_input_categories" class="error_js d-none"></div>
                            {{-- error laravel --}}
                            @error('categories')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <button type="submit" class="my_btn btn btn-primary" id="registration_submit">
                                Registrati
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
