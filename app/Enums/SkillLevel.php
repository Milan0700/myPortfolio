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
            'intermediate', 'mid-level' => self::InterMediate,
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
            self::Beginner => 'bg-gradient-to-r from-green-500 to-emerald-500',
            self::InterMediate => 'bg-gradient-to-r from-blue-500 to-cyan-500',
            self::Advance => 'bg-gradient-to-r from-purple-500 to-indigo-500',
            self::Expert => 'bg-gradient-to-r from-orange-500 to-red-500',
        };
    }

}

