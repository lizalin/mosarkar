ALTER TABLE `t_ms_feedback_received` 
ADD INDEX `CallingScreen` (`intOutboundDataId` ASC, `intCallType` ASC, `intFeedbackStatus` ASC, `intRequestedById` ASC, `dtmCreatedOn` ASC);

ALTER TABLE `t_ms_inbound_data` 
ADD INDEX `authorityCallingScreen` (`bitDeletedFlag` ASC, `intRequestStatus` ASC, `dtmAssignedTime` ASC, `intInboundDataId` ASC, `intAssignedTo` ASC);

ALTER TABLE `t_ms_outbound_data` 
ADD INDEX `authorityCallingScreen` (`bitDeletedFlag` ASC, `intRequestStatus` ASC, `dtmAssignedTime` ASC, `intOutboundDataId` ASC, `intAssignedTo` ASC);

ALTER TABLE `t_ms_feedback_received` 
ADD INDEX `CallingScreen1` (`intOutboundDataId` ASC, `intRequestedById` ASC, `dtmCreatedOn` ASC);


USP_MG_FEEDBACK_RECEIVE
USP_MS_MISREPORT_OUTBOUND

