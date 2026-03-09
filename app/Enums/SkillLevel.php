<?php

namespace App\Enums;

enum SkillLevel: string
{
    case Beginner = "beginner";
    case InterMediate = "interMediate";
    case Advance = "advance";
    case Expert = "expert";

    public static function fromString(string $level)
    {
        return match (strtolower($level)) {
            'beginner', 'novice', 'junior' => self::Beginner,
            'interMediate', 'mid-level' => self::InterMediate,
            'advance', 'senior' => self::Advance,
            'master', 'expert' => self::Expert,
            'default' => null,
        };
    }

    public function title(): string
    {
        return match ($this) {
            self::Beginner => 'Beginner',
            self::InterMediate => 'InterMediate',
            self::Advance => 'Advance',
            self::Expert => 'Expert',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Beginner => 'bg-green-100 text-green-800',
            self::InterMediate => 'bg-emerald-100 text-emerald-800',
            self::Advance => 'bg-blue-100 text-blue-800',
            self::Expert => 'bg-sky-100 text-sky-800',
        };
    }

}

