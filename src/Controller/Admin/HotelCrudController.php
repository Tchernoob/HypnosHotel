<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use App\Entity\Hotel;
use App\Entity\Manager;
use App\Entity\Suit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HotelCrudController extends AbstractCrudController
{
    public const HOTELS_BASE_PATH = 'upload/images';
    public const HOTELS_UPLOAD_DIR = 'public/upload/images';

    public static function getEntityFqcn(): string
    {
        return Hotel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('city'),
            TextField::new('adress'),
            TextEditorField::new('description', 'Description de l\'Hotel'),
            ImageField::new('home_image')
                ->setBasePath('upload/images')
                ->setUploadDir('public/upload/images'),
        ];
    }
    
}
