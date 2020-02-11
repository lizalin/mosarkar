CREATE TABLE `t_ms_sms_logs` (
  `intSmsLogId` int(11) NOT NULL AUTO_INCREMENT,
  `intInOutboundId` int(11) DEFAULT NULL,
  `intType` int(11) DEFAULT '0',
  `intSmsStatus` int(11) DEFAULT '0',
  `intMobileNumber` bigint(20) DEFAULT NULL,
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dtmUpdatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intSmsLogId`),
  KEY `index1` (`intSmsLogId`,`intInOutboundId`,`intMobileNumber`,`intType`,`intSmsStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `t_ms_outbound_data` ADD COLUMN `intMoSarkarRegistrationStatus` INT NULL DEFAULT 0 AFTER `vchRegdNo`;


CREATE  PROCEDURE `USP_MS_SMS_LOG`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

/** Start of params building block **/
    
  SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/   

/*Action to add FAQ Questions*/
IF(P_ACTION='AU') THEN
    if(@p_intSmsLogId=0) THEN   
  INSERT INTO t_ms_sms_logs (intInOutboundId, intType, intSmsStatus, intMobileNumber, dtmCreatedOn, dtmUpdatedOn) VALUES (@p_intInOutboundId, @p_intType, @p_intSmsStatus, @p_intMobileNumber, now(),now());
    ELSE
    UPDATE t_ms_inbound_data SET intDepartmentId=@p_intCreatedBy, intCreatedBy=@p_intCreatedBy, vchName=@p_vchName, intMobile=@p_intMobile, intGender=@p_intGender, intGender=@p_intGender, intDistrictId=@p_intDistrictId, intBlockId=@p_intBlockId, intGPId=@p_intGPId, intVillageId=@p_intVillageId, vchAddress=@p_vchAddress, intServiceId=@p_intServiceId, vchComplain=@p_vchComplain, varReferenceNo=@p_varReferenceNo, intAge=@p_intAge , intLocation=@p_intLocation , intDepartmentId = @p_intDepartmentId,int_hs_ps_id = @p_int_hs_ps_id where p_intInboundDataId=@p_intInboundDataId ;
    END IF;
    
END IF;

IF(P_ACTION='GOD') THEN  
 SELECT * FROM mosarkardev_DB.t_ms_outbound_data WHERE intMoSarkarRegistrationStatus=@p_intMoSarkarRegistrationStatus AND bitDeletedFlag =0;
    
END IF;

END

CREATE DEFINER=`MosarkarU`@`%` PROCEDURE `USP_MS_INBOUND`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/   
 /* Dplicate Check by :Puja Kumari on dt:24-09-2019*/  
 IF(P_ACTION='CD')THEN
   SELECT COUNT(1) FROM m_ms_faq WHERE bitDeletedFlag = 0 AND vchFaqQuestion = @p_vchQuestionEnglish;	
  END IF;

/*Action to add FAQ Questions*/
IF(P_ACTION='AU') THEN
    if(@p_intInboundDataId=0) THEN   
	INSERT INTO t_ms_inbound_data (intInboundDataId, intCreatedBy, vchName, intMobile, intGender, intDistrictId, intBlockId, intGPId, intVillageId, vchAddress, intServiceId, vchComplain, varReferenceNo, intAge, intLocation,intDepartmentId,int_hs_ps_id) VALUES (@p_intInboundDataId, @p_intCreatedBy, @p_vchName, @p_intMobile, @p_intGender,@p_intDistrictId,@p_intBlockId,@p_intGPId,@p_intVillageId,@p_vchAddress,@p_intServiceId,@p_vchComplain, @p_varReferenceNo, @p_intAge, @p_intLocation,@p_intDepartmentId,@p_int_hs_ps_id);
    
    INSERT INTO t_ms_call_information (intMobile, intType, intCreatedBy, dtmCallStart, dtmCallEnd, intOutboundDataId) VALUES (@p_intMobile, @p_intType, @p_intCreatedBy, @p_dtmCallStart, @p_dtmCallEnd, LAST_INSERT_ID());
    SELECT LAST_INSERT_ID() as intInboundDataId;
    ELSE
    UPDATE t_ms_inbound_data SET intDepartmentId=@p_intCreatedBy, intCreatedBy=@p_intCreatedBy, vchName=@p_vchName, intMobile=@p_intMobile, intGender=@p_intGender, intGender=@p_intGender, intDistrictId=@p_intDistrictId, intBlockId=@p_intBlockId, intGPId=@p_intGPId, intVillageId=@p_intVillageId, vchAddress=@p_vchAddress, intServiceId=@p_intServiceId, vchComplain=@p_vchComplain, varReferenceNo=@p_varReferenceNo, intAge=@p_intAge , intLocation=@p_intLocation , intDepartmentId = @p_intDepartmentId,int_hs_ps_id = @p_int_hs_ps_id where p_intInboundDataId=@p_intInboundDataId ;
    SELECT @p_intInboundDataId as intInboundDataId;
    END IF;
    
END IF;

  /*Action to view FAQ by:Puja kumari on dt:24-09-2019*/
IF(P_ACTION='V') THEN
      SET @P_SQL='SELECT tmsi.intRequestStatus,tmsi.intInboundDataId, tmsi.varReferenceNo, tmsi.intMobile, tmsi.intCreatedBy, tmsi.vchName, tmsi.intDistrictId, tmsi.vchAddress, tmsi.intGender, tmsi.intDepartmentId,(SELECT vchDeptName FROM m_department C WHERE tmsi.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, tmsi.intServiceId, (SELECT vchServiceName FROM m_ms_service_registration D WHERE tmsi.intDepartmentId = D.intDepartmentId AND tmsi.intServiceId = D.intServiceRegistrationId) AS vchService, (SELECT IF(tmsi.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = tmsi.intDistrictId AND H.intHospitalId = tmsi.int_hs_ps_id), IF(tmsi.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = tmsi.intDistrictId AND P.intPolicestationId = tmsi.int_hs_ps_id), "--"))) AS complaintAgainst, tmsi.int_hs_ps_id, DATE(tmsi.dtmCreatedOn) AS dtmCreatedOn, tmsi.vchComplain, tmsi.intAge, asv.VCH_VALUE_NAME AS vchDisttrictName, (SELECT IF(tmsi.intGender = "2", "Female", IF(tmsi.intGender = "3", "Transgender", "Male")) ) AS vchGender, mdu.VCH_FULL_NAME AS vchFullName FROM t_ms_inbound_data tmsi LEFT JOIN m_admin_subnode_values asv ON (asv.INT_SUBNODEVAL_ID = tmsi.intDistrictId) LEFT JOIN m_admin_user mdu ON (mdu.INT_USER_ID = tmsi.intCreatedBy) WHERE tmsi.bitDeletedFlag = 0';
	 IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(tmsi.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
  IF(@p_intDesg_Id>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND tmsi.intCreatedBy=',@p_intCreatedBy);
    END IF;
     IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_vchServicesId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceRegistrationId=',@p_vchServicesId);
    END IF;
    IF(CHAR_LENGTH(@p_vchFAQQuestion)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchFAQQuestion ="',@P_vchFAQQuestion,'"');
	END IF;
     SET @P_SQL=CONCAT(@P_SQL,' ORDER BY CASE WHEN tmsi.dtmAssignedTime IS NULL THEN tmsi.dtmCreatedOn ELSE tmsi.dtmAssignedTime END DESC ');
	PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
     #select @P_SQL;
END IF;

/*Action to view FAQ by:Puja kumari on dt:24-09-2019*/
IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT tmsi.intRequestStatus,tmsi.intInboundDataId, tmsi.varReferenceNo, tmsi.intMobile, tmsi.intCreatedBy, tmsi.vchName, tmsi.intDistrictId, tmsi.vchAddress, tmsi.intGender, tmsi.intDepartmentId,(SELECT vchDeptName FROM m_department C WHERE tmsi.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, tmsi.intServiceId, (SELECT vchServiceName FROM m_ms_service_registration D WHERE tmsi.intDepartmentId = D.intDepartmentId AND tmsi.intServiceId = D.intServiceRegistrationId) AS vchService, (SELECT IF(tmsi.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = tmsi.intDistrictId AND H.intHospitalId = tmsi.int_hs_ps_id), IF(tmsi.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = tmsi.intDistrictId AND P.intPolicestationId = tmsi.int_hs_ps_id), "--"))) AS complaintAgainst, tmsi.int_hs_ps_id, DATE(tmsi.dtmCreatedOn) AS dtmCreatedOn, tmsi.vchComplain, tmsi.intAge, asv.VCH_VALUE_NAME AS vchDisttrictName, (SELECT IF(tmsi.intGender = "2", "Female", IF(tmsi.intGender = "3", "Transgender", "Male")) ) AS vchGender, mdu.VCH_FULL_NAME AS vchFullName FROM t_ms_inbound_data tmsi LEFT JOIN m_admin_subnode_values asv ON (asv.INT_SUBNODEVAL_ID = tmsi.intDistrictId) LEFT JOIN m_admin_user mdu ON (mdu.INT_USER_ID = tmsi.intCreatedBy) WHERE tmsi.bitDeletedFlag = 0';
     IF(@p_intCreatedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND tmsi.intCreatedBy=',@p_intCreatedBy);
    END IF;
     IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(tmsi.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_vchServicesId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceRegistrationId=',@p_vchServicesId);
    END IF;
    IF(CHAR_LENGTH(@p_vchFAQQuestion)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchFAQQuestion ="',@P_vchFAQQuestion,'"');
	END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY CASE WHEN tmsi.dtmAssignedTime IS NULL THEN tmsi.dtmCreatedOn ELSE tmsi.dtmAssignedTime END DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF;  
/*Action to delete faq by:Puja kumari on dt:24-09-2019*/
 IF(P_ACTION='D')THEN
    UPDATE m_ms_faq SET bitDeletedFlag=1 WHERE intFaqId=@p_ids;
    select 0;
  END IF;
/*Action to publish faq by:Puja kumari on dt:24-09-2019*/
IF(P_ACTION='P')THEN
    UPDATE m_ms_faq SET tinPublishStatus=2,dtmUpdatedOn=NOW() WHERE intFaqId=@p_ids;
    SELECT 'FAQ Publish Successfully';
  END IF;
/*Action to unpublish faq by:Puja kumari on dt:24-09-2019*/
   IF(P_ACTION='IN')THEN
    UPDATE m_ms_faq SET tinPublishStatus=1,dtmUpdatedOn=NOW() WHERE intFaqId=@p_ids;
    SELECT 'FAQ Unpublish Successfully';
  END IF;
/*Action to read faq by:Puja kumari on dt:24-09-2019*/
  IF(P_ACTION='R') THEN
	set @qt = "', ' , ";
    SET @P_SQL = CONCAT('SELECT A.vchName, A.intMobile, A.intGender, A.intDistrictId, A.intBlockId, A.intGPId, A.intVillageId, A.vchAddress,A.intAge,A.intLocation,(SELECT D.VCH_VALUE_NAME FROM m_admin_subnode_values D where A.intDistrictId=D.INT_SUBNODEVAL_ID) AS vchDistrict,
(SELECT CASE a.nodeVal
  WHEN 0 THEN a.areaName
  WHEN 1 THEN concat(a.areaName, ",Odisha")
  WHEN 2 THEN concat(a.areaName,',@qt,' (select b.areaName from m_hierarchy_details b where a.Dist=b.INT_SUBNODEVAL_ID limit 1))
  WHEN 3 THEN concat(a.areaName,',@qt,' (select b.areaName from m_hierarchy_details b where b.Block=a.Block limit 1),',@qt,'  (select b.areaName from m_hierarchy_details b where b.Dist=a.Dist limit 1))
  WHEN 4 THEN concat(a.areaName,',@qt,'(select f.areaName from m_hierarchy_details f where a.ulb_gp=f.INT_SUBNODEVAL_ID limit 1),',@qt,' (select b.areaName from m_hierarchy_details b where a.Block=b.INT_SUBNODEVAL_ID limit 1), ',@qt,'(select c.areaName from m_hierarchy_details c where a.Dist=c.INT_SUBNODEVAL_ID limit 1))
  ELSE NULL
  END as locationName from m_hierarchy_details a where a.bitDeletedFlag =0  AND a.INT_SUBNODEVAL_ID = A.intLocation) as locationName
FROM t_ms_inbound_data A WHERE A.bitDeletedFlag=0 ') ;
 SET @P_SQL=CONCAT(@P_SQL,' AND A.intMobile=',@p_intMobile);
 SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmUpdatedOn DESC LIMIT 1');
PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT ;
    END IF;
    
  IF(P_ACTION='RIC') THEN
	UPDATE t_ms_inbound_data SET intAssignedTo=@p_userId, dtmAssignedTime=NOW() where intInboundDataId=@p_intId;
  END IF;

END