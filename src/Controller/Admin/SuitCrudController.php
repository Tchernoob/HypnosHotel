<?php

namespace App\Controller\Admin;

use App\Entity\Suit;
use App\Entity\Manager;
use App\Entity\Hotel;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class SuitCrudController extends AbstractCrudController
{
    public const SUITS_BASE_PATH = 'upload/images/';
    public const SUITS_UPLOAD_DIR = 'public/upload/images/';

    public static function getEntityFqcn(): string
    {
        return Suit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            IntegerField::new('price'),
            TextEditorField::new('description', 'Description de la Suite'),
            ImageField::new('home_image')
                ->setBasePath('upload/images')
                ->setUploadDir('public/upload/images'),
            ImageField::new('second_image')
                ->setBasePath('upload/images')
                ->setUploadDir('public/upload/images'),
            ImageField::new('second_image')
                ->setBasePath('upload/images')
                ->setUploadDir('public/upload/images'),
            ImageField::new('third_image')
                ->setBasePath('upload/images')
                ->setUploadDir('public/upload/images'),   
            ];
    }
    
}
