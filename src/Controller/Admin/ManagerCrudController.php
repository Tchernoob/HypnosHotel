<?php

namespace App\Controller\Admin;

use App\Entity\Manager;
use App\Entity\Hotel;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ManagerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manager::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('first_name'),
            TextField::new('last_name'),
            TextField::new('email'),
            TextField::new('password'),
            AssociationField::new('hotel')
        ];
    }
}
