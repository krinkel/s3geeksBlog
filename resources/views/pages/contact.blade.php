@extends('layouts.default')

@section('pageTitle')Contact Me @endsection
@section('pageDescription')Have questions? I have answers. @endsection
@section('pageImage'){{ asset('themes/clean_blog/img/contact-bg.jpg') }} @endsection
@section('header') @include('partials.header') @endsection

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>

        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="{{ route('sendMessage') }}" method="post" name="sentMessage" id="contactForm" novalidate>
            @csrf
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subject" id="name" required data-validation-required-message="Please enter message subject.">
                    <p class="help-block text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Message</label>
                    <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message.">{{ old('message') }}</textarea>
                    <p class="help-block text-danger">{{ $errors->has('message') ? $errors->first('message') : '' }}</p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
        </form>
    </div>
@endsection