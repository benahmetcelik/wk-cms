@extends('backend.layouts.app')


@section('content')
    <div class="row">
        <div class="ml-2 col-lg-11">
            <h1 class="page-header"><a href="{{ route('admin.settings.index') }}">Settings</a> / {{ $group }} Settings</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editiable {{ $group }} Settings</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.settings.update') }}" method="POST" class=" user">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                            @foreach($groups as $setting)

                                        <div class="row  mt-3">
                                            <div class="col-md-3">
                                                <label for="setting_{{ $setting->id }}">{{ $setting->setting_name }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="setting[{{ $setting->id }}]"
                                                       id="setting_{{ $setting->id }}"
                                                       class="form-control form-control-user"
                                                       value="{{ $setting->setting_value }}">
                                            </div>
                                        </div>


                            @endforeach
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update Settings
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection
