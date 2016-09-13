<?php

namespace Dywee\NewsBundle\Form;

use Dywee\CoreBundle\Form\Type\ImageType;
use Dywee\NewsBundle\Entity\News;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Dywee\CoreBundle\Form\Type\SeoType;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array(
            News::STATE_DRAFT => News::STATE_DRAFT,
            News::STATE_PUBLISHED => News::STATE_PUBLISHED
        );

        $builder
            ->add('title',          TextType::class)
            ->add('image',          ImageType::class, array('required' => false))
            ->add('content',        CKEditorType::class)
            ->add('seo',            SeoType::class,         array(
                'data_class' => 'Dywee\ProductBundle\Entity\BaseProduct'
            ))
            ->add('state',          ChoiceType::class, array('choices' => $choices))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dywee\NewsBundle\Entity\News'
        ));
    }
}
