<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position')
            ->add('city')
            ->add('phone')
            ->add('employmentType')
            ->add('salary')
            ->add('workCompany')
            ->add('workCity')
            ->add('workPosition')
            ->add('workStart', DateType::class, ['years' => range(1990, 2018)])
            ->add('workFinish', DateType::class, ['years' => range(1990, 2018)])
            ->add('workDescription')
            ->add('educationType')
            ->add('educationInstitution')
            ->add('educationSpeciality')
            ->add('educationCity')
            ->add('educationStart', DateType::class, ['years' => range(1990, 2018)])
            ->add('educationFinish', DateType::class, ['years' => range(1990, 2018)])
            ->add('educationDescription')
            ->add('additionlInfo')
            ->add('isAvailable')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }
}
