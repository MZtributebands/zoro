<?php

namespace Stc\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

use Oro\Bundle\UserBundle\Entity\User;
use Stc\AppBundle\Entity\Venue;

use Stc\AppBundle\Form\Type\VenueType;


/**
 * @Route("/venue")
 */
class VenueController extends Controller
{
    /**
     * @Route(
     * ".{_format}",
     * name="stc_venue_index",
     * requirements={"_format"="html|json"},
     * defaults={"_format" = "html"}
     * )
     * @Template
     * @AclAncestor("stc_venue_view")
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/info/{id}", name="stc_venue_info", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("stc_venue_view")
     */
    public function infoViewAction(Venue $venue)
    {
        return array(
            'entity' => $venue
        );
    }

    /**
     * @Route("/view/{id}", name="stc_venue_view", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     * id="stc_venue_view",
     * type="entity",
     * class="StcAppBundle:Venue",
     * permission="VIEW"
     * )
     */
    public function viewAction(Venue $venue)
    {
        return [
            'entity' => $venue
        ];
    }


    /**
     * @Route("/create", name="stc_venue_create")
     * @Template("StcAppBundle:Venue:update.html.twig")
     * @AclAncestor("stc_venue_create")
     */
    public function createAction()
    {
        $venue = new Venue();

        $context = $this->get('security.context')->getToken();
        $username = $context->getUsername();
        $user = $context->getUser();

        $venue->setStatus(1);
        $venue->setDeleted(0);
        $venue->setOwner($user);
        $venue->setAssignee($user);

        return $this->update($venue);
    }

    /**
     * @Route("/update/{id}", name="stc_venue_update", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("stc_venue_update")
     */
    public function updateAction(Venue $venue)
    {
        return $this->update($venue);
    }

    /**
     * @param Venue $venue
     * @return array
     */
    protected function update(Venue $venue)
    {
        $request = $this->getRequest();
        $form = $this->createForm(new VenueType(), $venue);

        if ('POST' == $request->getMethod()) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($venue);
                $this->getDoctrine()->getManager()->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    $this->get('translator')->trans('stc.venue.saved_message')
                );

                return $this->get('oro_ui.router')->actionRedirect(
                    array(
                        'route' => 'stc_venue_index',
                        'parameters' => array('id' => $venue->getId()),
                    ),
                    array(
                        'route' => 'stc_venue_index',
                        'parameters' => array('id' => $venue->getId()),
                    )
                );
            }
        }

        return array(
            'entity' => $venue,
            'form' => $form->createView(),
        );
    }

}