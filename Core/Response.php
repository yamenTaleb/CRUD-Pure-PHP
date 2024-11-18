<?php

namespace Core;

enum Response: int
{
    case Forbidden = 403;
    case NotFound = 404;
}
