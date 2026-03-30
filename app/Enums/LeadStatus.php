<?php
namespace App\Enums;

enum LeadStatus: string
{
    case NEW = 'NEW';
    case CONTACTED = 'CONTACTED';
    case PROSPECT = 'PROSPECT';
    case CLOSED = 'CLOSED';
    
}
