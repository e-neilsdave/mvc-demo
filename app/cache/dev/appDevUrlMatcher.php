<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/pool')) {
            // pool_homepage
            if (rtrim($pathinfo, '/') === '/pool') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'pool_homepage');
                }

                return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\DefaultController::indexAction',  '_route' => 'pool_homepage',);
            }

            // pool_result
            if ($pathinfo === '/pool/results') {
                return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\DefaultController::resultsAction',  '_route' => 'pool_result',);
            }

            // pool_save
            if ($pathinfo === '/pool/save') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_pool_save;
                }

                return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\DefaultController::saveAction',  '_route' => 'pool_save',);
            }
            not_pool_save:

            // pool_edit
            if ($pathinfo === '/pool/edit') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_pool_edit;
                }

                return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\DefaultController::editAction',  '_route' => 'pool_edit',);
            }
            not_pool_edit:

            if (0 === strpos($pathinfo, '/pool/api')) {
                // _api_get_question_by_mercant
                if ($pathinfo === '/pool/api/merchantPool') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_get_question_by_mercant;
                    }

                    return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\ApiController::getQuestionByMercantAction',  '_format' => 'json',  '_route' => '_api_get_question_by_mercant',);
                }
                not__api_get_question_by_mercant:

                // _api_save_pool
                if ($pathinfo === '/pool/api/savePool') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_save_pool;
                    }

                    return array (  '_controller' => 'Sofid\\PoolBundle\\Controller\\ApiController::savePoolAction',  '_format' => 'json',  '_route' => '_api_save_pool',);
                }
                not__api_save_pool:

            }

        }

        if (0 === strpos($pathinfo, '/commercant/sms')) {
            // _sms_create
            if ($pathinfo === '/commercant/sms/create') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not__sms_create;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::createClientAction',  '_route' => '_sms_create',);
            }
            not__sms_create:

            // _sms_send
            if ($pathinfo === '/commercant/sms/send') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__sms_send;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::sendSMSAction',  '_route' => '_sms_send',);
            }
            not__sms_send:

            // sms
            if (rtrim($pathinfo, '/') === '/commercant/sms') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sms');
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::smsAction',  '_route' => 'sms',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if ($pathinfo === '/admin/core/get-short-object-description') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_route' => 'sonata_admin_short_object_information',);
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/login')) {
                    // sonata_user_admin_security_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::loginAction',  '_route' => 'sonata_user_admin_security_login',);
                    }

                    // sonata_user_admin_security_check
                    if ($pathinfo === '/admin/login_check') {
                        return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::checkAction',  '_route' => 'sonata_user_admin_security_check',);
                    }

                }

                // sonata_user_admin_security_logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::logoutAction',  '_route' => 'sonata_user_admin_security_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/sofid')) {
                if (0 === strpos($pathinfo, '/admin/sofid/user/commercant')) {
                    // admin_sofid_user_commercant_list
                    if ($pathinfo === '/admin/sofid/user/commercant/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_list',  '_route' => 'admin_sofid_user_commercant_list',);
                    }

                    // admin_sofid_user_commercant_create
                    if ($pathinfo === '/admin/sofid/user/commercant/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_create',  '_route' => 'admin_sofid_user_commercant_create',);
                    }

                    // admin_sofid_user_commercant_batch
                    if ($pathinfo === '/admin/sofid/user/commercant/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_batch',  '_route' => 'admin_sofid_user_commercant_batch',);
                    }

                    // admin_sofid_user_commercant_edit
                    if (preg_match('#^/admin/sofid/user/commercant/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_user_commercant_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_edit',));
                    }

                    // admin_sofid_user_commercant_delete
                    if (preg_match('#^/admin/sofid/user/commercant/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_user_commercant_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_delete',));
                    }

                    // admin_sofid_user_commercant_show
                    if (preg_match('#^/admin/sofid/user/commercant/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_user_commercant_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_show',));
                    }

                    // admin_sofid_user_commercant_export
                    if ($pathinfo === '/admin/sofid/user/commercant/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.commercant',  '_sonata_name' => 'admin_sofid_user_commercant_export',  '_route' => 'admin_sofid_user_commercant_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sofid/admin')) {
                    if (0 === strpos($pathinfo, '/admin/sofid/admin/card')) {
                        // admin_sofid_admin_card_list
                        if ($pathinfo === '/admin/sofid/admin/card/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_list',  '_route' => 'admin_sofid_admin_card_list',);
                        }

                        // admin_sofid_admin_card_create
                        if ($pathinfo === '/admin/sofid/admin/card/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_create',  '_route' => 'admin_sofid_admin_card_create',);
                        }

                        // admin_sofid_admin_card_batch
                        if ($pathinfo === '/admin/sofid/admin/card/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_batch',  '_route' => 'admin_sofid_admin_card_batch',);
                        }

                        // admin_sofid_admin_card_edit
                        if (preg_match('#^/admin/sofid/admin/card/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_card_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_edit',));
                        }

                        // admin_sofid_admin_card_delete
                        if (preg_match('#^/admin/sofid/admin/card/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_card_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_delete',));
                        }

                        // admin_sofid_admin_card_show
                        if (preg_match('#^/admin/sofid/admin/card/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_card_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_show',));
                        }

                        // admin_sofid_admin_card_export
                        if ($pathinfo === '/admin/sofid/admin/card/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.card',  '_sonata_name' => 'admin_sofid_admin_card_export',  '_route' => 'admin_sofid_admin_card_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/sofid/admin/user')) {
                        // admin_sofid_admin_user_list
                        if ($pathinfo === '/admin/sofid/admin/user/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_list',  '_route' => 'admin_sofid_admin_user_list',);
                        }

                        // admin_sofid_admin_user_create
                        if ($pathinfo === '/admin/sofid/admin/user/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_create',  '_route' => 'admin_sofid_admin_user_create',);
                        }

                        // admin_sofid_admin_user_batch
                        if ($pathinfo === '/admin/sofid/admin/user/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_batch',  '_route' => 'admin_sofid_admin_user_batch',);
                        }

                        // admin_sofid_admin_user_edit
                        if (preg_match('#^/admin/sofid/admin/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_user_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_edit',));
                        }

                        // admin_sofid_admin_user_delete
                        if (preg_match('#^/admin/sofid/admin/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_user_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_delete',));
                        }

                        // admin_sofid_admin_user_show
                        if (preg_match('#^/admin/sofid/admin/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_user_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_show',));
                        }

                        // admin_sofid_admin_user_export
                        if ($pathinfo === '/admin/sofid/admin/user/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_sofid_admin_user_export',  '_route' => 'admin_sofid_admin_user_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/sofid/admin/offre')) {
                        // admin_sofid_admin_offre_list
                        if ($pathinfo === '/admin/sofid/admin/offre/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_list',  '_route' => 'admin_sofid_admin_offre_list',);
                        }

                        // admin_sofid_admin_offre_create
                        if ($pathinfo === '/admin/sofid/admin/offre/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_create',  '_route' => 'admin_sofid_admin_offre_create',);
                        }

                        // admin_sofid_admin_offre_batch
                        if ($pathinfo === '/admin/sofid/admin/offre/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_batch',  '_route' => 'admin_sofid_admin_offre_batch',);
                        }

                        // admin_sofid_admin_offre_edit
                        if (preg_match('#^/admin/sofid/admin/offre/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_offre_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_edit',));
                        }

                        // admin_sofid_admin_offre_delete
                        if (preg_match('#^/admin/sofid/admin/offre/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_offre_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_delete',));
                        }

                        // admin_sofid_admin_offre_show
                        if (preg_match('#^/admin/sofid/admin/offre/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_offre_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_show',));
                        }

                        // admin_sofid_admin_offre_export
                        if ($pathinfo === '/admin/sofid/admin/offre/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.offre',  '_sonata_name' => 'admin_sofid_admin_offre_export',  '_route' => 'admin_sofid_admin_offre_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/sofid/admin/palier')) {
                        // admin_sofid_admin_palier_list
                        if ($pathinfo === '/admin/sofid/admin/palier/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_list',  '_route' => 'admin_sofid_admin_palier_list',);
                        }

                        // admin_sofid_admin_palier_create
                        if ($pathinfo === '/admin/sofid/admin/palier/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_create',  '_route' => 'admin_sofid_admin_palier_create',);
                        }

                        // admin_sofid_admin_palier_batch
                        if ($pathinfo === '/admin/sofid/admin/palier/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_batch',  '_route' => 'admin_sofid_admin_palier_batch',);
                        }

                        // admin_sofid_admin_palier_edit
                        if (preg_match('#^/admin/sofid/admin/palier/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_palier_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_edit',));
                        }

                        // admin_sofid_admin_palier_delete
                        if (preg_match('#^/admin/sofid/admin/palier/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_palier_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_delete',));
                        }

                        // admin_sofid_admin_palier_show
                        if (preg_match('#^/admin/sofid/admin/palier/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_palier_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_show',));
                        }

                        // admin_sofid_admin_palier_export
                        if ($pathinfo === '/admin/sofid/admin/palier/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.palier',  '_sonata_name' => 'admin_sofid_admin_palier_export',  '_route' => 'admin_sofid_admin_palier_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/sofid/admin/gain')) {
                        // admin_sofid_admin_gain_list
                        if ($pathinfo === '/admin/sofid/admin/gain/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_list',  '_route' => 'admin_sofid_admin_gain_list',);
                        }

                        // admin_sofid_admin_gain_create
                        if ($pathinfo === '/admin/sofid/admin/gain/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_create',  '_route' => 'admin_sofid_admin_gain_create',);
                        }

                        // admin_sofid_admin_gain_batch
                        if ($pathinfo === '/admin/sofid/admin/gain/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_batch',  '_route' => 'admin_sofid_admin_gain_batch',);
                        }

                        // admin_sofid_admin_gain_edit
                        if (preg_match('#^/admin/sofid/admin/gain/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_gain_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_edit',));
                        }

                        // admin_sofid_admin_gain_delete
                        if (preg_match('#^/admin/sofid/admin/gain/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_gain_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_delete',));
                        }

                        // admin_sofid_admin_gain_show
                        if (preg_match('#^/admin/sofid/admin/gain/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_gain_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_show',));
                        }

                        // admin_sofid_admin_gain_export
                        if ($pathinfo === '/admin/sofid/admin/gain/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.gain',  '_sonata_name' => 'admin_sofid_admin_gain_export',  '_route' => 'admin_sofid_admin_gain_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/sofid/admin/c')) {
                        if (0 === strpos($pathinfo, '/admin/sofid/admin/categories')) {
                            // admin_sofid_admin_categories_list
                            if ($pathinfo === '/admin/sofid/admin/categories/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_list',  '_route' => 'admin_sofid_admin_categories_list',);
                            }

                            // admin_sofid_admin_categories_create
                            if ($pathinfo === '/admin/sofid/admin/categories/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_create',  '_route' => 'admin_sofid_admin_categories_create',);
                            }

                            // admin_sofid_admin_categories_batch
                            if ($pathinfo === '/admin/sofid/admin/categories/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_batch',  '_route' => 'admin_sofid_admin_categories_batch',);
                            }

                            // admin_sofid_admin_categories_edit
                            if (preg_match('#^/admin/sofid/admin/categories/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_categories_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_edit',));
                            }

                            // admin_sofid_admin_categories_delete
                            if (preg_match('#^/admin/sofid/admin/categories/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_categories_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_delete',));
                            }

                            // admin_sofid_admin_categories_show
                            if (preg_match('#^/admin/sofid/admin/categories/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_categories_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_show',));
                            }

                            // admin_sofid_admin_categories_export
                            if ($pathinfo === '/admin/sofid/admin/categories/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.categories',  '_sonata_name' => 'admin_sofid_admin_categories_export',  '_route' => 'admin_sofid_admin_categories_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/sofid/admin/city')) {
                            // admin_sofid_admin_city_list
                            if ($pathinfo === '/admin/sofid/admin/city/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_list',  '_route' => 'admin_sofid_admin_city_list',);
                            }

                            // admin_sofid_admin_city_create
                            if ($pathinfo === '/admin/sofid/admin/city/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_create',  '_route' => 'admin_sofid_admin_city_create',);
                            }

                            // admin_sofid_admin_city_batch
                            if ($pathinfo === '/admin/sofid/admin/city/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_batch',  '_route' => 'admin_sofid_admin_city_batch',);
                            }

                            // admin_sofid_admin_city_edit
                            if (preg_match('#^/admin/sofid/admin/city/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_city_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_edit',));
                            }

                            // admin_sofid_admin_city_delete
                            if (preg_match('#^/admin/sofid/admin/city/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_city_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_delete',));
                            }

                            // admin_sofid_admin_city_show
                            if (preg_match('#^/admin/sofid/admin/city/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sofid_admin_city_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_show',));
                            }

                            // admin_sofid_admin_city_export
                            if ($pathinfo === '/admin/sofid/admin/city/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.city',  '_sonata_name' => 'admin_sofid_admin_city_export',  '_route' => 'admin_sofid_admin_city_export',);
                            }

                        }

                    }

                }

            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // qrcode
            if ($pathinfo === '/admin/qrcode') {
                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::qrcodeAction',  '_route' => 'qrcode',);
            }

            if (0 === strpos($pathinfo, '/admin/commercant')) {
                // commercant_download_qrcode
                if (0 === strpos($pathinfo, '/admin/commercant/qrcode/download') && preg_match('#^/admin/commercant/qrcode/download/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'commercant_download_qrcode')), array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::commercantQrCodeDownloadAction',));
                }

                // duplicate_commercant
                if (0 === strpos($pathinfo, '/admin/commercant/duplicate') && preg_match('#^/admin/commercant/duplicate/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'duplicate_commercant')), array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::duplicateMerchantAction',));
                }

            }

        }

        // download_qrcode
        if (0 === strpos($pathinfo, '/download') && preg_match('#^/download/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'download_qrcode')), array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::downloadAction',));
        }

        // update_qrcode
        if ($pathinfo === '/admin/update-qr') {
            return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::udpateQrCodeAllMerchantAction',  '_route' => 'update_qrcode',);
        }

        // encode_qrcode
        if ($pathinfo === '/encode') {
            return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::encodeAction',  '_route' => 'encode_qrcode',);
        }

        if (0 === strpos($pathinfo, '/api')) {
            // _api_login
            if ($pathinfo === '/api/login') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_login;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::authenticateAction',  '_format' => 'json',  '_route' => '_api_login',);
            }
            not__api_login:

            // _api_user_login
            if ($pathinfo === '/api/userlogin') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_user_login;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::authenticateAction',  '_format' => 'json',  '_route' => '_api_user_login',);
            }
            not__api_user_login:

            if (0 === strpos($pathinfo, '/api/scan')) {
                // _api_scan
                if ($pathinfo === '/api/scan') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_scan;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::scanAction',  '_format' => 'json',  '_route' => '_api_scan',);
                }
                not__api_scan:

                if (0 === strpos($pathinfo, '/api/scan-')) {
                    // _api_scan_v2
                    if ($pathinfo === '/api/scan-v2') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not__api_scan_v2;
                        }

                        return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::scanV2Action',  '_format' => 'json',  '_route' => '_api_scan_v2',);
                    }
                    not__api_scan_v2:

                    if (0 === strpos($pathinfo, '/api/scan-by-email-or-phone')) {
                        // _api_scan_by_email_or_phone
                        if ($pathinfo === '/api/scan-by-email-or-phone') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not__api_scan_by_email_or_phone;
                            }

                            return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::scanByEmailOrPhoneAction',  '_format' => 'json',  '_route' => '_api_scan_by_email_or_phone',);
                        }
                        not__api_scan_by_email_or_phone:

                        // _api_scan_by_email_or_phone_v2
                        if ($pathinfo === '/api/scan-by-email-or-phone-v2') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not__api_scan_by_email_or_phone_v2;
                            }

                            return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::scanByEmailOrPhoneV2Action',  '_format' => 'json',  '_route' => '_api_scan_by_email_or_phone_v2',);
                        }
                        not__api_scan_by_email_or_phone_v2:

                    }

                }

            }

            // _api_update_pts
            if ($pathinfo === '/api/updatepts') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_update_pts;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::updatePtsAction',  '_format' => 'json',  '_route' => '_api_update_pts',);
            }
            not__api_update_pts:

            // _api_check
            if ($pathinfo === '/api/check') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_check;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::checkAction',  '_format' => 'json',  '_route' => '_api_check',);
            }
            not__api_check:

            // _api_subscribe
            if ($pathinfo === '/api/register') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_subscribe;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::registerAction',  '_format' => 'json',  '_route' => '_api_subscribe',);
            }
            not__api_subscribe:

            // _api_edit
            if ($pathinfo === '/api/edit') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_edit;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::editAction',  '_format' => 'json',  '_route' => '_api_edit',);
            }
            not__api_edit:

            // _api_retrieve
            if ($pathinfo === '/api/retrieve') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_retrieve;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::retrieveAction',  '_format' => 'json',  '_route' => '_api_retrieve',);
            }
            not__api_retrieve:

            // _api_new
            if ($pathinfo === '/api/new') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_new;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::newAction',  '_format' => 'json',  '_route' => '_api_new',);
            }
            not__api_new:

            // _api_paliers
            if ($pathinfo === '/api/paliers') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_paliers;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::retrievePaliersAction',  '_format' => 'json',  '_route' => '_api_paliers',);
            }
            not__api_paliers:

            // _api_get_my_commercants
            if ($pathinfo === '/api/commercants') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_get_my_commercants;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getMyCommercantsAction',  '_format' => 'json',  '_route' => '_api_get_my_commercants',);
            }
            not__api_get_my_commercants:

            // _api_get_all_commercants
            if ($pathinfo === '/api/allcommercants') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_get_all_commercants;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getAllCommercantsAction',  '_format' => 'json',  '_route' => '_api_get_all_commercants',);
            }
            not__api_get_all_commercants:

            // _api_get_commercant
            if ($pathinfo === '/api/commercant') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_get_commercant;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getCommercantAction',  '_format' => 'json',  '_route' => '_api_get_commercant',);
            }
            not__api_get_commercant:

            // _api_new_card
            if ($pathinfo === '/api/newcard') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_new_card;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\CardController::createMobileCardAction',  '_format' => 'json',  '_route' => '_api_new_card',);
            }
            not__api_new_card:

            // _api_user_partage
            if ($pathinfo === '/api/share') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_user_partage;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::shareAction',  '_format' => 'json',  '_route' => '_api_user_partage',);
            }
            not__api_user_partage:

            if (0 === strpos($pathinfo, '/api/comercant')) {
                // _api_commercant_offer
                if ($pathinfo === '/api/comercant/offer') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_commercant_offer;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getCommercantOfferAndPointAction',  '_format' => 'json',  '_route' => '_api_commercant_offer',);
                }
                not__api_commercant_offer:

                // _api_commercant_by_qrcode
                if ($pathinfo === '/api/comercant') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_commercant_by_qrcode;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getCommercantByQrcodeAction',  '_format' => 'json',  '_route' => '_api_commercant_by_qrcode',);
                }
                not__api_commercant_by_qrcode:

                // _api_commercant_offer_tablet
                if ($pathinfo === '/api/comercant/offer-tablet') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_commercant_offer_tablet;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::getCommercantOfferAndPointForTabletAction',  '_format' => 'json',  '_route' => '_api_commercant_offer_tablet',);
                }
                not__api_commercant_offer_tablet:

            }

            // _api_all_offer
            if ($pathinfo === '/api/get-all-offer') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not__api_all_offer;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::getAllOffersAction',  '_format' => 'json',  '_route' => '_api_all_offer',);
            }
            not__api_all_offer:

            // _api_user_propose
            if ($pathinfo === '/api/propose') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_user_propose;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::proposalAction',  '_format' => 'json',  '_route' => '_api_user_propose',);
            }
            not__api_user_propose:

            // _api_log_time_spent
            if ($pathinfo === '/api/log-time-spent') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_log_time_spent;
                }

                return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\UserController::timeSpentLogAction',  '_format' => 'json',  '_route' => '_api_log_time_spent',);
            }
            not__api_log_time_spent:

            if (0 === strpos($pathinfo, '/api/get')) {
                if (0 === strpos($pathinfo, '/api/get-')) {
                    // _api_all_city
                    if ($pathinfo === '/api/get-all-city') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not__api_all_city;
                        }

                        return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\CityController::retrieveAction',  '_format' => 'json',  '_route' => '_api_all_city',);
                    }
                    not__api_all_city:

                    // _api_city_by_id
                    if (0 === strpos($pathinfo, '/api/get-city-by-id') && preg_match('#^/api/get\\-city\\-by\\-id/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not__api_city_by_id;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_api_city_by_id')), array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\CityController::getSingleCityAction',  '_format' => 'json',));
                    }
                    not__api_city_by_id:

                }

                // _api_commercant
                if ($pathinfo === '/api/getcommercantbycustomer') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not__api_commercant;
                    }

                    return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::retrieveCommercantAction',  '_format' => 'json',  '_route' => '_api_commercant',);
                }
                not__api_commercant:

            }

            // _api_updatecustomeroption
            if ($pathinfo === '/api/updateCustomerOptionsAction') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_updatecustomeroption;
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::updateCustomerOptionsAction',  '_format' => 'json',  '_route' => '_api_updatecustomeroption',);
            }
            not__api_updatecustomeroption:

        }

        if (0 === strpos($pathinfo, '/commercant')) {
            if (0 === strpos($pathinfo, '/commercant/offres')) {
                // list_offres
                if (rtrim($pathinfo, '/') === '/commercant/offres') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_offres');
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::offresAction',  '_route' => 'list_offres',);
                }

                // retrieve_offres
                if ($pathinfo === '/commercant/offres/retrieve') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_retrieve_offres;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::retrieveOffresAction',  '_route' => 'retrieve_offres',);
                }
                not_retrieve_offres:

                // add_offres
                if ($pathinfo === '/commercant/offres/add') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_add_offres;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::addOffresAction',  '_route' => 'add_offres',);
                }
                not_add_offres:

                // update_offres
                if ($pathinfo === '/commercant/offres/update') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_update_offres;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::updateOffresAction',  '_route' => 'update_offres',);
                }
                not_update_offres:

                // delete_offres
                if ($pathinfo === '/commercant/offres/delete') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_delete_offres;
                    }

                    return array (  '_controller' => 'Sofid\\AdminBundle\\Controller\\OffreController::deleteOffresAction',  '_route' => 'delete_offres',);
                }
                not_delete_offres:

            }

            if (0 === strpos($pathinfo, '/commercant/paliers')) {
                // list_paliers
                if (rtrim($pathinfo, '/') === '/commercant/paliers') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_paliers');
                    }

                    return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::paliersAction',  '_route' => 'list_paliers',);
                }

                // add_palier
                if ($pathinfo === '/commercant/paliers/add') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_add_palier;
                    }

                    return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::addPalierAction',  '_route' => 'add_palier',);
                }
                not_add_palier:

                // edit_palier
                if (0 === strpos($pathinfo, '/commercant/paliers/edit') && preg_match('#^/commercant/paliers/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_palier')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::editPalierAction',));
                }

                // update_palier
                if (0 === strpos($pathinfo, '/commercant/paliers/update') && preg_match('#^/commercant/paliers/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_palier')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::updatePalierAction',));
                }

                // delete_palier
                if (0 === strpos($pathinfo, '/commercant/paliers/delete') && preg_match('#^/commercant/paliers/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_palier')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::deletePalierAction',));
                }

            }

            // dashboard
            if (rtrim($pathinfo, '/') === '/commercant') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'dashboard');
                }

                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::dashboardAction',  '_route' => 'dashboard',);
            }

            // list_fideles
            if ($pathinfo === '/commercant/fideles') {
                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::listAction',  '_route' => 'list_fideles',);
            }

            // commercant_logout
            if ($pathinfo === '/commercant/logout') {
                return array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::logoutCommercantAction',  '_route' => 'commercant_logout',);
            }

            // change_scan
            if (0 === strpos($pathinfo, '/commercant/scan/change') && preg_match('#^/commercant/scan/change/(?P<nb>\\d+)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_change_scan;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_scan')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::changeScanAction',));
            }
            not_change_scan:

            if (0 === strpos($pathinfo, '/commercant/ticket')) {
                // change_ticket
                if (0 === strpos($pathinfo, '/commercant/ticket/change') && preg_match('#^/commercant/ticket/change/(?P<nb>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_change_ticket;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_ticket')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::changeTicketAction',));
                }
                not_change_ticket:

                // change_ticket_ephem
                if (0 === strpos($pathinfo, '/commercant/ticketephem/change') && preg_match('#^/commercant/ticketephem/change/(?P<nb>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_change_ticket_ephem;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_ticket_ephem')), array (  '_controller' => 'Sofid\\UserBundle\\Controller\\CommercantController::changeTicketEphemAction',));
                }
                not_change_ticket_ephem:

            }

        }

        if (0 === strpos($pathinfo, '/fidele')) {
            if (0 === strpos($pathinfo, '/fidele/log')) {
                // login_fidele
                if ($pathinfo === '/fidele/login') {
                    return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::loginAction',  '_route' => 'login_fidele',);
                }

                // logout_fidele
                if ($pathinfo === '/fidele/logout') {
                    return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::logoutAction',  '_route' => 'logout_fidele',);
                }

            }

            // edit_fidele
            if ($pathinfo === '/fidele/profile') {
                return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::editFideleAction',  '_route' => 'edit_fidele',);
            }

            // update_fidele
            if ($pathinfo === '/fidele/update') {
                return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::updateFideleAction',  '_route' => 'update_fidele',);
            }

            // home_fidele
            if (rtrim($pathinfo, '/') === '/fidele') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'home_fidele');
                }

                return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::homeAction',  '_route' => 'home_fidele',);
            }

            // authenticate_fidele
            if ($pathinfo === '/fidele/authenticate') {
                return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::authenticateAction',  '_route' => 'authenticate_fidele',);
            }

            if (0 === strpos($pathinfo, '/fidele/forgotten')) {
                // forgotten_pass_fidele
                if ($pathinfo === '/fidele/forgotten_password') {
                    return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::forgottenPassAction',  '_route' => 'forgotten_pass_fidele',);
                }

                // forgotten_fidele
                if ($pathinfo === '/fidele/forgotten') {
                    return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::forgottenAction',  '_route' => 'forgotten_fidele',);
                }

            }

            // customeroptin_fidele
            if ($pathinfo === '/fidele/customer_optin') {
                return array (  '_controller' => 'Sofid\\FideleBundle\\Controller\\FideleController::customerOptionAction',  '_route' => 'customeroptin_fidele',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
