@extends('layouts.theme')
@section('main-content')
    <main>
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-sec">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input class="pt-2 doc-input" id="metric" type="file" required
                                                    name="metric">
                                                <i class="la la-file-photo-o">
                                                    <span class="doc-icon-color ml-1">
                                                        metric
                                                    </span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input class="pt-2 doc-input" id="intermediate" type="file" required
                                                    name="intermediate">
                                                <i class="la la-file-photo-o">
                                                    <span class="doc-icon-color ml-1">
                                                        intermediate
                                                    </span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input class="pt-2 doc-input" id="bachelors" type="file" required
                                                    name="bachelors">
                                                <i class="la la-file-photo-o">
                                                    <span class="doc-icon-color ml-1">
                                                        bachelors
                                                    </span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input class="pt-2 doc-input" id="masters" type="file" name="masters">
                                                <i class="la la-file-photo-o">
                                                    <span class="doc-icon-color ml-1">
                                                        masters
                                                    </span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input class="pt-2 doc-input" id="phd" type="file" name="phd">
                                                <i class="la la-file-photo-o">
                                                    <span class="doc-icon-color ml-1">
                                                        phd
                                                    </span>
                                                </i>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">{{ __('Register') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.doc-input').change(function() {
                $(this).siblings('i').addClass('text-success');
            });
        })

    </script>

@endsection
