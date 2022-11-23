<?php
namespace App\Utilities;

class Constant{
    /**
     * -------------------------------------------------------------------
     *
     * Các hằng số, role dùng chung cho hệ thống
     *
     * -------------------------------------------------------------------
     * */
     //User

     const user_level_admin = 0;
     const user_level_expert = 1;
     const user_level_client = 2;
     public static $user_level = [
        self::user_level_admin => 'admin',
        self::user_level_expert => 'expert',
        self::user_level_client => 'client',
     ];

}
