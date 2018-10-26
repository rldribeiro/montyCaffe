<?php

use Illuminate\Database\Seeder;

class CaffeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caffe1 = new \App\Caffe();
        $caffe1->name = "Deadpool";
        $caffe1->description = "Oh, hello there! I bet you’re wondering, why the red suit? Well, that’s so bad guys can’t see me bleed!";
        $caffe1->logo_url = "https://cdn.ome.lt/qd-MRipd814KT5QNsD-XS3xuomY=/480x360/smart/extras/conteudos/deadpollcrop.jpg";
        $caffe1->user_id=1;
        $caffe1->save();

        $caffe2 = new \App\Caffe();
        $caffe2->name = "Monty";
        $caffe2->description = "Stop. Who would cross the Bridge of Death must answer me these questions three, ‘ere the other side he see.";
        $caffe2->logo_url = "https://i.gifer.com/S9Tj.gif";
        $caffe2->user_id=4;
        $caffe2->save();

        $caffe3 = new \App\Caffe();
        $caffe3->name = "ATEC";
        $caffe3->description = "Formamos pessoas e seus animais de estimação!";
        $caffe3->logo_url = "http://media.nj.com/business_impact/photo/geek-sean-gallupgetty-imagesjpg-e6219c9834604993.jpg";
        $caffe3->user_id=3;
        $caffe3->save();

        $caffe4 = new \App\Caffe();
        $caffe4->name = "Papiro";
        $caffe4->description = "Experiência falhada. Adormecer a chorar.";
        $caffe4->logo_url = "https://www.religiouscriticism.com/wp-content/uploads/2012/10/egypt-slaves.jpg";
        $caffe4->user_id=2;
        $caffe4->save();

        $caffe5 = new \App\Caffe();
        $caffe5->name = "Manel";
        $caffe5->description = "Vinho a copo.";
        $caffe5->logo_url = "http://3.bp.blogspot.com/-UTcib-evo74/TZrtpbRxylI/AAAAAAAADxQ/Z3g2ACkVQw4/s1600/betivul.jpg";
        $caffe5->user_id=3;
        $caffe5->save();

        $caffe6 = new \App\Caffe();
        $caffe6->name = "FortyTwo";
        $caffe6->description = "Seis vezes nove.";
        $caffe6->logo_url = "https://static1.squarespace.com/static/51259dfce4b01b12552dad3e/t/599e5c739f7456a4e6c1d14c/1503550591642/c89a214708211c988c0cca2bb46798b3.jpg";
        $caffe6->user_id=2;
        $caffe6->save();

        $caffe7 = new \App\Caffe();
        $caffe7->name = "TPSI 10_17 ";
        $caffe7->description =  "Eramos 20,sairam 4 , somos 18";
        $caffe7->logo_url = "https://thenypost.files.wordpress.com/2017/03/fire3.jpg";
        $caffe7->user_id=11;
        $caffe7->save();

        $caffe8 = new \App\Caffe();
        $caffe8->name = "Ginasio d´oiro";
        $caffe8->description =  "So não treina quem não quer !";
        $caffe8->logo_url = "https://exerciseeggheads.files.wordpress.com/2015/04/steroids3.jpg";
        $caffe8->user_id=8;
        $caffe8->save();

        $caffe9 = new \App\Caffe();
        $caffe9->name = "Tech 4 you! ";
        $caffe9->description =  "O blog mais fixe da actualidade";
        $caffe9->logo_url = "https://d32r1sh890xpii.cloudfront.net/article/718x300/93728e7f7f7483493cc49df735861759.jpg";
        $caffe9->user_id=11;
        $caffe9->save();

        $caffe10 = new \App\Caffe();
        $caffe10->name = "Gestores de Projeto";
        $caffe10->description =  "Onde se discutem coisas importantes !";
        $caffe10->logo_url = "https://i.imgflip.com/2bunkj.jpg";
        $caffe10->user_id=2;
        $caffe10->save();
    }
}
