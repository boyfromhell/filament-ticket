<?php

use IchBin\FilamentTicket\Resources\CategoryResource;
use IchBin\FilamentTicket\Resources\PriorityResource;
use IchBin\FilamentTicket\Resources\StatusResource;
use IchBin\FilamentTicket\Resources\TicketResource;

return [
    'resources' => [
        TicketResource::class,
        CategoryResource::class,
        StatusResource::class,
        PriorityResource::class,
    ],
    'model' => App\Models\User::class,
    "navigation_group" => "Ticket System",
    "ticket_label" => "Custom Fields",
    "ticket_responses_label" => "Custom Fields Responses",
    "category_label" => "Custom Fields",
    "category_responses_label" => "Custom Fields Responses",
    "status_label" => "Custom Fields",
    "status_responses_label" => "Custom Fields Responses",
    "priority_label" => "Custom Fields",
    "priority_responses_label" => "Custom Fields Responses",
];
