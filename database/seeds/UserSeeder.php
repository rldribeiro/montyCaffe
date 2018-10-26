<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user0 = new \App\User();
        $user0->name="André Silva";
        $user0->email="andre@atec.pt";
        $user0->password= Hash::make("atec+2018");
        $user0->isAdmin = true;
        $user0->save();

        $user1 = new \App\User();
        $user1->name="Leandro Ribeiro";
        $user1->email="leandro@atec.pt";
        $user1->password= Hash::make("atec+2018");
        $user1->isAdmin = false;
        $user1->save();

        $user2 = new \App\User();
        $user2->name="Paulo Rosário";
        $user2->email="paulo@atec.pt";
        $user2->password= Hash::make("atec+2018");
        $user2->isAdmin = true;
        $user2->save();

        $user3 = new \App\User();
        $user3->name="John Cleese";
        $user3->email="john@atec.pt";
        $user3->password= Hash::make("atec+2018");
        $user3->isAdmin = false;
        $user3->save();

        $user4 = new \App\User();
        $user4->name="Terry Gilliam";
        $user4->email="terry@atec.pt";
        $user4->password= Hash::make("atec+2018");
        $user4->isAdmin = false;
        $user4->save();

        $user5 = new \App\User();
        $user5->name="Sandra Ferreira";
        $user5->email="sandra@atec.pt";
        $user5->password= Hash::make("atec+2018");
        $user5->isAdmin = false;
        $user5->save();

        $user6 = new \App\User();
        $user6->name="Luis Soares";
        $user6->email="luis@atec.pt";
        $user6->password= Hash::make("atec+2018");
        $user6->isAdmin = false;
        $user6->save();

        $user7 = new \App\User();
        $user7->name="Diana Rodrigues";
        $user7->email="diana@atec.pt";
        $user7->password= Hash::make("atec+2018");
        $user7->isAdmin = false;
        $user7->save();

        $user8 = new \App\User();
        $user8->name="Jorge Neves";
        $user8->email="jorge@atec.pt";
        $user8->password= Hash::make("atec+2018");
        $user8->isAdmin = false;
        $user8->save();

        $user9 = new \App\User();
        $user9->name="Paulo AScenssão Gilliam";
        $user9->email="paulos@atec.pt";
        $user9->password= Hash::make("atec+2018");
        $user9->isAdmin = false;
        $user9->save();

        $user10 = new \App\User();
        $user10->name="Luis Passeira";
        $user10->email="luispasseira@atec.pt";
        $user10->password= Hash::make("atec+2018");
        $user10->isAdmin = false;
        $user10->save();

        $user11 = new \App\User();
        $user11->name="Pedro Vasconcelos";
        $user11->email="pedrovas@atec.pt";
        $user11->password= Hash::make("atec+2018");
        $user11->isAdmin = false;
        $user11->save();

        $user12 = new \App\User();
        $user12->name="Bruno Ferreira";
        $user12->email="brunofer@atec.pt";
        $user12->password= Hash::make("atec+2018");
        $user12->isAdmin = false;
        $user12->save();

        $user13 = new \App\User();
        $user13->name="Diana";
        $user13->email="dianar@atec.pt";
        $user13->password= Hash::make("atec+2018");
        $user13->isAdmin = false;
        $user13->save();

        
    }
}
