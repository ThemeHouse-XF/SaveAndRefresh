<?php

/**
 *
 * @see XenForo_ControllerAdmin_User
 */
class ThemeHouse_SaveAndRefresh_Extend_XenForo_ControllerAdmin_User extends XFCP_ThemeHouse_SaveAndRefresh_Extend_XenForo_ControllerAdmin_User
{

    public function actionSave()
    {
        $response = parent::actionSave();

        if ($response instanceof XenForo_ControllerResponse_Redirect) {
            if ($this->_input->filterSingle('reload', XenForo_Input::STRING)) {
                $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);

                if (!$userId) {
                    $userId = XenForo_Application::getDb()->lastInsertId('xf_user');
                }

                if ($userId) {
                    $user = $this->_getUserModel()->getUserById($userId);

                    if ($user) {
                        return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                            XenForo_Link::buildAdminLink('users/edit', $user));
                    }
                }
            }
        }

        return $response;
    } /* END actionSave */
}