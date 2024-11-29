<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('postId');
            $table->unsignedBigInteger('userId');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade') ;
        });

        Post::insert([
            [
                'userId'=>1,
                'title'=>'Mastering Web Development: From Beginner to Pro',
                'content'=>'A comprehensive guide covering the essentials of web development, including HTML, CSS, JavaScript, and modern frameworks to build interactive and responsive websites.',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'userId'=>1,
                'title'=>'Exploring the Power of AI in Everyday Life',
                'content'=>'Discover how artificial intelligence is transforming industries, enhancing daily tasks, and the future trends shaping this innovative field.',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'userId'=>1,
                'title'=>'The Ultimate Travel Guide for Budget-Friendly Adventures',
                'content'=>'Learn tips and tricks for affordable travel, including destination recommendations, money-saving hacks, and how to plan a memorable journey on a budget.',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'userId'=>1,
                'title'=>'Health & Wellness: Building a Balanced Lifestyle',
                'content'=>'A guide to improving your physical and mental well-being through exercise, nutrition, mindfulness, and creating sustainable health habits.',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'userId'=>1,
                'title'=>'Digital Marketing Strategies for Business Growth',
                'content'=>'An insightful post on leveraging SEO, content marketing, and social media to boost your brand’s online presence and drive business growth.',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
