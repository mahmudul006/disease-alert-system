@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title"> Doctor </h3>
                <span class="kt-subheader__separator kt-hidden"></span>

            </div>

        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-8">

                    <!--begin:: Widgets/Daily Sales-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Create Doctor Account
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" method="post" action="{{ route('doctors.store') }}">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Enter Full Name</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="doctor_name" value="Artisanal kale" id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input class="form-control" type="email" name="doctor_email" value="bootstrap@example.com" id="example-email-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                                    <div class="col-10">
                                        <input class="form-control" type="tel" name="phone_number" value="1-(555)-555-5555" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-2 col-form-label">Password</label>
                                    <div class="col-10">
                                        <input class="form-control" type="password" name="password" value="hunter2" id="example-password-input">
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
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--end:: Widgets/Daily Sales-->
                </div>





            </div>
        </div>

        <!--End::Section-->

    </div>

    <!-- end:: Content -->
    </div>
@endsection
