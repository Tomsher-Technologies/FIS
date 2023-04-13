<?php

return [

    'rules' => [
        'title' => 'nullable|min:5|max:60',
        'og_title' => 'nullable|min:5|max:60',
        'twitter_title' => 'nullable|min:5|max:60',
        'description' => 'nullable|min:5|max:120',
        'og_description' => 'nullable|min:5|max:120',
        'twitter_description' => 'nullable|min:5|max:120',
    ],

    'messages' => [
        'title.min' => 'Please ente a title',
    ],


];
