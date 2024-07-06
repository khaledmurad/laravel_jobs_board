<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'title' ,'city' ,'description' ,'salary' ,'experince' ,'category'
    ];

    public static array $exp = ['entry', 'intermediate','senior'];
    public static array $category = ['IT', 'Sales', 'Marketing', 'Desgin'];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function jobApplication(){
        return $this->hasMany(JobApplication::class);
    }

    public function hasAlreadyApplied(Authenticatable|User|int $user){
        return $this->where('id', $this->id)
            ->whereHas('jobApplication', function($q) use ($user){
                $q->where('user_id','=',$user->id ?? $user);
            })->exists();
    }

    public function scopeFilter(Builder|QueryBuilder $builder, array $filters){
        return $builder->when($filters['search']??null, function($q,$search){
            $q->where(function($q) use ($search){
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('employer', function($q) use ($search){
                    $q->where('company_name', 'like', '%' . $search . '%');
                });
            });
            })->when($filters['min-salary']??null, function($q,$minSalary){
                $q->where('salary', '>=', $minSalary);
            })->when($filters['max-salary']??null, function($q, $maxSalary){
                $q->where('salary', '<=', $maxSalary);
            })->when($filters['experince']??null, function($q,$experince){
                $q->where('experince', $experince);
            })->when($filters['category']??null, function($q,$category){
                $q->where('category', $category);
        });
    }

}
