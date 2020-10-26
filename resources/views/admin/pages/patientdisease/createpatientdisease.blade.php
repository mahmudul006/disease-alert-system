@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Patient Diease </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Input Patient Disease details
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" action="{{ route('patientdisease.store')}}" method="post">
                    @csrf
                    <div class="kt-portlet__body">


                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Select Patient</label>
                            <div class="col-10">
                                <select class="form-control" name="patient_id" id="exampleSelectd">
                                    <option value="0">Select Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{$patient->id}}">{{ $patient->patient_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Select Disease</label>
                            <div class="col-10">
                                <select class="form-control" name="disease_id" id="exampleSelectd">
                                    <option value="0">Select Disease</option>
                                    @foreach($diseases as $disease)
                                        <option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Select Location</label>
                            <div class="col-10">
                                <select class="form-control" name="location_id" id="exampleSelectd">
                                    <option value="0">Select Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Select Season</label>
                            <div class="col-10">
                                <select class="form-control" name="season_id" id="exampleSelectd">
                                    <option value="0">Select Season</option>
                                    @foreach($seasons as $season)
                                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--end::Portlet-->


        </div>

        <!-- end:: Content -->
    </div>
@endsection

