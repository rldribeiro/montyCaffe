<?php

use Illuminate\Database\Seeder;

class FollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caffe1 = \App\Caffe::find(1);
        $caffe1->followers()->attach(\App\User::find(1));
        $caffe1->followers()->attach(\App\User::find(2));
        $caffe1->followers()->attach(\App\User::find(3));
        $caffe1->followers()->attach(\App\User::find(4));

        $caffe2 = \App\Caffe::find(2);
        $caffe2->followers()->attach(\App\User::find(1));
        $caffe2->followers()->attach(\App\User::find(2));
        $caffe2->followers()->attach(\App\User::find(4));

        $caffe3 = \App\Caffe::find(3);
        $caffe3->followers()->attach(\App\User::find(4));
        $caffe3->followers()->attach(\App\User::find(3));

        $caffe4 = \App\Caffe::find(4);
        $caffe4->followers()->attach(\App\User::find(2));
        $caffe4->followers()->attach(\App\User::find(3));
        $caffe4->followers()->attach(\App\User::find(4));

        $caffe5 = \App\Caffe::find(5);
        $caffe5->followers()->attach(\App\User::find(1));
        $caffe5->followers()->attach(\App\User::find(2));
        $caffe5->followers()->attach(\App\User::find(3));
        $caffe5->followers()->attach(\App\User::find(4));

        $caffe6= \App\Caffe::find(6);
        $caffe6->followers()->attach(\App\User::find(2));

        $caffe7 = \App\Caffe::find(7);
        $caffe7->followers()->attach(\App\User::find(1));
        $caffe7->followers()->attach(\App\User::find(2));
        $caffe7->followers()->attach(\App\User::find(3));
        $caffe7->followers()->attach(\App\User::find(4));
        $caffe7->followers()->attach(\App\User::find(5));
        $caffe7->followers()->attach(\App\User::find(6));
        $caffe7->followers()->attach(\App\User::find(7));
        $caffe7->followers()->attach(\App\User::find(8));
        $caffe7->followers()->attach(\App\User::find(9));
        $caffe7->followers()->attach(\App\User::find(10));

        $caffe8 = \App\Caffe::find(8);
        $caffe8->followers()->attach(\App\User::find(10));
        $caffe8->followers()->attach(\App\User::find(9));

        $caffe9 = \App\Caffe::find(9);
        $caffe9->followers()->attach(\App\User::find(1));
        $caffe9->followers()->attach(\App\User::find(2));
        $caffe9->followers()->attach(\App\User::find(3));
        $caffe9->followers()->attach(\App\User::find(4));
        $caffe9->followers()->attach(\App\User::find(5));
        $caffe9->followers()->attach(\App\User::find(6));
        $caffe9->followers()->attach(\App\User::find(7));
        $caffe9->followers()->attach(\App\User::find(8));
        $caffe9->followers()->attach(\App\User::find(9));
        $caffe9->followers()->attach(\App\User::find(10));


        $caffe10 = \App\Caffe::find(10);
        $caffe10->followers()->attach(\App\User::find(1));
        $caffe10->followers()->attach(\App\User::find(2));
        $caffe10->followers()->attach(\App\User::find(5));
        $caffe10->followers()->attach(\App\User::find(6));
        $caffe10->followers()->attach(\App\User::find(12));
        $caffe10->followers()->attach(\App\User::find(13));
       

    }
}
