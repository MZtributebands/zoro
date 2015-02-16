<?php

namespace Stc\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BandType extends AbstractType
{
    /**
     * @var string
     */
    protected $bandClass;

    /**
     * @param string $bandClass
     */
    public function __construct($bandClass = 'Stc\AppBundle\Entity\Band')
    {
        $this->bandClass = $bandClass;
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            'text',
            [
                'label' => 'stc.band.name.label',
                'required' => true,
            ]
        )
            ->add(
                'description',
                'text',
                [
                    'label' => 'stc.band.description.label',
                    'required' => false,
                ]
            )
            ->add(
                'relatedContact',
                'orocrm_contact_select',
                [
                    'required'      => false,
                    'label'         => 'orocrm.case.caseentity.related_contact.label',
                ]
            )
            ->add(
                'email',
                'text',
                [
                    'required' => false,
                    'label' => 'Email',
                ]
            )
            ->add(
                'assignee',
                'oro_user_select',
                array(
                    'required' => false,
                    'label' => 'stc.band.assignee.label'
                )
            )
            ->add(
                'profileType',
                'text',
                array(
                    'label' => 'stc.band.profileType.label',
                    'required' => false,
                )
            )
            ->add(
                'industry',
                'text',
                array(
                    'label' => 'stc.band.industry.label',
                    'required' => false,
                )
            )
            ->add(
                'phoneFax',
                'text',
                array(
                    'label' => 'stc.band.phoneFax.label',
                    'required' => false,
                )
            )
            ->add(
                'billingAddressStreet',
                'text',
                array(
                    'label' => 'stc.band.billingAddressStreet.label',
                    'required' => false,
                )
            )
            ->add(
                'billingAddressCity',
                'text',
                array(
                    'label' => 'stc.band.billingAddressCity.label',
                    'required' => false,
                )
            )
            ->add(
                'billingAddressState',
                'text',
                array(
                    'label' => 'stc.band.billingAddressState.label',
                    'required' => false,
                )
            )
            ->add(
                'billingAddressPostalcode',
                'text',
                array(
                    'label' => 'stc.band.billingAddressPostalcode.label',
                    'required' => false,
                )
            )
            ->add(
                'country',
                'text',
                array(
                    'label' => 'stc.band.country.label',
                    'required' => false,
                )
            )
            ->add(
                'rating',
                'text',
                array(
                    'label' => 'stc.band.rating.label',
                    'required' => false,
                )
            )
            ->add(
                'phoneOffice',
                'text',
                array(
                    'label' => 'stc.band.phoneOffice.label',
                    'required' => false,
                )
            )
            ->add(
                'phoneAlternate',
                'text',
                array(
                    'label' => 'stc.band.phoneAlternate.label',
                    'required' => false,
                )
            )
            ->add(
                'website',
                'text',
                array(
                    'label' => 'stc.band.website.label',
                    'required' => false,
                )
            )
            ->add(
                'ownership',
                'text',
                array(
                    'label' => 'stc.band.ownership.label',
                    'required' => false,
                )
            )
            ->add(
                'employees',
                'text',
                array(
                    'label' => 'stc.band.employees.label',
                    'required' => false,
                )
            )
            ->add(
                'tickerSymbol',
                'text',
                array(
                    'label' => 'stc.band.tickerSymbol.label',
                    'required' => false,
                )
            )
            ->add(
                'shippingAddressStreet',
                'text',
                array(
                    'label' => 'stc.band.shippingAddressStreet.label',
                    'required' => false,
                )
            )
            ->add(
                'shippingAddressCity',
                'text',
                array(
                    'label' => 'stc.band.shippingAddressCity.label',
                    'required' => false,
                )
            )
            ->add(
                'shippingAddressState',
                'text',
                array(
                    'label' => 'stc.band.shippingAddressState.label',
                    'required' => false,
                )
            )
            ->add(
                'shippingAddressPostalcode',
                'text',
                array(
                    'label' => 'stc.band.shippingAddressPostalcode.label',
                    'required' => false,
                )
            )
            ->add(
                'shippingAddressCountry',
                'text',
                array(
                    'label' => 'stc.band.shippingAddressCountry.label',
                    'required' => false,
                )
            )
            ->add(
                'twitter',
                'text',
                array(
                    'label' => 'stc.band.twitter.label',
                    'required' => false,
                )
            )
            ->add(
                'facebook',
                'text',
                array(
                    'label' => 'stc.band.facebook.label',
                    'required' => false,
                )
            )
            ->add(
                'youtube',
                'text',
                array(
                    'label' => 'stc.band.youtube.label',
                    'required' => false,
                )
            )
            ->add(
                'status',
                'text',
                array(
                    'label' => 'stc.band.staus.label',
                    'required' => false,
                )
            )
            ->add(
                'vimeo',
                'text',
                array(
                    'label' => 'stc.band.vimeo.label',
                    'required' => false,
                )
            )
            ->add(
                'myspace',
                'text',
                array(
                    'label' => 'stc.band.myspace.label',
                    'required' => false,
                )
            )
            ->add(
                'owner',
                'oro_user_select',
                [
                    'label' => 'stc.band.owner.label',
                    'required' => true
                ]
            )
            ->add(
                'reverbnation',
                'text',
                array(
                    'label' => 'stc.band.reverbnation.label',
                    'required' => false,
                )
            )
            ->add(
                'linkdin',
                'text',
                array(
                    'label' => 'stc.band.linkdin.label',
                    'required' => false,
                )
            )
            ->add(
                'googleplus',
                'text',
                array(
                    'label' => 'stc.band.googleplus.label',
                    'required' => false,
                )
            )
            ->add(
                'tributeto',
                'text',
                array(
                    'label' => 'stc.band.tributeto.label',
                    'required' => true,
                )
            )
            ->add(
                'genre',
                'text',
                array(
                    'label' => 'stc.band.genre.label',
                    'required' => false,
                )
            )
            ->add(
                'acttype',
                'text',
                array(
                    'label' => 'stc.band.acttype.label',
                    'required' => false,
                )
            )
            ->add(
                'performanceCount',
                'text',
                array(
                    'label' => 'stc.band.performanceCount.label',
                    'required' => false,
                )
            );
    }

    /**
     * @inheritdoc
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => $this->bandClass,
                'intention' => 'stc_band',
                'cascade_validation' => true
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'stc_band';
    }
}
