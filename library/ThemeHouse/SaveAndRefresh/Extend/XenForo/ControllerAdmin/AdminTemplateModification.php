<?php

/**
 *
 * @see XenForo_ControllerAdmin_AdminTemplateModification
 */
class ThemeHouse_SaveAndRefresh_Extend_XenForo_ControllerAdmin_AdminTemplateModification extends XFCP_ThemeHouse_SaveAndRefresh_Extend_XenForo_ControllerAdmin_AdminTemplateModification
{

    /**
     *
     * @see XenForo_ControllerAdmin_AdminTemplateModification::actionSave()
     */
    public function actionSave()
    {
        $response = parent::actionSave();

        if ($response instanceof XenForo_ControllerResponse_Redirect) {
            if ($this->_input->filterSingle('reload', XenForo_Input::STRING)) {
                $modificationId = $this->_input->filterSingle('modification_id', XenForo_Input::UINT);

                if (!$modificationId) {
                    $modificationId = XenForo_Application::getDb()->lastInsertId('xf_admin_template_modification');
                }

                if ($modificationId) {
                    $modification = $this->_getModificationModel()->getModificationById($modificationId);

                    if ($modification) {
                        return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                            XenForo_Link::buildAdminLink('admin-template-mods/edit', $modification));
                    }
                }
            }
        }

        return $response;
    } /* END actionSave */
}