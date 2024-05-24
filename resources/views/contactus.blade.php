@extends('layouts.app')

@section('content')
@vite(['resources/css/contactus.css']) <!-- Link the CSS file using Vite -->
<div class="contactus-page">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Lorem ipsum dolor sit amet consectetur. Pulvinar enim bibendum lorem in enim nibh enim neque. Nunc sit lorem bibendum in morbi urna mauris. Posuere.</p>
        
        <div class="contact-container">
            <div class="contact-info">
                <div class="info-item">
                    <img src="/assets/images/location-icon.png" alt="Location Icon" class="icon">
                    <div>
                        <h3>Address</h3>
                        <p>Yayasan Dakwah Islamiah Malaysia (YADIM)<br>
                        Aras 3 & 4, Blok D, Kompleks Islam Putrajaya, No.3, Jalan Tun Razak, Presint 3, 62100 Putrajaya</p>
                    </div>
                </div>
                <div class="info-item">
                    <img src="/assets/images/phone-icon.png" alt="Phone Icon" class="icon">
                    <div>
                        <h3>Phone</h3>
                        <p>Mobile: +603-88703870</p>
                    </div>
                </div>
                <div class="info-item">
                    <img src="/assets/images/time-icon.png" alt="Time Icon" class="icon">
                    <div>
                        <h3>Working Time</h3>
                        <p>Monday-Friday: 9:00 - 17:00</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form>
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" id="name" name="name" placeholder="Abc">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Abc@def.com">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="This is an optional">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Hi! I'd like to ask about"></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
