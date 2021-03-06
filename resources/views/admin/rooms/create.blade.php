@extends('admin.layouts.master')
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('messages.Create_room') }}: {{ $location->name }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <div class="m-section__content">
                                <form method="post" action="{{ route('admin.rooms.store', $location->id) }}"
                                      enctype="multipart/form-data" onsubmit="return validation()">
                                    @csrf
                                    <div class="form-group m-form__group m--margin-top-10">
                                        <div class="alert alert-danger m-alert m-alert--default" role="alert">
                                            {{ __('messages.must_fill_*') }}
                                            <br>
                                            {{ __('messages.Only_create_vi') }}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>{{ __('messages.Feature_image') }}</label>
                                        <br>
                                        <img id="is_image"
                                             src="{{ asset(config('upload.default_image')) }}"
                                             class="admin-image-500">
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="select_image" name="image"
                                                   accept="image/*">
                                            <label class="custom-file-label"
                                                   for="selectImage">{{ __('messages.Select_image') }}</label>
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>{{ __('messages.Room_name') }} <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control m-input" name="name"
                                               placeholder="{{ __('messages.Enter_room_name') }}"
                                               value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <b class="text-danger">{{ $errors->first('name') }}</b>
                                        @endif
                                        @if (session('name_used'))
                                            <b class="text-danger">{{ __('messages.Name_used') }}</b>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>{{ __('messages.List_room_number') }} <b
                                                    class="text-danger">*</b></label>
                                        <br>
                                        <div class="m_repeater">
                                            <div class="form-group  m-form__group row m_repeater">
                                                <div data-repeater-list="" class="col-lg-10">
                                                    <div data-repeater-item
                                                         class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="m-form__group m-form__group--inline">
                                                                <div class="m-form__control">
                                                                    <input type="text" name="list_room_number[]"
                                                                           class="form-control m-input">
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div data-repeater-delete=""
                                                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>{{ __('messages.Delete') }}</span>
																</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-form__group form-group row">
                                                <div class="col-lg-4">
                                                    <div data-repeater-create=""
                                                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>{{ __('messages.Add') }}</span>
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('list_room_number.*'))
                                            <b class="text-danger">{{ $errors->first('list_room_number.*') }}</b>
                                        @endif
                                        @if (session('room_number_used'))
                                            <b class="text-danger">{{ __('messages.Room_number_used') }}</b>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>{{ __('messages.Price') }}</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <input type="text" class="form-control m-input" name="price"
                                                       placeholder="{{ __('messages.Enter_price') }}"
                                                       value="{{ old('price') }}">
                                            </div>
                                            @if ($errors->has('price'))
                                                <b class="text-danger">{{ $errors->first('price') }}</b>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{ __('messages.Sale_price') }}</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <input type="text" class="form-control m-input" name="sale_price"
                                                       placeholder="{{ __('messages.Enter_sale_price') }}"
                                                       value="{{ old('sale_price') }}" id="sale_price">
                                            </div>
                                            <b class="sale_price_errors text-danger">
                                                @if ($errors->has('sale_price'))
                                                    {{ $errors->first('sale_price') }}
                                                @endif
                                            </b>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>{{ __('messages.Sale_start_at') }}</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <input type="text" class="form-control m-input my-datepicker"
                                                       value="{{ old('sale_start_at') }}" id="sale_start_at"
                                                       name="sale_start_at"
                                                       autocomplete="off">
                                            </div>
                                            <b class="sale_start_at_errors text-danger">
                                                @if ($errors->has('sale_start_at'))
                                                    {{ $errors->first('sale_start_at') }}
                                                @endif
                                            </b>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{ __('messages.Sale_price') }}</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <input type="text" class="form-control m-input my-datepicker"
                                                       value="{{ old('sale_end_at') }}" id="sale_end_at"
                                                       name="sale_end_at"
                                                       autocomplete="off">
                                            </div>
                                            <b class="sale_end_at_errors text-danger">
                                                @if ($errors->has('sale_end_at'))
                                                    {{ $errors->first('sale_end_at') }}
                                                @endif
                                            </b>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>{{ __('messages.Short_description') }} <b
                                                    class="text-danger">*</b></label>
                                        <textarea class="form-control" name="short_description"
                                                  rows="10">{{ old('short_description') }}</textarea>
                                        @if ($errors->has('short_description'))
                                            <b class="text-danger">{{ $errors->first('short_description') }}</b>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>{{ __('messages.Description') }} <b class="text-danger">*</b></label>
                                        <textarea class="form-control" name="description"
                                                  id="description">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <b class="text-danger">{{ $errors->first('description') }}</b>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group">
                                        <button class="btn btn-primary">{{ __('messages.Create') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('bower_components/bower/admin/custom/js/room.js') }}"></script>
@endsection

