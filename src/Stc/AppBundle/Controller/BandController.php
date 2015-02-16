<?php

namespace Stc\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

use Oro\Bundle\UserBundle\Entity\User;
use Stc\AppBundle\Entity\Band;

use Stc\AppBundle\Form\Type\BandType;


/**
 * @Route("/band")
 */
class BandController extends Controller
{
    /**
     * @Route(
     * ".{_format}",
     * name="stc_band_index",
     * requirements={"_format"="html|json"},
     * defaults={"_format" = "html"}
     * )
     * @Template
     * @AclAncestor("stc_band_view")
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/info/{id}", name="stc_band_info", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("stc_band_view")
     */
    public function infoViewAction(Band $band)
    {
        return array(
            'entity' => $band
        );
    }

    /**
     * @Route("/view/{id}", name="stc_band_view", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     * id="stc_band_view",
     * type="entity",
     * class="StcAppBundle:Band",
     * permission="VIEW"
     * )
     */
    public function viewAction(Band $band)
    {
        return [
            'entity' => $band
        ];
    }


    /**
     * @Route("/create", name="stc_band_create")
     * @Template("StcAppBundle:Band:update.html.twig")
     * @AclAncestor("stc_band_create")
     */
    public function createAction()
    {
        $band = new Band();

        $context = $this->get('security.context')->getToken();
        $username = $context->getUsername();
        $user = $context->getUser();

        $band->setStatus(1);
        $band->setDeleted(0);
        $band->setOwner($user);
        $band->setAssignee($user);

        return $this->update($band);
    }

    /**
     * @Route("/update/{id}", name="stc_band_update", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("stc_band_update")
     */
    public function updateAction(Band $band)
    {
        return $this->update($band);
    }

    /**
     * @param Band $band
     * @return array
     */
    protected function update(Band $band)
    {
        $request = $this->getRequest();
        $form = $this->createForm(new BandType(), $band);

        if ('POST' == $request->getMethod()) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($band);
                $this->getDoctrine()->getManager()->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    $this->get('translator')->trans('stc.band.saved_message')
                );

                return $this->get('oro_ui.router')->actionRedirect(
                    array(
                        'route' => 'stc_band_index',
                        'parameters' => array('id' => $band->getId()),
                    ),
                    array(
                        'route' => 'stc_band_index',
                        'parameters' => array('id' => $band->getId()),
                    )
                );
            }
        }

        return array(
            'entity' => $band,
            'form' => $form->createView(),
        );
    }

}