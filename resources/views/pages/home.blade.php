@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Our Website</h1>
    
    @foreach($sections as $section)
        <div class="section">
            <h2>{{ ucfirst(str_replace('_', ' ', $section->name)) }}</h2>
            <p>{{ $section->content }}</p>
        </div>
    @endforeach

    <h2>What People Are Saying</h2>
    @foreach($testimonials as $testimonial)
        <blockquote>
            <p>{{ $testimonial->content }}</p>
            <footer>{{ $testimonial->author }}</footer>
        </blockquote>
    @endforeach
</div>
@endsection
