@component('mail::message')
# Form Submitted {{ $publicForm->title }}

Dear {{ $publicForm->user->name }},

Your survey form was submitted. 

@component('mail::table')
| Questions     | Your Answers  |
| ------------- |:-------------:|
@foreach (json_decode($publicForm->data) as $key => $item)
| {{ $key }}    | {{$item}} |
@endforeach
@endcomponent

Thanks,<br>
May Thu Aung (Web Developer)
@endcomponent
