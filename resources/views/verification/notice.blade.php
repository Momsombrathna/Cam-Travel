@extends('layouts.app-master')

@section('content')
    <br><br><br>
    <div class="bg-light p-5 rounded">
        <h1>Warning</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                A fresh verification link has been sent to your email address.
            </div>
        @endif

        Before proceeding, please check your email for a verification link. If you did not receive the email,
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0" id="button" style="display: none;">
                click here to request another 
            </button>
        </form>
    </div>
    <br><br><br><br><br><br><br><br>
    <script>
        // Get the button element by id
        var button = document.getElementById("button");

        // Get the duration from localStorage or set it to 10 seconds if not found
        var duration = localStorage.getItem("duration") || 0;

        // Update the button text every 1 second
        var timer = setInterval(function() {
            // Display the remaining time in the button text
            button.textContent = " click here " + duration + " seconds left";
            // Decrease the duration by 1 second
            duration--;
            // Save the duration in localStorage
            localStorage.setItem("duration", duration);
            // If the duration reaches zero, stop the timer and disable the button
        if (duration < 0) {
            clearInterval(timer);
            button.textContent = "After 60 seconds, you can click here to request another";
            button.disabled = true;
            // Set a timeout to enable the button after 5 seconds
            setTimeout(function() {
            button.disabled = false;
            }, 60000);
        }
        }, 1000);

        // Add an event listener to the button that resets the timer and enables the button
        button.addEventListener("click", function() {
        // Reset the duration to 10 seconds
        duration = 0;
        // Save the duration in localStorage
        localStorage.setItem("duration", duration);
        // Enable the button
        button.disabled = false;
        });
    </script>
@endsection