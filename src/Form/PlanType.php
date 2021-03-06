<?php

namespace App\Form;

use App\Entity\Plan;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('descriptionCourt')
            ->add('descriptionLong')
            ->add('image')
            ->add('user', null, [
                'placeholder' => 'Please select a User',
            ])
            ->add('category', null, [
                'placeholder' => 'Please select a Category'
            ])
            ->add('governorate', EntityType::class, [
                'class' => 'App\Entity\Governorate',
                'placeholder' => 'Please select a governorate',
                'mapped' => false
            ]);
        $builder->get('governorate')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                //var_dump($form->getData());


                $form->getParent()->add('city', EntityType::class, [
                    'class' => 'App\Entity\City',
                    'placeholder' => 'Please select a City',
                    'choices' => $form->getData()->getCities()
                ]);


            }
        );

        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                $city = $data->getCity();

                if ($city) {
                    $form->get('governorate')->setData($city->getGovernorate());

                    $form->add('city', EntityType::class, [
                        'class' => 'App\Entity\City',
                        'placeholder' => 'Please select a city',
                        'choices' => $city->getGovernorate()->getCities()
                    ]);
                } else {
                    $form->add('city', EntityType::class, [
                        'class' => 'App\Entity\City',
                        'placeholder' => 'Please select a city',
                        'choices' => []
                    ]);
                }



            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
        ]);
    }
}
