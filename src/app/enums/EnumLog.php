<?php

namespace app\enums;

enum EnumLog: string
{
    case ControllerError = "Controller Error";
    case RouterError = "Router Error";
    case DatabaseError = "Database Error";
}
