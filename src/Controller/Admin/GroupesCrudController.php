<?php

namespace App\Controller\Admin;

use App\Entity\Groupes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class GroupesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Groupes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('photo', 'Photo du groupe')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false) //on met false car il y a un bug si on vient faire une modif dans le dashboard, si l'image est adéjà été chargée, il faut la charger à nouveau à chaque save
        ];

        $logo =
            ImageField::new('logo', 'Logo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false); //on met false car il y a un bug si on vient faire une modif dans le dashboard, si l'image est adéjà été chargée, il faut la charger à nouveau à chaque save

        //on en a pas besoin ici
        //$slug = SlugField::new('slug')->setTargetFieldName('name');

        $nom = TextField::new('nom_groupe', 'Groupe')
            ->setFormTypeOptions([
                'attr' => [
                    'maxlength' => 255
                ]
            ]);

        $description = TextEditorField::new('description', 'Description');

        $fields[] = $logo;
        $fields[] = $nom;
        $fields[] = $description;

        return $fields;
    }
}
