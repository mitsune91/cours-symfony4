<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', CollectionType::class, [
                'allow_delete' => true,
                'entry_type' => ChoiceType::class,
                'allow_add' => false,
                'entry_options' => [
                    'label' => false,
                    //     'multiple'=> true,
                    //   'expanded' => true,
                    'choices' => [
                        'Admin' => 'ROLE_ADMIN',
                        'Super' => 'ROLE_SUPER_ADMIN',
                        'Aucun' => null

                    ],
                ],
            ])
            ->add('image', FileType::class,array('required' => false, 'data_class' =>null))

            ->add('pseudo')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('pays')
            ->add('telephone');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
