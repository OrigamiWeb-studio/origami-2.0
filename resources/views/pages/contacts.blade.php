@extends('layouts.app')

@section('content')

    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}">{{ __('Contacts') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="s_contacts">
            <div class="container">
                <header>
                    <h1>Contacts</h1>
                </header>
                <div class="map-wrapper">
                    <div id="map" class="map"></div>
                    <address>
                        <strong>Origami Web Studio</strong>
                        <span>2 Suvorova Street, Kamianets-Podilskyi, Ukraine, Stolovka</span>
                    </address>
                </div>
                <div class="our-contacts">
                    <h2>Let's do this</h2>
                    <ul>
                        <li>
                            <strong>Skype</strong>
                            <a href="#">origamiwebstudio</a>
                        </li>
                        <li>
                            <strong>Email</strong>
                            <a href="#">info@origami.team</a>
                        </li>
                        <li>
                            <strong>Phone number</strong>
                            <span>+380 (96) 724 28 23</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-submit" data-toggle="modal" data-target="#contact-modal">We will contact you</a>
                </div>
        </section>
    </main>

    <div class="modal fade contact-modal" id="contact-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4 class="modal-title">Start a project</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" id="contact_name">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" name="email" id="contact_email">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Phone number" name="number" id="contact_number">
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="contact_details" rows="4" placeholder="Project details"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-submit" value="Send request">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop