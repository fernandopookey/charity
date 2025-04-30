<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        "days",
        "slug",
        "detail_donation"
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty("title")) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function causeImage()
    {
        return $this->hasOne(CauseImage::class, 'cause_id', 'id');
    }

    public function causePayment()
    {
        return $this->hasMany(Payment::class)->whereIn('status', ['capture', 'settlement']);
    }

    public static function getCauseList($id)
    {
        $sql = "SELECT caus.id, caus.title, caus.detail_donation, caus.goal, caus.description, caus.status AS visibility_status, caus.days, caus.created_at,
       DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

       CASE 
           WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
           WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
           ELSE 'Not Started'
       END AS active_status,

       GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,

       (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id) AS raised

    FROM causes AS caus" . ($id ? " WHERE caus.id = '$id'" : '');

        $activeMemberRegistrations = DB::select($sql);

        return $activeMemberRegistrations;
    }

    public static function getCauseList3($id, $slug)
    {
        $sql = "SELECT 
        caus.id, 
        caus.title, 
        caus.goal,
        caus.slug,
        caus.detail_donation,
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
            . ($id ? " WHERE caus.id = '$id'" : ($slug ? " WHERE caus.slug = '$slug'" : ''));

        $activeMemberRegistrations = DB::select($sql);

        return $activeMemberRegistrations;
    }

    public static function getCauseListActive($id = null)
    {
        $sql = "SELECT caus.id, caus.title, caus.goal, caus.description, caus.status AS visibility_status, 
                   caus.days, caus.detail_donation, caus.slug, caus.created_at,
                   DATE_ADD(caus.created_at, INTERVAL caus.days DAY) AS expired_date,

                   CASE 
                       WHEN NOW() > DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'over'
                       WHEN NOW() BETWEEN caus.created_at AND DATE_ADD(caus.created_at, INTERVAL caus.days DAY) THEN 'Running'
                       ELSE 'Not Started'
                   END AS active_status,

                   GREATEST(DATEDIFF(DATE_ADD(caus.created_at, INTERVAL caus.days DAY), CURDATE()), 0) AS left_days,
                   
                   (SELECT SUM(price) FROM payments WHERE payments.cause_id = caus.id) AS raised,
                   
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
}
