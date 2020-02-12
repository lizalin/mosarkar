CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MG_SERVICE_TRANSACTION_IMPORT`(IN `P_ACTION` CHAR(4), IN `P_VALUES` mediumtext)
BEGIN


DECLARE EXIT HANDLER FOR NOT FOUND
 BEGIN
 
	GET DIAGNOSTICS CONDITION 1
	@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
	@sqlstate = RETURNED_SQLSTATE, 
	@errno = MYSQL_ERRNO,
	@text = MESSAGE_TEXT; 
	SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text);     
	
   
    SET @P_STATUS=4;
    SET @P_MSG=('Error: Table or column not found');
	SELECT  @P_STATUS,@P_MSG;
 ROLLBACK;
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_SERVICE_TRANSACTION_IMPORT("',P_ACTION, '","',P_VALUES,'")');
END;

DECLARE EXIT HANDLER FOR SQLWARNING
 BEGIN
	
    GET DIAGNOSTICS CONDITION 1
	@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
	@sqlstate = RETURNED_SQLSTATE, 
	@errno = MYSQL_ERRNO,
	@text = MESSAGE_TEXT; 
	SET @full_error = CONCAT("SQLWARNING ", @errno, " (", @sqlstate, "): ", @text);     
	
   
    SET @P_STATUS=4;
    SET @P_MSG=('ERROR: Unable to process your request in Procedure');
	SELECT  @P_STATUS,@P_MSG;
 ROLLBACK; 
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_SERVICE_TRANSACTION_IMPORT("',P_ACTION, '","',P_VALUES,'")');
END;


DECLARE EXIT HANDLER FOR SQLEXCEPTION 
BEGIN

	GET DIAGNOSTICS CONDITION 1
	@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
	@sqlstate = RETURNED_SQLSTATE, 
	@errno = MYSQL_ERRNO,
	@text = MESSAGE_TEXT; 
	SET @full_error = CONCAT("SQLEXCEPTION ", @errno, " (", @sqlstate, "): ", @text);     
	

      SET @P_STATUS=4;
      SET @P_MSG=('ERROR: Unable to process your request in DATABASE'); 
      
      SELECT  @P_STATUS,@P_MSG;
      ROLLBACK;
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_SERVICE_TRANSACTION_IMPORT("',P_ACTION, '","',P_VALUES,'")');
      
END;



/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/ 
    
		IF(P_ACTION='A') THEN   
		SET SQL_SAFE_UPDATES = 0;
		

		SET @P_SQL=CONCAT('INSERT INTO t_ms_outbound_data (intDepartmentId, intServiceId,  vchName, intMobile,intDistrictId, intAge, intGender,  jsonRelatedInfo,intCreatedThrough,int_hs_ps_id) VALUES ',@p_excel_data_query);
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
		SET SQL_SAFE_UPDATES = 1;
		END IF;
        
        
         IF(P_ACTION='CTR') THEN
 
		SET @P_SQL = 'SELECT count(1)as totalRec from t_ms_outbound_data where bitDeletedFlag=0 ';
		IF(@p_intServiceId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
		END IF;
		IF(@p_intDepartmentId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
		END IF;
        
		IF(@p_intSchemeTypeId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intSchemeTypeId=',@p_intSchemeTypeId);
		END IF;
        
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
		END IF;
        
        
        IF(P_ACTION='FQID') THEN 
        START TRANSACTION;
        
		SET @P_SQL = 'SELECT intSurveyQuestId,vchQuestionEnglish FROM t_ms_survey_questionnaire where  bitDeletedFlag=0';
		IF(@p_intServiceId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServicesId=',@p_intServiceId);
		END IF;
		IF(@p_intDepartmentId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
		END IF;
        IF(@p_question!='')THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND vchQuestionEnglish=',@p_question);
		END IF;
		#select @P_SQL;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
        
        COMMIT;
        
        
		END IF;
        
        IF(P_ACTION='FAID') THEN 
        START TRANSACTION;
        
		SET @P_SQL = 'SELECT intSurveyQuestId,vchOptionEnglish,intOptionValue FROM t_ms_survey_questionnaire_option where  bitDeletedFlag=0';
		
        IF(@p_intSurveyQuestId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intSurveyQuestId=',@p_intSurveyQuestId);
		END IF;
		
		#select @P_SQL;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
        
        COMMIT;
        
        
		END IF;
        
        IF(P_ACTION='FOUT') THEN 
        START TRANSACTION;
		SET @P_SQL1 = 'INSERT INTO t_ms_outbound_data(inserttransid,intDepartmentId,intServiceId,intDistrictId,vchName,intMobile,intAge,intGender,dtmRegdDateTime,jsonRelatedInfo,intCreatedThrough)VALUES';
		
        IF(CHAR_LENGTH(@p_outboundQry)>0)THEN
			SET @P_SQL1 = CONCAT(@P_SQL1,@p_outboundQry);
		END IF;
		
		PREPARE STMT FROM @P_SQL1;
		EXECUTE STMT;
        
        SET @P_SQL2 = 'INSERT INTO t_ms_feedback_received(intOutboundDataId,dtmFeedbackRcvTime,intFeedbackStatus,intDepartmentId,intServiceId,intDistrictId,inserttransid)VALUES';
		
        IF(CHAR_LENGTH(@p_outboundFeedbackQry)>0)THEN
			SET @P_SQL2 = CONCAT(@P_SQL2,@p_outboundFeedbackQry);
		END IF;
		
		PREPARE STMT FROM @P_SQL2;
		EXECUTE STMT;
        
        SET @P_SQL3 = 'INSERT INTO t_ms_feedback_ans_submited(intOutboundDataId,intQuestionId,intAnswerId,inserttransid)VALUES';
		
        IF(CHAR_LENGTH(@p_outboundFeedbackSubQry)>0)THEN
			SET @P_SQL3 = CONCAT(@P_SQL3,@p_outboundFeedbackSubQry);
		END IF;
		
		PREPARE STMT FROM @P_SQL3;
		EXECUTE STMT;
        
        UPDATE t_ms_feedback_received tf INNER JOIN t_ms_outbound_data tos ON tos.inserttransid=tf.inserttransid SET tf.intOutboundDataId=tos.intOutboundDataId WHERE tf.inserttransid>0;
        
        UPDATE t_ms_feedback_ans_submited ts INNER JOIN t_ms_outbound_data tos ON tos.inserttransid=ts.inserttransid SET ts.intOutboundDataId=tos.intOutboundDataId WHERE ts.inserttransid>0;
        
        UPDATE t_ms_feedback_received SET inserttransid='' WHERE inserttransid>0;
        UPDATE t_ms_feedback_ans_submited SET inserttransid='' WHERE inserttransid>0;
        UPDATE t_ms_outbound_data SET inserttransid='' WHERE inserttransid>0;
        
        COMMIT;
        
        
		END IF;
        
        
		IF(P_ACTION='FQD') THEN 
        START TRANSACTION;
        SET @RETURNVAL="";
        
		SET @P_SQL = 'SELECT intSurveyQuestId INTO @QUESTIONID FROM t_ms_survey_questionnaire where  bitDeletedFlag=0';
		IF(@p_intServiceId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServicesId=',@p_intServiceId);
		END IF;
		IF(@p_intDepartmentId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
		END IF;
        IF(@p_questionSlno>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intQuestionSlNo=',@p_questionSlno);
		END IF;
		Select @P_SQL;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
        
        
        SET @M_SQL = 'SELECT GROUP_CONCAT(intSurveyOptionId) INTO @ANSWERID FROM t_ms_survey_questionnaire_option where  bitDeletedFlag=0';		
        IF(char_length(@p_answerSlno)>0)THEN
			SET @M_SQL = CONCAT(@M_SQL,' AND intOptionSlNo IN(',@p_answerSlno,')');
		END IF;
        IF(@QUESTIONID>0)THEN
			SET @M_SQL = CONCAT(@M_SQL,' AND intSurveyQuestId =',@QUESTIONID);
		END IF;
		#select @M_SQL;
		PREPARE STMT1 FROM @M_SQL;
		EXECUTE STMT1;
        
        
        SET @RETURNVAL=concat(@QUESTIONID,'~~',@ANSWERID);
         select @RETURNVAL;
        COMMIT;
        
        
		END IF;
        
        
        IF(P_ACTION='AF') THEN   
		SET SQL_SAFE_UPDATES = 0;
		SET @P_SQL=CONCAT('INSERT INTO t_ms_outbound_data (intDepartmentId, intServiceId,  vchName, intMobile,intDistrictId, intAge, intGender,  jsonRelatedInfo,intCreatedThrough,intFeedbackStatus,int_hs_ps_id) VALUES ',@p_insertStr);
        
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;  
        
        
        SET @OBID= (SELECT LAST_INSERT_ID());
        
        
        IF(@OBID>0 AND @p_FeedbackStatus!=0)THEN
        SET @M_SQL=CONCAT('INSERT INTO t_ms_feedback_received (intOutboundDataId,dtmFeedbackRcvTime,vchAdditionalInfo,intFeedbackStatus, intFeedbackCollectedBy) VALUES ',@p_feebackQuery);
        
        PREPARE STMT1 FROM @M_SQL;
		EXECUTE STMT1;  
        SET @FBCID= (SELECT LAST_INSERT_ID());
        
				 IF(@FBCID>0 AND @p_FeedbackStatus=1)THEN
						 SET @S_SQL=CONCAT('INSERT INTO t_ms_feedback_ans_submited (intOutboundDataId,intQuestionId,intAnswerId,vchRemarks) VALUES ',@p_questionAnswerQuery);
				
				PREPARE STMT2 FROM @S_SQL;
				EXECUTE STMT2;
                 
				 END IF;
        
        
        
        END IF;
        
        
        
		SET SQL_SAFE_UPDATES = 1;
		END IF;
        
        
        
        
        
        
        
        IF(P_ACTION='FSR') THEN
 
		SET @P_SQL = 'SELECT vchRegdNo from t_ms_outbound_data where bitDeletedFlag=0 ';
				IF(@p_intServiceId>0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
				END IF;
                IF(@p_intDepartmentId>0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
				END IF;
				IF(CHAR_LENGTH(@p_startDate)>0 AND CHAR_LENGTH(@p_endDate)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmRegdDateTime) BETWEEN "',@p_startDate,'" AND "',@p_endDate,'"');
				END IF;
		
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
		END IF;
        
        
        
        
        
        IF(P_ACTION='API')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     -- SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     
    #### Prepairing  query 
   DROP TEMPORARY TABLE IF EXISTS TEMPTBL;
     CREATE TEMPORARY TABLE TEMPTBL (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,Comp_Name VARCHAR(128), Age INT, genderId INT, PS_CD varchar(64), DISRTICT_CD varchar(64), FIR_REG_NUM varchar(64), FIR_NUM TEXT, FIR_DATE DATETIME, MobileNO BIGINT, intDepartmentId INT, intServiceId INT );
     
     
     SET @PRO_SQL = CONCAT('INSERT INTO TEMPTBL (Comp_Name,Age,genderId,PS_CD,DISRTICT_CD,FIR_REG_NUM,FIR_NUM,FIR_DATE,MobileNO,intDepartmentId,intServiceId) values ',@p_InsertQuery);
    
     #select @PRO_SQL;
	PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
     
     
     
    -- select * from TEMPTBL;  
    SET @ROWCOUNT= (SELECT COUNT(ID) FROM TEMPTBL);
    IF(@ROWCOUNT>0)THEN
     SET @INTCOUNTER=1;
		WHILE(@INTCOUNTER<=@ROWCOUNT)
		DO
        SET @PS_CD					       = (SELECT PS_CD  FROM TEMPTBL WHERE ID=@INTCOUNTER );
		SET @DISRTICT_CD           	       = (SELECT DISRTICT_CD  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @PS_ID						    =(SELECT intPolicestationId from m_ms_police_station where vchPSCode=@PS_CD);
        SET @DISRTICT_ID				    =(SELECT intConsoleDistId from m_ms_police_station where intDistrictId =@DISRTICT_CD and   vchPSCode=@PS_CD limit 1);
        SET @Comp_Name				       = (SELECT Comp_Name  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @Age 					       = (SELECT Age  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @genderId					   = (SELECT genderId  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @FIR_REG_NUM			       = (SELECT FIR_REG_NUM  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        
        SET @FIR_DATE				       = (SELECT FIR_DATE  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @MobileNO   			       = (SELECT MobileNO  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @intDepartmentId		       = (SELECT intDepartmentId  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        SET @intServiceId   		       = (SELECT intServiceId  FROM TEMPTBL WHERE ID=@INTCOUNTER );
		SET @FIR_NUM				       = (SELECT FIR_NUM  FROM TEMPTBL WHERE ID=@INTCOUNTER );
        
        
         INSERT INTO t_ms_outbound_data SET
         intDepartmentId=@intDepartmentId,
         intServiceId=@intServiceId,
         intDistrictId=@DISRTICT_ID,
         vchName=@Comp_Name,
         intMobile=@MobileNO,
         intAge=@Age,
         intGender=@genderId,
         int_hs_ps_id=@PS_ID,
         dtmRegdDateTime=@FIR_DATE,
         jsonRelatedInfo=@FIR_NUM,
         vchRegdNo=@FIR_REG_NUM,
         intCreatedThrough=2;
        SET @INTCOUNTER= @INTCOUNTER+1;
		END WHILE;
   
   END IF;
     
	COMMIT;
	END IF;
        
       
        IF(P_ACTION='APIH')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     -- SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION; 
     SET @PRO_SQL = CONCAT('INSERT INTO t_ms_outbound_data (intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, dtmRegdDateTime, jsonRelatedInfo, vchRegdNo) values ',@p_InsertQuery);
    
     #select @PRO_SQL;
	PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
     
     COMMIT;
	END IF;
        
        
        
        
        
END