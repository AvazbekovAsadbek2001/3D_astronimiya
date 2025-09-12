<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Student extends Model implements Authenticatable, JWTSubject
{
    use HasFactory,AuthenticatableTrait;

    protected $fillable = ['last_name', 'first_name','region_id','district_id','school_name','class_name','name', 'password'];

    public function testanswer(){
        return $this->hasMany(Test_answer::class);
    }

    public function testuserAnswers()
    {
        return $this->hasMany(Testuser_answer::class, 'student_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
