ALTER TABLE `t_ms_outbound_data` 
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `int_hs_ps_id` ASC);

ALTER TABLE `t_ms_inbound_data` 
ADD INDEX `InstitutionWiseReport` (`intInboundDataId` ASC, `int_hs_ps_id` ASC);

ALTER TABLE `t_ms_feedback_received` 
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `intDirectCallFeedbackStatus` ASC, `intCallType` ASC);


ALTER TABLE `t_ms_feedback_received` 
DROP INDEX `InstitutionWiseReport` ,
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `intDirectCallFeedbackStatus` ASC, `intCallType` ASC, `intFeedbackCollectedBy` ASC);

ALTER TABLE `t_ms_feedback_received` 
DROP INDEX `InstitutionWiseReport` ,
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `intDirectCallFeedbackStatus` ASC, `intCallType` ASC, `intFeedbackCollectedBy` ASC, `intRequestedById` ASC, `bitDeletedFlag` ASC);


ALTER TABLE `t_ms_inbound_data` 
DROP INDEX `InstitutionWiseReport` ,
ADD INDEX `InstitutionWiseReport` (`intInboundDataId` ASC, `int_hs_ps_id` ASC, `intDepartmentId` ASC, `bitDeletedFlag` ASC);


ALTER TABLE `t_ms_outbound_data` 
DROP INDEX `InstitutionWiseReport` ,
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `int_hs_ps_id` ASC, `intDepartmentId` ASC, `bitDeletedFlag` ASC);

ALTER TABLE `t_ms_feedback_received` 
DROP INDEX `InstitutionWiseReport` ,
ADD INDEX `InstitutionWiseReport` (`intOutboundDataId` ASC, `intCallType` ASC, `intRequestedById` ASC, `bitDeletedFlag` ASC, `intFeedbackStatus` ASC, `intDirectCallFeedbackStatus` ASC);

