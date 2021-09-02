@component('mail::message')

    The body of your message.
    <div>
        <img src="{{ $data['img'] }}" alt="">
    </div>
    <h3>{{ $data['title'] }}</h3>
    <h3>{{ $data['text'] }}</h3>

@endcomponent
