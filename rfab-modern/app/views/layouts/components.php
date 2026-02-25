<?php
declare(strict_types=1);

function star_rating(int $count): string
{
    return str_repeat('★', max(0, min(5, $count)));
}
