@component('mail::message')
# Welcome To PostCommentedMail Class Mailable

This is the body of your message. View views.emails.posts.postcommentedmail to edit and update mail

@component('mail::button', ['url' => url('/')])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
