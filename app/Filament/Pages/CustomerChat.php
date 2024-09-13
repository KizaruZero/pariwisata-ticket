<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;


class CustomerChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.customer-chat';

    protected static ?string $title = 'Customer Service Chat';

    protected static ?string $navigationLabel = 'Chat';

    protected static ?string $slug = 'chat';


}
