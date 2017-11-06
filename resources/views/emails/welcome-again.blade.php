@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'http://sunnydayguide.com'])
Start your Journey!
@endcomponent

@component('mail::panel', ['url' => ''])
The Official Vacation Guide to Family Fun<br>
Activities, Restaurants, Shopping, Entertainment and More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
