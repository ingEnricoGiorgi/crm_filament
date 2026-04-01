<?php

namespace App\Enums;

enum UserRole: int
{
    case SuperAdmin = 1;
    case Admin = 2;
    case Manager = 3;
    case Operator = 4;

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Admin => 'Admin',
            self::Manager => 'Manager',
            self::Operator => 'Operatore',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->label()
            ])
            ->toArray();
    }
}
