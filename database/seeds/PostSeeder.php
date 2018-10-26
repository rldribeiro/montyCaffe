<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // POSTS CAFÉ 1
        
        $post1 = new \App\Post();
        $post1->user_id = 3;
        $post1->caffe_id = 1;
        $post1->content = "In 1945, peace broke out. It was the end of the #joke. Joke warfare was banned at a special session of the Geneva Convention, and in 1950 the last remaining copy of the joke was laid to rest here in the Berkshire countryside, never to be told again.";                
        $post1->shelf_life=48;
        $post1->save();

        $tag1 = new \App\Tag();
        $tag1->tag = '#joke';
        $tag1->save();

        $post1->tags()->attach(1);

        $post2 = new \App\Post();
        $post2->user_id = 4;
        $post2->caffe_id = 1;
        $post2->content = "Are you suggesting #coconuts migrate? I'm afraid I have no choice but to sell you all for scientific experiments. If we took the #bones out, it wouldn't be crunchy, would it?";        
        $post2->shelf_life=48;
        $post2->save();

        $tag2 = new \App\Tag();
        $tag2->tag = '#coconuts';
        $tag2->save();
        $tag3 = new \App\Tag();
        $tag3->tag = '#bones';
        $tag3->save();

        $post2->tags()->attach([2, 3]);

        // CAFE 2

        $post3 = new \App\Post();
        $post3->user_id = 1;
        $post3->caffe_id = 2;
        $post3->content = "That's what being a Protestant's all about. That's why it's the church for me. That's why it's the church for anyone who respects the individual and the individual's right to decide for him or herself. When Martin Luther nailed his protest up to the church door in fifteen-seventeen, he may not have realised the full significance of what he was doing, but four hundred years later, thanks to him, my dear, I can wear whatever I want on my John Thomas...";
        $post3->shelf_life=48;
        $post3->save();

        $post4 = new \App\Post();
        $post4->user_id = 2;
        $post4->caffe_id = 2;
        $post4->content = "It's not pining, it's passed on! This parrot is no more! It has ceased to be! It's expired and gone to meet its maker! This is a late parrot! It's a stiff! Bereft of life, it rests in peace! If you hadn't nailed it to the perch, it would be pushing up the daisies! It's metabolic processes are now history! He's off the twig! He's kicked the bucket, he's shuffled off the mortal coil, rung down the curtain and joined the choir invisible. This is an ex-parrot!";
        $post4->shelf_life=48;
        $post4->save();

        // CAFE 3 

        $post5 = new \App\Post();
        $post5->user_id = 4;
        $post5->caffe_id = 3;
        $post5->content = "Well, I think I should point out first, Brian, in all fairness, we are not, in fact, the rescue committee. However, I have been asked to read the following prepare statement on behalf of the movement. \"We the People's Front of Judea, brackets, officials, end brackets, do hereby convey our sincere fraternal and sisterly greetings to you, Brian, on this, the occasion of your martyrdom.\"";
        $post5->shelf_life=48;
        $post5->save();

        $post6 = new \App\Post();
        $post6->user_id = 4;
        $post6->caffe_id = 3;
        $post6->content = "This morning, shortly after 11:00, comedy (#joke) struck this little house on Dibley Road. Sudden, violent comedy. Manacles! Ooooh, my idea of heaven, is to be allowed to be put in manacles. Just for a few hours. They must think the sun shines out your ass, sonny.";
        $post6->shelf_life=48;
        $post6->save();
        $post6->tags()->attach(1);

        // CAFE 4 

        $post7 = new \App\Post();
        $post7->user_id = 3;
        $post7->caffe_id = 4;
        $post7->content = "Oh, king eh? Very nice. And how'd you get that, eh? By exploiting the workers. By hanging on to outdated imperialist dogma which perpetuates the economic and social differences in our society. Is your wife a goer, eh? Know what I mean? Know what I mean? Nudge, nudge! Know what I mean? Say no more!";
        $post7->shelf_life=48;
        $post7->save();

        $post8 = new \App\Post();
        $post8->user_id = 4;
        $post8->caffe_id = 4;
        $post8->content = "Look at them, bloody Catholics, filling the bloody world up with bloody people they can't afford to bloody feed. I'm Brian, and so's my wife! Ah, I see you have the machine that goes ping. This is my favorite. You see we lease it back from the company we sold it to and that way it comes under the monthly current budget and not the capital account.";
        $post8->shelf_life=48;
        $post8->save();

        // CAFE 5

        $post9 = new \App\Post();
        $post9->user_id = 1;
        $post9->caffe_id = 5;
        $post9->content = "I object to all this sex on the television. I mean, I keep falling off! We have to go. Uhm... I'm having rather heavy period. Oh, what wouldn't I give to be spat at in the face? I sometimes hang awake at night, dreaming of being spat at in the face.";
        $post9->shelf_life=48;
        $post9->save();

        $post10 = new \App\Post();
        $post10->user_id = 3;
        $post10->caffe_id = 5;
        $post10->content = "It's a Mr. Death, dear. He's here about the reaping. Well, er, yes Mr. Anchovy, but you see your report here says that you are an extremely dull person. You see, our experts describe you as an appallingly dull fellow, unimaginative, timid, lacking in initiative, spineless, easily dominated, no sense of humour, tedious company and irrepressibly drab and awful. And whereas in most professions these would be considerable drawbacks, in chartered accountancy, they're a positive boon.";
        $post10->shelf_life=48;
        $post10->save();

        $post10 = new \App\Post();
        $post10->user_id = 1;
        $post10->caffe_id = 5;
        $post10->content = "Stwike him, Centuwion! Stwike him vewy wuffly! Come and see the violence inherent in the system. Help! Help! I'm being repressed! The purpose of foreplay is to cause the vagina to lubricate so that the penis can penetrate more easily.";
        $post10->shelf_life=48;
        $post10->save();

        $post10 = new \App\Post();
        $post10->user_id = 3;
        $post10->caffe_id = 5;
        $post10->content = "I will not have my fwends widiculed by the common soldiewy. Anybody else feel like a little... giggle... when I mention my fwiend... Biggus... Dickus? In 1945, peace broke out. It was the end of the Joke. Joke warfare was banned at a special session of the Geneva Convention, and in 1950 the last remaining copy of the joke was laid to rest here in the Berkshire countryside, never to be told again.";
        $post10->shelf_life=48;
        $post10->save();
    }
}
