<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('NonJour'),
            TextField::new('Etat'),
            TimeField::new('HeureOuvertureAm')->setFormat('HH:mm'),
            TimeField::new('HeureFermetureAm')->setFormat('HH:mm'),
            TimeField::new('HeureOuverturePm')->setFormat('HH:mm'),
            TimeField::new('HeureFermeturePm')->setFormat('HH:mm'),
        ];
    }
    
}
