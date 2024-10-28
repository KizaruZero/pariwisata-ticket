<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;


class CustomerChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'User';
    protected static string $view = 'filament.pages.customer-chat';
    protected static ?string $title = 'Customer Service Chat';
    protected static ?string $navigationLabel = 'Customer Service';

    protected static ?string $slug = 'chat';


}
