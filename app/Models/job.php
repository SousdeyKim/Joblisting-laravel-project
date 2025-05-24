<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class job extends Model{
    // public static function all(){
    //     return [
    //         ['id' => 1, 'title' => 'Director', 'salary' => '$1000'],
    //         ['id' => 2, 'title' => 'IT', 'salary' => '$800'],
    //         ['id' => 3, 'title' => 'Teacher', 'salary' => '$500']
    //     ];
    // }
    // //find specific job with given id
    // public static function find(int $id){
    //     $job= Arr:: first(static::all(), fn($job) => $job['id'] == $id);
    //     if(!$job){
    //         // return response()->view('404', [], 404);
    //         abort(404);
    //     }
    //     return $job;
    // }
    use HasFactory;
    protected $table = 'job_listings';
    // protected $fillable = ['title', 'salary', 'employer_id'];
    protected $guarded = [];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'job_tags' ,foreignPivotKey: 'job_listings_id');
    }

    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

}