@component('mail::message')
# Form Submitted {{ $form->title }}

Dear {{ $form->user->name }},

Your survey form was submitted. 

@component('mail::table')
| Questions     | Your Answers  |
| ------------- |:-------------:|
@foreach (json_decode($form->data) as $key => $item)
| {{ $key }}    | {{$item}} |
@endforeach
@endcomponent

Thanks,<br>
May Thu Aung (Web Developer)
@endcomponent
