<?php


namespace App\Controller;


use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class ClassPhotoController extends EasyAdminController
{
    public function persistEntity($classPhoto)
    {
        $classPhoto->setClassLibelle($classPhoto->getSchoolClass()->getLibelle());

        foreach ($classPhoto->getSchoolClass()->getChildren() as $child)
            $classPhoto->addChild($child);

        parent::persistEntity($classPhoto);
    }
}