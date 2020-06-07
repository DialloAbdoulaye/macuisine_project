<?php

use Illuminate\Database\Seeder;
use App\Recipe;
class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Recipe::create([
            'libelle' => 'Poulet congolais',
            'ingredients' => "
            poulet coupé en morceaux : 1,
            beurre de cacahuètes : 2 c. à soupe,
            tomate pelée : 1 boîte,
            concentré de tomate : 1 petite boîte piment,
            carotte : 3,
            oignon : 3,
            courgette : 3,
            poivron : 1,
            huile d'arachide,
            laurier : 1 feuille,
            noix de muscade : 1 pincée,
            sel,
            poivre,
        ",
            'preparations' => "Faites frire les morceaux de poulet. Salez et poivrez.,
            Lavez et coupez les légumes en petits morceaux.,
            Lorsque le poulet est bien doré, retirez-le et faites dorer les légumes.,
            Faites revenir les oignons.,
            Ajoutez les tomates coupées en rondelles, le concentré, le piment, la noix de muscade et le laurier.,
            Diluez le beurre de cacahuètes dans 1/2 l d'eau tiède, versez le mélange dans la sauce tomate et ajoutez le poulet,
            Laissez mijoter pendant 15 min.,
            Servez avec du riz basmati, thaï ou du taboulé.",
        ]);
         Recipe::create([
            'libelle' => "Foufou de banane",
            'ingredients' => "15 bananes plantains bien mures,
            3 gros brochets fumés,
            3 gros oignons,
            4 grosses tomates,
            1/2 gousse d'ail,
            4 piments,
            5 gros crabes de mer,
            1/2 l d'huile rouge,
            poivre,
            sel,
            1 sachet de poudre de crevettes séchées",
            'preparations' => "Lavez bien les poissons et déposez-les dans une casserole,
            Ajoutez un oignon émincé, le sel, le poivre et la poudre de crevettes séchées,
            Épluchez les bananes, découpez-les en 2 et déposez-les sur les poissons.,
            Retirez la banane et écrasez-la dans un mortier en rajoutant de l'huile rouge et un peu de sel. ,
            Retirez les oignons, les tomates, les piments, écrasez-les et rajoutez-les à la préparation.,
            Ajoutez les crabes et assaisonnez à votre goût,
            Recouvrez pendant 15 min et servez chaud.
            ",
        ]);
    }
}


