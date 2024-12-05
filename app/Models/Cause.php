<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cause extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "raised",
        "goal",
        'photos',
        "description",
        "status",
        "days"
    ];

    public function causeImage()
    {
        return $this->hasOne(CauseImage::class, 'cause_id', 'id');
        // return $this->hasMany(CauseImage::class, 'cause_id');
    }

    public function causePayment()
    {
        // return $this->hasMany(Payment::class, 'cause_id', 'id');
        return $this->hasMany(Payment::class)->whereIn('status', ['capture', 'settlement']);
    }

    //     public static function getCauseList($id)
    //     {
    //         $sql = "SELECT caus.id, caus.title, caus.goal, caus.description, caus.status AS visibility_status, caus.days, caus.created_at,
    //        DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

    //        CASE 
    //            WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
    //            WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
    //            ELSE 'Not Started'
    //        END AS active_status,

    //        GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,

    // (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id AND (payments.status = 'capture' OR payments.status = 'settlement')) AS raised,

    //     FROM causes AS caus" . ($id ? " WHERE caus.id = '$id'" : '');

    //         $activeMemberRegistrations = DB::select($sql);

    //         return $activeMemberRegistrations;
    //     }

    public static function getCauseListById($id)
    {
        $sql = "SELECT 
        caus.id, 
        caus.title, 
        caus.goal, 
        caus.description, 
        caus.status AS visibility_status, 
        caus.days, 
        caus.created_at,
        DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

        CASE 
            WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
            WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
            ELSE 'Not Started'
        END AS active_status,

        GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,
                       
        (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id AND (payments.status = 'capture' OR payments.status = 'settlement')) AS raised,

        ci.image AS cause_image
    FROM causes AS caus
    LEFT JOIN cause_images AS ci ON ci.cause_id = caus.id 
        AND (ci.image LIKE '%.jpg%' OR ci.image LIKE '%.jpeg%' OR ci.image LIKE '%.png%')"
            . ($id ? " WHERE caus.id = '$id'" : '');

        $activeMemberRegistrations = DB::select($sql);

        return $activeMemberRegistrations;
    }

    public static function getCauseListActive($id)
    {
        $sql = "SELECT caus.id, caus.title, caus.goal, caus.description, caus.status AS visibility_status, 
                   caus.days, caus.created_at,
                   DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

                   CASE 
                       WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
                       WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
                       ELSE 'Not Started'
                   END AS active_status,

                   GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,
                   
                   (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id AND (payments.status = 'capture' OR payments.status = 'settlement')) AS raised,
                   
                   (SELECT image 
                    FROM cause_images 
                    WHERE cause_images.cause_id = caus.id 
                      AND (image LIKE '%.jpg' 
                           OR image LIKE '%.jpeg' 
                           OR image LIKE '%.png') 
                    ORDER BY id ASC 
                    LIMIT 1) AS primary_image,
                   
                   (SELECT GROUP_CONCAT(image SEPARATOR ', ') 
                    FROM cause_images 
                    WHERE cause_images.cause_id = caus.id 
                      AND (image LIKE '%.mp4' 
                           OR image LIKE '%.avi')) AS all_videos

            FROM causes AS caus WHERE caus.status = 1"
            . ($id ? " WHERE caus.id = '$id'" : '');

        $activeMemberRegistrations = DB::select($sql);

        return $activeMemberRegistrations;
    }

    public static function getAllCauseList($id)
    {
        $sql = "SELECT caus.id, caus.title, caus.goal, caus.description, caus.status AS visibility_status, 
                   caus.days, caus.created_at,
                   DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

                   CASE 
                       WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
                       WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
                       ELSE 'Not Started'
                   END AS active_status,

                   GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,
                   
                   (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id AND (payments.status = 'capture' OR payments.status = 'settlement')) AS raised,
                   
                   (SELECT image 
                    FROM cause_images 
                    WHERE cause_images.cause_id = caus.id 
                      AND (image LIKE '%.jpg' 
                           OR image LIKE '%.jpeg' 
                           OR image LIKE '%.png') 
                    ORDER BY id ASC 
                    LIMIT 1) AS primary_image,
                   
                   (SELECT GROUP_CONCAT(image SEPARATOR ', ') 
                    FROM cause_images 
                    WHERE cause_images.cause_id = caus.id 
                      AND (image LIKE '%.mp4' 
                           OR image LIKE '%.avi')) AS all_videos

            FROM causes AS caus
            order by created_at DESC"
            . ($id ? " WHERE caus.id = '$id'" : '');

        $activeMemberRegistrations = DB::select($sql);

        return $activeMemberRegistrations;
    }
}
