-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: 192.168.10.69    Database: FSCW_FS_DB
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `vw_ms_pull_data`
--

DROP TABLE IF EXISTS `vw_ms_pull_data`;
/*!50001 DROP VIEW IF EXISTS `vw_ms_pull_data`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_ms_pull_data` AS SELECT 
 1 AS `intOutboundDataId`,
 1 AS `dataType`,
 1 AS `intDepartmentId`,
 1 AS `intServiceId`,
 1 AS `intSchemeTypeId`,
 1 AS `intCardTypeId`,
 1 AS `intDistrictId`,
 1 AS `intBlockId`,
 1 AS `intGPId`,
 1 AS `intVillageId`,
 1 AS `vchName`,
 1 AS `intMobile`,
 1 AS `intAge`,
 1 AS `intGender`,
 1 AS `int_hs_ps_id`,
 1 AS `intFeedbackStatus`,
 1 AS `intRequestStatus`,
 1 AS `intBookmark`,
 1 AS `intAssignedTo`,
 1 AS `dtmAssignedTime`,
 1 AS `dtmCreatedOn`,
 1 AS `intMoSarkarRegistrationStatus`,
 1 AS `dtmRegdDateTime`,
 1 AS `vchOther`,
 1 AS `jsonRelatedInfo`,
 1 AS `vchRegdNo`,
 1 AS `vchRationCardNo`,
 1 AS `intNoFamily`,
 1 AS `vchTokenNo`,
 1 AS `dtmPaddyDeposite`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_ms_pull_data`
--

/*!50001 DROP VIEW IF EXISTS `vw_ms_pull_data`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`fscwdevu`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_ms_pull_data` AS select `A`.`intOutboundDataId` AS `intOutboundDataId`,1 AS `dataType`,`A`.`intDepartmentId` AS `intDepartmentId`,`A`.`intServiceId` AS `intServiceId`,`A`.`intSchemeTypeId` AS `intSchemeTypeId`,`A`.`intCardTypeId` AS `intCardTypeId`,`A`.`intDistrictId` AS `intDistrictId`,`A`.`intBlockId` AS `intBlockId`,`A`.`intGPId` AS `intGPId`,`A`.`intVillageId` AS `intVillageId`,`A`.`vchName` AS `vchName`,`A`.`intMobile` AS `intMobile`,`A`.`intAge` AS `intAge`,`A`.`intGender` AS `intGender`,`A`.`int_hs_ps_id` AS `int_hs_ps_id`,`A`.`intFeedbackStatus` AS `intFeedbackStatus`,`A`.`intRequestStatus` AS `intRequestStatus`,`A`.`intBookmark` AS `intBookmark`,`A`.`intAssignedTo` AS `intAssignedTo`,`A`.`dtmAssignedTime` AS `dtmAssignedTime`,`A`.`dtmCreatedOn` AS `dtmCreatedOn`,`A`.`intMoSarkarRegistrationStatus` AS `intMoSarkarRegistrationStatus`,`A`.`dtmRegdDateTime` AS `dtmRegdDateTime`,'' AS `vchOther`,`A`.`jsonRelatedInfo` AS `jsonRelatedInfo`,`A`.`vchRegdNo` AS `vchRegdNo`,`A`.`vchRationCardNo` AS `vchRationCardNo`,`A`.`intNoFamily` AS `intNoFamily`,`A`.`vchTokenNo` AS `vchTokenNo`,`A`.`vchTokenNo` AS `dtmPaddyDeposite` from `t_ms_outbound_data` `A` where (`A`.`bitDeletedFlag` = 0) union all select `A`.`intInboundDataId` AS `intOutboundDataId`,2 AS `dataType`,`A`.`intDepartmentId` AS `intDepartmentId`,`A`.`intServiceId` AS `intServiceId`,NULL AS `intSchemeTypeId`,NULL AS `intCardTypeId`,`A`.`intDistrictId` AS `intDistrictId`,NULL AS `intBlockId`,NULL AS `intGPId`,NULL AS `intVillageId`,`A`.`vchName` AS `vchName`,`A`.`intMobile` AS `intMobile`,`A`.`intAge` AS `intAge`,`A`.`intGender` AS `intGender`,`A`.`int_hs_ps_id` AS `int_hs_ps_id`,`A`.`intFeedbackStatus` AS `intFeedbackStatus`,`A`.`intRequestStatus` AS `intRequestStatus`,`A`.`intBookmark` AS `intBookmark`,`A`.`intAssignedTo` AS `intAssignedTo`,`A`.`dtmAssignedTime` AS `dtmAssignedTime`,`A`.`dtmCreatedOn` AS `dtmCreatedOn`,`A`.`intMoSarkarRegistrationStatus` AS `intMoSarkarRegistrationStatus`,`A`.`vchServiceDate` AS `dtmRegdDateTime`,`A`.`vchOther` AS `vchOther`,NULL AS `vchRationCardNo`,0 AS `intNoFamily`,NULL AS `vchTokenNo`,NULL AS `dtmPaddyDeposite`,NULL AS `jsonRelatedInfo`,NULL AS `vchRegdNo` from `t_ms_inbound_data` `A` where (`A`.`bitDeletedFlag` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database 'FSCW_FS_DB'
--
/*!50003 DROP FUNCTION IF EXISTS `FN_ALL_PARENT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_ALL_PARENT`(P_NODE		INT) RETURNS varchar(200) CHARSET latin1
BEGIN

SET @ALL_NODES	=(SELECT

CAST(concat(
(case Block when 0 then '' else concat(Block,',') end),
(case Dist when 0 then '' else concat(Dist,',') end),
(case State when 0 then '' else State end) ) as char) allNodes

FROM m_hierarchy_details WHERE INT_SUBNODEVAL_ID=P_NODE);

RETURN @ALL_NODES;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_DEPARTMENT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_DEPARTMENT`(
P_USER_ID INT) RETURNS varchar(200) CHARSET latin1
BEGIN

SET @DEPT_NAME	=(SELECT vchDeptName FROM m_department WHERE intDeptId=(SELECT INT_PH_LOCATION FROM m_admin_user WHERE INT_USER_ID=P_USER_ID));
RETURN @DEPT_NAME;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_ACTION_ROW_SPAN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_ACTION_ROW_SPAN`(GRIVANCE_ID INT,HEIRARCHY_ID INT) RETURNS int(11)
BEGIN


  SET @ROW_SUM = 0;

  IF(HEIRARCHY_ID >0)THEN

  SET @ROW_SUM = (SELECT SUM(totalAction) FROM(SELECT COUNT(1)-1 AS totalAction FROM
  t_letter_action a,t_letter_despatch b WHERE a.intLetterId = b.intId AND a.intGrivanceId = GRIVANCE_ID
  AND FN_NODE_INDEX_DATA(b.intHeirarchyId,3) = HEIRARCHY_ID GROUP BY a.intLetterId HAVING totalAction>1)t);


  ELSE

  SET @ROW_SUM = (SELECT SUM(totalAction) FROM(SELECT COUNT(1)-1 AS totalAction FROM
  t_letter_action a,t_letter_despatch b WHERE a.intLetterId = b.intId AND a.intGrivanceId = GRIVANCE_ID
  GROUP BY a.intLetterId HAVING totalAction>0)t);


  END IF;



RETURN @ROW_SUM;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_AGENCY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_AGENCY`(
  x VARCHAR(64)
) RETURNS varchar(255) CHARSET latin1
BEGIN 
    
    SET @COUNT_STR = SPLIT_STR_COUNT(x,',');
    SET @Y = 1;
    SET @AGCID	= '';
    set @test_con = 0;
    WHILE @Y <= @COUNT_STR DO
	SET  @user_id = SPLIT_STR(x,',',@Y);
    
    
    SELECT INT_GROUP_ID INTO @INT_GROUP_ID from m_admin_user where INT_USER_ID=@user_id;
        
    IF(CHAR_LENGTH(@INT_GROUP_ID)>0 AND @INT_GROUP_ID > 0)THEN
		SET @AGCID = CONCAT(@AGCID,',',@INT_GROUP_ID);
    END IF;
    
	SET  @Y = @Y + 1;
    
	END WHILE;
    SET @AGCID = (SELECT TRIM(LEADING ',' FROM @AGCID));
    RETURN  @AGCID; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_DISTRICT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_DISTRICT`(P_NODE		INT) RETURNS varchar(200) CHARSET latin1
BEGIN

SET @DIST	=(SELECT Dist 
FROM m_hierarchy_details WHERE INT_SUBNODEVAL_ID=P_NODE);

RETURN @DIST;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_HANDLES` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_HANDLES`(
  x VARCHAR(64)
) RETURNS varchar(255) CHARSET latin1
BEGIN 
    
    SET @COUNT_STR = SPLIT_STR_COUNT(x,',');
        SET @Y = 1;
    SET @HANDLES	= '';
    set @test_con = 0;
    WHILE @Y <= @COUNT_STR DO
	SET  @user_id = SPLIT_STR(x,',',@Y);
            SELECT INT_SUBNODEVAL_ID,INT_PH_LOCATION,INT_DESIGNATION_ID,INT_GROUP_ID INTO @INT_SUBNODEVAL_ID,@INT_PH_LOCATION,
    @INT_DESIGNATION_ID,@INT_GROUP_ID from m_admin_user where INT_USER_ID=@user_id;
    
        IF(CHAR_LENGTH(@INT_GROUP_ID)>0 AND @INT_GROUP_ID > 0)THEN
    
    SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=4 and intsocioOfficerefId=@INT_GROUP_ID;	
    SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
	    ELSE IF(CHAR_LENGTH(@INT_PH_LOCATION)>0 AND @INT_PH_LOCATION > 0)THEN
    
	SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=1 and intsocioDeptrefId=@INT_PH_LOCATION;
	SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
	    ELSE
    
	SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype in(2,3) and intsocioDistrefId=@INT_SUBNODEVAL_ID 
    and intsocioDesigrefId=@INT_DESIGNATION_ID;
    SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
    
    END IF;
    END IF;
    
    
	SET  @Y = @Y + 1;
    
	END WHILE;
    SET @HANDLES = (SELECT TRIM(LEADING ',' FROM @HANDLES));
    SET @HANDLES = concat(@HANDLES,',','@CMO_Odisha');
    SET @HANDLES = REPLACE(@HANDLES,' ','');
    RETURN  @HANDLES; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_HANDLES_FB` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_HANDLES_FB`(
  x VARCHAR(64)
) RETURNS varchar(255) CHARSET latin1
BEGIN 
    
    SET @COUNT_STR = SPLIT_STR_COUNT(x,',');
        SET @Y = 1;
    SET @HANDLES	= '';
    set @test_con = 0;
    WHILE @Y <= @COUNT_STR DO
	SET  @user_id = SPLIT_STR(x,',',@Y);
        
    SELECT INT_SUBNODEVAL_ID,INT_PH_LOCATION,INT_DESIGNATION_ID,INT_GROUP_ID INTO @INT_SUBNODEVAL_ID,@INT_PH_LOCATION,
    @INT_DESIGNATION_ID,@INT_GROUP_ID from m_admin_user where INT_USER_ID=@user_id;
    
        IF(CHAR_LENGTH(@INT_GROUP_ID)>0 AND @INT_GROUP_ID > 0)THEN
    
    SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=4 and intsocioOfficerefId=@INT_GROUP_ID;	
    SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
	    ELSE IF(CHAR_LENGTH(@INT_PH_LOCATION)>0 AND @INT_PH_LOCATION > 0)THEN
    
	SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=1 and intsocioDeptrefId=@INT_PH_LOCATION;
	SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
	    ELSE
    
	SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype in(2,3) and intsocioDistrefId=@INT_SUBNODEVAL_ID 
    and intsocioDesigrefId=@INT_DESIGNATION_ID;
    SET @HANDLES = CONCAT(@HANDLES,',',@H_ID);
    
    
    END IF;
    END IF;
    
    
	SET  @Y = @Y + 1;
    
	END WHILE;
    SET @HANDLES = (SELECT TRIM(LEADING ',' FROM @HANDLES));
    SET @HANDLES = concat(@HANDLES,',','214515285554134');
    SET @HANDLES = REPLACE(@HANDLES,' ','');
    RETURN  @HANDLES; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_HEIRECHY_LEVEL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_HEIRECHY_LEVEL`(P_USER_ID INT) RETURNS int(11)
BEGIN
SET @SUBNODEVAL_ID	=(SELECT INT_SUBNODEVAL_ID 
FROM m_admin_user WHERE INT_USER_ID=P_USER_ID);
SET @SUBNODEVAL_ID	=(SELECT INT_SUBNODE_ID 
FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=@SUBNODEVAL_ID);

RETURN @SUBNODEVAL_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_RANK_ID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_RANK_ID`(P_DESG INT) RETURNS int(11)
BEGIN
SET @RANK_ID=(SELECT INT_RANK_ID from m_admin_desg_master where INT_DESG_ID=P_DESG and BIT_DELETED_FLAG=0);
RETURN @RANK_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_USER_BY_HANDLE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_USER_BY_HANDLE`(
  tweetId VARCHAR(128),
  escUser VARCHAR(128)
) RETURNS varchar(128) CHARSET latin1
BEGIN 
    
    
    
    SET @userName = '';
    select b.intOfficetype,b.intsocioDeptrefId, b.intsocioDistrefId, b.intsocioDesigrefId, b.intsocioOfficerefId 
    into @intOfficetype,@intsocioDeptrefId, @intsocioDistrefId, @intsocioDesigrefId, @intsocioOfficerefId
    from t_twitter_post_data a,m_office b where a.vchUserScreenName = b.vchTwhandler and a.vchTweetId = tweetId limit 1;
    
        if(@intOfficetype = 1)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_PH_LOCATION = @intsocioDeptrefId 
    and find_in_set(INT_USER_ID,escUser) > 0;
    
    
    else if(@intOfficetype = 2 or @intOfficetype = 3)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_SUBNODEVAL_ID = @intsocioDistrefId 
    and INT_DESIGNATION_ID = @intsocioDesigrefId and find_in_set(INT_USER_ID,escUser) > 0;	
    
        else if(@intOfficetype = 4)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_GROUP_ID = @intsocioOfficerefId and find_in_set(INT_USER_ID,escUser) > 0;
    
    else
    set @userName = 'API error in user search';
    
    end if;
    end if;
    end if;
    
    
    RETURN  @userName; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_USER_BY_HANDLE_FB` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_USER_BY_HANDLE_FB`(
  tweetId VARCHAR(128),
  escUser VARCHAR(128)
) RETURNS varchar(128) CHARSET latin1
BEGIN 
    
    
    
    SET @userName = '';
    select b.intOfficetype,b.intsocioDeptrefId, b.intsocioDistrefId, b.intsocioDesigrefId, b.intsocioOfficerefId 
    into @intOfficetype,@intsocioDeptrefId, @intsocioDistrefId, @intsocioDesigrefId, @intsocioOfficerefId
    from t_fb_post_data a,m_office b where a.vchHandler = b.vchFbhandler and a.vchPostId = tweetId limit 1;
    
        if(@intOfficetype = 1)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_PH_LOCATION = @intsocioDeptrefId 
    and find_in_set(INT_USER_ID,escUser) > 0;
    
    
    else if(@intOfficetype = 2 or @intOfficetype = 3)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_SUBNODEVAL_ID = @intsocioDistrefId 
    and INT_DESIGNATION_ID = @intsocioDesigrefId and find_in_set(INT_USER_ID,escUser) > 0;	
    
        else if(@intOfficetype = 4)then
    
    select VCH_FULL_NAME into @userName from m_admin_user where INT_GROUP_ID = @intsocioOfficerefId and find_in_set(INT_USER_ID,escUser) > 0;
    
    else
    set @userName = 'API error in user search';
    
    end if;
    end if;
    end if;
    
    
    RETURN  @userName; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_GET_USER_ID_BY_HANDLE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_GET_USER_ID_BY_HANDLE`(
  scType tinyint(1),
  scHandle VARCHAR(64),
  escUsers VARCHAR(64)
) RETURNS varchar(128) CHARSET latin1
BEGIN 
    
     
    
    SET @userId = 0;set @intOfficetype = 0;
    
    
    if(scType = 1)then
    
    select b.intOfficetype,b.intsocioDeptrefId, b.intsocioDistrefId, b.intsocioDesigrefId, b.intsocioOfficerefId 
    into @intOfficetype,@intsocioDeptrefId, @intsocioDistrefId, @intsocioDesigrefId, @intsocioOfficerefId
    from m_office b where b.vchTwhandler = scHandle limit 1;
    
    else if(scType = 2)then
    
    select b.intOfficetype,b.intsocioDeptrefId, b.intsocioDistrefId, b.intsocioDesigrefId, b.intsocioOfficerefId 
    into @intOfficetype,@intsocioDeptrefId, @intsocioDistrefId, @intsocioDesigrefId, @intsocioOfficerefId
    from m_office b where b.vchFbhandler = scHandle limit 1;
    
    end if;end if;
    
        if(@intOfficetype = 1)then
    select INT_USER_ID into @userId from m_admin_user where INT_PH_LOCATION = 15 and find_in_set(INT_USER_ID,escUsers) > 0;
   
    else if(@intOfficetype = 2 or @intOfficetype = 3)then
    
    select INT_USER_ID into @userId from m_admin_user where INT_SUBNODEVAL_ID = @intsocioDistrefId 
    and INT_DESIGNATION_ID = @intsocioDesigrefId and find_in_set(INT_USER_ID,escUsers) > 0;	
    
        else if(@intOfficetype = 4)then
    
    select INT_USER_ID into @userId from m_admin_user where INT_GROUP_ID = @intsocioOfficerefId and find_in_set(INT_USER_ID,escUsers) > 0;
    
    else
    set @userId = 0;
    
    end if;
    end if;
    end if;

    RETURN  @userId; 
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_NODE_INDEX_DATA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_NODE_INDEX_DATA`(P_HIERARCHY_ID INT, P_INDEX TINYINT) RETURNS int(11)
BEGIN

SET @ALL_NODES		= (SELECT FN_ALL_PARENT(P_HIERARCHY_ID));
SET @NO_OF_PARENT	= (SELECT LENGTH(@ALL_NODES) - LENGTH(REPLACE(@ALL_NODES, ',', '')));
IF(@NO_OF_PARENT+1 < P_INDEX)THEN
	SET @INDEX_VAL	= 0;
ELSE
	SET @ACTUAL_INDEX	= @NO_OF_PARENT+1-P_INDEX;
    SET @ACTUAL_INDEX	= @ACTUAL_INDEX+1;
    SET @INDEX_VAL		= (SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( @ALL_NODES, ',', @ACTUAL_INDEX ), ',', -1 ));
END IF;

RETURN @INDEX_VAL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FN_TABLE_STATUS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `FN_TABLE_STATUS`(			  P_TABLE_NAME VARCHAR(300)			) RETURNS int(11)
BEGIN			  SET @SCHEMA_NAME=SUBSTRING_INDEX(SUBSTRING_INDEX(P_TABLE_NAME, '.', 1), '.', -1);			  SET @TBL_NAME	= SUBSTRING_INDEX(SUBSTRING_INDEX(P_TABLE_NAME, '.', 2), '.', -1);			  SELECT count(1) INTO @STATUS FROM information_schema.tables WHERE table_name = @TBL_NAME and table_schema=@SCHEMA_NAME;			  RETURN @STATUS;			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `SPLIT_STR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `SPLIT_STR`(
  x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
) RETURNS varchar(255) CHARSET latin1
    DETERMINISTIC
BEGIN 
    RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `SPLIT_STR_COUNT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `SPLIT_STR_COUNT`(
  x TEXT,
  delim VARCHAR(12)) RETURNS int(11)
BEGIN

RETURN LENGTH(x) - LENGTH(REPLACE(x, delim, ''))+1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `UDF_Split` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` FUNCTION `UDF_Split`(
                        String VARCHAR (4000),
                        Delimiter VARCHAR (10)
                        ) RETURNS varchar(4000) CHARSET latin1
BEGIN
	 DECLARE NextString VARCHAR(4000);
	 DECLARE Pos INT;
     DECLARE String VARCHAR(4000);
	
	 SET NextString = '';
	 
	 	 SET String = @String + @Delimiter;
	 
	 	 SET Pos = (@Delimiter,@String);
	 
	 	 WHILE (Pos <>  0)  
	 DO
		  SET NextString = substring(@String,1,Pos - 1);
		  
		 
		  INSERT INTO ValueTable ( `Val`) VALUES (NextString);
		 
		  SET String = substring(@String,Pos +1,char_length(rtrim(@String)));
		  
		  SET Pos  = POSITION(@Delimiter IN @String);
	 END WHILE;
	 
	 RETURN ValueTable;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_FUNCTION_MASTER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_FUNCTION_MASTER`(		  IN  P_ACTION           VARCHAR(2),		  IN  P_FUNCTION_ID      INT,		  IN  P_FUNCTION_NAME    VARCHAR(100),		  IN  P_FILE_NAME        VARCHAR(100),		  IN  P_DESCRIPTION      VARCHAR(500),		  IN  P_ACTION1          VARCHAR(20),		  IN  P_ACTION2          VARCHAR(20),		  IN  P_ACTION3          VARCHAR(20),		  IN  P_MAIL_ACTIVE      INT,		  IN  P_FREEBEES         INT,		  IN  P_PORTLET_NAME     VARCHAR(400),		  IN  P_STATUS           INT,		  IN  P_CREATED_BY       INT,		  OUT P_OUT              VARCHAR(200)		)
BEGIN 				  IF(P_ACTION='CD')THEN			SET @P_SQL  = 'SELECT COUNT(1) FROM m_admin_function_master WHERE BIT_DELETED_FLAG=0 ';					IF(P_FUNCTION_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_FUN_ID!=',P_FUNCTION_ID);			END IF;					IF(CHAR_LENGTH(P_FUNCTION_NAME)>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_FUN_NAME="',P_FUNCTION_NAME,'"');			END IF;					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;				  IF(P_ACTION='A')THEN
			INSERT INTO m_admin_function_master(VCH_FUN_NAME,VCH_FILE_NAME,VCH_DESCRIPTION,VCH_ACTION1,VCH_ACTION2,VCH_ACTION3,			INT_MAIL,INT_FREEBEES,VCH_PORTLET_NAME,VCH_RELATED_PAGES,INT_STATUS,INT_CREATED_BY)			VALUES			(P_FUNCTION_NAME,P_FILE_NAME,P_DESCRIPTION,P_ACTION1,P_ACTION2,P_ACTION3,P_MAIL_ACTIVE,P_FREEBEES,'',P_PORTLET_NAME,			P_STATUS,P_CREATED_BY);		  END IF;
            IF(P_ACTION='U')THEN			UPDATE m_admin_function_master SET VCH_FUN_NAME=P_FUNCTION_NAME,VCH_FILE_NAME=P_FILE_NAME,VCH_DESCRIPTION=P_DESCRIPTION,			VCH_ACTION1=P_ACTION1,VCH_ACTION2=P_ACTION2,VCH_ACTION3=P_ACTION3,INT_MAIL=P_MAIL_ACTIVE,INT_FREEBEES=P_FREEBEES,			VCH_RELATED_PAGES=P_PORTLET_NAME,INT_STATUS=P_STATUS,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE			INT_FUN_ID=P_FUNCTION_ID;		  END IF;				  IF(P_ACTION='V')THEN			SET @P_SQL  = 'SELECT INT_FUN_ID,VCH_FUN_NAME,VCH_FILE_NAME,VCH_DESCRIPTION,VCH_ACTION1,VCH_ACTION2,VCH_ACTION3,			INT_MAIL,INT_FREEBEES,VCH_PORTLET_NAME,VCH_RELATED_PAGES,INT_STATUS FROM m_admin_function_master WHERE BIT_DELETED_FLAG=0';					IF(P_FUNCTION_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_FUN_ID=',P_FUNCTION_ID);			END IF;					IF(P_STATUS>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);			END IF;					SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_FUN_NAME ASC');					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;		  		  IF(P_ACTION='PG')THEN			SET @START_REC  = P_FUNCTION_ID;					SET @P_SQL  = 'SELECT INT_FUN_ID,VCH_FUN_NAME,VCH_FILE_NAME,VCH_DESCRIPTION,VCH_ACTION1,VCH_ACTION2,VCH_ACTION3,			INT_MAIL,INT_FREEBEES,VCH_PORTLET_NAME,INT_STATUS FROM m_admin_function_master WHERE BIT_DELETED_FLAG=0';					IF(P_STATUS>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);			END IF;					SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_FUN_NAME ASC LIMIT ?,20');					PREPARE STMT FROM @P_SQL;			EXECUTE STMT USING @START_REC;				  END IF;				  IF(P_ACTION='D')THEN					SET @DUP  = (SELECT COUNT(1) FROM m_admin_pl_master WHERE VCH_FUNC_FILE=P_FUNCTION_ID AND BIT_DELETED_FLAG=0);					IF(@DUP>0)THEN			  SELECT 0;			ELSE			  UPDATE m_admin_function_master SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE			  INT_FUN_ID=P_FUNCTION_ID;			  SELECT 1;			END IF;				  END IF;				  IF(P_ACTION='AC')THEN					UPDATE m_admin_function_master SET INT_STATUS=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE			INT_FUN_ID=P_FUNCTION_ID;				  END IF;				  IF(P_ACTION='IN')THEN					UPDATE m_admin_function_master SET INT_STATUS=2,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE			INT_FUN_ID=P_FUNCTION_ID;				  END IF;				  IF(P_ACTION='F')THEN			SET @P_SQL  = 'SELECT INT_FUN_ID,VCH_FUN_NAME,VCH_FILE_NAME,INT_STATUS FROM m_admin_function_master			WHERE BIT_DELETED_FLAG=0';					IF(P_FUNCTION_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_FUN_ID=',P_FUNCTION_ID);			END IF;					IF(P_STATUS>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);			END IF;					SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_FUN_NAME ASC');					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;				END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_GLINK` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_GLINK`(
	IN  P_ACTION      VARCHAR(3),
	IN  P_GL_ID       INT,
	IN  P_LOC_ID      VARCHAR(200),
	IN  P_GL_NAME     VARCHAR(50),
	IN  P_SL_NO       INT,
	IN  P_SHOW_HOME   INT,
	IN  P_STATUS      INT,
	IN  P_ICON_NAME   VARCHAR(30),
	IN  P_CREATED_BY  INT,
	OUT P_OUT         VARCHAR(200)
)
BEGIN 

	IF(P_ACTION='CD')THEN
		SET @P_SQL  = CONCAT('SELECT COUNT(1) FROM m_admin_gl_master WHERE BIT_DELETED_FLAG=0 ');
		IF(P_GL_ID>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID!=',P_GL_ID);
		END IF;
		IF(P_LOC_ID>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_LOC_ID=',P_LOC_ID);
		END IF;
		IF(CHAR_LENGTH(P_GL_NAME)>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_GL_NAME="',P_GL_NAME,'"');
		END IF;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;		
	END IF;

	IF(P_ACTION='A')THEN
		IF(P_STATUS=2)THEN
			SET @ICON_NAME	= P_ICON_NAME;
            SET @ICON_CLASS	= '';
        ELSE IF(P_STATUS=3)THEN
			SET @ICON_NAME	= '';
            SET @ICON_CLASS	= P_ICON_NAME;        
        ELSE
			SET @ICON_NAME	= '';
            SET @ICON_CLASS	= '';        
        END IF;
        END IF;
		INSERT INTO m_admin_gl_master(VCH_LOC_ID,VCH_GL_NAME,INT_SL_NO,INT_SHOW_ON_HOME,INT_STATUS,VCH_ICON_NAME,VCH_ICON_CLASS,INT_CREATED_BY) VALUES (P_LOC_ID, P_GL_NAME, P_SL_NO, P_SHOW_HOME, 1, @ICON_NAME, @ICON_CLASS, P_CREATED_BY);
	END IF;

	IF(P_ACTION='U')THEN
		IF(P_STATUS=2)THEN
			SET @ICON_NAME	= P_ICON_NAME;
            SET @ICON_CLASS	= '';
        ELSE IF(P_STATUS=3)THEN
			SET @ICON_NAME	= '';
            SET @ICON_CLASS	= P_ICON_NAME;        
        ELSE
			SET @ICON_NAME	= '';
            SET @ICON_CLASS	= '';        
        END IF;
        END IF;
		UPDATE m_admin_gl_master SET VCH_LOC_ID=P_LOC_ID, VCH_GL_NAME=P_GL_NAME, INT_SL_NO=P_SL_NO, INT_SHOW_ON_HOME=P_SHOW_HOME, VCH_ICON_NAME=@ICON_NAME, VCH_ICON_CLASS=@ICON_CLASS, INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_GL_ID=P_GL_ID;
	END IF;

	IF(P_ACTION='V')THEN
		SET @P_SQL  = 'SELECT INT_GL_ID, VCH_LOC_ID, VCH_GL_NAME, INT_SL_NO, INT_SHOW_ON_HOME, INT_STATUS, VCH_ICON_NAME, VCH_ICON_CLASS, INT_CREATED_BY, DTM_CREATED_ON FROM m_admin_gl_master  WHERE BIT_DELETED_FLAG=0';
		IF(P_GL_ID>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);
		END IF;
		IF(CHAR_LENGTH(P_LOC_ID)>0 AND P_LOC_ID NOT IN ('All','0'))THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND FIND_IN_SET("',P_LOC_ID,'",VCH_LOC_ID)');
		END IF;
		IF(P_STATUS>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
		END IF;
		IF(CHAR_LENGTH(P_GL_NAME)>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_GL_NAME="',P_GL_NAME,'"');
		END IF;

		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;		
	END IF;

	IF(P_ACTION='PG')THEN
		SET @START_REC  = P_GL_ID;
		SET @P_SQL  = 'SELECT INT_GL_ID, VCH_LOC_ID, VCH_GL_NAME, INT_SL_NO, INT_SHOW_ON_HOME, INT_STATUS, INT_CREATED_BY, VCH_ICON_NAME, VCH_ICON_CLASS, DTM_CREATED_ON FROM m_admin_gl_master  WHERE BIT_DELETED_FLAG=0';
		IF(P_GL_ID>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);
		END IF;
		IF(P_STATUS>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
		END IF;
		IF(CHAR_LENGTH(P_GL_NAME)>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_GL_NAME="',P_GL_NAME,'"');
		END IF;

		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC LIMIT ?,20');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT USING @START_REC;		
	END IF;

	IF(P_ACTION='MS')THEN
		SELECT MAX(INT_SL_NO)+1 FROM  m_admin_gl_master WHERE BIT_DELETED_FLAG=0;		
	END IF;

	IF(P_ACTION='D')THEN
		SET @DUP  = (SELECT COUNT(1) FROM m_admin_pl_master WHERE INT_GL_ID_ID=P_GL_ID AND BIT_DELETED_FLAG=0);
		IF(@DUP>0)THEN	
			SELECT 0;
		ELSE	
			SET @SL_NO	= (SELECT INT_SL_NO FROM m_admin_gl_master WHERE INT_GL_ID=P_GL_ID);	
			UPDATE m_admin_gl_master SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE	INT_GL_ID=P_GL_ID;	
			UPDATE m_admin_gl_master SET INT_SL_NO = INT_SL_NO-1 WHERE INT_SL_NO > @SL_NO AND BIT_DELETED_FLAG=0;	
			SELECT 1;
		END IF;		
	END IF;

	IF(P_ACTION='AC')THEN
		UPDATE m_admin_gl_master SET INT_STATUS=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE
	INT_GL_ID=P_GL_ID;		
	END IF;

	IF(P_ACTION='IN')THEN
		UPDATE m_admin_gl_master SET INT_STATUS=2,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE
	INT_GL_ID=P_GL_ID;		
	END IF;

	IF(P_ACTION='F')THEN
		SET @P_SQL  = 'SELECT INT_GL_ID,VCH_GL_NAME FROM m_admin_gl_master  WHERE BIT_DELETED_FLAG=0';
		IF(P_STATUS>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
		END IF;
		IF(CHAR_LENGTH(P_GL_NAME)>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_GL_NAME="',P_GL_NAME,'"');
		END IF;

		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_GL_NAME ASC');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;		
	END IF;

	IF(P_ACTION='US')THEN
		SET @P_ID  = (SELECT INT_GL_ID FROM m_admin_gl_master  WHERE BIT_DELETED_FLAG=0 AND INT_SL_NO=P_SL_NO);
		SET @P_SL  = (SELECT INT_SL_NO FROM m_admin_gl_master WHERE BIT_DELETED_FLAG=0 AND INT_GL_ID=P_GL_ID);
		UPDATE m_admin_gl_master SET INT_SL_NO=@P_SL  WHERE INT_GL_ID=@P_ID;
		UPDATE m_admin_gl_master SET INT_SL_NO=P_SL_NO WHERE INT_GL_ID=P_GL_ID;		
	END IF;		
	IF(P_ACTION='VUP')THEN
		SET @P_SQL  = 'SELECT INT_GL_ID, VCH_LOC_ID, VCH_GL_NAME, INT_SL_NO, INT_SHOW_ON_HOME, INT_STATUS, VCH_ICON_NAME, INT_CREATED_BY, DTM_CREATED_ON FROM m_admin_gl_master  WHERE BIT_DELETED_FLAG=0';
		IF(P_GL_ID>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);
		END IF;
		IF(CHAR_LENGTH(P_LOC_ID)>0 AND P_LOC_ID NOT IN ('All','0'))THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND FIND_IN_SET("',P_LOC_ID,'",VCH_LOC_ID)');
		END IF;
		IF(P_STATUS>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
		END IF;
		IF(CHAR_LENGTH(P_GL_NAME)>0)THEN	
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_GL_NAME="',P_GL_NAME,'"');
		END IF;

		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;		
	END IF;		
	IF(P_ACTION='S')THEN
		SET @P_SQL="SELECT INT_GL_ID, VCH_GL_NAME, VCH_ICON_NAME, VCH_ICON_CLASS FROM m_admin_gl_master
    WHERE BIT_DELETED_FLAG=0 AND INT_STATUS=1 ORDER BY INT_SL_NO ASC";
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_HEADER_FOOTER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_HEADER_FOOTER`(			 IN P_ACTION       VARCHAR(3),			 IN P_HRADER_ID    INT,			 IN P_OPTION       INT,			 IN P_HEADER_TEXT  VARCHAR(100),			 IN P_FOOTER_TEXT  VARCHAR(100),			 IN P_URL          VARCHAR(100),			 IN P_COMPANY_NAME VARCHAR(100),			 IN P_LOGIN_LOGO   VARCHAR(50),			 IN P_INNER_LOGO   VARCHAR(50),			 IN P_PORTAL_LOGO  VARCHAR(50),			 IN P_CREATED_BY   INT,			 OUT P_OUT          VARCHAR(200)			)
BEGIN 															  IF(P_ACTION='A') THEN							INSERT INTO m_admin_header_footer(INT_OPTION,VCH_HEADER_TEXT,VCH_FOOTER_TEXT,VCH_URL,VCH_COMPANY_NAME,VCH_LOGIN_LOGO,VCH_INNER_LOGO,VCH_PORTAL_LOGO,INT_CREATED_BY) VALUES				(P_OPTION,P_HEADER_TEXT,P_FOOTER_TEXT,P_URL,P_COMPANY_NAME,P_LOGIN_LOGO,P_INNER_LOGO,P_PORTAL_LOGO,P_CREATED_BY);									  END IF;												  IF(P_ACTION='R')THEN				SELECT INT_OPTION,VCH_HEADER_TEXT,VCH_FOOTER_TEXT,VCH_URL,VCH_COMPANY_NAME,VCH_LOGIN_LOGO,VCH_INNER_LOGO,VCH_PORTAL_LOGO FROM m_admin_header_footer where INT_HEADER_ID=P_HRADER_ID AND BIT_DELETED_FLAG=0;			  END IF;												  IF(P_ACTION='U')THEN				UPDATE   m_admin_header_footer set INT_OPTION=P_OPTION, VCH_HEADER_TEXT=P_HEADER_TEXT,VCH_FOOTER_TEXT=P_FOOTER_TEXT,VCH_URL=P_URL,				VCH_COMPANY_NAME=P_COMPANY_NAME,VCH_LOGIN_LOGO=P_LOGIN_LOGO,VCH_INNER_LOGO=P_INNER_LOGO,VCH_PORTAL_LOGO=P_PORTAL_LOGO,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW()				WHERE INT_HEADER_ID=P_HRADER_ID;			  END IF;												  IF(P_ACTION='V')THEN				SELECT INT_OPTION,VCH_HEADER_TEXT,VCH_FOOTER_TEXT,VCH_URL,VCH_COMPANY_NAME,VCH_LOGIN_LOGO,VCH_INNER_LOGO,VCH_PORTAL_LOGO FROM m_admin_header_footer where   BIT_DELETED_FLAG=0;			  END IF;			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_HIERARCHY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_HIERARCHY`(
		  IN  P_ACTION          VARCHAR(2),
		  IN  P_NODE_ID    INT,
		  IN  P_HIERARCHY_NAME  VARCHAR(50),
		  IN  P_ALIAS_NAME      VARCHAR(50),
		  IN  P_LEVEL           INT,
		  IN  P_CREATED_BY      INT,
		  OUT P_OUT             VARCHAR(200)
)
BEGIN
	IF(P_ACTION='CD')THEN
		SET @P_SQL  = CONCAT('SELECT COUNT(1) FROM m_admin_hierarchy WHERE BIT_DELETED_FLAG=0 AND INT_NO_LEVEL=',P_LEVEL);
		IF(P_NODE_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID!=',P_NODE_ID);
		END IF;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
	END IF;
    
	IF(P_ACTION='A')THEN
		INSERT INTO m_admin_hierarchy(VCH_HIERARCHY_NAME,VCH_ALIAS_NAME,INT_NO_LEVEL,INT_CREATED_BY) VALUES (P_HIERARCHY_NAME,P_ALIAS_NAME,P_LEVEL,P_CREATED_BY);
		INSERT INTO m_admin_subnode_values(INT_PARENT_NODE,VCH_VALUE_NAME,VCH_HIERARCHY_CODE,VCH_TEL_NO,VCH_FAX_NO,VCH_ADDRESS,INT_NODE_ID,INT_SUBNODE_ID,INT_CREATED_BY) VALUES (0,P_HIERARCHY_NAME,'','','','',LAST_INSERT_ID(),0,P_CREATED_BY);
	END IF;
    
    IF(P_ACTION='U')THEN
		START TRANSACTION;
			SET @P_SQL  = CONCAT('UPDATE m_admin_hierarchy SET VCH_HIERARCHY_NAME="',P_HIERARCHY_NAME,'",VCH_ALIAS_NAME="',P_ALIAS_NAME,'", INT_UPDATED_BY=',P_CREATED_BY,',DTM_UPDATED_ON=NOW() WHERE BIT_DELETED_FLAG=0');
			IF(P_NODE_ID>0)THEN
				SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				SET @NODE_ID = P_NODE_ID;
			END IF;
			IF(P_LEVEL>0)THEN
				SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NO_LEVEL=',P_LEVEL);
				SET @NODE_ID = (SELECT INT_NODE_ID FROM m_admin_hierarchy WHERE INT_NO_LEVEL=P_LEVEL AND BIT_DELETED_FLAG=0);
			END IF;
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
			UPDATE m_admin_subnode_values SET VCH_VALUE_NAME=P_HIERARCHY_NAME WHERE INT_NODE_ID=@NODE_ID AND INT_PARENT_NODE=0 AND BIT_DELETED_FLAG=0;
		COMMIT;
    END IF;
    
    IF(P_ACTION='V')THEN
		SET @P_SQL  = 'SELECT INT_NODE_ID,VCH_HIERARCHY_NAME,VCH_ALIAS_NAME,INT_NO_LEVEL,INT_CREATED_BY,DTM_CREATED_ON FROM			m_admin_hierarchy WHERE BIT_DELETED_FLAG=0';
		IF(P_NODE_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
		END IF;
		
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
    END IF;
    
    IF(P_ACTION='R')THEN
		SET @P_SQL  = 'SELECT INT_NODE_ID,VCH_HIERARCHY_NAME,VCH_ALIAS_NAME,INT_NO_LEVEL,INT_CREATED_BY,DTM_CREATED_ON FROM			m_admin_hierarchy WHERE BIT_DELETED_FLAG=0';
		IF(P_NODE_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
		END IF;	
		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_NO_LEVEL ASC');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
    END IF;
    
    IF(P_ACTION='D')THEN
		SET @DUP    = (SELECT COUNT(1) FROM m_admin_subnode WHERE BIT_DELETED_FLAG=0 AND INT_NODE_ID=P_NODE_ID);
		IF(@DUP>0)THEN
			SELECT 0;
		ELSE
			UPDATE m_admin_hierarchy SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_NODE_ID=P_NODE_ID;
			UPDATE m_admin_hierarchy, (SELECT @id := 0) dm SET INT_NO_LEVEL =(@id :=@id + 1) WHERE BIT_DELETED_FLAG=0;
			SELECT 1;
		END IF;
    END IF;
    
    
    IF(P_ACTION='RL')THEN
		UPDATE m_admin_hierarchy, (SELECT @id := 0) dm SET INT_NO_LEVEL =(@id :=@id + 1) WHERE BIT_DELETED_FLAG=0;
	END IF;
    
	IF(P_ACTION='F')THEN
		SET @P_SQL  = 'SELECT INT_NODE_ID,VCH_HIERARCHY_NAME FROM m_admin_hierarchy WHERE BIT_DELETED_FLAG=0';
		IF(P_NODE_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
		END IF;
		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_HIERARCHY_NAME ASC');
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_LOGIN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_LOGIN`(			  
	IN   P_ACTION      VARCHAR(3),			 
    IN   P_USER_NAME   VARCHAR(50)			
)
BEGIN

DECLARE continue HANDLER FOR NOT FOUND
 BEGIN
 
	GET DIAGNOSTICS CONDITION 1
	@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
	@sqlstate = RETURNED_SQLSTATE, 
	@errno = MYSQL_ERRNO,
	@text = MESSAGE_TEXT; 
	SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text); 
    
	
   
    SET @P_STATUS=4;
    SET @P_MSG=('Error: Table or column not found');
	
 ROLLBACK;
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='m_admin_user',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='USP_ADMIN_LOGIN';
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='m_admin_user',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='USP_ADMIN_LOGIN';
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
      
      INSERT INTO `error_log` SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='m_admin_user',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_ADMIN_LOGIN';
      
END;
						  
	SET @DESG_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('m_admin_desg_master'));
    SET @GRADE_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('m_admin_grade_master'));
    
    IF(P_ACTION='UD')THEN				
		SET @P_SQL='SELECT INT_USER_ID, VCH_FULL_NAME, VCH_PASSWORD,VCH_TEMP_PASSWORD, INT_PRIVILEGE, INT_EMP_TYPE,
    INT_PASS_CHECK, VCH_IMAGE, VCH_MOBILE_NO, VCH_ADDRESS, INT_DESIGNATION_ID, INT_SUBNODEVAL_ID,
    INT_PH_LOCATION,VCH_USER_NAME,INT_GROUP_ID,LOGIN_STATUS,DTM_PASSWORD_CHANGE,INT_ACCESS_TYPE,
    (SELECT vchDeptName FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS DeptName,(SELECT social_dept_id FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS socialDeptID,
(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = INT_DESIGNATION_ID) AS DESIGNATION,
    (SELECT VCH_TIME_ZONE FROM m_admin_loc_master WHERE INT_LOC_ID=U.INT_PH_LOCATION
    AND BIT_DELETED_FLAG=0) AS TIME_ZONE, (SELECT INT_RANK_ID FROM m_admin_desg_master WHERE INT_DESG_ID=U.INT_DESIGNATION_ID AND BIT_DELETED_FLAG=0) AS INT_RANK_ID ';
			IF(@DESG_TABLE_EXIST=1)THEN					
				SET @P_SQL=CONCAT(@P_SQL,',(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID=U.INT_DESIGNATION_ID AND BIT_DELETED_FLAG=0) AS DESIGNATION');						
			END IF;							
            IF(@GRADE_TABLE_EXIST=1)THEN					
				SET @P_SQL=CONCAT(@P_SQL,',(SELECT VCH_GRADE_NAME FROM m_admin_grade_master WHERE INT_GRADE_ID=U.INT_GRADE_ID AND BIT_DELETED_FLAG=0) AS GRADE ');				
                END IF;							
		SET @P_SQL=CONCAT(@P_SQL,' FROM m_admin_user U WHERE U.VCH_USER_NAME="',P_USER_NAME,'" AND U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1');							
		PREPARE STMT FROM @P_SQL;				
        EXECUTE STMT;
	END IF;
    
    
    
     IF(P_ACTION='UAT')THEN
     START TRANSACTION;
        UPDATE m_admin_user SET LAST_ACTIVITY_TIME=NOW(),LOGGED_STATUS=2 where INT_USER_ID=P_USER_NAME AND BIT_DELETED_FLAG=0;
        SELECT LAST_ACTIVITY_TIME from m_admin_user where INT_USER_ID=P_USER_NAME AND BIT_DELETED_FLAG=0;
	COMMIT;
     END IF;
     
      
    
     IF(P_ACTION='ULT')THEN
     START TRANSACTION;
     SET @USERIDS = '';
     SELECT INT_USER_ID INTO @USER_ID FROM m_admin_user WHERE VCH_USER_NAME=P_USER_NAME AND BIT_DELETED_FLAG=0 LIMIT 1;
        UPDATE m_admin_user SET LAST_ACTIVITY_TIME=NOW(),LOGGED_STATUS=1 where INT_USER_ID = @USER_ID AND BIT_DELETED_FLAG=0;
	SELECT GROUP_CONCAT(INT_USER_ID) INTO @USERIDS from  m_admin_user where LOGGED_STATUS=2 AND LAST_ACTIVITY_TIME > (NOW()-INTERVAL 30 MINUTE)  AND BIT_DELETED_FLAG=0;
    IF(CHAR_LENGTH(@USERIDS)>0) THEN
	SET @P_SQL =CONCAT('UPDATE t_twitter_data set intAssignedUser = NULL,dtmAssignedTime=NULL where intAssignedUser NOT IN(',@USERIDS,') AND readStatus = 0');
    SET @M_SQL = CONCAT('UPDATE t_facebook_data set intAssignedUser = NULL,dtmAssignedTime=NULL where intAssignedUser NOT IN(',@USERIDS,') AND tinReadStatus = 0');
     PREPARE STMT FROM @P_SQL;
     PREPARE STMT_M FROM @M_SQL;
     EXECUTE STMT;
     EXECUTE STMT_M;
     END IF;
     COMMIT;
     END IF;
     
      
    
     IF(P_ACTION='OU')THEN
     START TRANSACTION;
     SET @USERIDS = '';
     SELECT GROUP_CONCAT(INT_USER_ID) INTO @USERIDS from  m_admin_user where LOGGED_STATUS=2 AND LAST_ACTIVITY_TIME > (NOW()-INTERVAL 30 MINUTE)  AND BIT_DELETED_FLAG=0;
	IF(CHAR_LENGTH(@USERIDS)>0) THEN
    SET @P_SQL =CONCAT('UPDATE t_twitter_data set intAssignedUser = NULL,dtmAssignedTime=NULL where intAssignedUser NOT IN(',@USERIDS,') AND readStatus = 0');
    SET @M_SQL = CONCAT('UPDATE t_facebook_data set intAssignedUser = NULL,dtmAssignedTime=NULL where intAssignedUser NOT IN(',@USERIDS,') AND tinReadStatus = 0');
	 PREPARE STMT FROM @P_SQL;
     PREPARE STMT_M FROM @M_SQL;
     EXECUTE STMT;
     EXECUTE STMT_M;
        SELECT INT_USER_ID,VCH_FULL_NAME,VCH_USER_NAME from  m_admin_user where LOGGED_STATUS=2 AND LAST_ACTIVITY_TIME > (NOW()-INTERVAL 30 MINUTE)  AND BIT_DELETED_FLAG=0;
       END IF;
    COMMIT;
     END IF;
     
    IF(P_ACTION='UGD')THEN
        SET @GROU_USER_IDS='';
        SET @LOGIN_USER_ID =0;
        SELECT INT_USER_ID INTO @LOGIN_USER_ID FROM m_admin_user U WHERE U.VCH_USER_NAME=P_USER_NAME AND U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1;
        IF(@LOGIN_USER_ID>0)THEN
           SELECT vchUserIDs INTO  @GROU_USER_IDS FROM t_account_map_users where bitDeletedFlag=0 AND find_in_set(@LOGIN_USER_ID,vchUserIDs);
        END IF;
        
		SET @P_SQL='SELECT INT_USER_ID, VCH_FULL_NAME, VCH_PASSWORD,VCH_TEMP_PASSWORD, INT_PRIVILEGE, INT_EMP_TYPE,
    INT_PASS_CHECK, VCH_IMAGE, VCH_MOBILE_NO, VCH_ADDRESS, INT_DESIGNATION_ID, INT_SUBNODEVAL_ID,
    INT_PH_LOCATION,VCH_USER_NAME,INT_GROUP_ID,DTM_PASSWORD_CHANGE,INT_ACCESS_TYPE,
    (SELECT vchDeptName FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS DeptName,(SELECT social_dept_id FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS socialDeptID,
(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = INT_DESIGNATION_ID) AS DESIGNATION,
    (SELECT VCH_TIME_ZONE FROM m_admin_loc_master WHERE INT_LOC_ID=U.INT_PH_LOCATION
    AND BIT_DELETED_FLAG=0) AS TIME_ZONE';
			IF(@DESG_TABLE_EXIST=1)THEN					
				SET @P_SQL=CONCAT(@P_SQL,',(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID=U.INT_DESIGNATION_ID AND BIT_DELETED_FLAG=0) AS DESIGNATION');						
			END IF;							
            IF(@GRADE_TABLE_EXIST=1)THEN					
				SET @P_SQL=CONCAT(@P_SQL,',(SELECT VCH_GRADE_NAME FROM m_admin_grade_master WHERE INT_GRADE_ID=U.INT_GRADE_ID AND BIT_DELETED_FLAG=0) AS GRADE ');				
                END IF;							
		SET @P_SQL=CONCAT(@P_SQL,' FROM m_admin_user U WHERE U.VCH_USER_NAME="',P_USER_NAME,'" AND U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1');							
		PREPARE STMT FROM @P_SQL;				
        EXECUTE STMT;
        
        IF(CHAR_LENGTH(@GROU_USER_IDS)>0)THEN
           SET @Q_SQL='SELECT INT_USER_ID, VCH_FULL_NAME, INT_PRIVILEGE, INT_EMP_TYPE,VCH_IMAGE, VCH_MOBILE_NO, INT_DESIGNATION_ID, INT_SUBNODEVAL_ID,
    INT_PH_LOCATION,VCH_USER_NAME,INT_GROUP_ID,DTM_PASSWORD_CHANGE,INT_ACCESS_TYPE,
    (SELECT vchDeptName FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS DeptName,
(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = INT_DESIGNATION_ID) AS DESIGNATION,
    (SELECT VCH_TIME_ZONE FROM m_admin_loc_master WHERE INT_LOC_ID=U.INT_PH_LOCATION
    AND BIT_DELETED_FLAG=0) AS TIME_ZONE';
		SET @Q_SQL=CONCAT(@Q_SQL,' FROM m_admin_user U WHERE U.INT_USER_ID IN(',@GROU_USER_IDS,') AND U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1');							
		PREPARE STMT1 FROM @Q_SQL;				
        EXECUTE STMT1;
        
        END IF;
        
	END IF;
    
    
    
     IF(P_ACTION='UL')THEN		
     
     SET @current_user_id=SPLIT_STR(P_USER_NAME,'~',1);
     SET @selected_user_id=SPLIT_STR(P_USER_NAME,'~',2);
     
    SET @var1='';
    SET @var2='';
    
    SELECT intAccountGrpId INTO  @var1 FROM t_account_map_users where bitDeletedFlag=0 AND find_in_set(@current_user_id,vchUserIDs);
      SELECT intAccountGrpId INTO  @var2 FROM t_account_map_users where bitDeletedFlag=0 AND find_in_set(@selected_user_id,vchUserIDs);
      
      IF(@var1=@var2)THEN
     
         
     
		SET @P_SQL='SELECT INT_USER_ID, VCH_FULL_NAME, VCH_PASSWORD, INT_PRIVILEGE, INT_EMP_TYPE,
    INT_PASS_CHECK, VCH_IMAGE, VCH_MOBILE_NO, VCH_ADDRESS, INT_DESIGNATION_ID, INT_SUBNODEVAL_ID,
    INT_PH_LOCATION,VCH_USER_NAME,INT_GROUP_ID,DTM_PASSWORD_CHANGE,INT_ACCESS_TYPE,
    (SELECT vchDeptName FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS DeptName,(SELECT social_dept_id FROM m_department WHERE intDeptId=U.INT_PH_LOCATION) AS socialDeptID,
(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = INT_DESIGNATION_ID) AS DESIGNATION,
    (SELECT VCH_TIME_ZONE FROM m_admin_loc_master WHERE INT_LOC_ID=U.INT_PH_LOCATION
    AND BIT_DELETED_FLAG=0) AS TIME_ZONE from m_admin_user U where U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1 ';
	    IF(@selected_user_id>0)THEN
		   SET @P_SQL=CONCAT(@P_SQL,' AND U.INT_USER_ID =',@selected_user_id);
		END IF;
        		PREPARE STMT FROM @P_SQL;				
       EXECUTE STMT;
		END IF;
    
	END IF; 
    
    
    
      IF(P_ACTION='US')THEN	
      
     SET @GROU_USER_IDS='';
     SET @CURR_USER_ID=0;

SELECT INT_USER_ID INTO @CURR_USER_ID FROM m_admin_user U WHERE U.INT_USER_ID=P_USER_NAME AND U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1;

IF(@CURR_USER_ID>0)THEN
SELECT vchUserIDs INTO  @GROU_USER_IDS FROM t_account_map_users where bitDeletedFlag=0 AND find_in_set(@CURR_USER_ID,vchUserIDs);
END IF;

IF(CHAR_LENGTH(@GROU_USER_IDS)>0)THEN

SET @P_SQL=CONCAT('select 1 AS TOTAL,group_concat(INT_USER_ID SEPARATOR ",") AS USER_ID,group_concat(VCH_FULL_NAME2 SEPARATOR "::") AS FULL_NAME from m_admin_user U where U.BIT_DELETED_FLAG=0 AND U.INT_EX_EMPLOYEE=1 AND U.INT_STATUS=1 AND U.INT_USER_ID IN(',@GROU_USER_IDS,')');  

		PREPARE STMT FROM @P_SQL;				
		EXECUTE STMT;	
ELSE 
SELECT 2 AS TOTAL;	
END IF; 
		 
END IF; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_LOGIN_CHECK` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_LOGIN_CHECK`(
			  IN   P_ACTION      VARCHAR(2),
			  IN   P_USER_NAME   VARCHAR(50),
			  IN   P_FAILED_LOGIN_TIME datetime,
			  IN   P_FAILED_ATTEMPT   INT
			)
BEGIN
			
			IF(P_ACTION='UT')THEN
				  UPDATE m_admin_user SET FIRST_FAILED_LOGIN=P_FAILED_LOGIN_TIME,FAILED_LOGIN_COUNT=P_FAILED_ATTEMPT WHERE VCH_USER_NAME=P_USER_NAME AND BIT_DELETED_FLAG=0;
				END IF;
                  
                  
				/*==Action to  update only wrong attempt counter==*/
				IF(P_ACTION='UC')THEN
				  UPDATE m_admin_user SET FAILED_LOGIN_COUNT=P_FAILED_ATTEMPT WHERE VCH_USER_NAME=P_USER_NAME AND BIT_DELETED_FLAG=0;
				END IF;
                  

			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_PERMISSION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_PERMISSION`(		 
	IN   P_ACTION      VARCHAR(3),		  
    IN   P_ID          INT,		  
    IN   P_USER_ID     INT,		  
    IN   P_GL_ID       INT,		  
    IN   P_PL_ID       INT,		  
    IN   P_PERMISSION  INT,		  
    IN   P_ATTRIBUTE1  INT,		  
    IN   P_ATTRIBUTE2  INT,		  
    IN   P_CREATED_BY  INT,		  
    IN   P_QUERY		 TEXT,		  
    OUT  P_OUT         VARCHAR(200)		
)
BEGIN 	
			  
	IF(P_ACTION='A')THEN					
		DELETE FROM m_admin_permission WHERE INT_USER_ID= P_USER_ID AND BIT_DELETED_FLAG=0;		
        SET @P_SQL	= CONCAT('INSERT INTO m_admin_permission (INT_USER_ID, INT_GL_ID, INT_PL_ID, INT_PERMISSION, INT_CREATED_BY) VALUES ',P_QUERY);					  
        PREPARE STMT FROM @P_SQL;			  
        EXECUTE STMT;				  
	END IF;					
    
    IF(P_ACTION='V')THEN				
		SET @P_SQL	= 'SELECT INT_USER_ID, INT_GL_ID, INT_PL_ID, INT_PERMISSION, INT_CREATED_BY FROM m_admin_permission WHERE BIT_DELETED_FLAG=0';								
        IF(P_USER_ID>0)THEN					
			SET @P_SQL	= CONCAT(@P_SQL, ' AND INT_USER_ID=',P_USER_ID);
        END IF;						
        
        PREPARE STMT FROM @P_SQL;				
        EXECUTE STMT;					
	END IF;					
    
    IF(P_ACTION='VP')THEN
    SET @P_SQL='';
		SET @P_SQL	= CONCAT(@P_SQL,'select * from(SELECT P.INT_USER_ID, P.INT_GL_ID, P.INT_PL_ID, P.INT_PERMISSION, P.INT_CREATED_BY, PL.VCH_PL_NAME,PL.BIT_DELETED_FLAG,PL.INT_SL_NO,(SELECT U.VCH_FULL_NAME FROM m_admin_user U WHERE U.INT_USER_ID=P.INT_USER_ID AND U.BIT_DELETED_FLAG=0) AS USER_NAME,		(SELECT G.VCH_GL_NAME FROM m_admin_gl_master G WHERE G.INT_GL_ID=P.INT_GL_ID AND G.BIT_DELETED_FLAG=0 AND G.INT_STATUS=1) AS GL_NAME,		(SELECT PL.VCH_PL_NAME FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1) AS PL_NAME,
		(SELECT F.VCH_FILE_NAME FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1)) AS FUNCTION_NAME,(SELECT F.VCH_RELATED_PAGES FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1)) AS VCH_RELATED_PAGES,
		(SELECT F.VCH_ACTION1 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1)) AS ACTION1,		 (SELECT F.VCH_ACTION2 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1)) AS ACTION2, (SELECT F.VCH_ACTION3 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0 AND PL.INT_STATUS=1)) AS ACTION3 FROM m_admin_permission P,m_admin_pl_master PL WHERE PL.BIT_DELETED_FLAG=0 AND P.INT_GL_ID=PL.INT_GL_ID AND P.INT_PL_ID=PL.INT_PL_ID AND PL.INT_STATUS=1)T WHERE T.BIT_DELETED_FLAG=0 ');								
			IF(P_USER_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL, ' AND T.INT_USER_ID=',P_USER_ID);				
			END IF;			
            IF(P_GL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL, ' AND T.INT_GL_ID=',P_GL_ID);
			END IF;
            IF(P_PL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL, ' AND T.INT_PL_ID=',P_PL_ID);
			END IF;
            IF(CHAR_LENGTH(P_QUERY)>0)THEN
			SET @P_SQL	= CONCAT(@P_SQL, ' AND T.FUNCTION_NAME="',P_QUERY,'" OR T.VCH_RELATED_PAGES LIKE "%',P_QUERY,'%"');
			END IF;
           SET @P_SQL= CONCAT(@P_SQL, ' ORDER BY T.INT_SL_NO');
                       PREPARE STMT FROM @P_SQL;				
		EXECUTE STMT;					
	END IF;				  
    
    IF(P_ACTION='AL')THEN	
		SET @CTR = (SELECT COUNT(1) FROM m_admin_permission WHERE BIT_DELETED_FLAG=0 AND INT_USER_ID=P_USER_ID AND INT_GL_ID=P_GL_ID AND INT_PL_ID=P_PL_ID );
		IF(@CTR=0) THEN		
			INSERT INTO m_admin_permission (INT_USER_ID, INT_GL_ID, INT_PL_ID, INT_PERMISSION, INT_CREATED_BY) VALUES(P_USER_ID,P_GL_ID,P_PL_ID,P_PERMISSION,P_CREATED_BY);			ELSE			  
            UPDATE m_admin_permission SET INT_PERMISSION=P_PERMISSION WHERE INT_USER_ID=P_USER_ID AND INT_GL_ID=P_GL_ID AND INT_PL_ID=P_PL_ID;			
		END IF;		 
	END IF;				  
    
    IF(P_ACTION='VG')THEN			
		SET @P_SQL	= 'SELECT DISTINCT (INT_GL_ID),	(SELECT G.VCH_GL_NAME FROM m_admin_gl_master G WHERE G.INT_GL_ID=P.INT_GL_ID AND G.BIT_DELETED_FLAG=0 AND G.INT_STATUS=1) AS GL_NAME,	(SELECT G.VCH_ICON_NAME FROM m_admin_gl_master G WHERE G.INT_GL_ID=P.INT_GL_ID AND G.BIT_DELETED_FLAG=0 AND G.INT_STATUS=1) AS VCH_ICON_NAME,	(SELECT G.VCH_ICON_CLASS FROM m_admin_gl_master G WHERE G.INT_GL_ID=P.INT_GL_ID AND G.BIT_DELETED_FLAG=0 AND G.INT_STATUS=1) AS VCH_ICON_CLASS FROM m_admin_permission P WHERE BIT_DELETED_FLAG=0';		  
        IF(P_USER_ID>0)THEN					
			SET @P_SQL	= CONCAT(@P_SQL, ' AND P.INT_USER_ID=',P_USER_ID);		  
		END IF;				
		PREPARE STMT FROM @P_SQL;				
        EXECUTE STMT;					
	END IF;

	IF(P_ACTION='CP')THEN
		SELECT INT_PERMISSION FROM m_admin_permission WHERE INT_USER_ID = P_USER_ID AND INT_GL_ID=P_GL_ID AND INT_PL_ID=P_PL_ID;
	END IF;

	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_PLINK` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_PLINK`(	  
	IN  P_ACTION      VARCHAR(3),	  
    IN  P_PL_ID       INT,	  
    IN  P_GL_ID       INT,	  
    IN  P_LOC_ID      VARCHAR(200),	  
    IN  P_PL_NAME     VARCHAR(50),	  
    IN  P_SL_NO       INT,	  
    IN  P_LINK_TYPE   INT,	  
    IN  P_FUNC_FILE   VARCHAR(200),	  
    IN  P_SHOW_HOME   INT,	  
    IN  P_STATUS      INT,	  
    IN  P_CREATED_BY  INT,	  
    OUT P_OUT         VARCHAR(200)	
)
BEGIN		  
IF(P_ACTION='CD')THEN		
	SET @P_SQL  = CONCAT('SELECT COUNT(1) FROM m_admin_pl_master WHERE BIT_DELETED_FLAG=0 ');			
		IF(P_PL_ID>0)THEN		  
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PL_ID!=',P_PL_ID);		
		END IF;			
        IF(CHAR_LENGTH(P_PL_NAME)>0)THEN		  
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_PL_NAME="',P_PL_NAME,'"');		
		END IF;			
	PREPARE STMT FROM @P_SQL;		
    EXECUTE STMT;		  
END IF;			  

	IF(P_ACTION='A')THEN		
		INSERT INTO m_admin_pl_master(VCH_LOC_ID,INT_GL_ID,VCH_PL_NAME,INT_SL_NO,INT_LINK_TYPE,VCH_FUNC_FILE,INT_SHOW_ON_HOME,INT_STATUS,INT_CREATED_BY)		VALUES (P_LOC_ID,P_GL_ID,P_PL_NAME,P_SL_NO,P_LINK_TYPE,P_FUNC_FILE,P_SHOW_HOME,P_STATUS,P_CREATED_BY);	  
	END IF;		
    
    IF(P_ACTION='U')THEN		
		UPDATE m_admin_pl_master SET VCH_LOC_ID=P_LOC_ID,INT_GL_ID=P_GL_ID,VCH_PL_NAME=P_PL_NAME,INT_SL_NO=P_SL_NO,INT_LINK_TYPE=P_LINK_TYPE,		VCH_FUNC_FILE=P_FUNC_FILE,INT_SHOW_ON_HOME=P_SHOW_HOME,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_PL_ID=P_PL_ID;			UPDATE m_admin_permission SET INT_GL_ID=P_GL_ID WHERE INT_PL_ID=P_PL_ID;	  
	END IF;			  
    IF(P_ACTION='V')THEN		
		SET @P_SQL  = 'SELECT INT_PL_ID, VCH_LOC_ID, INT_GL_ID, VCH_PL_NAME, INT_SL_NO, INT_LINK_TYPE, VCH_FUNC_FILE, INT_SHOW_ON_HOME, INT_STATUS, INT_CREATED_BY, DTM_CREATED_ON FROM m_admin_pl_master P WHERE BIT_DELETED_FLAG=0';			
			IF(P_PL_ID>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PL_ID=',P_PL_ID);		
			END IF;			
            IF(P_GL_ID>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);		
			END IF;			
            IF(P_STATUS>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);		
			END IF;			
            IF(CHAR_LENGTH(P_PL_NAME)>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_PL_NAME="',P_PL_NAME,'"');		
			END IF;			  
            SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC');			
		PREPARE STMT FROM @P_SQL;		
        EXECUTE STMT;		  
	END IF;  
    
    IF(P_ACTION='PG')THEN    
		SET @START_REC  = P_PL_ID;    
        SET @P_SQL  = 'SELECT INT_PL_ID, VCH_LOC_ID, INT_GL_ID, VCH_PL_NAME, INT_SL_NO, INT_LINK_TYPE, VCH_FUNC_FILE, INT_SHOW_ON_HOME, INT_STATUS, INT_CREATED_BY, DTM_CREATED_ON FROM m_admin_pl_master P WHERE BIT_DELETED_FLAG=0';    
        IF(P_GL_ID>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);    
		END IF;    
        IF(P_STATUS>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);    
        END IF;    
        IF(CHAR_LENGTH(P_PL_NAME)>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_PL_NAME="',P_PL_NAME,'"');    
        END IF;      
        SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC LIMIT ?,20');    
	PREPARE STMT FROM @P_SQL;    
    EXECUTE STMT USING @START_REC;  
    END IF;  
    
    IF(P_ACTION='MS')THEN    
		SELECT MAX(INT_SL_NO)+1 FROM  m_admin_pl_master WHERE BIT_DELETED_FLAG=0;  
	END IF;  
    
    IF(P_ACTION='D')THEN	  
		SET @SL_NO	= (SELECT INT_SL_NO FROM m_admin_pl_master WHERE INT_PL_ID=P_PL_ID);      
        UPDATE m_admin_pl_master SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE      INT_PL_ID=P_PL_ID;	  UPDATE m_admin_pl_master SET INT_SL_NO = INT_SL_NO-1 WHERE INT_SL_NO > @SL_NO AND BIT_DELETED_FLAG=0;	  DELETE FROM m_admin_permission WHERE INT_PL_ID=P_PL_ID;      
        SELECT 1;  
	END IF;  
    
    IF(P_ACTION='AC')THEN    
		UPDATE m_admin_pl_master SET INT_STATUS=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE    INT_PL_ID=P_PL_ID;  END IF;  IF(P_ACTION='IN')THEN    UPDATE m_admin_pl_master SET INT_STATUS=2,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE    INT_PL_ID=P_PL_ID;
	END IF;  
    
    IF(P_ACTION='US')THEN    
		SET @P_ID  = (SELECT INT_PL_ID FROM m_admin_pl_master  WHERE BIT_DELETED_FLAG=0 AND INT_SL_NO=P_SL_NO);    
        SET @P_SL  = (SELECT INT_SL_NO FROM m_admin_pl_master WHERE BIT_DELETED_FLAG=0 AND INT_PL_ID=P_PL_ID);    UPDATE m_admin_pl_master SET INT_SL_NO=@P_SL  WHERE INT_PL_ID=@P_ID;    
        UPDATE m_admin_pl_master SET INT_SL_NO=P_SL_NO WHERE INT_PL_ID=P_PL_ID;  
	END IF;
    
    IF(P_ACTION='VUP')THEN    
		SET @P_SQL  = 'SELECT INT_PL_ID,VCH_LOC_ID,INT_GL_ID,VCH_PL_NAME,INT_SL_NO,INT_LINK_TYPE,VCH_FUNC_FILE,INT_SHOW_ON_HOME,INT_STATUS,INT_CREATED_BY,    DTM_CREATED_ON FROM m_admin_pl_master P WHERE BIT_DELETED_FLAG=0';    
        IF(P_PL_ID>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PL_ID=',P_PL_ID);    
		END IF;        
		IF(P_GL_ID>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);    
		END IF;    
        IF(P_STATUS>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);    
		END IF;    
        IF(CHAR_LENGTH(P_PL_NAME)>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_PL_NAME="',P_PL_NAME,'"');    
		END IF;      
        SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC');    
	PREPARE STMT FROM @P_SQL;    
    EXECUTE STMT;  
    END IF;  
    
    IF(P_ACTION='PF')THEN		
		SET @P_SQL  = 'SELECT P.INT_PL_ID, P.VCH_LOC_ID, P.INT_GL_ID, P.VCH_PL_NAME, P.INT_SL_NO, P.INT_LINK_TYPE, P.VCH_FUNC_FILE, P.INT_STATUS, F.VCH_FUN_NAME,F.VCH_ACTION1, F.VCH_ACTION2, F.VCH_ACTION3 FROM m_admin_pl_master P LEFT JOIN m_admin_function_master F ON F.INT_FUN_ID=P.VCH_FUNC_FILE WHERE P.BIT_DELETED_FLAG=0 ';		
			IF(P_PL_ID>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND P.INT_PL_ID=',P_PL_ID);		
			END IF;		
            IF(P_GL_ID>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND P.INT_GL_ID=',P_GL_ID);		
			END IF;		
            IF(P_STATUS>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND P.INT_STATUS=',P_STATUS);		
			END IF;		
            IF(CHAR_LENGTH(P_PL_NAME)>0)THEN		  
				SET @P_SQL  = CONCAT(@P_SQL,' AND P.VCH_PL_NAME="',P_PL_NAME,'"');		
			END IF;      
            SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY P.INT_SL_NO ASC');    
			PREPARE STMT FROM @P_SQL;    
            EXECUTE STMT;  
	END IF;  
    
    IF(P_ACTION='F')THEN    
		SET @P_SQL  = 'SELECT INT_PL_ID,VCH_PL_NAME FROM m_admin_pl_master  WHERE BIT_DELETED_FLAG=0';    
        IF(P_STATUS>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);    
		END IF;    
        IF(P_GL_ID>0)THEN      
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);    
		END IF;      
		SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_PL_NAME ASC');    
		PREPARE STMT FROM @P_SQL;    
        EXECUTE STMT;  
	END IF;    

	IF(P_ACTION='S')THEN    
		SET @P_SQL='SELECT INT_PL_ID,VCH_PL_NAME ,INT_LINK_TYPE,VCH_FUNC_FILE,(SELECT F.VCH_FILE_NAME FROM m_admin_function_master F     WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0)) AS FUNCTION_NAME FROM m_admin_pl_master P WHERE BIT_DELETED_FLAG=0 AND INT_STATUS=1';    
        IF(P_GL_ID>0)THEN      
			SET @P_SQL=CONCAT(@P_SQL,' AND INT_GL_ID=',P_GL_ID);    
		END IF;    	
        SET @P_SQL=CONCAT(@P_SQL,' ORDER BY INT_SL_NO ASC');    
        PREPARE STMT FROM @P_SQL;    
        EXECUTE STMT;  
	END IF;
      IF(P_ACTION='B')THEN 

   	SET @P_SQL ='';
		
		SET @P_SQL  = CONCAT( @P_SQL,'SELECT COUNT(1) as COUNTER FROM t_grivance_suggestion
		 WHERE FIND_IN_SET(',P_CREATED_BY,',vchAllEscUsers)  AND intCompliantStatusId NOT IN(4,5,8,9) AND bitDeletedFlag=0 AND intPublishStatus=1 and tinType=2');
			  
		  				
			PREPARE STMT FROM @P_SQL;    
				
			EXECUTE STMT;  

				END IF; 

    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_SUBNODE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_SUBNODE`(		  IN  P_ACTION        VARCHAR(2),		  IN  P_SUBNODE_ID    INT,		  IN  P_SUBNODE_NAME  VARCHAR(50),		  IN  P_SUBNODE_ALIAS VARCHAR(50),		  IN  P_NODE_ID       INT,		  IN  P_LEVEL         INT,		  IN  P_CREATED_BY    INT,		  OUT P_OUT           VARCHAR(200)		)
BEGIN				  IF(P_ACTION='CD')THEN			SET @P_SQL  = CONCAT('SELECT COUNT(1) FROM m_admin_subnode WHERE BIT_DELETED_FLAG=0 ');					IF(P_SUBNODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID!=',P_SUBNODE_ID);			END IF;					IF(P_NODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);			END IF;					IF(P_LEVEL>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUB_LEVEL=',P_LEVEL);			END IF;					IF(CHAR_LENGTH(P_SUBNODE_NAME)>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_SUBNODE_NAME="',P_SUBNODE_NAME,'"');			END IF;					IF(CHAR_LENGTH(P_SUBNODE_ALIAS)>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_SUBALIAS_NAME="',P_SUBNODE_ALIAS,'"');			END IF;					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;										  IF(P_ACTION='A')THEN				INSERT INTO m_admin_subnode(VCH_SUBNODE_NAME,VCH_SUBALIAS_NAME,INT_SUB_LEVEL,INT_NODE_ID,INT_CREATED_BY)				VALUES (P_SUBNODE_NAME,P_SUBNODE_ALIAS,P_LEVEL,P_NODE_ID,P_CREATED_BY);		  END IF;										  IF(P_ACTION='U')THEN			SET @P_SQL=CONCAT('UPDATE m_admin_subnode SET VCH_SUBNODE_NAME="',P_SUBNODE_NAME,'",VCH_SUBALIAS_NAME="',P_SUBNODE_ALIAS,'",			INT_UPDATED_BY=',P_CREATED_BY,',DTM_UPDATED_ON=NOW() WHERE BIT_DELETED_FLAG=0 ');					IF(P_SUBNODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);			END IF;					IF(P_NODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);			END IF;					IF(P_LEVEL>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUB_LEVEL=',P_LEVEL);			END IF;					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;										  IF(P_ACTION='V')THEN			SET @P_SQL  = 'SELECT INT_SUBNODE_ID,VCH_SUBNODE_NAME,VCH_SUBALIAS_NAME,INT_SUB_LEVEL,INT_NODE_ID,INT_CREATED_BY,DTM_CREATED_ON FROM			m_admin_subnode WHERE BIT_DELETED_FLAG=0';					IF(P_SUBNODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);			END IF;					IF(P_NODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);			END IF;					IF(P_LEVEL>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUB_LEVEL=',P_LEVEL);			END IF;					  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_SUBNODE_NAME ASC');					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;										  IF(P_ACTION='R')THEN			SET @P_SQL  = 'SELECT INT_SUBNODE_ID,VCH_SUBNODE_NAME,VCH_SUBALIAS_NAME,INT_SUB_LEVEL,INT_NODE_ID,INT_CREATED_BY,DTM_CREATED_ON FROM			m_admin_subnode WHERE BIT_DELETED_FLAG=0';					IF(P_SUBNODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);			END IF;					IF(P_NODE_ID>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);			END IF;					IF(P_LEVEL>0)THEN			  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUB_LEVEL=',P_LEVEL);			END IF;					  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY INT_SUB_LEVEL ASC');					PREPARE STMT FROM @P_SQL;			EXECUTE STMT;				  END IF;										  IF(P_ACTION='D')THEN			SET @DUP    = (SELECT COUNT(1) FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_SUBNODE_ID=P_SUBNODE_ID);					IF(@DUP>0)THEN			  SELECT 0;			ELSE			  SET @NODE_ID	= (SELECT INT_NODE_ID FROM m_admin_subnode WHERE INT_SUBNODE_ID=P_SUBNODE_ID);			  UPDATE m_admin_subnode SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_SUBNODE_ID=P_SUBNODE_ID;			  UPDATE m_admin_subnode, (SELECT @id := 0) dm SET INT_SUB_LEVEL =(@id :=@id + 1) WHERE BIT_DELETED_FLAG=0 AND INT_NODE_ID=@NODE_ID;			  SELECT 1;			END IF;				  END IF;

IF(P_ACTION='VG')THEN
SET @P_SQL  = CONCAT('SELECT INT_SUBNODE_ID,VCH_SUBNODE_NAME FROM m_admin_subnode WHERE BIT_DELETED_FLAG=0 ORDER BY INT_SUB_LEVEL ASC');
PREPARE STMT FROM @P_SQL;
EXECUTE STMT;
END IF;

IF(P_ACTION='VH')THEN			
SET @P_SQL  = CONCAT('SELECT INT_SUBNODEVAL_ID,areaName FROM m_hierarchy_details WHERE bitDeletedFlag=0 ');
IF(P_SUBNODE_ID>0)THEN
SET @P_SQL  = CONCAT(@P_SQL,' AND nodeVal=',P_SUBNODE_ID);


END IF;
SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY areaName ASC');
PREPARE STMT FROM @P_SQL;			
EXECUTE STMT;
END IF;
		  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_SUBNODE_VALUES` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_SUBNODE_VALUES`(
			  IN  P_ACTION         VARCHAR(2),
			  IN  P_ID             INT,
			  IN  P_PARENT_ID      INT,
			  IN  P_VALUE_NAME     VARCHAR(50),
			  IN  P_HIERARCHY_CODE VARCHAR(50),
			  IN  P_TEL_NO         VARCHAR(15),
			  IN  P_FAX_NO         VARCHAR(15),
			  IN  P_ADDRESS        VARCHAR(500),
			  IN  P_NODE_ID        INT,
			  IN  P_SUBNODE_ID     INT,
			  IN  P_CREATED_BY     INT,
			  OUT P_OUT            VARCHAR(200)
			)
BEGIN
			
			  IF(P_ACTION='CD')THEN
				SET @P_SQL  = CONCAT('SELECT COUNT(1) FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 ');
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID!=',P_ID);
				END IF;
			
				IF(CHAR_LENGTH(P_VALUE_NAME)>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND VCH_VALUE_NAME="',P_VALUE_NAME,'"');
				END IF;
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
			
			  END IF;
			
			  IF(P_ACTION='A')THEN
				 SET @DUP  = (SELECT COUNT(1) FROM m_admin_subnode_values WHERE INT_PARENT_NODE=P_PARENT_ID AND VCH_VALUE_NAME=P_VALUE_NAME AND BIT_DELETED_FLAG=0);
				 IF(@DUP>0)THEN
				   SELECT 0;
				 ELSE
				   INSERT INTO m_admin_subnode_values(INT_PARENT_NODE,VCH_VALUE_NAME,VCH_HIERARCHY_CODE,VCH_TEL_NO,VCH_FAX_NO,VCH_ADDRESS,INT_NODE_ID,INT_SUBNODE_ID,INT_CREATED_BY)
				   VALUES (P_PARENT_ID,P_VALUE_NAME,P_HIERARCHY_CODE,P_TEL_NO,P_FAX_NO,P_ADDRESS,P_NODE_ID,P_SUBNODE_ID,P_CREATED_BY);
				  SELECT 1;
				 END IF;
			
			  END IF;
			
			  IF(P_ACTION='U')THEN
				SET @DUP  = (SELECT COUNT(1) FROM m_admin_subnode_values WHERE INT_PARENT_NODE=(SELECT INT_PARENT_NODE FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=P_ID) AND VCH_VALUE_NAME=P_VALUE_NAME AND INT_SUBNODEVAL_ID!=P_ID AND BIT_DELETED_FLAG=0);
				 IF(@DUP>0)THEN
				   SELECT 0;
				 ELSE
				  UPDATE m_admin_subnode_values SET INT_PARENT_NODE=P_PARENT_ID,VCH_VALUE_NAME=P_VALUE_NAME,VCH_HIERARCHY_CODE=P_HIERARCHY_CODE,VCH_TEL_NO=P_TEL_NO,
				  VCH_FAX_NO=P_FAX_NO,VCH_ADDRESS=P_ADDRESS,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_SUBNODEVAL_ID=P_ID;
				  SELECT 1;
				 END IF;
			  END IF;
			  
			  IF(P_ACTION='V')THEN
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID,INT_PARENT_NODE,VCH_VALUE_NAME,VCH_HIERARCHY_CODE,VCH_TEL_NO,VCH_FAX_NO,VCH_ADDRESS,INT_NODE_ID,INT_SUBNODE_ID,INT_CREATED_BY,	
				DTM_CREATED_ON FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0';
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_ID);
				END IF;
			
				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
				END IF;
			
				IF(P_NODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				END IF;
			
				IF(P_SUBNODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC');
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
			
			  END IF;
			
			  IF(P_ACTION='PG')THEN
				SET @START_REC  = P_ID;
			
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID,INT_PARENT_NODE,VCH_VALUE_NAME,VCH_HIERARCHY_CODE,VCH_TEL_NO,VCH_FAX_NO,VCH_ADDRESS,INT_NODE_ID,INT_SUBNODE_ID,INT_CREATED_BY,
				DTM_CREATED_ON FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0';

				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
				END IF;
			
				IF(P_NODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				END IF;
			
				IF(P_SUBNODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC LIMIT ?,10');
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT USING @START_REC;
			
			  END IF;
			
			  IF(P_ACTION='D')THEN
				SET @DUP    = (SELECT COUNT(1) FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=P_ID);
			
				IF(@DUP>0)THEN
				  SELECT 0;
				ELSE
				  UPDATE m_admin_subnode_values SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_SUBNODEVAL_ID=P_ID;
				  SELECT 1;
				END IF;
			
			  END IF;
			
			  IF(P_ACTION='F')THEN
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME,INT_PARENT_NODE,INT_NODE_ID,INT_SUBNODE_ID, (SELECT S.VCH_SUBNODE_NAME FROM m_admin_subnode S WHERE S.INT_SUBNODE_ID=V.INT_SUBNODE_ID AND S.Bit_DELETED_FLAG=0) AS SUBNODE_LABEL
				FROM m_admin_subnode_values V WHERE BIT_DELETED_FLAG=0';
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_ID);
				END IF;
			
				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
				END IF;
			
				IF(P_NODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				END IF;
			
				
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID!=0');
				
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC');
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
			
			  END IF;
			
			  IF(P_ACTION='P')THEN
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME,INT_NODE_ID,INT_SUBNODE_ID,
				(SELECT H.VCH_HIERARCHY_NAME FROM m_admin_hierarchy H WHERE H.INT_NODE_ID=V.INT_NODE_ID AND H.BIT_DELETED_FLAG=0 AND V.INT_NODE_ID!=0) AS NODE_NAME,
				(SELECT S.VCH_SUBNODE_NAME FROM m_admin_subnode S WHERE S.INT_SUBNODE_ID=V.INT_SUBNODE_ID AND S.BIT_DELETED_FLAG=0 AND V.INT_SUBNODE_ID!=0) AS SUBNODE_NAME
				FROM m_admin_subnode_values V WHERE BIT_DELETED_FLAG=0';
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_ID);
				END IF;
			
			
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
			
				IF(P_NODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				END IF;
			
				IF(P_SUBNODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC');
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
			
			  END IF;
			
						  IF(P_ACTION='FP')THEN
					SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=0;
			  END IF;
			
			  IF(P_ACTION='R')THEN
			  SELECT INT_PARENT_NODE,VCH_VALUE_NAME,VCH_HIERARCHY_CODE,VCH_TEL_NO,VCH_FAX_NO,VCH_ADDRESS,INT_NODE_ID,INT_SUBNODE_ID
			  FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=P_ID;
			  END IF;

						IF(P_ACTION='GN')THEN
				SET @SUBNODE_ID	= P_ID;
				SET @PARENT_ID	= P_ID;
				WHILE @PARENT_ID!=0 DO
					SELECT INT_PARENT_NODE,INT_SUBNODEVAL_ID INTO @PARENT_ID,@SUBNODE_ID FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_SUBNODEVAL_ID=@PARENT_ID;
									END WHILE;
				SELECT @SUBNODE_ID AS NODE_ID;
			END IF;

						IF(P_ACTION='GP')THEN
				SELECT INT_SUBNODEVAL_ID FROM m_admin_subnode_values WHERE INT_NODE_ID=P_NODE_ID AND INT_PARENT_NODE=0;
			END IF;
			
		IF(P_ACTION='SK')THEN
			SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME,INT_PARENT_NODE,INT_NODE_ID,INT_SUBNODE_ID, (SELECT S.VCH_SUBNODE_NAME FROM m_admin_subnode S WHERE S.INT_SUBNODE_ID=V.INT_SUBNODE_ID AND S.Bit_DELETED_FLAG=0) AS SUBNODE_LABEL FROM m_admin_subnode_values V WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE IN (SELECT INT_SUBNODEVAL_ID FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=P_PARENT_ID);
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ADMIN_USER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ADMIN_USER`(
		  IN   P_ACTION          VARCHAR(2),
		  IN   P_ID              INT,
		  IN   P_FULL_NAME       VARCHAR(100),
		  IN   P_GENDER          INT,
		  IN   P_BIRTH_DATE      VARCHAR(64),
		  IN   P_QUALIFICATION   VARCHAR(100),
		  IN   P_SPECIALISATION  VARCHAR(50),
		  IN   P_HOBBY           VARCHAR(100),
		  IN   P_IMAGE           VARCHAR(100),  
		  IN   P_OFFICE_PHNO     VARCHAR(16),
		  IN   P_MOBILE_NO       VARCHAR(15),
		  IN   P_EMAIL           VARCHAR(50),
		  IN   P_ADDRESS         VARCHAR(500),
		  IN   P_SUBNODEVAL_ID	  INT,
		  IN   P_PH_LOC_ID       INT,
		  IN   P_EMP_TYPE        INT,
		  IN   P_OFF_TYPE        INT,
		  IN   P_JOINING_DATE    VARCHAR(15),
		  IN   P_PROBATION_DATE  VARCHAR(15),
		  IN   P_DESIG_ID        INT,
		  IN   P_GRADE_ID        INT,  
		  IN   P_PREVILIGE       INT,
		  IN   P_ATTENDANCE      INT,
		  IN   P_PAY_ROLL        INT,
		  IN   P_EPF             INT,  
		  IN   P_USER_NAME       VARCHAR(50),
		  IN   P_PASSWORD        VARCHAR(50),
		  IN   P_DOMAIN_NAME     VARCHAR(50),
		  IN   P_STATUS          INT,
		  IN   P_SLNO            INT,
		  IN   P_PRIMARY_RA		  INT,
		  IN   P_SECONDARY_RA    INT,
		  IN   P_OPTIONAL_RA     INT,
		  IN   P_RA_CHECK        INT,
		  IN   P_PASS_CHECK      INT,
		  IN   P_CREATED_BY      INT,
		  IN   P_EX_EMPLOYEE	   INT,
		  IN   P_GROUP_ID        INT,
		  IN   P_ATTRIBUTE1      VARCHAR(50),
		  IN   P_ATTRIBUTE2      VARCHAR(50),
		  IN   P_ATTRIBUTE3      VARCHAR(50),
		  IN   P_ATTRIBUTE4      VARCHAR(50),
		  IN   P_ATTRIBUTE5      VARCHAR(50),
		  OUT  P_OUT             VARCHAR(200)
		 )
BEGIN
		
			SET @DESG_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('mosarkar_livedb.m_admin_desg_master'));
			SET @GRADE_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('mosarkar_livedb.m_admin_grade_master'));
			SET @LOC_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('mosarkar_livedb.m_admin_loc_master'));
			SET @GROUP_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('mosarkar_livedb.m_admin_group_master'));
		
		  IF(P_ACTION='CD')THEN
		
			SET @P_SQL	= 'SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1';
		
			IF(P_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_USER_ID!=',P_ID);
			END IF;
		
			IF(CHAR_LENGTH(P_USER_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_USER_NAME="',P_USER_NAME,'"');
			END IF;
			
			IF(CHAR_LENGTH(P_EMAIL)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_EMAIL="',P_EMAIL,'"');
			END IF;
		
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
		
		  END IF;
		


		  IF(P_ACTION='A')THEN

			INSERT INTO m_admin_user(VCH_FULL_NAME2,INT_GENDER,DTM_DATE_OF_BIRTH,VCH_QUALIFICATION,
			VCH_SPECIALIZATION,VCH_FULL_NAME,VCH_IMAGE,VCH_PH_NO,VCH_MOBILE_NO,VCH_EMAIL,VCH_ADDRESS,INT_SUBNODEVAL_ID,
			INT_PH_LOCATION,INT_EMP_TYPE,INT_OFF_TYPE,VCH_DATE_OF_JOIN,VCH_PROBATION_DATE,INT_DESIGNATION_ID,
			INT_GRADE_ID,INT_PRIVILEGE,INT_ATTENDANCE,INT_PAY_ROLL,INT_EPF,VCH_USER_NAME,VCH_PASSWORD,
			VCH_DOMAIN_USER_NAME,INT_STATUS,INT_SLNO,INT_ACCESS_TYPE,INT_SECONDARY_RA,INT_OPTIONAL_RA,INT_RA_CHECK,
			INT_PASS_CHECK,INT_CREATED_BY,INT_GROUP_ID)
			VALUES
			(P_FULL_NAME,P_GENDER,P_BIRTH_DATE,P_QUALIFICATION,P_SPECIALISATION,P_HOBBY,P_IMAGE,P_OFFICE_PHNO,
			P_MOBILE_NO,P_EMAIL,P_ADDRESS,P_SUBNODEVAL_ID,P_PH_LOC_ID,P_EMP_TYPE,0,P_JOINING_DATE,P_PROBATION_DATE,
			P_DESIG_ID,P_GRADE_ID,P_PREVILIGE,P_ATTENDANCE,P_PAY_ROLL,P_EPF,P_USER_NAME,P_PASSWORD,P_DOMAIN_NAME,
			P_STATUS,P_SLNO,P_PRIMARY_RA,P_SECONDARY_RA,P_OPTIONAL_RA,P_RA_CHECK,P_PASS_CHECK,P_CREATED_BY,P_GROUP_ID);

			IF(@GROUP_TABLE_EXIST=1)THEN
			  DROP TEMPORARY TABLE IF EXISTS TEMP;
			  CREATE TEMPORARY TABLE TEMP (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,INT_GL_ID INT, INT_PL_ID INT, INT_ACTION INT );
			  INSERT INTO TEMP (INT_GL_ID,INT_PL_ID,INT_ACTION) SELECT INT_GL_ID,INT_PL_ID,INT_ACTION from m_admin_group_permission where INT_GROUP_ID=P_GROUP_ID;
			  SET @MAXID = (SELECT MAX(INT_USER_ID) FROM m_admin_user);
			  SET @ROWCOUNT= (SELECT COUNT(ID) FROM TEMP);
			  SET @INTCOUNTER=1;
			  WHILE(@INTCOUNTER<=@ROWCOUNT)
				  DO
					  SET @G_ID= (SELECT INT_GL_ID  FROM TEMP WHERE ID=@INTCOUNTER );
					  SET @P_ID= (SELECT INT_PL_ID  FROM TEMP WHERE ID=@INTCOUNTER );
					  SET @INT_ACTION= (SELECT INT_ACTION  FROM TEMP WHERE ID=@INTCOUNTER );
					  INSERT INTO m_admin_permission(INT_USER_ID,INT_GL_ID,INT_PL_ID,INT_PERMISSION) VALUES(@MAXID,@G_ID,@P_ID,@INT_ACTION);
					  SET @INTCOUNTER= @INTCOUNTER+1;
			  END WHILE;
			END IF;




      SET @user_id      = LAST_INSERT_ID();
      SET @location     = (SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID = P_SUBNODEVAL_ID AND BIT_DELETED_FLAG = 0);
      SET @designation  = (SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = P_DESIG_ID AND BIT_DELETED_FLAG = 0);
      SET @department   = '';
      IF(P_PH_LOC_ID>0)THEN
        SET @department   = (SELECT vchDeptName FROM m_department WHERE intDeptId = P_PH_LOC_ID AND bitDeletedFlag = 0);
      END IF;



      SELECT @user_id AS last_id,P_FULL_NAME,P_USER_NAME,P_PASSWORD,P_PH_LOC_ID,P_DESIG_ID,P_OFFICE_PHNO,P_MOBILE_NO,P_EMAIL,P_GENDER,P_IMAGE,@location,
      P_SUBNODEVAL_ID,@designation,@department,P_GRADE_ID;

		  END IF;


      IF(P_ACTION='RU')THEN

			DELETE FROM m_admin_user WHERE INT_USER_ID=P_ID ;

		  END IF;


		  IF(P_ACTION='U')THEN

			UPDATE m_admin_user SET VCH_FULL_NAME2=P_FULL_NAME,INT_GENDER=P_GENDER,DTM_DATE_OF_BIRTH=P_BIRTH_DATE,
			VCH_QUALIFICATION=P_QUALIFICATION,VCH_SPECIALIZATION=P_SPECIALISATION,VCH_FULL_NAME=P_HOBBY,VCH_IMAGE=P_IMAGE,
			VCH_PH_NO=P_OFFICE_PHNO,VCH_MOBILE_NO=P_MOBILE_NO,VCH_EMAIL=P_EMAIL,VCH_ADDRESS=P_ADDRESS,INT_SUBNODEVAL_ID=P_SUBNODEVAL_ID,
			INT_PH_LOCATION=P_PH_LOC_ID,INT_EMP_TYPE=P_EMP_TYPE,VCH_DATE_OF_JOIN=P_JOINING_DATE,VCH_PROBATION_DATE=P_PROBATION_DATE,
			INT_DESIGNATION_ID=P_DESIG_ID,INT_GRADE_ID=P_GRADE_ID,INT_PRIVILEGE=P_PREVILIGE,INT_ATTENDANCE=P_ATTENDANCE,
			INT_PAY_ROLL=P_PAY_ROLL,INT_EPF=P_EPF,VCH_DOMAIN_USER_NAME=P_DOMAIN_NAME,INT_ACCESS_TYPE=P_PRIMARY_RA,INT_SECONDARY_RA=
			P_SECONDARY_RA,INT_OPTIONAL_RA=P_OPTIONAL_RA,INT_RA_CHECK=P_RA_CHECK,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW(),INT_GROUP_ID=P_GROUP_ID
			WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1;


      SET @location     = (SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID = P_SUBNODEVAL_ID AND BIT_DELETED_FLAG = 0);
      SET @designation  = (SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = P_DESIG_ID AND BIT_DELETED_FLAG = 0);
      SET @department   = '';
      IF(P_PH_LOC_ID>0)THEN
        SET @department   = (SELECT vchDeptName FROM m_department WHERE intDeptId = P_PH_LOC_ID AND bitDeletedFlag = 0);
      END IF;

      SELECT P_ID,P_FULL_NAME,P_PH_LOC_ID,P_DESIG_ID,P_OFFICE_PHNO,P_MOBILE_NO,P_EMAIL,P_GENDER,P_IMAGE,@location,P_SUBNODEVAL_ID,@designation,@department,P_GRADE_ID;
						
		  END IF;
		
		
		  IF(P_ACTION='V')THEN
		
			
			SET @P_SQL	= 'SELECT INT_USER_ID,VCH_FULL_NAME2,INT_GENDER,DTM_DATE_OF_BIRTH,VCH_QUALIFICATION,
			VCH_SPECIALIZATION,VCH_FULL_NAME,VCH_IMAGE,VCH_PH_NO,VCH_MOBILE_NO,VCH_EMAIL,VCH_ADDRESS,INT_SUBNODEVAL_ID,
			INT_PH_LOCATION,INT_EMP_TYPE,INT_OFF_TYPE,VCH_DATE_OF_JOIN,VCH_PROBATION_DATE,INT_DESIGNATION_ID,INT_ACCESS_TYPE,
      (SELECT ADM.VCH_DESG_NAME FROM  m_admin_desg_master ADM WHERE ADM.INT_DESG_ID=INT_DESIGNATION_ID AND ADM.BIT_DELETED_FLAG=0) AS DESIGNATION,
			INT_GRADE_ID,INT_PRIVILEGE,INT_ATTENDANCE,INT_PAY_ROLL,INT_EPF,VCH_USER_NAME,VCH_PASSWORD,
			VCH_DOMAIN_USER_NAME,INT_STATUS,INT_SLNO,INT_PRIMARY_RA,INT_SECONDARY_RA,INT_OPTIONAL_RA,INT_RA_CHECK,INT_ROAMING_ACCESS,INT_GROUP_ID,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_PRIMARY_RA AND U.INT_PRIMARY_RA>0 AND U.BIT_DELETED_FLAG=0) AS PRIMARY_RA_NAME,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_SECONDARY_RA AND U.INT_SECONDARY_RA>0 AND U.BIT_DELETED_FLAG=0) AS SECONDARY_RA_NAME,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_OPTIONAL_RA AND U.INT_OPTIONAL_RA>0 AND U.BIT_DELETED_FLAG=0) AS OPTIONAL_RA_NAME, ';
			IF(@DESG_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT D.VCH_DESG_NAME FROM m_admin_desg_master D WHERE D.INT_DESG_ID=INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_NAME,');
			END IF;
			IF(@GRADE_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT G.VCH_GRADE_NAME FROM m_admin_grade_master G WHERE G.INT_GRADE_ID=U.INT_GRADE_ID AND G.BIT_DELETED_FLAG=0) AS GRADE_NAME,');
			END IF;
			 IF(@LOC_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT L.VCH_LOCATION FROM m_admin_loc_master L WHERE L.INT_LOC_ID=U.INT_PH_LOCATION AND L.BIT_DELETED_FLAG=0) AS LOCATION_NAME,');
			END IF;
                        
			IF(@GROUP_TABLE_EXIST=1)THEN
				SET @P_SQL=CONCAT(@P_SQL,'(SELECT GO.VCH_GROUP_NAME FROM m_admin_group_master GO WHERE GO.INT_GROUP_ID=U.INT_GROUP_ID AND GO.BIT_DELETED_FLAG=0) AS GROUP_NAME,');
			END IF;
				SET @P_SQL=CONCAT(@P_SQL,'INT_PASS_CHECK,INT_CREATED_BY FROM m_admin_user U WHERE BIT_DELETED_FLAG=0 AND INT_PRIVILEGE!=0');
			
			IF(P_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_USER_ID=',P_ID);
			END IF;
		
			IF(CHAR_LENGTH(P_FULL_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_FULL_NAME LIKE "%',P_FULL_NAME,'%"');
			END IF;
		
			

			IF(P_SUBNODEVAL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND FIND_IN_SET(',P_SUBNODEVAL_ID,' , (FN_ALL_PARENT(INT_SUBNODEVAL_ID)))>0');
			END IF;
		
			IF(P_STATUS>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
			END IF;
		
			IF(P_EX_EMPLOYEE>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_EX_EMPLOYEE=',P_EX_EMPLOYEE);
			END IF;
		
			IF(P_GROUP_ID>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_GROUP_ID=',P_GROUP_ID);
			END IF;

      IF(CHAR_LENGTH(P_USER_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_USER_NAME="',P_USER_NAME,'"');
			END IF;
		
			SET @P_SQL	= CONCAT(@P_SQL,' ORDER BY INT_SLNO ASC');

			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
		
		  END IF;
		
		
		  IF(P_ACTION='PG')THEN
		
			SET @START_REC	= P_ID;
		
			SET @P_SQL	= 'SELECT INT_USER_ID,VCH_FULL_NAME2,INT_GENDER,DTM_DATE_OF_BIRTH,VCH_QUALIFICATION,
			VCH_SPECIALIZATION,VCH_FULL_NAME,VCH_IMAGE,VCH_PH_NO,VCH_MOBILE_NO,VCH_EMAIL,VCH_ADDRESS,INT_SUBNODEVAL_ID,
			INT_PH_LOCATION,INT_EMP_TYPE,INT_OFF_TYPE,VCH_DATE_OF_JOIN,VCH_PROBATION_DATE,INT_DESIGNATION_ID,
			INT_GRADE_ID,INT_PRIVILEGE,INT_ATTENDANCE,INT_PAY_ROLL,INT_EPF,VCH_USER_NAME,VCH_PASSWORD,
			VCH_DOMAIN_USER_NAME,INT_STATUS,INT_SLNO,INT_PRIMARY_RA,INT_SECONDARY_RA,INT_OPTIONAL_RA,INT_RA_CHECK,INT_ROAMING_ACCESS,INT_GROUP_ID,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_PRIMARY_RA AND U.INT_PRIMARY_RA>0 AND U.BIT_DELETED_FLAG=0) AS PRIMARY_RA_NAME,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_SECONDARY_RA AND U.INT_SECONDARY_RA>0 AND U.BIT_DELETED_FLAG=0) AS SECONDARY_RA_NAME,
			(SELECT A.VCH_FULL_NAME FROM m_admin_user A WHERE A.INT_USER_ID=U.INT_OPTIONAL_RA AND U.INT_OPTIONAL_RA>0 AND U.BIT_DELETED_FLAG=0) AS OPTIONAL_RA_NAME, ';
			IF(@DESG_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT D.VCH_DESG_NAME FROM m_admin_desg_master D WHERE D.INT_DESG_ID=INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_NAME,');
			END IF;
			IF(@GRADE_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT G.VCH_GRADE_NAME FROM m_admin_grade_master G WHERE G.INT_GRADE_ID=U.INT_GRADE_ID AND G.BIT_DELETED_FLAG=0) AS GRADE_NAME,');
			END IF;
			IF(@LOC_TABLE_EXIST=1)THEN
				SET @P_SQL= CONCAT(@P_SQL,'(SELECT L.VCH_LOCATION FROM m_admin_loc_master L WHERE L.INT_LOC_ID=U.INT_PH_LOCATION AND L.BIT_DELETED_FLAG=0) AS LOCATION_NAME,');
			END IF;
            
			IF(@GROUP_TABLE_EXIST=1)THEN
				SET @P_SQL=CONCAT(@P_SQL,'(SELECT GO.VCH_GROUP_NAME FROM m_admin_group_master GO WHERE GO.INT_GROUP_ID=U.INT_GROUP_ID AND GO.BIT_DELETED_FLAG=0) AS GROUP_NAME,');
			END IF;
				SET @P_SQL=CONCAT(@P_SQL,'INT_PASS_CHECK,INT_CREATED_BY FROM m_admin_user U WHERE BIT_DELETED_FLAG=0 AND INT_PRIVILEGE!=0');
		
			IF(CHAR_LENGTH(P_FULL_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_FULL_NAME LIKE "%',P_FULL_NAME,'%"');
			END IF;
		
			

			IF(P_SUBNODEVAL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND FIND_IN_SET(',P_SUBNODEVAL_ID,' , (FN_ALL_PARENT(INT_SUBNODEVAL_ID)))>0');
			END IF;
		
			IF(P_STATUS>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
			END IF;
		
			IF(P_EX_EMPLOYEE>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_EX_EMPLOYEE=',P_EX_EMPLOYEE);
			END IF;
		
			IF(P_GROUP_ID>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_GROUP_ID=',P_GROUP_ID);
			END IF;
		
			SET @P_SQL	= CONCAT(@P_SQL,' ORDER BY INT_SLNO ASC LIMIT ?,20');
						PREPARE STMT FROM @P_SQL;
			EXECUTE STMT USING @START_REC;
		
		  END IF;
		
		
		  IF(P_ACTION='CT')THEN
		
			SET @P_SQL	= 'SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_PRIVILEGE!=0';
		
			IF(P_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_USER_ID=',P_ID);
			END IF;
		
			IF(CHAR_LENGTH(P_FULL_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_FULL_NAME LIKE "%',P_FULL_NAME,'%"');
			END IF;
		
			IF(P_SUBNODEVAL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND FIND_IN_SET(',P_SUBNODEVAL_ID,' , (FN_ALL_PARENT(INT_SUBNODEVAL_ID)))>0');
			END IF;
		
			IF(P_STATUS>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND INT_STATUS=',P_STATUS);
			END IF;
		
			IF(P_EX_EMPLOYEE>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_EX_EMPLOYEE=',P_EX_EMPLOYEE);
			END IF;	
		
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
		
		  END IF;
		
		
		  IF(P_ACTION='GM')THEN
			SELECT MAX(INT_SLNO)+1 AS MAX_SL FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1;
		  END IF;
		
		
		
		  IF(P_ACTION='EX')THEN

			SET @DEPEND_ID =	0;
			IF(@SHIFT_TABLE_EXIST=1)THEN
				SET @DEPEND_ID = (SELECT COUNT(1) FROM m_admin_assign WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0);
			END IF;
			IF(@DEPEND_ID>0)THEN
				SELECT 0;
			ELSE
				SET @SL_NO     = (SELECT INT_SLNO FROM m_admin_user WHERE  BIT_DELETED_FLAG=0 AND INT_USER_ID=P_ID);
				UPDATE m_admin_user SET INT_EX_EMPLOYEE=2,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0;
				UPDATE m_admin_user SET INT_SLNO=(INT_SLNO-1)  WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1
				AND INT_SLNO >@SL_NO ; 
				UPDATE m_admin_permission SET BIT_DELETED_FLAG=1,DTM_UPDATED_ON=NOW(),INT_UPDATED_BY=P_CREATED_BY WHERE INT_USER_ID=P_ID;
			
				IF(@SHIFT_TABLE_EXIST=1)THEN
					UPDATE m_admin_shift_assign SET BIT_DELETED_FLAG=1,DTM_UPDATED_ON=NOW(),INT_UPDATED_BY=P_CREATED_BY WHERE INT_USER_ID=P_ID;
					UPDATE m_admin_flexi_time SET BIT_DELETED_FLAG=1,DTM_UPDATED_ON=NOW(),INT_UPDATED_BY=P_CREATED_BY WHERE INT_USER_ID=P_ID;
				END IF;

				SELECT 1;
			END IF;
		  END IF;
		
		
		  IF(P_ACTION='F') THEN
			SET @P_SQL	= 'SELECT INT_USER_ID,VCH_FULL_NAME';
		
			IF(@DESG_TABLE_EXIST=1)THEN
				SET @P_SQL	= CONCAT(@P_SQL,',(SELECT D.VCH_DESG_NAME FROM m_admin_desg_master D WHERE
		D.INT_DESG_ID=U.INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_NAME ');
			END IF;
		
			SET @P_SQL	= CONCAT(@P_SQL,' FROM m_admin_user U WHERE BIT_DELETED_FLAG=0 AND INT_PRIVILEGE!=0 ');
			
			IF(P_SUBNODEVAL_ID>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND FIND_IN_SET(',P_SUBNODEVAL_ID,' , (FN_ALL_PARENT(INT_SUBNODEVAL_ID)))>0');
			END IF;
		
			IF(CHAR_LENGTH(P_FULL_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_FULL_NAME LIKE "%',P_FULL_NAME,'%"');
			END IF;
		
			IF(P_EX_EMPLOYEE>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_EX_EMPLOYEE=',P_EX_EMPLOYEE);
			END IF;
		
			SET @P_SQL	= CONCAT(@P_SQL,' ORDER BY VCH_FULL_NAME ASC ');
		
			 PREPARE STMT FROM @P_SQL;
			 EXECUTE STMT;
            
		
		  END IF;
		
	IF(P_ACTION='XM') THEN
		SET @P_SQL	= 'SELECT INT_USER_ID,VCH_FULL_NAME,(SELECT D.VCH_DESG_NAME FROM m_admin_desg_master D WHERE
		D.INT_DESG_ID=U.INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_NAME,VCH_IMAGE,INT_PRIVILEGE
		FROM m_admin_user U WHERE BIT_DELETED_FLAG=0 ';

		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;

	END IF;
		
		  IF(P_ACTION='US')THEN
			SET @SL_NO     = (SELECT INT_SLNO FROM m_admin_user WHERE  BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1 AND INT_USER_ID=P_ID);
		
			IF(P_SLNO<@SL_NO)THEN
				UPDATE m_admin_user, (SELECT @id := P_SLNO) dm SET INT_SLNO =(@id :=@id + 1) WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1
				AND INT_USER_ID !=P_ID AND INT_SLNO BETWEEN  P_SLNO AND @SL_NO;
				UPDATE m_admin_user SET INT_SLNO=P_SLNO  WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
				SELECT "Sl No  Updated Successfully";
			ELSE
				UPDATE m_admin_user SET INT_SLNO=(INT_SLNO-1)  WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1
				AND INT_USER_ID !=P_ID AND INT_SLNO BETWEEN @SL_NO AND P_SLNO  ;
				UPDATE m_admin_user SET INT_SLNO=P_SLNO WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
				SELECT "Sl No  Updated Successfully";
			END IF;
		
		  END IF;
		
		
		
		  IF(P_ACTION='AC')THEN
		
			UPDATE m_admin_user SET INT_STATUS=1  WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
		
		  END IF;
		
		
		
		  IF(P_ACTION='IN')THEN
		
			UPDATE m_admin_user SET INT_STATUS=2  WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
		
		  END IF;
		
		
		
		  IF(P_ACTION='D')THEN
			
			UPDATE m_admin_user SET BIT_DELETED_FLAG=1  WHERE INT_USER_ID=P_ID ;
			UPDATE m_admin_permission SET BIT_DELETED_FLAG=1 WHERE INT_USER_ID=P_ID;
			
		  END IF;
		
		
		  IF(P_ACTION='ER')THEN
		
			UPDATE m_admin_user SET INT_ROAMING_ACCESS=1  WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
		
		  END IF;
		
		
		  IF(P_ACTION='DR')THEN
		
			UPDATE m_admin_user SET INT_ROAMING_ACCESS=2  WHERE INT_USER_ID=P_ID AND INT_EX_EMPLOYEE=1 AND BIT_DELETED_FLAG=0;
		
		  END IF;
		
			IF(P_ACTION='GT')THEN
		
				SELECT (SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1 AND INT_PRIVILEGE!=0) AS TOTAL_USER, (SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1 AND INT_STATUS=1 AND INT_PRIVILEGE!=0) AS ACTIVE_USER, (SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=1 AND INT_STATUS=2 AND INT_PRIVILEGE!=0) AS INACTIVE_USER, (SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_EX_EMPLOYEE=2 AND INT_PRIVILEGE!=0) AS EX_EMPLOYEE ;
		
			END IF;
		
		
		  IF(P_ACTION='UG')THEN
		
		  UPDATE m_admin_user SET INT_GROUP_ID=P_GROUP_ID,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW()  WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0;
		  DROP TEMPORARY TABLE IF EXISTS TEMP;
		  CREATE TEMPORARY TABLE TEMP (ID INT AUTO_INCREMENT PRIMARY KEY ,INT_GL_ID INT, INT_PL_ID INT, INT_ACTION INT );
		  INSERT INTO TEMP (INT_GL_ID,INT_PL_ID,INT_ACTION) SELECT INT_GL_ID,INT_PL_ID,INT_ACTION from m_admin_group_permission where INT_GROUP_ID=P_GROUP_ID;
		  DELETE FROM m_admin_permission WHERE INT_USER_ID=P_ID;
		  SET @ROWCOUNT= (SELECT COUNT(ID) FROM TEMP);
		  SET @INTCOUNTER=1;
		  WHILE(@INTCOUNTER<=@ROWCOUNT)
		  DO
		  SET @G_ID= (SELECT INT_GL_ID  FROM TEMP WHERE ID=@INTCOUNTER );
		  SET @P_ID= (SELECT INT_PL_ID  FROM TEMP WHERE ID=@INTCOUNTER );
		  SET @INT_ACTION= (SELECT INT_ACTION  FROM TEMP WHERE ID=@INTCOUNTER );
		  INSERT INTO m_admin_permission(INT_USER_ID,INT_GL_ID,INT_PL_ID,INT_PERMISSION) VALUES(P_ID,@G_ID,@P_ID,@INT_ACTION);
		  SET @INTCOUNTER= @INTCOUNTER+1;
		  END WHILE;
		
			END IF;

      IF(P_ACTION='CP')THEN
        START TRANSACTION;
          SET @VPASW=(SELECT COUNT(1) FROM m_admin_user WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0 AND (VCH_PASSWORD=P_DOMAIN_NAME or VCH_TEMP_PASSWORD=P_DOMAIN_NAME));
          IF(@VPASW=1)THEN
            UPDATE m_admin_user SET VCH_PASSWORD=P_PASSWORD,VCH_TEMP_PASSWORD='',INT_PASS_CHECK=1,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() ,DTM_PASSWORD_CHANGE=NOW(),LOGIN_STATUS=0 WHERE INT_USER_ID=P_ID AND BIT_DELETED_FLAG=0;
            SELECT 0;
          ELSE
            SELECT 1;
          END IF;
        COMMIT;
      END IF;

    IF(P_ACTION='FP')THEN
      START TRANSACTION;
                    SET @FPASW=(SELECT COUNT(1) FROM m_admin_user WHERE VCH_USER_NAME=P_USER_NAME AND (VCH_EMAIL=P_EMAIL OR VCH_MOBILE_NO = P_EMAIL) AND BIT_DELETED_FLAG=0);
          IF(@FPASW=1)THEN
                                    SELECT INT_USER_ID FROM m_admin_user WHERE VCH_EMAIL=P_EMAIL OR VCH_MOBILE_NO = P_EMAIL;
          ELSE
            SELECT 0;
          END IF;
      COMMIT;
    END IF;


IF(P_ACTION='DU') THEN
			SET @P_SQL	= 'SELECT INT_USER_ID,VCH_FULL_NAME';
		
			IF(@DESG_TABLE_EXIST>=1)THEN
				SET @P_SQL	= CONCAT(@P_SQL,',(SELECT D.VCH_DESG_NAME FROM m_admin_desg_master D WHERE
		D.INT_DESG_ID=U.INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_NAME ');
			
		
        	SET @P_SQL	= CONCAT(@P_SQL,',(SELECT D.INT_DESG_ID FROM m_admin_desg_master D WHERE
		D.INT_DESG_ID=U.INT_DESIGNATION_ID AND D.BIT_DELETED_FLAG=0) AS DESIGNATION_ID ');
			END IF;
            
			SET @P_SQL	= CONCAT(@P_SQL,' FROM m_admin_user U WHERE BIT_DELETED_FLAG=0 AND INT_PRIVILEGE!=0');

			IF(P_SUBNODEVAL_ID>0)THEN
				        SET @P_SQL	= CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_SUBNODEVAL_ID);
			END IF;
		
			IF(CHAR_LENGTH(P_FULL_NAME)>0)THEN
				SET @P_SQL	= CONCAT(@P_SQL,' AND VCH_FULL_NAME LIKE "%',P_FULL_NAME,'%"');
			END IF;
		
			IF(P_EX_EMPLOYEE>0)THEN
			  SET @P_SQL	= CONCAT(@P_SQL,' AND INT_EX_EMPLOYEE=',P_EX_EMPLOYEE);
			END IF;
		
			SET @P_SQL	= CONCAT(@P_SQL,' ORDER BY VCH_FULL_NAME ASC ');
		
			 PREPARE STMT FROM @P_SQL;
			 EXECUTE STMT;
END IF;
                      
     
	IF(P_ACTION='CN')THEN
      select INT_USER_ID ,VCH_USER_NAME  from m_admin_user where VCH_MOBILE_NO=P_MOBILE_NO and BIT_DELETED_FLAG=0 and INT_STATUS=1 limit 1;
    END IF;  
    
         
	IF(P_ACTION='SO')THEN
      SET @COUNT=0;
      select count(*) INTO @COUNT  from t_user_otp where intUserId=P_ID;
      IF( @COUNT>0)THEN
          UPDATE  t_user_otp set vchOTP=P_OFFICE_PHNO,intUserId=P_ID,vchMobileNo=P_MOBILE_NO,dtmLastUpdatedOn=NOW() where intUserId=P_ID;
      ELSE
        INSERT INTO `t_user_otp`(`vchOTP`,`intUserId`,`vchMobileNo`)VALUES(P_OFFICE_PHNO,P_ID,P_MOBILE_NO);
      END IF;
      
    END IF;
    
    IF(P_ACTION='PT')THEN
      select INT_USER_ID ,DTM_PASSWORD_CHANGE,LOGIN_STATUS  from m_admin_user where INT_USER_ID=P_ID and BIT_DELETED_FLAG=0 and INT_STATUS=1 limit 1;
    END IF;
    
    
    
    IF(P_ACTION='RP')THEN
    UPDATE m_admin_user SET VCH_PASSWORD=P_PASSWORD,DTM_PASSWORD_CHANGE=NOW(),LOGIN_STATUS=5 where INT_USER_ID=P_ID ;
    SELECT 1 as P_Status;
     END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_ATTENDANCE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_ATTENDANCE`(
				IN   P_ACTION		VARCHAR(3),
				IN   P_USER_ID		INT,
				IN   P_GMT_DIFF		VARCHAR(12),
				IN   P_REMARK		VARCHAR(500)
			)
BEGIN
						
				SET @SER_GMT	  = (SELECT TIME_FORMAT(TIMEDIFF(NOW(), UTC_TIMESTAMP),'%H:%i'));
				SET @SHIFT_TABLE_EXIST	= (SELECT FN_TABLE_STATUS('HPTCP.m_admin_shift_master'));
				SET @GMT_DIFF	 = @SER_GMT;

				IF(@SHIFT_TABLE_EXIST=1)THEN
				SET @GMT_DIFF	 = P_GMT_DIFF;				
			
				IF(LEFT(P_GMT_DIFF,1)='+')THEN
					SET @GMT_DIFF	= (SELECT SUBSTR(P_GMT_DIFF, 2));	
				END IF;				
					
				END IF;

				SET @LOC_GMT	  = (SELECT TIME_FORMAT(@GMT_DIFF,'%H:%i'));
			
				IF(@SER_GMT>'00:00')THEN
					SET @SER_GMT	= CONCAT('+',@SER_GMT);
				END IF;
			
				IF(@LOC_GMT>'00:00')THEN
					SET @LOC_GMT	= CONCAT('+',@LOC_GMT);
				END IF;
				
				SET @LOC_DATE_TIME	= (SELECT CONVERT_TZ(NOW(),@SER_GMT,@LOC_GMT));

			
				SET @LOC_DATE		   = DATE(@LOC_DATE_TIME);
			
				SET @LOC_TIME		   = DATE_FORMAT(@LOC_DATE_TIME,'%H:%i:%s');
			
				SET @DAY_NUMBER		 = DATE_FORMAT(@LOC_DATE, '%w');
			
				SET @LOGIN_DATE		 = '';
			
			  SET @LOGIN_TIME		 = '';
			
			  SET @RECESS_OUT		 = '';
			
			  SET @RECESS_IN		  = '';
			
			  SET @LOGOUT_TIME		= '';
			
			  IF(P_ACTION='S')THEN				

				IF(@SHIFT_TABLE_EXIST=1)THEN
				SET @COUNT_TIME     = (SELECT COUNT(1) FROM m_admin_flexi_time WHERE INT_USER_ID=P_USER_ID AND
				BIT_DELETED_FLAG=0 AND @LOC_DATE BETWEEN DATE(DTM_DATE_FROM) AND DATE(DTM_DATE_TO));
			
				SET @SHIFT_ID     = (SELECT INT_SHIFT_ID FROM m_shift_assign WHERE INT_USER_ID=P_USER_ID AND
				BIT_DELETED_FLAG=0 );
			
				IF(@COUNT_TIME>0)THEN
				  IF(@DAY_NUMBER!=6)THEN
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_START_TIME AS START_TIME,INT_GRACE_TIME AS GRACE_TIME,VCH_RECESS_FROM AS RECESS_FROM,VCH_RECESS_TO AS RECESS_TO,
					VCH_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_admin_flexi_time WHERE INT_USER_ID=P_USER_ID AND BIT_DELETED_FLAG=0 AND @LOC_DATE
					BETWEEN DATE(DTM_DATE_FROM) AND DATE(DTM_DATE_TO);
				  ELSE
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_HALF_START_TIME AS START_TIME,VCH_HALF_LATE_EXIT AS GRACE_TIME,'' AS RECESS_FROM,'' AS RECESS_TO,
					VCH_HALF_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_admin_flexi_time WHERE INT_USER_ID=P_USER_ID AND BIT_DELETED_FLAG=0 AND @LOC_DATE
					BETWEEN DATE(DTM_DATE_FROM) AND DATE(DTM_DATE_TO);
			
				  END IF;
			
				ELSE IF(@SHIFT_ID !='')THEN
			
				  IF(@DAY_NUMBER!=6)THEN
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_START_TIME AS START_TIME,INT_GRACE_TIME AS GRACE_TIME,VCH_RECESS_FROM AS RECESS_FROM,VCH_RECESS_TO AS RECESS_TO,
					VCH_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_office_timing WHERE INT_SHIFT_ID=@SHIFT_ID AND BIT_DELETED_FLAG=0 ;
				  ELSE
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_HALF_START_TIME AS START_TIME,VCH_HALF_LATE_EXIT AS GRACE_TIME,'' AS RECESS_FROM,'' AS RECESS_TO,
					VCH_HALF_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_office_timing WHERE INT_SHIFT_ID=@SHIFT_ID AND BIT_DELETED_FLAG=0;
			
				  END IF;
			
				ELSE
				  SET @RETVAL    = 0;
				  SET @HIERARCHY_ID  = (SELECT INT_SUBNODEVAL_ID FROM m_admin_user WHERE INT_USER_ID=P_USER_ID AND BIT_DELETED_FLAG=0);
				  WHILE(@HIERARCHY_ID>0)DO
					SET @LEVELDETID =@HIERARCHY_ID;
					SET @HIERARCHY_ID  =(SELECT INT_PARENT_NODE FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=@HIERARCHY_ID);
					IF(@HIERARCHY_ID=0)THEN
					  SET @RETVAL  = @LEVELDETID;
					END IF;
				  END WHILE;
			
				  SET @DEFAULT_SHIFT  = (SELECT INT_SHIFT_ID FROM m_admin_shift_master WHERE INT_NODE_ID=@RETVAL AND
				  BIT_DELETED_FLAG=0 AND INT_DEFAULT=1);
			
				  IF(@DAY_NUMBER!=6)THEN
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_START_TIME AS START_TIME,INT_GRACE_TIME AS GRACE_TIME,VCH_RECESS_FROM AS RECESS_FROM,VCH_RECESS_TO AS RECESS_TO,
					VCH_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_office_timing WHERE INT_SHIFT_ID=@DEFAULT_SHIFT AND BIT_DELETED_FLAG=0 ;
				  ELSE
					SELECT @LOC_DATE_TIME AS LOC_TIME,VCH_HALF_START_TIME AS START_TIME,VCH_HALF_LATE_EXIT AS GRACE_TIME,'' AS RECESS_FROM,'' AS RECESS_TO,
					VCH_HALF_EXIT_TIME AS EXIT_TIME, @DAY_NUMBER AS DAY_NUMBER FROM m_office_timing WHERE INT_SHIFT_ID=@DEFAULT_SHIFT AND BIT_DELETED_FLAG=0 ;
			
				  END IF;
			
				END IF;
			
				END IF;

				END IF;
			SELECT @LOC_DATE_TIME;
				SELECT @LOC_DATE_TIME AS LOC_TIME,@LOC_DATE_TIME AS START_TIME,0 AS GRACE_TIME,@DAY_NUMBER AS DAY_NUMBER ;

			  END IF;
			
			  IF(P_ACTION='CL')THEN
				SELECT COUNT(1) FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
			  END IF;
			
				IF(P_ACTION='LI')THEN
			
				SELECT @LOGIN_DATE := DTM_DATE, @LOGIN_TIME := VCH_LOGIN_TIME, @RECESS_OUT := VCH_RECESS_FROM, @RECESS_IN := VCH_RECESS_TO, @LOGOUT_TIME := VCH_LOGOUT_TIME FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
					IF(@LOGIN_DATE='')THEN
						INSERT INTO m_admin_attendance(INT_USER_ID,DTM_DATE,VCH_LOGIN_TIME,VCH_RECESS_FROM,VCH_RECESS_TO,VCH_LOGOUT_TIME,VCH_REMARK) VALUES (P_USER_ID,@LOC_DATE,@LOC_TIME,'','','',P_REMARK);
					END IF;
			
				END IF;
			
				IF(P_ACTION='RO')THEN
			
				SELECT @LOGIN_DATE := DTM_DATE, @LOGIN_TIME := VCH_LOGIN_TIME, @RECESS_OUT := VCH_RECESS_FROM, @RECESS_IN := VCH_RECESS_TO, @LOGOUT_TIME := VCH_LOGOUT_TIME FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
			
					IF(@LOGIN_DATE!='' AND @RECESS_OUT='')THEN
						UPDATE m_admin_attendance SET VCH_RECESS_FROM=@LOC_TIME WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOGIN_DATE AND BIT_DELETED_FLAG=0;
					END IF;
			
				END IF;
			
				IF(P_ACTION='RI')THEN
			
				SELECT @LOGIN_DATE := DTM_DATE, @LOGIN_TIME := VCH_LOGIN_TIME, @RECESS_OUT := VCH_RECESS_FROM, @RECESS_IN := VCH_RECESS_TO, @LOGOUT_TIME := VCH_LOGOUT_TIME FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
			
					IF(@LOGIN_DATE!='' AND @RECESS_IN='')THEN
						UPDATE m_admin_attendance SET VCH_RECESS_TO=@LOC_TIME WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOGIN_DATE AND BIT_DELETED_FLAG=0;
					END IF;
			
				END IF;
			
				IF(P_ACTION='LO')THEN
			
				SELECT @LOGIN_DATE := DTM_DATE, @LOGIN_TIME := VCH_LOGIN_TIME, @RECESS_OUT := VCH_RECESS_FROM, @RECESS_IN := VCH_RECESS_TO, @LOGOUT_TIME := VCH_LOGOUT_TIME FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
			
					IF(@LOGIN_DATE!='')THEN
						UPDATE m_admin_attendance SET VCH_LOGOUT_TIME=@LOC_TIME WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOGIN_DATE AND BIT_DELETED_FLAG=0;
					END IF;
			
				END IF;
			
				IF(P_ACTION='V')THEN
			
				SELECT DTM_DATE,  VCH_LOGIN_TIME , VCH_RECESS_FROM , VCH_RECESS_TO , VCH_LOGOUT_TIME  FROM m_admin_attendance WHERE INT_USER_ID=P_USER_ID AND DTM_DATE=@LOC_DATE;
			
				END IF;
			
			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_COUNTRY_STATE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_COUNTRY_STATE`(
	IN	P_ACTION		VARCHAR(2),
    IN	P_ID			INT,
    IN	P_NAME			VARCHAR(32)
)
BEGIN

	
    
    IF(P_ACTION='FC')THEN
		SET @P_SQL = 'SELECT INT_COUNTRY_ID, VCH_COUNTRY_NAME FROM m_admin_country WHERE BIT_DELETED_FLAG=0';
        IF(P_ID > 0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND INT_COUNTRY_ID = ',P_ID);
        END IF;
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
    END IF;
 	
    
    IF(P_ACTION='FS')THEN
		SET @P_SQL = 'SELECT intStateId, vchStateName FROM m_state WHERE bitDeletedFlag=0';
        IF(P_ID > 0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intStateId = ',P_ID);
        END IF;
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
    END IF;   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_DEMOGRAPHY_MAPPING` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_DEMOGRAPHY_MAPPING`(
			  IN  P_ACTION         VARCHAR(3),
			  IN  P_ID             INT,
			  IN  P_PARENT_ID      INT,
              IN  P_USER_ID 	   INT,
              IN  P_LVL_ID         INT,
			  IN  P_ATTR1     	   TEXT,
			  IN  P_ATTR2 		   VARCHAR(512),
			  IN  P_ATTR3          VARCHAR(15),
			  IN  P_ATTR4          VARCHAR(15),
              IN  P_ATTR5          VARCHAR(15),
			  IN  P_NODE_ID        INT,
			  IN  P_SUBNODE_ID     INT,
			  IN  P_CREATED_BY     INT,
              IN  P_COMP_TYPE_ID   INT,
			  IN  P_CAT_ID     	   INT,
			  IN  P_SUBCAT_ID      INT,
              IN  P_DESG_ID        INT,
              IN  P_HIERARCHY_ID   VARCHAR(50),
			  OUT P_OUT            VARCHAR(200)
			)
BEGIN



		IF(P_ACTION='FDL')THEN
		SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID, VCH_VALUE_NAME, INT_NODE_ID, INT_SUBNODE_ID FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 ';

		IF(P_PARENT_ID>0)THEN
		SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_PARENT_ID);		  
		END IF;

		IF(P_LVL_ID>0)THEN
		SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_LVL_ID);                  
		END IF;
                
                
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;

		END IF;
        
        
        IF(P_ACTION='FL')THEN
		SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID, VCH_VALUE_NAME FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 ';
		IF(P_ID>=0)THEN
		SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_ID,' ORDER BY VCH_VALUE_NAME');		  
		END IF;
        
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;   

		END IF;
        
         IF(P_ACTION='FO')THEN
		SET @P_SQL  = 'SELECT INT_GROUP_ID, VCH_GROUP_NAME FROM m_admin_group_master WHERE BIT_DELETED_FLAG=0 ORDER BY VCH_GROUP_NAME ASC';
		
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;   
		END IF;
        
        IF(P_ACTION='FD')THEN
		SET @P_SQL  = 'SELECT intDeptId, vchDeptName FROM m_department WHERE bitDeletedFlag=0 ORDER BY vchDeptName ASC';
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;   

		END IF;
        
        	
        
        IF(P_ACTION='CD')THEN     
		SET @P_SQL=CONCAT('SELECT count(1) AS total FROM t_gms_demography_mapping WHERE BIT_DELETED_FLAG=0');      

                 
		  IF(P_ATTR1!='')THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_DEMOGRAPHY_ID IN(',P_ATTR1,') AND INT_TYPE IN(',P_ATTR2,')');
		END IF;
        
        IF(P_DESG_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_DESG_ID=',P_DESG_ID);     
		END IF; 
        IF(P_COMP_TYPE_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_COMPLAINT_TYPE_ID=',P_COMP_TYPE_ID);     
		END IF; 
        
          IF(P_CAT_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_CAT_ID=',P_CAT_ID);     
		END IF; 
        
          IF(P_SUBCAT_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_SUBCAT_ID=',P_SUBCAT_ID);     
		END IF; 
        
       IF(P_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_USER_DEMOGRAPHY_ID!=',P_ID);     
		END IF; 
        
        IF(P_USER_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_USER_ID=',P_USER_ID);     
		END IF; 
        
	     PREPARE STMT FROM @P_SQL;     
         EXECUTE STMT;   
                 
	END IF; 
    
    IF(P_ACTION='R') THEN
    
    SELECT mt.VCH_VALUE_NAME,d.INT_USER_DEMOGRAPHY_ID,d.INT_PARENT_ID, d.INT_USER_ID,mm.VCH_FULL_NAME,d.INT_DEMOGRAPHY_ID,d.DTM_CREATED_ON,d.INT_COMPLAINT_TYPE_ID, d.INT_CAT_ID, d.INT_SUBCAT_ID, d.INT_DESG_ID,d.VCH_HIERARCHY_ID FROM m_admin_subnode_values mt LEFT JOIN t_gms_demography_mapping d  ON mt.INT_SUBNODEVAL_ID=d.INT_DEMOGRAPHY_ID INNER JOIN m_admin_user mm  WHERE mm.INT_USER_ID=d.INT_USER_ID AND d.BIT_DELETED_FLAG=0 AND d.INT_USER_ID=P_USER_ID AND d.INT_COMPLAINT_TYPE_ID=P_COMP_TYPE_ID;
			END IF;
			
			 
			
  IF(P_ACTION='A')THEN
  SET @P_HIERARCHY_ID=(SELECT nodeVal FROM m_hierarchy_details WHERE INT_SUBNODEVAL_ID=P_LVL_ID);
         SET @P_SQL = CONCAT('INSERT INTO t_gms_demography_mapping (INT_PARENT_ID, INT_USER_ID, INT_DEMOGRAPHY_ID, INT_CREATED_BY,INT_COMPLAINT_TYPE_ID, INT_CAT_ID, INT_SUBCAT_ID, INT_DESG_ID,VCH_HIERARCHY_ID,INT_TYPE) VALUES ', P_ATTR1);
   PREPARE STMT FROM @P_SQL;
   EXECUTE STMT;
    
  END IF;
			
			  IF(P_ACTION='U')THEN
				INSERT INTO t_gms_demography_mapping(INT_PARENT_ID, INT_USER_ID, INT_DEMOGRAPHY_ID, INT_CREATED_BY,INT_COMPLAINT_TYPE_ID, INT_CAT_ID, INT_SUBCAT_ID, INT_DESG_ID,VCH_HIERARCHY_ID)
   VALUES (P_PARENT_ID,P_USER_ID,P_LVL_ID,P_CREATED_BY,P_COMP_TYPE_ID,P_CAT_ID,P_SUBCAT_ID,P_DESG_ID,P_HIERARCHY_ID);

			  END IF;


     		  

      IF(P_ACTION='PG')THEN
	  SET @P_IDS=P_ID;

              SET @P_SQL='SELECT d.INT_USER_DEMOGRAPHY_ID,d.INT_PARENT_ID, d.INT_USER_ID,mm.VCH_FULL_NAME,d.INT_TYPE,d.INT_DEMOGRAPHY_ID,d.DTM_CREATED_ON,
              d.INT_COMPLAINT_TYPE_ID, d.INT_CAT_ID, d.INT_SUBCAT_ID, d.INT_DESG_ID,(SELECT ADM.VCH_DESG_NAME FROM  m_admin_desg_master ADM
              WHERE ADM.INT_DESG_ID=INT_DESIGNATION_ID AND ADM.BIT_DELETED_FLAG=0) AS DESIGNATION,
              (SELECT CT.VCH_COMPLIANT_TYPE FROM  m_gms_complaint_type CT WHERE CT.INT_COMP_TYPE_ID=INT_COMPLAINT_TYPE_ID AND CT.INT_DELETED_FLAG=0) AS COMP_TYPE,
              (SELECT CAT.VCH_CATEGORY FROM  m_gms_category CAT WHERE CAT.INT_CATEGORY_ID=INT_CAT_ID AND CAT.INT_DELETED_FLAG=0) AS CATEGORY,
              (SELECT CAT.VCH_SUB_CATEGORY FROM  m_gms_sub_category CAT WHERE CAT.INT_SUB_CATEGORY_ID=d.INT_SUBCAT_ID AND CAT.INT_DELETED_FLAG=0) AS SUB_CATEGORY,
              
				CASE  
				WHEN d.INT_TYPE=1 THEN
				(SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID = d.INT_DEMOGRAPHY_ID) 
				WHEN d.INT_TYPE=2 THEN
				(SELECT vchDeptName FROM m_department WHERE intDeptId = d.INT_DEMOGRAPHY_ID) 
				WHEN d.INT_TYPE=3 THEN
				(SELECT VCH_GROUP_NAME FROM m_admin_group_master WHERE INT_GROUP_ID = d.INT_DEMOGRAPHY_ID) 
				end 
				AS locationName

              FROM t_gms_demography_mapping d INNER JOIN m_admin_user mm  WHERE mm.INT_USER_ID=d.INT_USER_ID AND d.BIT_DELETED_FLAG=0';

			
				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_TYPE=',P_PARENT_ID);
				END IF;
				 IF(P_COMP_TYPE_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_COMPLAINT_TYPE_ID=',P_COMP_TYPE_ID);
				END IF;


				IF(P_CAT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_CAT_ID=',P_CAT_ID);
				END IF;

				IF(P_SUBCAT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_SUBCAT_ID=',P_SUBCAT_ID);
				END IF;

				IF(P_USER_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_DEMOGRAPHY_ID=',P_USER_ID);
				END IF;

				
                
                IF(CHAR_LENGTH(P_ATTR1)>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND mm.VCH_FULL_NAME LIKE "%',P_ATTR1,'%"');
				END IF;
		  
SET @P_SQL = CONCAT(@P_SQL,' group by d.INT_USER_ID ORDER BY d.INT_COMPLAINT_TYPE_ID DESC LIMIT ?,10');
						PREPARE STMT FROM @P_SQL;
				EXECUTE STMT USING @P_IDS;
              
						  END IF;
              
				 	  
			  IF(P_ACTION='V')THEN
				SET @P_SQL  = 'SELECT d.INT_USER_DEMOGRAPHY_ID,d.INT_PARENT_ID, d.INT_USER_ID,mm.VCH_FULL_NAME,d.INT_TYPE,d.INT_DEMOGRAPHY_ID,d.DTM_CREATED_ON,
        d.INT_COMPLAINT_TYPE_ID, d.INT_CAT_ID, d.INT_SUBCAT_ID, d.INT_DESG_ID,
        (SELECT ADM.VCH_DESG_NAME FROM  m_admin_desg_master ADM WHERE ADM.INT_DESG_ID=INT_DESIGNATION_ID AND ADM.BIT_DELETED_FLAG=0) AS DESIGNATION,
        (SELECT CT.VCH_COMPLIANT_TYPE FROM  m_gms_complaint_type CT WHERE CT.INT_COMP_TYPE_ID=INT_COMPLAINT_TYPE_ID AND CT.INT_DELETED_FLAG=0) AS COMP_TYPE,
        (SELECT CAT.VCH_CATEGORY FROM  m_gms_category CAT WHERE CAT.INT_CATEGORY_ID=INT_CAT_ID AND CAT.INT_DELETED_FLAG=0) AS CATEGORY,
        
		CASE  
		WHEN d.INT_TYPE=1 THEN
		(SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID = d.INT_DEMOGRAPHY_ID) 
		WHEN d.INT_TYPE=2 THEN
		(SELECT vchDeptName FROM m_department WHERE intDeptId = d.INT_DEMOGRAPHY_ID) 
		WHEN d.INT_TYPE=3 THEN
		(SELECT VCH_GROUP_NAME FROM m_admin_group_master WHERE INT_GROUP_ID = d.INT_DEMOGRAPHY_ID) 
		end 
		AS locationName

        FROM t_gms_demography_mapping d INNER JOIN m_admin_user mm  WHERE mm.INT_USER_ID=d.INT_USER_ID AND d.BIT_DELETED_FLAG=0 ';

				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_TYPE=',P_PARENT_ID);
				END IF;


IF(P_COMP_TYPE_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_COMPLAINT_TYPE_ID=',P_COMP_TYPE_ID);
				END IF;

IF(P_SUBNODE_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_DEMOGRAPHY_ID=',P_SUBNODE_ID);
				END IF;

IF(P_CAT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_CAT_ID=',P_CAT_ID);
				END IF;

IF(P_SUBCAT_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_SUBCAT_ID=',P_SUBCAT_ID);
				END IF;

				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND d.INT_PARENT_ID=',P_PARENT_ID);
				END IF;
			
				IF(P_USER_ID>0)THEN
				  SET @P_SQL = CONCAT(@P_SQL,' AND d.INT_DEMOGRAPHY_ID=',P_USER_ID);
				END IF;
                
                 IF(CHAR_LENGTH(P_ATTR1)>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND mm.VCH_FULL_NAME LIKE "%',P_ATTR1,'%"');
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,'  group by d.INT_USER_ID ORDER BY d.INT_COMPLAINT_TYPE_ID DESC');

				 PREPARE STMT FROM @P_SQL;
				 EXECUTE STMT;
								
			  END IF;
              
				 	  
		IF(P_ACTION='VAL') THEN  

		SET @P_SQL=CONCAT('SELECT tdm.INT_USER_ID, tdm.INT_DEMOGRAPHY_ID, tdm.INT_USER_DEMOGRAPHY_ID, tdm.BIT_DELETED_FLAG, mad.INT_SUBNODEVAL_ID, mad.VCH_VALUE_NAME,mad.INT_SUBNODE_ID,mad.BIT_DELETED_FLAG FROM t_gms_demography_mapping AS tdm INNER JOIN m_admin_subnode_values AS mad WHERE tdm.INT_DEMOGRAPHY_ID = mad.INT_SUBNODEVAL_ID AND tdm.BIT_DELETED_FLAG=0 AND mad.BIT_DELETED_FLAG=0 AND tdm.INT_USER_ID=', P_USER_ID );
        
		IF(P_COMP_TYPE_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_COMPLAINT_TYPE_ID=',P_COMP_TYPE_ID);     
		END IF; 
        
		IF(P_CAT_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_CAT_ID=',P_CAT_ID);     
		END IF; 
        
		IF(P_SUBCAT_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_SUBCAT_ID=',P_SUBCAT_ID);     
		END IF; 
        
         SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY mad.VCH_VALUE_NAME ASC;');
        
        PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
            		END IF;
            

			  IF(P_ACTION='F')THEN
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID, VCH_VALUE_NAME, INT_PARENT_NODE,  INT_NODE_ID, INT_SUBNODE_ID FROM m_admin_subnode_values V WHERE BIT_DELETED_FLAG=0';
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_ID);
				END IF;
			
				IF(P_PARENT_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_NODE_ID);
				
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC');
			
			 PREPARE STMT FROM @P_SQL;
				 EXECUTE STMT;
               			  END IF;
			
			  IF(P_ACTION='P')THEN
				SET @P_SQL  = 'SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME,INT_NODE_ID,INT_SUBNODE_ID,
				(SELECT H.VCH_HIERARCHY_NAME FROM m_admin_hierarchy H WHERE H.INT_NODE_ID=V.INT_NODE_ID AND H.BIT_DELETED_FLAG=0 AND V.INT_NODE_ID!=0) AS NODE_NAME,
				(SELECT S.VCH_SUBNODE_NAME FROM m_admin_subnode S WHERE S.INT_SUBNODE_ID=V.INT_SUBNODE_ID AND S.BIT_DELETED_FLAG=0 AND V.INT_SUBNODE_ID!=0) AS SUBNODE_NAME
				FROM m_admin_subnode_values V WHERE BIT_DELETED_FLAG=0';
			
				IF(P_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODEVAL_ID=',P_ID);
				END IF;
			
			
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_PARENT_NODE=',P_PARENT_ID);
			
				IF(P_NODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_NODE_ID=',P_NODE_ID);
				END IF;
			
				IF(P_SUBNODE_ID>0)THEN
				  SET @P_SQL  = CONCAT(@P_SQL,' AND INT_SUBNODE_ID=',P_SUBNODE_ID);
				END IF;
			
				  SET @P_SQL  = CONCAT(@P_SQL,' ORDER BY VCH_VALUE_NAME ASC');
			
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
			
			  END IF;
			
						  IF(P_ACTION='FP')THEN
					SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=0;
			  END IF;
			
			

			IF(P_ACTION='GP')THEN
				SELECT INT_SUBNODEVAL_ID FROM m_admin_subnode_values WHERE INT_NODE_ID=P_NODE_ID AND INT_SUBNODE_ID=P_SUBNODE_ID;
			END IF;
            
       IF(P_ACTION='D')THEN

    SELECT INT_USER_ID,INT_COMPLAINT_TYPE_ID,INT_CAT_ID,INT_SUBCAT_ID INTO @USER_ID,@INT_COMPLAINT_TYPE_ID,@INT_CAT_ID,@INT_SUBCAT_ID
    FROM t_gms_demography_mapping WHERE INT_USER_DEMOGRAPHY_ID = P_USER_ID;

    SET @STATUS  = (SELECT COUNT(1) FROM t_grivance_suggestion WHERE intComplainTypeId=@INT_COMPLAINT_TYPE_ID
    AND intCategoryId =@INT_CAT_ID AND intSubcategoryId = @INT_SUBCAT_ID AND FIND_IN_SET(@USER_ID,vchAllEscUsers)>0);

    IF(@STATUS=0)THEN

      DELETE FROM t_gms_demography_mapping WHERE INT_USER_DEMOGRAPHY_ID = P_USER_ID;

      SELECT 0;
    ELSE
      SELECT 1,@USER_ID,@INT_COMPLAINT_TYPE_ID,@INT_CAT_ID,@INT_SUBCAT_ID;

    END IF;


  END IF;
      IF(P_ACTION='DU')THEN
   SET @P_SQL  = CONCAT('DELETE FROM t_gms_demography_mapping WHERE INT_USER_ID=',P_USER_ID);   
   
	 IF(P_COMP_TYPE_ID>0)THEN
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_COMPLAINT_TYPE_ID=',P_COMP_TYPE_ID);     
		END IF; 
        
          IF(P_CAT_ID>0)THEN
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_CAT_ID=',P_CAT_ID);     
		END IF;

          IF(P_SUBCAT_ID>0)THEN       
         SET @P_SQL=CONCAT(@P_SQL,' AND INT_SUBCAT_ID=',P_SUBCAT_ID);     
		END IF; 
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
   
   select 0;   
  END IF;
	
    /*
   IF(P_ACTION='SBN')THEN
   set @qt = "', ' , ";
    SET @P_SQL = concat('SELECT a.intId, a.INT_SUBNODEVAL_ID, a.ward_village, a.ulb_gp, a.Block, a.Dist, a.State, a.areaName, a.nodeLabel, a.nodeVal, a.assemblyId, a.assemblyName,
  CASE a.nodeVal
  WHEN 0 THEN a.areaName
  WHEN 1 THEN concat(a.areaName, ",Odisha")
  WHEN 2 THEN concat(a.areaName,',@qt,'(select b.areaName from m_hierarchy_details b where a.Dist=b.INT_SUBNODEVAL_ID limit 1))
  WHEN 3 THEN concat(a.areaName,',@qt,'(select b.areaName from m_hierarchy_details b where b.Block=a.Block limit 1),',@qt,'(select b.areaName from m_hierarchy_details b where b.Dist=a.Dist limit 1))
  WHEN 4 THEN concat(a.areaName,',@qt,'(select f.areaName from m_hierarchy_details f where a.ulb_gp=f.INT_SUBNODEVAL_ID limit 1),',@qt,'(select b.areaName from m_hierarchy_details b where a.Block=b.INT_SUBNODEVAL_ID limit 1),',@qt,'(select c.areaName from m_hierarchy_details c where a.Dist=c.INT_SUBNODEVAL_ID limit 1))
  ELSE NULL
  END as locationName
 from m_hierarchy_details a where a.bitDeletedFlag =0 ');
   
    IF(CHAR_LENGTH(P_ATTR1)>0)THEN
      SET @P_SQL  = CONCAT(@P_SQL,' AND a.areaName LIKE "',P_ATTR1,'%"');
    END IF;
    IF(P_ID>0)THEN
    SET @P_SQL  = CONCAT(@P_SQL,' AND a.INT_SUBNODEVAL_ID = ',P_ID);
    END IF;
    SET @P_SQL = CONCAT(@P_SQL, ' ORDER BY a.areaName ASC limit 0,20');
  
   PREPARE STMT FROM @P_SQL;
   EXECUTE STMT;
  END IF; 
  */
	IF(P_ACTION='SBN')THEN
		if(CHAR_LENGTH(P_ATTR1)>0) then
			select a.intId, a.INT_SUBNODEVAL_ID, a.ward_village, a.ulb_gp, a.Block, a.Dist, a.State, a.areaName, a.nodeLabel, a.nodeVal, a.assemblyId, a.assemblyName,
			(case when a.nodeVal = 0 then a.areaName
			when a.nodeVal = 1 then concat(a.areaName, ',Odisha')
			when a.nodeVal = 2 then concat(a.areaName,', ',(select b.areaName from m_hierarchy_details b where a.Dist=b.INT_SUBNODEVAL_ID limit 1))
			when a.nodeVal = 3 then concat(a.areaName,', ',(select b.areaName from m_hierarchy_details b where b.Block=a.Block limit 1),', ',(select b.areaName from m_hierarchy_details b where b.Dist=a.Dist limit 1))
			when a.nodeVal = 4 then concat(a.areaName,', ',(select f.areaName from m_hierarchy_details f where a.ulb_gp=f.INT_SUBNODEVAL_ID limit 1),', ',(select b.areaName from m_hierarchy_details b where a.Block=b.INT_SUBNODEVAL_ID limit 1),', ',(select c.areaName from m_hierarchy_details c where a.Dist=c.INT_SUBNODEVAL_ID limit 1))
			else null
			 end)as locationName
			from m_hierarchy_details a where a.bitDeletedFlag =0 
			and a.areaName like concat(P_ATTR1,'%')
			and (a.INT_SUBNODEVAL_ID = P_ID or P_ID = 0)
			 ORDER BY a.areaName ASC limit 0,20;
		else 
			select a.intId, a.INT_SUBNODEVAL_ID, a.ward_village, a.ulb_gp, a.Block, a.Dist, a.State, a.areaName, a.nodeLabel, a.nodeVal, a.assemblyId, a.assemblyName,
			(case when a.nodeVal = 0 then a.areaName
			when a.nodeVal = 1 then concat(a.areaName, ',Odisha')
			when a.nodeVal = 2 then concat(a.areaName,', ',(select b.areaName from m_hierarchy_details b where a.Dist=b.INT_SUBNODEVAL_ID limit 1))
			when a.nodeVal = 3 then concat(a.areaName,', ',(select b.areaName from m_hierarchy_details b where b.Block=a.Block limit 1),', ',(select b.areaName from m_hierarchy_details b where b.Dist=a.Dist limit 1))
			when a.nodeVal = 4 then concat(a.areaName,', ',(select f.areaName from m_hierarchy_details f where a.ulb_gp=f.INT_SUBNODEVAL_ID limit 1),', ',(select b.areaName from m_hierarchy_details b where a.Block=b.INT_SUBNODEVAL_ID limit 1),', ',(select c.areaName from m_hierarchy_details c where a.Dist=c.INT_SUBNODEVAL_ID limit 1))
			else null
			 end)as locationName
			from m_hierarchy_details a where a.bitDeletedFlag =0 
			and (a.INT_SUBNODEVAL_ID = P_ID or P_ID = 0)
			 ORDER BY a.areaName ASC limit 0,20;
		end if;
	END IF;
  
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_DEPARTMENT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_DEPARTMENT`(
	IN	P_ACTION				VARCHAR(2),
    IN	P_DEPT_ID				INT,
    IN	P_DEPT_NAME				VARCHAR(64),
    IN	P_SHRT_DEPT_NAME		VARCHAR(64),
	IN	P_ALIAS_DEPT_NAME		VARCHAR(64),
    IN	P_CREATED_BY			INT,
    IN	P_ID		 		    INT(11),
	IN	INT_ATTR2		 		INT(11),
	IN	VCH_ATTR3		 		VARCHAR(45),
	IN	P_VCH_EMAIL		 		VARCHAR(64)
)
BEGIN


	
    IF(P_ACTION='F')THEN
		SET @P_SQL = 'SELECT intDeptId, vchDeptName, vchDeptAlias FROM m_department WHERE bitDeletedFlag=0';
        IF(P_DEPT_ID>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDeptId=',P_DEPT_ID);
        END IF;
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
    END IF;
     
    
    IF(P_ACTION='A')THEN 
    INSERT INTO m_department(vchDeptName,vchShrtDeptName,vchDeptAlias,vchemail) VALUES(P_DEPT_NAME,P_SHRT_DEPT_NAME,P_ALIAS_DEPT_NAME,P_VCH_EMAIL);
    SELECT 'success';
      END IF;
      
      
      
      IF (P_ACTION='V') THEN
	SET @P_SQL='SELECT intDeptId,vchDeptName,vchShrtDeptName,vchDeptAlias,vchemail FROM m_department where bitDeletedFlag=0';
	      
      IF(CHAR_LENGTH(P_DEPT_NAME)>0) THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND vchDeptName LIKE "%',P_DEPT_NAME,'%" OR vchShrtDeptName LIKE "%',P_DEPT_NAME,'%"');
    END IF;
            	IF(P_DEPT_ID>0) THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND intDeptId = ',P_DEPT_ID);
	  END IF;
     
	        
     SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY vchDeptName ASC');
     
	  PREPARE STMT FROM @P_SQL;
	  EXECUTE STMT;
END IF;



IF (P_ACTION='PG') THEN
    SET @START_REC=P_ID;
	SET @P_SQL='SELECT intDeptId,vchDeptName,vchShrtDeptName,vchDeptAlias,vchemail FROM m_department where bitDeletedFlag=0';
       
        IF(CHAR_LENGTH(P_DEPT_NAME)>0) THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND vchDeptName LIKE "%',P_DEPT_NAME,'%" OR vchShrtDeptName LIKE "%',P_DEPT_NAME,'%"');
    END IF;
            	        
      IF(P_DEPT_ID>0) THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND intDeptId = ',P_DEPT_ID);
	  END IF;
     
     SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY vchDeptName ASC LIMIT ?,10');
            PREPARE STMT FROM @P_SQL;
       EXECUTE STMT USING @START_REC;
      
	  
END IF;



IF (P_ACTION='U') THEN

    UPDATE m_department set
    vchDeptName=P_DEPT_NAME,
    vchShrtDeptName=P_SHRT_DEPT_NAME,
    vchDeptAlias=P_ALIAS_DEPT_NAME,
    vchemail=P_VCH_EMAIL,
    intUpdatedBy=P_CREATED_BY,
    dtmUpdatedOn=NOW()
    WHERE intDeptId=P_DEPT_ID ;
	
    SELECT 'success';
	END IF;
    
    
    
IF (P_ACTION='D')THEN


 
	 UPDATE  m_department  SET bitDeletedFlag=1 where intDeptId=P_DEPT_ID;
		 				 SELECT 0;
   END IF;

IF (P_ACTION='SM')THEN

	SELECT vchemail FROM m_department where intDeptId=P_DEPT_ID AND bitDeletedFlag=0;
END IF;

IF (P_ACTION='UM') THEN

    UPDATE m_department set
    vchemail=P_VCH_EMAIL,
    intUpdatedBy=P_CREATED_BY,
    dtmUpdatedOn=NOW()
    WHERE intDeptId=P_DEPT_ID ;
	SELECT 1;
	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_DESIGNATION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_DESIGNATION`(
		  IN  P_ACTION            VARCHAR(2),
		  IN  P_DESIGNATION_ID    INT,
		  IN  P_LOC_ID            VARCHAR(200),
		  IN  P_DESIGNATION_NAME  VARCHAR(100),
		  IN  P_ALIAS_NAME        VARCHAR(100),
		  IN  P_TYPE              INT,
		  IN  P_CREATED_BY        INT,
          IN  P_RANK              VARCHAR(100),
		  OUT P_OUT               VARCHAR(200)
		)
BEGIN
		IF(P_ACTION='C') THEN
		
			  SET @P_SQL= CONCAT('SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE BIT_DELETED_FLAG=0 AND VCH_DESG_NAME="',P_DESIGNATION_NAME,'"' );
		
			  IF(P_DESIGNATION_ID>0)THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND INT_DESG_ID!=',P_DESIGNATION_ID);
			  END IF;
		
			  IF(P_LOC_ID>0)THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND VCH_LOC_ID=',P_LOC_ID);
			  END IF;
		
			  PREPARE STMT FROM @P_SQL;
			  EXECUTE STMT;
			END IF;
		
		
		
		  IF(P_ACTION='A')THEN
			INSERT INTO m_admin_desg_master(VCH_LOC_ID,VCH_DESG_NAME,VCH_ALIAS_NAME,INT_TYPE,INT_CREATED_BY,INT_RANK_ID)
			VALUES (P_LOC_ID,P_DESIGNATION_NAME,P_ALIAS_NAME,P_TYPE,P_CREATED_BY,P_RANK);
		  END IF;
		
		
		
		
		  IF(P_ACTION='U')THEN
			UPDATE m_admin_desg_master SET VCH_LOC_ID=P_LOC_ID,VCH_DESG_NAME=P_DESIGNATION_NAME,VCH_ALIAS_NAME=P_ALIAS_NAME,
			INT_TYPE=P_TYPE,INT_CREATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW(),INT_RANK_ID=P_RANK WHERE INT_DESG_ID=P_DESIGNATION_ID;
		  END IF;
		
		
		
		 IF(P_ACTION='R') THEN
		
			  SELECT INT_DESG_ID,VCH_LOC_ID,VCH_DESG_NAME,VCH_ALIAS_NAME,INT_TYPE,DTM_CREATED_ON,INT_RANK_ID FROM m_admin_desg_master WHERE INT_DESG_ID=P_DESIGNATION_ID AND BIT_DELETED_FLAG=0;
		
			END IF;
		
		
		IF(P_ACTION='V') THEN
		
			  SET @P_SQL='SELECT INT_DESG_ID,VCH_LOC_ID, VCH_DESG_NAME,VCH_ALIAS_NAME,INT_TYPE,DTM_CREATED_ON, INT_RANK_ID FROM m_admin_desg_master WHERE BIT_DELETED_FLAG=0';
		
			IF(CHAR_LENGTH(P_LOC_ID)>0 AND P_LOC_ID NOT IN ('All','0'))THEN
			  SET @P_SQL  = CONCAT(@P_SQL,' AND FIND_IN_SET("',P_LOC_ID,'",VCH_LOC_ID)');
			END IF;
		
		
			SET @P_SQL=CONCAT(@P_SQL,' ORDER BY INT_RANK_ID ASC');
		
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
			END IF;
		
		
		IF(P_ACTION='PG') THEN
			  SET @START_REC=P_DESIGNATION_ID;
			  SET @P_SQL='SELECT INT_DESG_ID,VCH_LOC_ID, VCH_DESG_NAME,VCH_ALIAS_NAME,INT_TYPE,DTM_CREATED_ON, INT_RANK_ID FROM m_admin_desg_master WHERE BIT_DELETED_FLAG=0';
		
		
			 IF(CHAR_LENGTH(P_LOC_ID)>0 AND P_LOC_ID NOT IN ('All','0'))THEN
			  SET @P_SQL  = CONCAT(@P_SQL,' AND FIND_IN_SET("',P_LOC_ID,'",VCH_LOC_ID)');
			END IF;
		
		
			SET @P_SQL=CONCAT(@P_SQL,' ORDER BY INT_RANK_ID ASC LIMIT ?,20');
		
			  PREPARE STMT FROM @P_SQL;
			  EXECUTE STMT USING @START_REC;
			END IF;
		
		
		IF(P_ACTION='D')THEN
		
		  SET @DESG_NAME  = (SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE BIT_DELETED_FLAG=0 AND  INT_DESG_ID=P_DESIGNATION_ID);
		  SET @DESG_CTR	  = (SELECT COUNT(1) FROM m_admin_user WHERE BIT_DELETED_FLAG=0 AND INT_DESIGNATION_ID=P_DESIGNATION_ID);
		  IF( @DESG_CTR=0) THEN
		  UPDATE m_admin_desg_master SET BIT_DELETED_FLAG=1,INT_UPDATED_BY=P_CREATED_BY, DTM_UPDATED_ON=NOW() WHERE INT_DESG_ID=P_DESIGNATION_ID;
		
		  SET P_OUT=1;
		  SELECT P_OUT;
		  ELSE
		  SET P_OUT=0 ;
		
		  END IF;
		  END IF;
		
		IF(P_ACTION='AT')THEN
			UPDATE m_admin_desg_master SET INT_TYPE=P_TYPE,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW()
			WHERE  INT_DESG_ID=P_DESIGNATION_ID;
		  END IF;
		
			IF(P_ACTION='F') THEN
		
			  SET @P_SQL='SELECT INT_DESG_ID,VCH_DESG_NAME,VCH_ALIAS_NAME FROM m_admin_desg_master WHERE BIT_DELETED_FLAG=0';
		
			  IF(CHAR_LENGTH(P_LOC_ID)>0)THEN
				SET @P_SQL  = CONCAT(@P_SQL,' AND FIND_IN_SET("',P_LOC_ID,'",VCH_LOC_ID) OR VCH_LOC_ID="All"');
			  END IF;
		
			  SET @P_SQL=CONCAT(@P_SQL,' ORDER BY VCH_DESG_NAME ASC');
		
			  PREPARE STMT FROM @P_SQL;
			  EXECUTE STMT;
			END IF;
		END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_GROUP_MASTER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_GROUP_MASTER`(
			IN     P_ACTION         VARCHAR(3),
			IN     P_GROUP_ID       INT,
			IN     P_GROUP_NAME     VARCHAR(50),
			IN     P_ALIAS_NAME     VARCHAR(20),
			IN     P_DESC           VARCHAR(500),
			IN     P_TYPE           INT,
			IN     P_CREATED_BY     INT,
			OUT    P_OUT            VARCHAR(200)
		 )
BEGIN
		
			IF(P_ACTION='C') THEN
			SET @P_SQL= CONCAT('SELECT VCH_GROUP_NAME FROM m_admin_group_master WHERE BIT_DELETED_FLAG=0 AND VCH_GROUP_NAME="',P_GROUP_NAME,'"' );
			IF(P_GROUP_ID>0)THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND INT_GROUP_ID!=',P_GROUP_ID);
			END IF;
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
			END IF;
		
			IF(P_ACTION='A')THEN
			INSERT INTO m_admin_group_master(VCH_GROUP_NAME,VCH_ALIAS_NAME,VCH_DESCRIPTION,INT_CREATED_BY,INT_STATUS)
			VALUES (P_GROUP_NAME,P_ALIAS_NAME,P_DESC,P_CREATED_BY,1);
			END IF;
		
		   IF(P_ACTION='U')THEN
		   UPDATE m_admin_group_master SET VCH_GROUP_NAME=P_GROUP_NAME,VCH_ALIAS_NAME=P_ALIAS_NAME,VCH_DESCRIPTION=P_DESC,INT_UPDATED_BY=P_CREATED_BY,
			DTM_UPDATED_ON=NOW()
			WHERE INT_GROUP_ID=P_GROUP_ID;
		   END IF;
		
			IF(P_ACTION='F')THEN
			SET @P_SQL  = 'SELECT INT_GROUP_ID,VCH_GROUP_NAME FROM m_admin_group_master WHERE BIT_DELETED_FLAG=0';
			IF(P_GROUP_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GROUP_ID=',P_GROUP_ID);
			END IF;
			IF(P_TYPE>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_STATUS=',P_TYPE);
			END IF;
			SET @P_SQL=CONCAT(@P_SQL,' ORDER BY VCH_GROUP_NAME ASC ');
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
			END IF;
		
			IF(P_ACTION='PG') THEN
			SET @START_REC=P_GROUP_ID;
			SET @P_SQL='SELECT INT_GROUP_ID,VCH_GROUP_NAME,VCH_ALIAS_NAME,VCH_DESCRIPTION,INT_STATUS,DTM_CREATED_ON,DTM_UPDATED_ON FROM m_admin_group_master
			WHERE BIT_DELETED_FLAG=0 ';
			SET @P_SQL=CONCAT(@P_SQL,' ORDER BY DTM_CREATED_ON DESC LIMIT ?,20');
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT USING @START_REC;
			END IF;
		
		
			IF(P_ACTION='V')THEN
			SET @P_SQL  = 'SELECT INT_GROUP_ID,VCH_GROUP_NAME,VCH_ALIAS_NAME,VCH_DESCRIPTION,INT_STATUS,DTM_CREATED_ON,DTM_UPDATED_ON FROM m_admin_group_master WHERE BIT_DELETED_FLAG=0';
			IF(P_GROUP_ID>0)THEN
			SET @P_SQL  = CONCAT(@P_SQL,' AND INT_GROUP_ID=',P_GROUP_ID);
			END IF;
			SET @P_SQL=CONCAT(@P_SQL,' ORDER BY DTM_CREATED_ON DESC ');
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
			END IF;
		
			 IF(P_ACTION='D')THEN
			SET @DEPEND_ID = (SELECT COUNT(1) FROM m_admin_user WHERE INT_GROUP_ID=P_GROUP_ID AND BIT_DELETED_FLAG=0);
			 IF(@DEPEND_ID>0)THEN
				 SELECT 0;
			 ELSE
			 UPDATE m_admin_group_master SET BIT_DELETED_FLAG=1,DTM_UPDATED_ON=NOW(),INT_UPDATED_BY=P_CREATED_BY WHERE INT_GROUP_ID=P_GROUP_ID;
			 SELECT 1;
			 END IF;
			 END IF;
		
		
		   IF(P_ACTION='R') THEN
		   SELECT INT_GROUP_ID,VCH_GROUP_NAME,VCH_ALIAS_NAME,VCH_DESCRIPTION,DTM_CREATED_ON FROM m_admin_group_master WHERE INT_GROUP_ID=P_GROUP_ID AND BIT_DELETED_FLAG=0;
		   END IF;
		
		   IF(P_ACTION='AC')THEN
		   UPDATE m_admin_group_master SET INT_STATUS=1  WHERE INT_GROUP_ID=P_GROUP_ID AND BIT_DELETED_FLAG=0;
		   END IF;
				
		  IF(P_ACTION='IN')THEN
		  SET @DEPEND_ID = (SELECT COUNT(1) FROM m_admin_user WHERE INT_GROUP_ID=P_GROUP_ID AND BIT_DELETED_FLAG=0);
		  IF(@DEPEND_ID>0)THEN
		  SELECT 0;
		  ELSE
			UPDATE m_admin_group_master SET INT_STATUS=2  WHERE INT_GROUP_ID=P_GROUP_ID AND BIT_DELETED_FLAG=0;
		  SELECT 1;
		  END IF;
		  END IF;
		
		END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_GROUP_PERMISSION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_GROUP_PERMISSION`(
		  IN  P_ACTION      VARCHAR(2),
		  IN  P_ID          INT,
		  IN  P_GROUP_ID    INT,
		  IN  P_GL_ID       INT,
		  IN  P_PL_ID       INT,
		  IN  P_PERMISSION  INT,
		  IN  P_QUERY       TEXT,
		  IN  P_CREATED_BY  INT
		)
BEGIN
		
		  IF(P_ACTION='A')THEN
		
			DELETE FROM m_admin_group_permission WHERE INT_GROUP_ID= P_GROUP_ID AND BIT_DELETED_FLAG=0;
		
			SET @P_SQL	= CONCAT('INSERT INTO m_admin_group_permission(INT_GROUP_ID, INT_GL_ID, INT_PL_ID, INT_ACTION, INT_CREATED_BY) VALUES ',P_QUERY);
		
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
		
		  END IF;
		
			IF(P_ACTION='V')THEN
				SET @P_SQL	= 'SELECT INT_GROUP_ID, INT_GL_ID, INT_PL_ID, INT_ACTION, INT_CREATED_BY FROM m_admin_group_permission WHERE BIT_DELETED_FLAG=0';
		
				IF(P_GROUP_ID>0)THEN
					SET @P_SQL	= CONCAT(@P_SQL, ' AND INT_GROUP_ID=',P_GROUP_ID);
				END IF;
		
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
		
			END IF;
		
			IF(P_ACTION='VP')THEN
				SET @P_SQL	= 'SELECT INT_GROUP_ID, INT_GL_ID, INT_PL_ID, INT_ACTION, INT_CREATED_BY,
		(SELECT G.VCH_GROUP_NAME FROM m_admin_group_master G WHERE G.INT_GROUP_ID=P.INT_GROUP_ID AND G.BIT_DELETED_FLAG=0) AS GROUP_NAME, (SELECT G.VCH_GL_NAME FROM m_admin_gl_master G WHERE G.INT_GL_ID=P.INT_GL_ID AND G.BIT_DELETED_FLAG=0) AS GL_NAME, (SELECT PL.VCH_PL_NAME FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0) AS PL_NAME, (SELECT F.VCH_ACTION1 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0)) AS ACTION1, (SELECT F.VCH_ACTION2 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0)) AS ACTION2, (SELECT F.VCH_ACTION3 FROM m_admin_function_master F WHERE F.INT_FUN_ID=(SELECT PL.VCH_FUNC_FILE FROM m_admin_pl_master PL WHERE PL.INT_PL_ID=P.INT_PL_ID AND PL.BIT_DELETED_FLAG=0)) AS ACTION3 FROM m_admin_group_permission P WHERE BIT_DELETED_FLAG=0';
				
				IF(P_GROUP_ID>0)THEN
					SET @P_SQL	= CONCAT(@P_SQL, ' AND INT_GROUP_ID=',P_GROUP_ID);
				END IF;
		
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;
		
			END IF;
		
		  IF(P_ACTION='AL')THEN
			IF((SELECT COUNT(1) FROM m_admin_group_permission WHERE BIT_DELETED_FLAG=0 AND INT_GROUP_ID=P_GROUP_ID AND INT_GL_ID=P_GL_ID AND INT_PL_ID=P_PL_ID )=0) THEN
			  INSERT INTO m_admin_group_permission(INT_GROUP_ID, INT_GL_ID, INT_PL_ID, INT_ACTION, INT_CREATED_BY)  VALUES(P_GROUP_ID,P_GL_ID,P_PL_ID,P_PERMISSION,P_CREATED_BY);
			ELSE
			  UPDATE m_admin_group_permission SET INT_ACTION=P_PERMISSION WHERE INT_GROUP_ID=P_GROUP_ID  AND INT_GL_ID=P_GL_ID AND INT_PL_ID=P_PL_ID;
			END IF;
		  END IF;		
		END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_HIERARCHY_CONSTRAINTS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_HIERARCHY_CONSTRAINTS`()
BEGIN				
			
						SET @IND_HIERARCHY_NAME = (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_hierarchy' AND INDEX_NAME = 'IND_HIERARCHY_NAME'  AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_HIERARCHY_NAME>0)THEN
				ALTER TABLE `m_admin_hierarchy` DROP INDEX `IND_HIERARCHY_NAME`;
			END IF;
			ALTER TABLE `m_admin_hierarchy` ADD INDEX `IND_HIERARCHY_NAME` (`VCH_HIERARCHY_NAME` ASC);


			SET @IND_HIERARCHY_LEVEL = (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_hierarchy' AND INDEX_NAME = 'IND_HIERARCHY_LEVEL' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_HIERARCHY_LEVEL>0)THEN
				ALTER TABLE `m_admin_hierarchy` DROP INDEX `IND_HIERARCHY_LEVEL`;
			END IF;
			ALTER TABLE `m_admin_hierarchy` ADD INDEX `IND_HIERARCHY_LEVEL` (`INT_NO_LEVEL` ASC);
				
			SET @IND_SUBNODE_NAME = (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_subnode' AND INDEX_NAME = 'IND_SUBNODE_NAME' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_SUBNODE_NAME>0)THEN
				ALTER TABLE `m_admin_subnode` DROP INDEX `IND_SUBNODE_NAME`;
			END IF;
			ALTER TABLE `m_admin_subnode` ADD INDEX `IND_SUBNODE_NAME` (`VCH_SUBNODE_NAME` ASC);


			SET @IND_SUBNODE_LEVEL = (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_subnode' AND INDEX_NAME = 'IND_SUBNODE_LEVEL' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_SUBNODE_LEVEL>0)THEN
				ALTER TABLE `m_admin_subnode` DROP INDEX `IND_SUBNODE_LEVEL`;
			END IF;
			ALTER TABLE `m_admin_subnode` ADD INDEX `IND_SUBNODE_LEVEL` (`INT_SUB_LEVEL` ASC);

		
			SET @IND_NODE_ID	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_subnode_values' AND INDEX_NAME = 'IND_NODE_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_NODE_ID>0)THEN
				ALTER TABLE `m_admin_subnode_values` DROP INDEX `IND_NODE_ID`;
			END IF;
			ALTER TABLE `m_admin_subnode_values` ADD INDEX `IND_NODE_ID` (`INT_NODE_ID` ASC);
		
			
			SET @IND_SUBNODE_ID	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_subnode_values' AND INDEX_NAME = 'IND_SUBNODE_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_SUBNODE_ID>0)THEN
				ALTER TABLE `m_admin_subnode_values` DROP INDEX `IND_SUBNODE_ID`;
			END IF;
			ALTER TABLE `m_admin_subnode_values` ADD INDEX `IND_SUBNODE_ID` (`INT_SUBNODE_ID` ASC);




			SET @FK_NODE_ID	= (SELECT COUNT(1) FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'm_admin_subnode' AND CONSTRAINT_NAME='FK_NODE_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@FK_NODE_ID>0)THEN
				ALTER TABLE `m_admin_subnode` DROP FOREIGN KEY `FK_NODE_ID`;
			END IF;
			ALTER TABLE `m_admin_subnode` ADD CONSTRAINT `FK_NODE_ID`
			  FOREIGN KEY (`INT_NODE_ID`)  REFERENCES `m_admin_hierarchy` (`INT_NODE_ID`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_LINK_CONSTRAINTS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_LINK_CONSTRAINTS`()
BEGIN
				SET @BUTTON_TABLE_EXIST			= (SELECT FN_TABLE_STATUS('cmjournal.m_admin_button_master'));
				SET @TAB_TABLE_EXIST			= (SELECT FN_TABLE_STATUS('cmjournal.m_admin_tab_master'));			

			SET @IND_GL_NAME	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_gl_master' AND INDEX_NAME = 'IND_GL_NAME' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_GL_NAME>0)THEN
				ALTER TABLE `m_admin_gl_master` DROP INDEX `IND_GL_NAME`;
			END IF;
			ALTER TABLE `m_admin_gl_master` ADD INDEX `IND_GL_NAME` (`VCH_GL_NAME` ASC);
			

			SET @IND_GL_STATUS	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_gl_master' AND INDEX_NAME = 'IND_GL_STATUS' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_GL_STATUS>0)THEN
				ALTER TABLE `m_admin_gl_master` DROP INDEX `IND_GL_STATUS`;
			END IF;
			ALTER TABLE `m_admin_gl_master` ADD INDEX `IND_GL_STATUS` (`INT_STATUS` ASC);


			SET @IND_GL_SL_NO	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_gl_master' AND INDEX_NAME = 'IND_GL_SL_NO' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_GL_SL_NO>0)THEN
				ALTER TABLE `m_admin_gl_master` DROP INDEX `IND_GL_SL_NO`;
			END IF;
			ALTER TABLE `m_admin_gl_master` ADD INDEX `IND_GL_SL_NO` (`INT_SL_NO` ASC);


			SET @IND_PL_NAME	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_pl_master' AND INDEX_NAME = 'IND_PL_NAME' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_PL_NAME>0)THEN
				ALTER TABLE `m_admin_pl_master` DROP INDEX `IND_PL_NAME`;
			END IF;
			ALTER TABLE `m_admin_pl_master` ADD INDEX `IND_PL_NAME` (`VCH_PL_NAME` ASC);
			

			SET @IND_PL_STATUS	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_pl_master' AND INDEX_NAME = 'IND_PL_STATUS' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_PL_STATUS>0)THEN
				ALTER TABLE `m_admin_pl_master` DROP INDEX `IND_PL_STATUS`;
			END IF;
			ALTER TABLE `m_admin_pl_master` ADD INDEX `IND_PL_STATUS` (`INT_STATUS` ASC);


			SET @IND_PL_SL_NO	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_pl_master' AND INDEX_NAME = 'IND_PL_SL_NO' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_PL_SL_NO>0)THEN
				ALTER TABLE `m_admin_pl_master` DROP INDEX `IND_PL_SL_NO`;
			END IF;
			ALTER TABLE `m_admin_pl_master` ADD INDEX `IND_PL_SL_NO` (`INT_SL_NO` ASC);



			SET @FK_GL_ID	= (SELECT COUNT(1) FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'm_admin_pl_master' AND CONSTRAINT_NAME='FK_GL_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@FK_GL_ID>0)THEN
				ALTER TABLE `m_admin_pl_master` DROP FOREIGN KEY `FK_GL_ID`;
			END IF;
			ALTER TABLE `m_admin_pl_master` ADD CONSTRAINT `FK_GL_ID`
			  FOREIGN KEY (`INT_GL_ID`)  REFERENCES `m_admin_gl_master` (`INT_GL_ID`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;


		IF(@BUTTON_TABLE_EXIST	>0)THEN

			SET @IND_BTN_NAME	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_button_master' AND INDEX_NAME = 'IND_BTN_NAME' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_BTN_NAME>0)THEN
				ALTER TABLE `m_admin_button_master` DROP INDEX `IND_BTN_NAME`;
			END IF;
			ALTER TABLE `m_admin_button_master` ADD INDEX `IND_BTN_NAME` (`VCH_BUTTON_NAME` ASC);


			SET @IND_BTN_STATUS	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_button_master' AND INDEX_NAME = 'IND_BTN_STATUS' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_BTN_STATUS>0)THEN
				ALTER TABLE `m_admin_button_master` DROP INDEX `IND_BTN_STATUS`;
			END IF;
			ALTER TABLE `m_admin_button_master` ADD INDEX `IND_BTN_STATUS` (`INT_STATUS` ASC);


			SET @IND_BTN_SL_NO	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_button_master' AND INDEX_NAME = 'IND_BTN_SL_NO' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_BTN_SL_NO>0)THEN
				ALTER TABLE `m_admin_button_master` DROP INDEX `IND_BTN_SL_NO`;
			END IF;
			ALTER TABLE `m_admin_button_master` ADD INDEX `IND_BTN_SL_NO` (`INT_SL_NO` ASC);

			SET @FK_BTN_FUNC_ID	= (SELECT COUNT(1) FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'm_admin_button_master' AND CONSTRAINT_NAME='FK_BTN_FUNC_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@FK_BTN_FUNC_ID>0)THEN
				ALTER TABLE `m_admin_button_master` DROP FOREIGN KEY `FK_BTN_FUNC_ID`;
			END IF;
			ALTER TABLE `m_admin_button_master` ADD CONSTRAINT `FK_BTN_FUNC_ID`
			  FOREIGN KEY (`INT_FUN_ID`)  REFERENCES `m_admin_function_master` (`INT_FUN_ID`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;

		END IF;


		IF(@TAB_TABLE_EXIST>0)THEN

			SET @IND_TAB_NAME	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_tab_master' AND INDEX_NAME = 'IND_TAB_NAME' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_TAB_NAME>0)THEN
				ALTER TABLE `m_admin_tab_master` DROP INDEX `IND_TAB_NAME`;
			END IF;
			ALTER TABLE `m_admin_tab_master` ADD INDEX `IND_TAB_NAME` (`VCH_TAB_NAME` ASC);


			SET @IND_TAB_STATUS	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_tab_master' AND INDEX_NAME = 'IND_TAB_STATUS' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_TAB_STATUS>0)THEN
				ALTER TABLE `m_admin_tab_master` DROP INDEX `IND_TAB_STATUS`;
			END IF;
			ALTER TABLE `m_admin_tab_master` ADD INDEX `IND_TAB_STATUS` (`INT_STATUS` ASC);


			SET @IND_TAB_SL_NO	= (SELECT COUNT(1) from information_schema.statistics WHERE TABLE_NAME = 'm_admin_tab_master' AND INDEX_NAME = 'IND_TAB_SL_NO' AND TABLE_SCHEMA = 'cmjournal');
			IF(@IND_TAB_SL_NO>0)THEN
				ALTER TABLE `m_admin_tab_master` DROP INDEX `IND_TAB_SL_NO`;
			END IF;
			ALTER TABLE `m_admin_tab_master` ADD INDEX `IND_TAB_SL_NO` (`INT_SL_NO` ASC);


			SET @FK_TAB_FUNC_ID	= (SELECT COUNT(1) FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'm_admin_tab_master' AND CONSTRAINT_NAME='FK_TAB_FUNC_ID' AND TABLE_SCHEMA = 'cmjournal');
			IF(@FK_TAB_FUNC_ID>0)THEN
				ALTER TABLE `m_admin_tab_master` DROP FOREIGN KEY `FK_TAB_FUNC_ID`;
			END IF;
			ALTER TABLE `m_admin_tab_master` ADD CONSTRAINT `FK_TAB_FUNC_ID`
			  FOREIGN KEY (`INT_FUN_ID`)  REFERENCES `m_admin_function_master` (`INT_FUN_ID`)
			  ON DELETE NO ACTION
			  ON UPDATE NO ACTION;

		END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_LOGIN_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_LOGIN_HISTORY`(
		  IN   P_ACTION          VARCHAR(3),
		  IN   P_ID              INT,
		  IN   P_USER_ID         INT,
		  IN   P_LOGIN_TIME      DATETIME,
		  IN   P_LOGIN_MODE      INT,
		  IN   P_LOCAL_IP   	 VARCHAR(32),
		  IN   P_PUBLIC_IP  	 VARCHAR(32),
		  IN   P_USER_AGENT      VARCHAR(256),
          IN   P_DEVICE_ID       VARCHAR(256),
          IN   P_DEVICE_NAME     VARCHAR(256),
          IN   P_APP_VERSION     VARCHAR(256)
		 )
BEGIN
	
    IF(P_ACTION='IN')THEN
    
    INSERT INTO t_user_login_history (intUserId, dtmLoginTime, intLoginMode, vchLocalIpAddress, vchPublicIpAddress, vchUserAgent,vchDeviceId,
    vchDeviceName,vchAppVersion) VALUE (P_USER_ID,NOW(),P_LOGIN_MODE,P_LOCAL_IP,P_PUBLIC_IP,P_USER_AGENT,P_DEVICE_ID,P_DEVICE_NAME,P_APP_VERSION);
    
    END IF;
    
    
    IF(P_ACTION='ILH')THEN
    
    if((select TIMESTAMPDIFF(minute,dtmLoginTime,now()) from t_user_login_history 
    where vchDeviceId = vchDeviceId order by intId desc limit 1) > 30)then 
    
    INSERT INTO t_user_login_history (intUserId, dtmLoginTime, intLoginMode, vchPhone, vchPublicIpAddress, vchUserAgent,vchDeviceId,
    vchDeviceName,vchAppVersion) VALUE (P_USER_ID,P_LOGIN_TIME,P_LOGIN_MODE,P_LOCAL_IP,P_PUBLIC_IP,P_USER_AGENT,P_DEVICE_ID,P_DEVICE_NAME,P_APP_VERSION);
    
    END IF;END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_FAQ` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_FAQ`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN


    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
       
   
 IF(P_ACTION='CD')THEN
   SELECT COUNT(1) FROM m_ms_faq WHERE bitDeletedFlag = 0 AND vchFaqQuestion = @p_vchQuestionEnglish;	
  END IF;


IF(P_ACTION='AU') THEN
    if(@p_id=0) THEN   
	INSERT INTO m_ms_faq (intDepartmentId, intServiceRegistrationId, vchFaqQuestion, vchFaqAnswer, intCreatedBy) VALUES (@p_vchDepartment, @p_vchServices, @p_vchFAQQuestion, @p_vchFAQAnswer, @p_intCreatedBy);
    ELSE
    UPDATE m_ms_faq SET intDepartmentId=@p_vchDepartment, intServiceRegistrationId=@p_vchServices, vchFaqQuestion=@p_vchFAQQuestion, vchFaqAnswer=@p_vchFAQAnswer, intCreatedBy=@p_intCreatedBy where intFaqId=@p_id ;
    END IF;
    
END IF;

  
IF(P_ACTION='V') THEN
      SET @P_SQL='SELECT intFaqId,intDepartmentId,tinPublishStatus,(select vchDeptName from m_department where intDeptId=intDepartmentId and bitDeletedFlag=0) as deptName,intServiceRegistrationId,(select vchServiceName from m_ms_service_registration where intServiceRegistrationId=PM.intServiceRegistrationId and bitDeletedFlag=0) as ServiceName,vchFaqQuestion,vchFaqAnswer,stmCreatedOn FROM m_ms_faq PM WHERE bitDeletedFlag=0';
	 IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
     IF(@p_vchServicesId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceRegistrationId=',@p_vchServicesId);
    END IF;
    IF(CHAR_LENGTH(@p_vchFAQQuestion)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchFAQQuestion ="',@P_vchFAQQuestion,'"');
	END IF;
     SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC ');
	PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
     
END IF;


IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT intFaqId,intDepartmentId,tinPublishStatus,(select vchDeptName from m_department where intDeptId=intDepartmentId and bitDeletedFlag=0) as deptName,intServiceRegistrationId,(select vchServiceName from m_ms_service_registration where intServiceRegistrationId=PM.intServiceRegistrationId and bitDeletedFlag=0) as ServiceName,vchFaqQuestion,vchFaqAnswer,stmCreatedOn FROM m_ms_faq PM WHERE bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
     IF(@p_vchServicesId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceRegistrationId=',@p_vchServicesId);
    END IF;
    IF(CHAR_LENGTH(@p_vchFAQQuestion)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchFAQQuestion ="',@P_vchFAQQuestion,'"');
	END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF;  

 IF(P_ACTION='D')THEN
    UPDATE m_ms_faq SET bitDeletedFlag=1 WHERE intFaqId=@p_ids;
    select 0;
  END IF;

IF(P_ACTION='P')THEN
    UPDATE m_ms_faq SET tinPublishStatus=2,dtmUpdatedOn=NOW() WHERE intFaqId=@p_ids;
    SELECT 'FAQ Publish Successfully';
  END IF;

   IF(P_ACTION='IN')THEN
    UPDATE m_ms_faq SET tinPublishStatus=1,dtmUpdatedOn=NOW() WHERE intFaqId=@p_ids;
    SELECT 'FAQ Unpublish Successfully';
  END IF;

  IF(P_ACTION='R') THEN
    
	SELECT intDepartmentId,intServiceRegistrationId,vchFaqQuestion,vchFaqAnswer FROM m_ms_faq WHERE intFaqId=@p_intId AND bitDeletedFlag=0;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_FEEDBACK_RECEIVE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_FEEDBACK_RECEIVE`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_FEEDBACK_RECEIVE("',P_ACTION, '","',P_VALUES,'")');
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
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_FEEDBACK_RECEIVE("',P_ACTION, '","',P_VALUES,'")');
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
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_FEEDBACK_RECEIVE("',P_ACTION, '","',P_VALUES,'")');
      
END;





/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/ 
		
        /** Action for Read Outbound Data **/
         IF(P_ACTION = 'RD')THEN
         SET @P_SQL = CONCAT('SELECT A.*, B.VCH_VALUE_NAME AS vchDistrict, C.vchDeptName, D.vchServiceName,E.vchSchemeTypeName,F.vchCardName FROM t_ms_outbound_data A
			left JOIN m_admin_subnode_values B ON(B.INT_SUBNODEVAL_ID = A.intDistrictId)
			left JOIN m_department C ON (C.intDeptId = A.intDepartmentId)
			left JOIN m_ms_service_registration D ON (D.intServiceRegistrationId = A.intServiceId) left JOIN m_fs_scheme_type E ON (E.intSchemeTypeId = A.intSchemeTypeId) left JOIN m_fs_card_type F ON (F.intCardTypeId = A.intCardTypeId) WHERE A.bitDeletedFlag=0 AND  A.intOutboundDataId =' ,@p_intOutboundDataId);
            /*IF(@p_dataType >0)THEN
				SET @P_SQL = CONCAT(@P_SQL,' AND A.dataType=',@p_dataType);
			else 
				SET @P_SQL = CONCAT(@P_SQL,' AND A.dataType= 1');
            END IF;*/
            #SELECT @P_SQL;
            PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
        END IF;
        
        /** Action for Get Question **/
		 /** Action for Get Question **/
		IF(P_ACTION='GQ') THEN   
			SELECT A.intSurveyQuestId, A.intDepartmentId, A.intServicesId, A.intType, A.vchQuestionEnglish, A.vchQuestionOdia, A.vchShortName, A.intOptionSelection, A.intRemarksStatus,
(select group_concat(B.intSurveyOptionId SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as intSurveyOptionId,
(select group_concat(B.vchOptionEnglish SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as vchOptionEnglish,
(select group_concat(B.vchOptionOdia SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as vchOptionOdia,
(select group_concat(B.intOptionValue SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as intOptionValue
FROM t_ms_survey_questionnaire A where A.bitDeletedFlag = 0 and A.intDepartmentId = @p_intDepartmentId and A.intServicesId = @p_intServicesId order by A.intQuestionSlNo asc,A.intSurveyQuestId  asc;
		END IF;
        
        /** Action for Submit Feedback **/
        IF(P_ACTION = 'SF')THEN
			IF (@p_intCallType=2) THEN
			UPDATE t_ms_inbound_data SET dtmFeedbackRcvTime = @p_dtmFeedbackRcvTime, intFeedbackStatus = @p_intFeedbackStatus, intBookmark = 0, intAssignedTo = 0,intRequestStatus=4 WHERE intInboundDataId = @p_intOutboundDataId;
            select intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id into @intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id from t_ms_inbound_data WHERE intInboundDataId = @p_intOutboundDataId;
            END IF;
            IF (@p_intCallType=1) THEN
			UPDATE t_ms_outbound_data SET dtmFeedbackRcvTime = @p_dtmFeedbackRcvTime, intFeedbackStatus = @p_intFeedbackStatus, intBookmark = 0, intAssignedTo = 0,intRequestStatus=4 WHERE intOutboundDataId = @p_intOutboundDataId;
            select intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id into @intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id from t_ms_outbound_data WHERE intOutboundDataId = @p_intOutboundDataId;
            END IF;
            IF (@p_intCallType= 'CC') THEN
				UPDATE t_ms_outbound_data SET dtmFeedbackRcvTime = @p_dtmFeedbackRcvTime, intFeedbackStatus = @p_intFeedbackStatus, intBookmark = 0, intAssignedTo = 0,intRequestStatus=4 WHERE intOutboundDataId = @p_intOutboundDataId;
                select intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id into @intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id from t_ms_outbound_data WHERE intOutboundDataId = @p_intOutboundDataId;
            END IF;
            INSERT INTO t_ms_feedback_received (intOutboundDataId, dtmFeedbackRcvTime, intFeedbackStatus, vchAdditionalInfo, vchQuery, intFeedbackReceivedBy, intByDesignationId, intCallBackRequest, intRequestedById, intFeedbackCollectedBy, intOverallRating,intCallType,intCreatedBy, intDepartmentId, intServiceId, intDistrictId) VALUES (@p_intOutboundDataId, @p_dtmFeedbackRcvTime, @p_intFeedbackStatus, @p_vchAdditionalInfo, @p_vchQuery, @p_intReceivedBy, @p_intByDesignationId, @p_intCallBackRequest, @p_intRequestedById, @p_intFeedbackCollectedBy, @p_intOverallRating,@p_intType,@p_intCreatedBy, @intDepartmentId, @intServiceId, @intDistrictId);
			set @p_intFeedbackRecId  = LAST_INSERT_ID();
			
            INSERT INTO t_ms_call_information (intOutboundDataId,intFeedbackRecId,intMobile, intType, intFeedbackStatus, intCreatedBy, dtmCallStart, dtmCallEnd) VALUES (@p_intOutboundDataId, @p_intFeedbackRecId,@p_intMobile, @p_intType, @p_intFeedbackStatus, @p_intCreatedBy, @p_dtmCallStart, @p_dtmCallEnd);
			
            DELETE FROM t_ms_feedback_ans_submited WHERE intOutboundDataId = @p_intFeedbackRecId and intType = 0;
            IF(@p_intFeedbackStatus = 1)THEN
				
				IF(@p_FeedbackAnsQry != '')THEN
					SET @P_SQL_QRY = CONCAT('INSERT INTO t_ms_feedback_ans_submited(intOutboundDataId, intQuestionId, intAnswerId, vchRemarks, vchAnswerWritten, intCreatedBy) VALUES ', @p_FeedbackAnsQry);
					PREPARE STMT FROM @P_SQL_QRY;
					EXECUTE STMT;
				END IF;
            END IF;
            
        END IF;
        
        /** Action for Get Call Log Information **/
        IF(P_ACTION = 'GCL')THEN
			/*select intMobile, intType, dtmCallStart, dtmCallEnd, intFeedbackStatus, dtmCreatedOn from t_ms_call_information where bitDeletedFlag = 0 and intMobile = @p_vchMobile order by dtmCreatedOn desc;*/
             select A.*,(SELECT B.vchDeptName FROM m_department B JOIN t_ms_outbound_data C ON (B.intDeptId = C.intDepartmentId) WHERE C.intOutboundDataId = A.intOutboundDataId) vchDepartmentName,(SELECT B.vchServiceName FROM m_ms_service_registration B JOIN t_ms_outbound_data C ON (B.intServiceRegistrationId = C.intServiceId) WHERE C.intOutboundDataId = A.intOutboundDataId)vchServicesName,(SELECT B.vchSchemeTypeName FROM m_fs_scheme_type B JOIN t_ms_outbound_data C ON (B.intSchemeTypeId = C.intSchemeTypeId) WHERE C.intOutboundDataId = A.intOutboundDataId)vchSchemeTypeName,(SELECT B.VCH_FULL_NAME FROM m_admin_user B JOIN t_ms_feedback_received C ON (B.INT_USER_ID = C.intFeedbackReceivedBy) WHERE C.intFeedbackRecId = A.intFeedbackRecId)vchFeedbackCollect from t_ms_call_information A where A.intOutboundDataId > 0 and A.bitDeletedFlag = 0 and A.intMobile = @p_vchMobile order by dtmCreatedOn desc;
        END IF;
        
        /** Action for Get Services Details **/
        IF(P_ACTION = 'GSD')THEN
			SELECT A.vchName, A.intMobile, A.jsonRelatedInfo, C.vchDeptName, D.vchServiceName FROM t_ms_outbound_data A
			JOIN m_department C ON (C.intDeptId = A.intDepartmentId)
			JOIN m_ms_service_registration D ON (D.intServiceRegistrationId = A.intServiceId) where A.intMobile = @p_vchMobile and A.bitDeletedFlag = 0 order by A.intOutboundDataId desc;
        END IF;
        
        /** Action for Get FAQ Details **/
        IF(P_ACTION = 'GFD')THEN
			select vchFaqQuestion, vchFaqAnswer from m_ms_faq WHERE bitDeletedFlag = 0 AND intDepartmentId = @p_intDepartmentId and intServiceRegistrationId = @p_intServiceId order by stmCreatedOn desc;
        END IF;
        
        /** Action for Update Request Status **/
        IF(P_ACTION = 'URS')THEN
			IF(@p_intType = 2)then
				UPDATE t_ms_inbound_data SET intRequestStatus = @p_intRequestStatus WHERE intInboundDataId = @p_intOutboundDataId;
			else
				UPDATE t_ms_outbound_data SET intRequestStatus = @p_intRequestStatus WHERE intOutboundDataId = @p_intOutboundDataId;
            end if;
        END IF;
        
        IF(P_ACTION = 'RCR')THEN
			SET SQL_SAFE_UPDATES = 0;
            IF(@p_intOutboundDataId != '')then
				update t_ms_outbound_data set intRequestStatus = 0, intAssignedTo = 0 where FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId);
			end if;
            if(@p_intInBoundId != '')then
				update t_ms_inbound_data set intRequestStatus = 0, intAssignedTo = 0 where FIND_IN_SET(intInboundDataId, @p_intInBoundId);
            end if;
            SELECT 1;
        END IF;
        
        IF(P_ACTION = 'ACR')THEN
			SET SQL_SAFE_UPDATES = 0;
            SET @t_calls = 0;
            IF(@p_intOutboundDataId != '')THEN
            set @checkCallBackStatusOutBound = (select count(1) from t_ms_outbound_data N where FIND_IN_SET(N.intOutboundDataId, @p_intOutboundDataId) and N.intRequestStatus = 0);
            SET @t_calls = @t_calls + @checkCallBackStatusOutBound;
            END IF;
            
            /*IF(@p_intInBoundId != '')THEN
            set @checkCallBackStatusInBound = (select count(1) from t_ms_inbound_data N where FIND_IN_SET(N.intInboundDataId, @p_intInBoundId) and N.intRequestStatus = 0);
            END IF;*/
			IF(@checkCallBackStatusOutBound > 0)THEN
                update t_ms_outbound_data set intRequestStatus = 1, intAssignedTo = @p_intUserId, dtmAssignedTime = now() where FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId);
            END IF;
            #select @t_calls, @p_intUserId;
            IF(@t_calls>0) THEN
				INSERT INTO t_ms_notification_logs (intCreatedBy, intTotalCalls, intStatus, dtmCreatedOn, dtmUpdatedOn, callType) VALUES (@p_intUserId,@t_calls,0, NOW() ,NOW(),1);
			END IF ;
            /*IF(@checkCallBackStatusInBound > 0)THEN
				update t_ms_inbound_data set intRequestStatus = 1, intAssignedTo = @p_intUserId, dtmAssignedTime = now() where FIND_IN_SET(intInboundDataId, @p_intInBoundId);
            END IF;*/
        END IF;
        
        IF(P_ACTION = 'GCR')THEN
			SET SQL_SAFE_UPDATES = 0;
            /*
            IF(@p_intOutboundDataId != '')THEN
            set @checkCallBackStatusOutBound = (select count(1) from t_ms_outbound_data N where FIND_IN_SET(N.intOutboundDataId, @p_intOutboundDataId) and N.intRequestStatus = 0);
            END IF;
            IF(@p_intInBoundId != '')THEN
            set @checkCallBackStatusInBound = (select count(1) from t_ms_inbound_data N where FIND_IN_SET(N.intInboundDataId, @p_intInBoundId) and N.intRequestStatus = 0);
            END IF;
            #select @checkCallBackStatusOutBound;
            
			IF(@checkCallBackStatusOutBound > 0)THEN
                update t_ms_outbound_data set intRequestStatus = 1, intAssignedTo = @p_intUserId, dtmAssignedTime = now() where FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId);
            END IF;
            
            IF(@checkCallBackStatusInBound > 0)THEN
				update t_ms_inbound_data set intRequestStatus = 1, intAssignedTo = @p_intUserId, dtmAssignedTime = now() where FIND_IN_SET(intInboundDataId, @p_intInBoundId);
            END IF;
            */
			/*
            select *, (select intMobile from vw_ms_pull_data M WHERE M.intRequestStatus in (2,3) and DATE(M.dtmAssignedTime) = curdate() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) and M.intAssignedTo = @p_intUserId ORDER BY M.dtmAssignedTime DESC LIMIT 1) as vchConnectingMobile, (select vchName from vw_ms_pull_data M WHERE M.intRequestStatus in (2,3) and DATE(M.dtmAssignedTime) = curdate() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) and M.intAssignedTo = @p_intUserId ORDER BY M.dtmAssignedTime DESC LIMIT 1) as vchConnectingName, (select M.intFeedbackStatus From t_ms_feedback_received M WHERE DATE(M.dtmCreatedOn) = curdate() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) and M.intRequestedById = @p_intUserId ORDER BY M.dtmCreatedOn DESC LIMIT 1) as vchCurrentStatus from (select B.vchDeptName, C.vchServiceName, A.vchName, A.intMobile, A.intAge, A.intGender, A.intFeedbackStatus, A.intRequestStatus from t_ms_outbound_data A LEFT JOIN m_department B ON (B.intDeptId = A.intDepartmentId) left join m_ms_service_registration C ON (C.intServiceRegistrationId = A.intServiceId) where FIND_IN_SET(A.intOutboundDataId, @p_intOutboundDataId)
			union all
			select B.vchDeptName, C.vchServiceName, A.vchName, A.intMobile, A.intAge, A.intGender, A.intFeedbackStatus, A.intRequestStatus from t_ms_inbound_data A LEFT JOIN m_department B ON (B.intDeptId = A.intDepartmentId) left join m_ms_service_registration C ON (C.intServiceRegistrationId = A.intServiceId) where FIND_IN_SET(A.intInboundDataId, @p_intInBoundId)) as t;
			*/
            SELECT *, (SELECT COUNT(1) FROM t_ms_feedback_ans_submited N WHERE N.intOutboundDataId = (SELECT F.intFeedbackRecId FROM t_ms_feedback_received F WHERE F.intOutboundDataId = t.intDataId /*AND F.intCallType = t.intType*/ AND F.intFeedbackStatus = t.intFeedbackStatus AND F.intRequestedById = @p_intUserId AND DATE(F.dtmCreatedOn) = CURDATE() ORDER BY F.intFeedbackRecId DESC LIMIT 1)) AS intCountFeedbackAns, (SELECT F.intFeedbackRecId FROM t_ms_feedback_received F WHERE F.intOutboundDataId = t.intDataId  AND F.intFeedbackStatus = t.intFeedbackStatus AND F.intRequestedById = @p_intUserId AND DATE(F.dtmCreatedOn) = CURDATE() ORDER BY F.intFeedbackRecId DESC LIMIT 1) AS intFeedbackRecId, (SELECT intMobile FROM t_ms_outbound_data M WHERE M.intRequestStatus IN (2 , 3) AND DATE(M.dtmAssignedTime) = CURDATE() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) AND M.intAssignedTo = @p_intUserId ORDER BY M.dtmAssignedTime DESC LIMIT 1) AS vchConnectingMobile, (SELECT vchName FROM t_ms_outbound_data M WHERE M.intRequestStatus IN (2 , 3) AND DATE(M.dtmAssignedTime) = CURDATE() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) AND M.intAssignedTo = @p_intUserId ORDER BY M.dtmAssignedTime DESC LIMIT 1) AS vchConnectingName, (SELECT M.intFeedbackStatus FROM t_ms_feedback_received M WHERE DATE(M.dtmCreatedOn) = CURDATE() AND FIND_IN_SET(M.intOutboundDataId, @p_vchOutBoundId) AND M.intRequestedById = @p_intUserId ORDER BY M.dtmCreatedOn DESC LIMIT 1) AS vchCurrentStatus FROM (SELECT A.intOutboundDataId AS intDataId, A.dtmRegdDateTime,A.vchRationCardNo,A.intNoFamily,A.vchTokenNo,A.dtmPaddyDeposite,B.vchDeptName, C.vchServiceName, ST.vchSchemeTypeName, CT.vchCardName, A.vchName, A.intMobile, A.intAge, A.intGender, A.intFeedbackStatus, A.intRequestStatus, E.VCH_VALUE_NAME AS vchDistrictName, BK.VCH_VALUE_NAME AS vchBlock, GP.VCH_VALUE_NAME AS vchGP, VG.VCH_VALUE_NAME AS vchVillage, A.dtmRegdDateTime AS vchServiceDate, A.intDepartmentId, A.intServiceId, 1 AS intType, A.jsonRelatedInfo, A.vchRegdNo FROM t_ms_outbound_data A LEFT JOIN m_department B ON (B.intDeptId = A.intDepartmentId) LEFT JOIN m_ms_service_registration C ON (C.intServiceRegistrationId = A.intServiceId) LEFT JOIN m_fs_scheme_type ST ON (ST.intSchemeTypeId = A.intSchemeTypeId) LEFT JOIN m_fs_card_type CT ON (CT.intCardTypeId = A.intCardTypeId) LEFT JOIN m_admin_subnode_values E ON (E.INT_SUBNODEVAL_ID = A.intDistrictId) LEFT JOIN m_admin_subnode_values BK ON (BK.INT_SUBNODEVAL_ID = A.intBlockId) LEFT JOIN m_admin_subnode_values GP ON (GP.INT_SUBNODEVAL_ID = A.intGPId) LEFT JOIN m_admin_subnode_values VG ON (VG.INT_SUBNODEVAL_ID = A.intVillageId) WHERE FIND_IN_SET(A.intOutboundDataId, @p_intOutboundDataId) ) AS t;
        END IF;
        
        
        IF(P_ACTION = 'UCR')THEN
			SET SQL_SAFE_UPDATES = 0;
            if(@p_intOutboundDataId != '')then
				UPDATE t_ms_outbound_data SET intAssignedTo = 0 WHERE FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId);
            end if;
            if(@p_intInBoundId != '')then
				update t_ms_inbound_data set intAssignedTo = 0 where FIND_IN_SET(intInboundDataId, @p_intInBoundId);
            end if;
            
        END IF;
        
        
        IF(P_ACTION = 'UCS')THEN
			SET SQL_SAFE_UPDATES = 0;
			UPDATE t_ms_feedback_received SET intFeedbackStatus = @p_selFeebackStatus, intDirectCallFeedbackStatus = @p_intDirectCallFeedbackStatus  WHERE intFeedbackRecId =@p_intFeedbackRecId;
            select intOutboundDataId, intCallType into @p_intOutboundDataId, @p_intCallType from t_ms_feedback_received  WHERE intFeedbackRecId = @p_intFeedbackRecId;
            IF(@p_intCallType = 1)THEN
				update t_ms_outbound_data set intAssignedTo = 0, intRequestStatus = 0, intFeedbackStatus = @p_selFeebackStatus,dtmFeedbackRcvTime=now() where intOutboundDataId = @p_intOutboundDataId;
			ELSE
				update t_ms_inbound_data set intAssignedTo = 0, intRequestStatus = 0, intFeedbackStatus = @p_selFeebackStatus where intInboundDataId = @p_intOutboundDataId;
            END IF;
        END IF;
        
        
        IF(P_ACTION = 'DCA')THEN
			SET SQL_SAFE_UPDATES = 0;
            if(@p_intOutboundDataId != '')then
				UPDATE t_ms_outbound_data SET intAssignedTo = @p_intUserId WHERE FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId);
            end if;
            if(@p_intInBoundId != '')then
				update t_ms_inbound_data set intAssignedTo = @p_intUserId where FIND_IN_SET(intInboundDataId, @p_intInBoundId);
            end if;
            IF(@p_feedbackQry != '')THEN
				SET @P_SQL_QRY = CONCAT('INSERT INTO t_ms_feedback_received(intOutboundDataId, intCreatedBy, intCallThrough,intFeedbackCollectedBy,dtmFeedbackRcvTime,intRequestedById, intCallBackRequest,intDepartmentId, intServiceId, intDistrictId,intMobile) VALUES ', @p_feedbackQry);
				PREPARE STMT FROM @P_SQL_QRY;
				EXECUTE STMT;
			END IF;
        END IF;
		
		
		IF(P_ACTION = 'CCR')THEN
			SET sql_mode = (SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
			SET SQL_SAFE_UPDATES = 0;
			IF(@p_intOutboundDataId != '')THEN
				select group_concat(intOutboundDataId), count(1) into @p_cancelOutBoundId, @p_countCancelId from t_ms_outbound_data where FIND_IN_SET(intOutboundDataId, @p_intOutboundDataId) AND intRequestStatus IN (1,2);
				select intOutboundDataId, count(1), intMobile INTO @p_completedCallId, @p_countCompletedCall, @p_intMobile from t_ms_outbound_data A where FIND_IN_SET(A.intOutboundDataId, @p_intOutboundDataId) AND A.intRequestStatus IN (3) LIMIT 1;
				/*select @p_cancelOutBoundId, @p_countCancelId, @p_completedCallId, @p_countCompletedCall;*/
				IF(@p_countCancelId > 0)THEN
					SET SQL_SAFE_UPDATES = 0;
					UPDATE t_ms_outbound_data SET intAssignedTo = 0, intRequestStatus = 0 WHERE FIND_IN_SET(intOutboundDataId, @p_cancelOutBoundId);
				END IF;
				IF(@p_countCompletedCall > 0)THEN
					SET SQL_SAFE_UPDATES = 0;
					UPDATE t_ms_outbound_data SET intAssignedTo = 0, intRequestStatus = 4 WHERE intOutboundDataId = @p_completedCallId;
					INSERT INTO t_ms_feedback_received (intOutboundDataId, dtmFeedbackRcvTime, intFeedbackStatus, intRequestedById, intCallBackRequest, intFeedbackCollectedBy, intCreatedBy) VALUES (@p_completedCallId, NOW(), 1, @p_intRequestedById, @p_intCallBackRequest, 3, @p_intRequestedById);
					set @p_intFeedbackRecId  = LAST_INSERT_ID();
					INSERT INTO t_ms_call_information (intOutboundDataId,intFeedbackRecId,intMobile, intType, intFeedbackStatus, intCreatedBy) VALUES (@p_completedCallId, @p_intFeedbackRecId,@p_intMobile, 1, 1, @p_intRequestedById);
				END IF;
			END IF;
			IF(@p_intInboundDataId != '')THEN
				select group_concat(intInboundDataId), count(1) into @p_cancelInBoundId, @p_countInCancelId from t_ms_inbound_data where FIND_IN_SET(intInboundDataId, @p_intInboundDataId) AND intRequestStatus IN (1,2);
				select intInboundDataId, count(1), intMobile INTO @p_completedInCallId, @p_countCompletedInCall, @p_intMobile from t_ms_inbound_data A where FIND_IN_SET(A.intInboundDataId, @p_intInboundDataId) AND A.intRequestStatus IN (3) LIMIT 1;
				/*select @p_cancelOutBoundId, @p_countCancelId, @p_completedCallId, @p_countCompletedCall;*/
				IF(@p_countInCancelId > 0)THEN
					SET SQL_SAFE_UPDATES = 0;
					UPDATE t_ms_inbound_data SET intAssignedTo = 0, intRequestStatus = 0 WHERE FIND_IN_SET(intInboundDataId, @p_cancelInBoundId);
				END IF;
				IF(@p_countCompletedInCall > 0)THEN
					SET SQL_SAFE_UPDATES = 0;
					UPDATE t_ms_inbound_data SET intAssignedTo = 0, intRequestStatus = 4 WHERE intInboundDataId = @p_completedInCallId;
					INSERT INTO t_ms_feedback_received (intOutboundDataId, dtmFeedbackRcvTime, intFeedbackStatus, intRequestedById, intCallBackRequest, intFeedbackCollectedBy, intCreatedBy) VALUES (@p_completedInCallId, NOW(), 1, @p_intRequestedById, @p_intCallBackRequest, 3, @p_intRequestedById);
					set @p_intFeedbackRecId  = LAST_INSERT_ID();
					INSERT INTO t_ms_call_information (intOutboundDataId,intFeedbackRecId,intMobile, intType, intFeedbackStatus, intCreatedBy) VALUES (@p_completedInCallId, @p_intFeedbackRecId,@p_intMobile, 2, 1, @p_intRequestedById);
				END IF;
			END IF;
            
            if(@p_countCancelId > 0)then
				insert into t_ms_notification_logs (intCreatedBy, intTotalCalls, callType) values(@p_intRequestedById, @p_countCancelId , 2);
            end if; 
			
		END IF;
        
        /** Action for Submit Feedback For Authority **/
        IF(P_ACTION = 'SFA')THEN
			DELETE FROM t_ms_feedback_ans_submited WHERE intOutboundDataId = @p_intFeedbackRecId and intType = 0;
			IF(@p_FeedbackAnsQry != '')THEN
				SET @P_SQL_QRY = CONCAT('INSERT INTO t_ms_feedback_ans_submited(intOutboundDataId, intQuestionId, intAnswerId, vchRemarks,vchAnswerWritten, intCreatedBy) VALUES ', @p_FeedbackAnsQry);
				PREPARE STMT FROM @P_SQL_QRY;
				EXECUTE STMT;
			END IF;
		END IF;
        
        /** Get Department and district and Service id from outbound and inbound table **/
        IF(P_ACTION = 'GDD')THEN
			select intOutboundDataId,intMobile, intDepartmentId, intServiceId, intSchemeTypeId, intCardTypeId, intDistrictId, intBlockId, intGPId, intVillageId from t_ms_outbound_data where intOutboundDataId = @p_intOutboundId;
        END IF;
         /** Action for Submit Feedback For Authority **/
        IF(P_ACTION = 'FFO')THEN
			 select intFeedbackRecId, intOutboundDataId, dtmFeedbackRcvTime, intFeedbackStatus, intOverallRating, vchAdditionalInfo, vchQuery, intFeedbackReceivedBy, intByDesignationId, intRequestedById, intCallBackRequest, intFeedbackCollectedBy, dtmCreatedOn, intCreatedBy, bitDeletedFlag, intCallType, intCallThrough, intDirectCallFeedbackStatus, intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id from t_ms_feedback_received where intFeedbackRecId =@p_intFeedbackRecId;
		END IF;
        
        
        /** Action for Get Answer of question given **/
		IF(P_ACTION='GQA') THEN   
			SELECT S.*,(SELECT F.intAnswerId from t_ms_feedback_ans_submited F where F.intOutboundDataId=@p_intFeedbackRecId and F.intQuestionId=S.intSurveyQuestId) as intAnswerId,(SELECT F.vchAnswerWritten from t_ms_feedback_ans_submited F where F.intOutboundDataId=@p_intFeedbackRecId and F.intQuestionId=S.intSurveyQuestId) as vchAnswerWritten FROM ( SELECT A.intSurveyQuestId, A.intDepartmentId, A.intServicesId, A.intType, A.vchQuestionEnglish, A.vchQuestionOdia, A.vchShortName, A.intOptionSelection, A.intRemarksStatus,
(select group_concat(B.intSurveyOptionId SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as intSurveyOptionId,
(select group_concat(B.vchOptionEnglish SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as vchOptionEnglish,
(select group_concat(B.vchOptionOdia SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as vchOptionOdia,
(select group_concat(B.intOptionValue SEPARATOR '~||~') from t_ms_survey_questionnaire_option B where B.intSurveyQuestId = A.intSurveyQuestId) as intOptionValue
FROM t_ms_survey_questionnaire A where A.bitDeletedFlag = 0 and A.intDepartmentId = @p_intDepartmentId and A.intServicesId = @p_intServicesId order by A.intQuestionSlNo asc,A.intSurveyQuestId  ASC ) S ;
		END IF; 
        
        
        

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_PULL_DATA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_PULL_DATA`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
    SET @P_MSG=@full_error; -- ('ERROR: Unable to process your request in Procedure');
	SELECT  @P_STATUS,@P_MSG;
 ROLLBACK; 
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
      SET @P_MSG= @full_error;-- ('ERROR: Unable to process your request in DATABASE'); 
      
      SELECT  @P_STATUS,@P_MSG;
      ROLLBACK;
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
      
END;





/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/ 
    ###=====For Call Center =====#########
    IF(P_ACTION='VAA')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intServiceId=',@p_intServiceId);
	END IF;
     IF(@p_intSchemeTypeId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intSchemeTypeId=',@p_intSchemeTypeId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND A.intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
     
     
     
    SET @PRO_SQL = '';
    SET @PRO_SQL1 = '';
    SET @QT = QUOTE('"');
    set @qta = "', ' , ";
    set @REC_LIMIT   = @p_numberofrec;
	
    SET @PRO_SQL1 = CONCAT('SELECT count(1) INTO @PRV_REC_CNT FROM t_ms_outbound_data A  WHERE A.intAssignedTo=',@p_user_Id ,'',@filter_query);
     PREPARE STMT12 FROM @PRO_SQL1;
     EXECUTE STMT12 ;
    
    #SET @PRV_REC_CNT = (SELECT COUNT(1)FROM t_ms_outbound_data A WHERE A.intAssignedTo= @p_user_Id);
    IF(@PRV_REC_CNT>0)THEN
    set @REC_LIMIT   = @p_numberofrec-@PRV_REC_CNT;
    END IF;
    
   IF(@REC_LIMIT >0)THEN 
     SET @PRO_SQL = CONCAT(@PRO_SQL,'SELECT GROUP_CONCAT(CONCAT(',@QT,',intOutboundDataId,',@QT,')) INTO @UPDATE_IDS FROM(SELECT A.intOutboundDataId  FROM
t_ms_outbound_data A LEFT JOIN t_ms_feedback_received B ON(A.intOutboundDataId = B.intOutboundDataId and B.intCallType=1 and B.bitDeletedFlag=0  and B.intFeedbackCollectedBy!=3) where A.bitDeletedFlag=0 AND (A.intFeedbackStatus=0 OR A.intFeedbackStatus =2 OR A.intFeedbackStatus=4 OR A.intFeedbackStatus=7 OR A.intFeedbackStatus=9) ',@filter_query,' AND ( A.intAssignedTo =',@p_user_Id,' OR A.intAssignedTo =0 OR A.intAssignedTo is null)');
    
      SET @PRO_SQL=CONCAT(@PRO_SQL ,'ORDER BY rand()  limit ',@REC_LIMIT ,') AS users');
	#select @PRO_SQL;
	 PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
	 
     
     
      IF(CHAR_LENGTH(@UPDATE_IDS) IS NOT NULL)THEN
		SET @M_SQL = CONCAT('UPDATE t_ms_outbound_data  set intAssignedTo = ',@p_user_Id,', dtmAssignedTime=NOW() where intOutboundDataId IN(',@UPDATE_IDS,') AND (intAssignedTo =0 OR intAssignedTo is null)');
        #select  @M_SQL;
	  PREPARE STMT12 FROM @M_SQL;
      EXECUTE STMT12 ;
     END IF; 
     
  END IF;     
     SET @P_SQL = CONCAT(' SELECT A.intOutboundDataId, A.intDepartmentId, A.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, A.intDistrictId, A.vchName, A.intMobile, A.intAge, A.intGender, A.dtmRegdDateTime, A.jsonRelatedInfo, A.intBookmark, A.intAssignedTo, A.dtmAssignedTime, A.dtmFeedbackRcvTime, A.intFeedbackStatus from t_ms_outbound_data A LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=A.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=A.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=A.intDepartmentId AND DPT.bitDeletedFlag=0) where A.bitDeletedFlag=0 ', @filter_query,' AND (date(A.dtmFeedbackRcvTime) < date(DATE_SUB(now(), INTERVAL 6 MONTH)) OR A.dtmFeedbackRcvTime IS NULL) ') ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,'  AND A.intAssignedTo=',@p_user_Id,'  LIMIT ',@p_numberofrec);
    
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;



### Revert back pulled data 


   IF(P_ACTION='RP')THEN
		    SET  @P_STATUS = 0;
			SET SQL_SAFE_UPDATES=0;
      START TRANSACTION; 
         SET @L_SQL = CONCAT('UPDATE t_ms_outbound_data set intAssignedTo = 0,dtmAssignedTime=NULL where intOutboundDataId IN(',@p_revertIds,')');
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
        COMMIT;
    END IF;
  ## SET BOOKMARK DATA  
     IF(P_ACTION='SB')THEN
		    SET  @P_STATUS = 0;
			SET SQL_SAFE_UPDATES=0;
      START TRANSACTION; 
         SET @L_SQL = CONCAT('UPDATE t_ms_outbound_data set intBookmark=1 where intOutboundDataId =',@p_intOutboundDataId);
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
        COMMIT;
    END IF;
   
   
    
    IF(P_ACTION='VA')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;

     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intServiceId=',@p_intServiceId);
	END IF;
     IF(@p_intSchemeTypeId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intSchemeTypeId=',@p_intSchemeTypeId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
     
     
     
    SET @PRO_SQL = '';
    SET @QT = QUOTE('"');
    set @qta = "', ' , ";
     SET @PRO_SQL = CONCAT(@PRO_SQL,'SELECT GROUP_CONCAT(CONCAT(',@QT,',intOutboundDataId,',@QT,')) INTO @UPDATE_IDS FROM(SELECT intOutboundDataId  FROM
t_ms_outbound_data where bitDeletedFlag=0  AND (intFeedbackStatus!=3 OR intFeedbackStatus!=5 AND intFeedbackStatus!=6) AND intBookmark=1 ',@filter_query,' AND (intAssignedTo=',@p_user_Id,' OR intAssignedTo =0 )');
    
      SET @PRO_SQL=CONCAT(@PRO_SQL ,'ORDER BY dtmCreatedOn ASC limit ',@p_numberofrec ,') AS users');
        #select @PRO_SQL;
	 PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
	 
     
     
     
     SET @P_SQL = CONCAT(' SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender, OD.dtmRegdDateTime, OD.jsonRelatedInfo, OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime, OD.dtmFeedbackRcvTime, OD.intFeedbackStatus from t_ms_outbound_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) where OD.bitDeletedFlag=0 and intBookmark=1') ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,' AND OD.intFeedbackStatus =',@p_intFeedbackStatus,' AND (OD.intAssignedTo=',@p_user_Id,')');
    
     IF(CHAR_LENGTH(@UPDATE_IDS) IS NOT NULL)THEN
	  SET @P_SQL=CONCAT(@P_SQL,' AND OD.intOutboundDataId IN(',@UPDATE_IDS,')');
     END IF; 
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;


      IF(P_ACTION='CCH')THEN
		
            SET @curdate_val= (select CURDATE()); 
            SET @L_SQL = CONCAT('select count(1) As CNT from t_ms_outbound_data where intFeedbackStatus=1 and intAssignedTo=',@p_user_Id,' and date(dtmFeedbackRcvTime)="',@curdate_val,'"' );
                 
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
      
    END IF;
   

-- for CM Dashboard----


IF(P_ACTION='VCM')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     -- SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
     SET @filter_query_man ='';
     SET @P_SQL ='';
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intServiceId=',@p_intServiceId);
	END IF;
     IF(@p_intSchemeTypeId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intSchemeTypeId=',@p_intSchemeTypeId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND S.intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
    
    IF(char_length(@p_vchCitizenFromDates) >0)THEN
		SET @filter_query_man = CONCAT(@filter_query_man,' AND DATE(OD.dtmRegdDateTime) >= DATE("',@p_vchCitizenFromDate,'")');
    END IF;
    IF(char_length(@p_vchCitizenToDates) >0)THEN
		SET @filter_query_man = CONCAT(@filter_query_man,' AND DATE(OD.dtmRegdDateTime) <= DATE("',@p_vchCitizenToDate,'")');
    END IF;
   /* IF(@p_intHospitalPolice >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id=',@p_intHospitalPolice);
	END IF;*/
    
    IF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district =0 AND @p_intHospitalPolice=0 )THEN
        SELECT group_concat(intPolicestationId) INTO @TAGGED_POLICESTATION FROM m_ms_policestation_tagging where  intRangeId=@p_range_id and bitDeletedFlag=0;                
        SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@TAGGED_POLICESTATION ,')');
        
	ELSEIF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district > 0 AND @p_intHospitalPolice=0 )THEN
          
         select  group_concat(A.intPolicestationId) INTO @TAGGED_POLICESTATION from m_ms_policestation_tagging A LEFT JOIN m_ms_police_station B ON (B.intPolicestationId=A.intPolicestationId)   where A.bitDeletedFlag=0 and B.bitDeletedFlag=0 AND A.intRangeId= @p_range_id AND A.intRangeId= @p_range_id  AND B.intConsoleDistId= @p_district;         
         
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@TAGGED_POLICESTATION ,')');
    ELSEIF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district > 0  AND @p_intHospitalPolice > 0 )THEN
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@p_intHospitalPolice ,')'); 
    ELSEIF(@p_intHospitalPolice>0)THEN 
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id=',@p_intHospitalPolice);        
	END IF;
    
    
    

SET @P_SQL = CONCAT(@P_SQL,' SELECT S.* FROM(SELECT A.* FROM (SELECT distinct OD.intOutboundDataId,date(OD.dtmFeedbackRcvTime) as dtmFeedbackRcv, B.intCallBackRequest, CASE WHEN intCallBackRequest > 0 THEN (SELECT FN_GET_RANK_ID(B.intCallBackRequest)) ELSE 0 END AS RANK_ID, OD.intDepartmentId, OD.intServiceId, OD.intSchemeTypeId, OD.intCardTypeId, SR.vchServiceName, ST.vchSchemeTypeName, CT.vchCardName, DP.VCH_VALUE_NAME AS DistrictName, OD.intDistrictId, OD.intBlockId, BK.VCH_VALUE_NAME AS BlockName, OD.intGPId, GP.VCH_VALUE_NAME AS GPName, OD.intVillageId, VG.VCH_VALUE_NAME AS VillageName, OD.vchName, OD.intMobile, OD.intAge, OD.intGender, OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime, OD.intFeedbackStatus, OD.dtmCreatedOn, OD.int_hs_ps_id, (SELECT COUNT(1) FROM t_ms_call_information N WHERE N.intMobile = OD.intMobile) AS vchCountCallHistory, OD.dtmRegdDateTime, OD.jsonRelatedInfo, OD.vchRegdNo, OD.vchRationCardNo, OD.intNoFamily, OD.vchTokenNo, OD.dtmPaddyDeposite FROM `t_ms_outbound_data` OD LEFT JOIN t_ms_feedback_received B ON (OD.intOutboundDataId = B.intOutboundDataId)  LEFT JOIN m_fs_card_type CT ON (CT.intCardTypeId=OD.intCardTypeId AND CT.bitDeletedFlag=0) LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_fs_scheme_type ST ON (ST.intSchemeTypeId=OD.intSchemeTypeId AND ST.bitDeletedFlag=0)LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_admin_subnode_values BK ON (BK.BIT_DELETED_FLAG=0  AND BK.INT_SUBNODEVAL_ID=OD.intBlockId) LEFT JOIN m_admin_subnode_values GP ON (GP.BIT_DELETED_FLAG=0  AND GP.INT_SUBNODEVAL_ID=OD.intGPId) LEFT JOIN m_admin_subnode_values VG ON (VG.BIT_DELETED_FLAG=0  AND VG.INT_SUBNODEVAL_ID=OD.intVillageId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0 ',@filter_query_man,') where 0=0) A ) S where 0=0  ', @filter_query,' AND (S.dtmFeedbackRcv < date(DATE_SUB(now(), INTERVAL 6 MONTH)) OR S.dtmFeedbackRcv IS NULL)') ;
    IF(@p_rank_Id>0)THEN 
        SET @P_SQL=CONCAT(@P_SQL,' and (RANK_ID=0 OR RANK_ID >',@p_rank_Id,')');
    END IF;
      
       SET @P_SQL=CONCAT(@P_SQL,' ORDER BY RAND()  LIMIT ',@p_numberofrec );
		#select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;




   IF(P_ACTION='VXP')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     #SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     
     SET @P_SQL = CONCAT(' SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender, OD.dtmRegdDateTime, OD.jsonRelatedInfo, OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime, OD.dtmFeedbackRcvTime, OD.intFeedbackStatus from t_ms_outbound_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) where OD.bitDeletedFlag=0 and intBookmark=0') ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,'  AND OD.intAssignedTo=',@p_user_Id,'  LIMIT ',@p_numberofrec );
    
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;
  
   IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='select intOutboundDataId, intDepartmentId,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime,dtmCreatedOn from t_ms_outbound_data A where bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='V') THEN
	SET @P_SQL='select intOutboundDataId, intDepartmentId,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime,dtmCreatedOn from t_ms_outbound_data A where bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
	
    IF(P_ACTION='PGI') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='select intInboundDataId,intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmCreatedOn from t_ms_inbound_data A where bitDeletedFlag=0';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='VI') THEN
	SET @P_SQL='select intInboundDataId,intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmCreatedOn from t_ms_inbound_data A where bitDeletedFlag=0';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
	
    IF(P_ACTION='PGF') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT A.intOutboundDataId,A.dtmCreatedOn, A.dtmFeedbackRcvTime,A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.bitDeletedFlag=0';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_intFeedbackCollectedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='VF') THEN
	SET @P_SQL='SELECT A.intOutboundDataId,A.dtmCreatedOn, A.dtmFeedbackRcvTime,A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.bitDeletedFlag=0';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_intFeedbackCollectedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
    
    IF(P_ACTION='PGC') THEN
    SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
	SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
    SET @CURR_DATE=curdate();
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT A.intOutboundDataId, A.dtmFeedbackRcvTime, A.intFeedbackStatus, A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile, B.intAge, B.intGender from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy!=1';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    #IF(@p_intFeedbackCollectedBy>0)THEN
      #SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
   # END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_status=1)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@CURR_DATE,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=2)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_WEEK,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=3)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_MONTH,'" AND "',@CURR_DATE,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
  IF(P_ACTION='VC') THEN
	SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
	SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
    SET @CURR_DATE=curdate();
	SET @P_SQL='SELECT A.intOutboundDataId, A.dtmFeedbackRcvTime, A.intFeedbackStatus, A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile, B.intAge, B.intGender from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy!=1';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    #IF(@p_intFeedbackCollectedBy>0)THEN
      #SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    #END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_status=1)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@CURR_DATE,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=2)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_WEEK,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=3)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_MONTH,'" AND "',@CURR_DATE,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
    
    IF(P_ACTION='FPS') THEN
       SELECT 1;
     END IF; 


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_PULL_DATA21102019` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_PULL_DATA21102019`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
    SET @P_MSG=@full_error; -- ('ERROR: Unable to process your request in Procedure');
	SELECT  @P_STATUS,@P_MSG;
 ROLLBACK; 
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
      SET @P_MSG= @full_error;-- ('ERROR: Unable to process your request in DATABASE'); 
      
      SELECT  @P_STATUS,@P_MSG;
      ROLLBACK;
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
      
END;





/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/ 
    ###=====For Call Center =====#########
    IF(P_ACTION='VAA')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intServiceId=',@p_intServiceId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND A.intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND A.intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
     
     
     
    SET @PRO_SQL = '';
    SET @PRO_SQL1 = '';
    SET @QT = QUOTE('"');
    set @qta = "', ' , ";
    set @REC_LIMIT   = @p_numberofrec;
	
    SET @PRO_SQL1 = CONCAT('SELECT count(1) INTO @PRV_REC_CNT FROM t_ms_outbound_data A  WHERE A.intAssignedTo=',@p_user_Id ,'',@filter_query);
     PREPARE STMT12 FROM @PRO_SQL1;
     EXECUTE STMT12 ;
    
    #SET @PRV_REC_CNT = (SELECT COUNT(1)FROM t_ms_outbound_data A WHERE A.intAssignedTo= @p_user_Id);
    IF(@PRV_REC_CNT>0)THEN
    set @REC_LIMIT   = @p_numberofrec-@PRV_REC_CNT;
    END IF;
    
   IF(@REC_LIMIT >0)THEN 
     SET @PRO_SQL = CONCAT(@PRO_SQL,'SELECT GROUP_CONCAT(CONCAT(',@QT,',intOutboundDataId,',@QT,')) INTO @UPDATE_IDS FROM(SELECT A.intOutboundDataId  FROM
t_ms_outbound_data A LEFT JOIN t_ms_feedback_received B ON(A.intOutboundDataId = B.intOutboundDataId and B.intCallType=1 and B.bitDeletedFlag=0  and B.intFeedbackCollectedBy!=3) where A.bitDeletedFlag=0 AND (A.intFeedbackStatus=0 OR A.intFeedbackStatus =2 OR A.intFeedbackStatus=4 OR A.intFeedbackStatus=7 OR A.intFeedbackStatus=9) ',@filter_query,' AND ( A.intAssignedTo =',@p_user_Id,' OR A.intAssignedTo =0 OR A.intAssignedTo is null)');
    
      SET @PRO_SQL=CONCAT(@PRO_SQL ,'ORDER BY rand()  limit ',@REC_LIMIT ,') AS users');
	#select @PRO_SQL;
	 PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
	 
     
     
      IF(CHAR_LENGTH(@UPDATE_IDS) IS NOT NULL)THEN
		SET @M_SQL = CONCAT('UPDATE t_ms_outbound_data  set intAssignedTo = ',@p_user_Id,', dtmAssignedTime=NOW() where intOutboundDataId IN(',@UPDATE_IDS,') AND (intAssignedTo =0 OR intAssignedTo is null)');
        #select  @M_SQL;
	  PREPARE STMT12 FROM @M_SQL;
      EXECUTE STMT12 ;
     END IF; 
     
  END IF;     
     SET @P_SQL = CONCAT(' SELECT A.intOutboundDataId, A.intDepartmentId, A.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, A.intDistrictId, A.vchName, A.intMobile, A.intAge, A.intGender, A.dtmRegdDateTime, A.jsonRelatedInfo, A.intBookmark, A.intAssignedTo, A.dtmAssignedTime, A.dtmFeedbackRcvTime, A.intFeedbackStatus from t_ms_outbound_data A LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=A.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=A.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=A.intDepartmentId AND DPT.bitDeletedFlag=0) where A.bitDeletedFlag=0 ', @filter_query) ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,'  AND A.intAssignedTo=',@p_user_Id,'  LIMIT ',@p_numberofrec);
    
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;



### Revert back pulled data 


   IF(P_ACTION='RP')THEN
		    SET  @P_STATUS = 0;
			SET SQL_SAFE_UPDATES=0;
      START TRANSACTION; 
         SET @L_SQL = CONCAT('UPDATE t_ms_outbound_data set intAssignedTo = 0,dtmAssignedTime=NULL where intOutboundDataId IN(',@p_revertIds,')');
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
        COMMIT;
    END IF;
  ## SET BOOKMARK DATA  
     IF(P_ACTION='SB')THEN
		    SET  @P_STATUS = 0;
			SET SQL_SAFE_UPDATES=0;
      START TRANSACTION; 
         SET @L_SQL = CONCAT('UPDATE t_ms_outbound_data set intBookmark=1 where intOutboundDataId =',@p_intOutboundDataId);
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
        COMMIT;
    END IF;
   
   
    
    IF(P_ACTION='VA')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;

     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intServiceId=',@p_intServiceId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
     
     
     
    SET @PRO_SQL = '';
    SET @QT = QUOTE('"');
    set @qta = "', ' , ";
     SET @PRO_SQL = CONCAT(@PRO_SQL,'SELECT GROUP_CONCAT(CONCAT(',@QT,',intOutboundDataId,',@QT,')) INTO @UPDATE_IDS FROM(SELECT intOutboundDataId  FROM
t_ms_outbound_data where bitDeletedFlag=0  AND (intFeedbackStatus!=3 OR intFeedbackStatus!=5 AND intFeedbackStatus!=6) AND intBookmark=1 ',@filter_query,' AND (intAssignedTo=',@p_user_Id,' OR intAssignedTo =0 )');
    
      SET @PRO_SQL=CONCAT(@PRO_SQL ,'ORDER BY dtmCreatedOn ASC limit ',@p_numberofrec ,') AS users');
        #select @PRO_SQL;
	 PREPARE STMT11 FROM @PRO_SQL;
     EXECUTE STMT11 ;
	 
     
     
     
     SET @P_SQL = CONCAT(' SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender, OD.dtmRegdDateTime, OD.jsonRelatedInfo, OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime, OD.dtmFeedbackRcvTime, OD.intFeedbackStatus from t_ms_outbound_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) where OD.bitDeletedFlag=0 and intBookmark=1') ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,' AND OD.intFeedbackStatus =',@p_intFeedbackStatus,' AND (OD.intAssignedTo=',@p_user_Id,')');
    
     IF(CHAR_LENGTH(@UPDATE_IDS) IS NOT NULL)THEN
	  SET @P_SQL=CONCAT(@P_SQL,' AND OD.intOutboundDataId IN(',@UPDATE_IDS,')');
     END IF; 
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;


      IF(P_ACTION='CCH')THEN
		
            SET @curdate_val= (select CURDATE()); 
            SET @L_SQL = CONCAT('select count(1) As CNT from t_ms_outbound_data where intFeedbackStatus=1 and intAssignedTo=',@p_user_Id,' and date(dtmFeedbackRcvTime)="',@curdate_val,'"' );
                 
		 PREPARE STMT_L FROM @L_SQL;
		 EXECUTE STMT_L;
      
    END IF;
   

-- for CM Dashboard----


IF(P_ACTION='VCM')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     -- SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     SET @UPDATE_IDS = '';
     SET @filter_query ='';
     
     SET @filter_query_man ='';
     SET @P_SQL ='';
    #### Prepairing filter query   
	IF(@p_vchDepartmentId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intDepartmentId=',@p_vchDepartmentId);
	END IF;
    IF(@p_intServiceId >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intServiceId=',@p_intServiceId);
	END IF;
    IF(@p_district >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intDistrictId=',@p_district);
	END IF;
    IF(@p_gender >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.intGender=',@p_gender);
	END IF;
    IF(char_length(@p_agegroup) >0)THEN
        SET @Age_From = (SELECT SPLIT_STR((@p_agegroup), ',', 1));
        SET @Age_to   = (SELECT SPLIT_STR((@p_agegroup), ',', 2));        
        SET @filter_query = CONCAT(@filter_query,' AND S.intAge BETWEEN ',@Age_From,' AND ',@Age_to);        
	END IF;
    
    IF(char_length(@p_vchCitizenFromDates) >0)THEN
		SET @filter_query_man = CONCAT(@filter_query_man,' AND DATE(OD.dtmRegdDateTime) >= DATE("',@p_vchCitizenFromDate,'")');
    END IF;
    IF(char_length(@p_vchCitizenToDates) >0)THEN
		SET @filter_query_man = CONCAT(@filter_query_man,' AND DATE(OD.dtmRegdDateTime) <= DATE("',@p_vchCitizenToDate,'")');
    END IF;
   /* IF(@p_intHospitalPolice >0)THEN
        SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id=',@p_intHospitalPolice);
	END IF;*/
    
    IF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district =0 AND @p_intHospitalPolice=0 )THEN
        SELECT group_concat(intPolicestationId) INTO @TAGGED_POLICESTATION FROM m_ms_policestation_tagging where  intRangeId=@p_range_id and bitDeletedFlag=0;                
        SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@TAGGED_POLICESTATION ,')');
        
	ELSEIF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district > 0 AND @p_intHospitalPolice=0 )THEN
          
         select  group_concat(A.intPolicestationId) INTO @TAGGED_POLICESTATION from m_ms_policestation_tagging A LEFT JOIN m_ms_police_station B ON (B.intPolicestationId=A.intPolicestationId)   where A.bitDeletedFlag=0 and B.bitDeletedFlag=0 AND A.intRangeId= @p_range_id AND A.intRangeId= @p_range_id  AND B.intConsoleDistId= @p_district;         
         
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@TAGGED_POLICESTATION ,')');
    ELSEIF(@p_vchDepartmentId =14 AND @p_range_id >0 AND @p_district > 0  AND @p_intHospitalPolice > 0 )THEN
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id IN(',@p_intHospitalPolice ,')'); 
    ELSEIF(@p_intHospitalPolice>0)THEN 
         SET @filter_query = CONCAT(@filter_query,' AND S.int_hs_ps_id=',@p_intHospitalPolice);        
	END IF;
    
    
    

SET @P_SQL = CONCAT(@P_SQL,' SELECT S.* from(select A.*, B.intCallBackRequest, case when intCallBackRequest>0 then (select  FN_GET_RANK_ID(B.intCallBackRequest)) else 0 END AS RANK_ID  from(SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender,  OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime,  OD.intFeedbackStatus,OD.dataType, OD.dtmCreatedOn, OD.int_hs_ps_id, (select count(1) from t_ms_call_information N where N.intMobile = OD.intMobile) as vchCountCallHistory, OD.dtmRegdDateTime, case when OD.intDepartmentId = 12 then 
(select Z.vchHospitalName from m_ms_hospital Z where Z.intHospitalId = OD.int_hs_ps_id)
when OD.intDepartmentId = 14 then
(select Z.vchPolicestationName from m_ms_police_station Z where Z.intPolicestationId = OD.int_hs_ps_id)
end as PO_Hospital, OD.vchOther from vw_ms_pull_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0 ',@filter_query_man,' ) where 0=0) A LEFT JOIN t_ms_feedback_received B ON(A.intOutboundDataId = B.intOutboundDataId and  A.dataType=B.intCallType) ) S where 0=0  ', @filter_query) ;
    IF(@p_rank_Id>0)THEN 
        SET @P_SQL=CONCAT(@P_SQL,' and (RANK_ID=0 OR RANK_ID >',@p_rank_Id,')');
    END IF;
      
       SET @P_SQL=CONCAT(@P_SQL,' ORDER BY RAND()  LIMIT ',@p_numberofrec );
		#select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;




   IF(P_ACTION='VXP')THEN
     SET SESSION GROUP_CONCAT_MAX_LEN=262144;
     #SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
     START TRANSACTION;
     
     SET @P_SQL = CONCAT(' SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender, OD.dtmRegdDateTime, OD.jsonRelatedInfo, OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime, OD.dtmFeedbackRcvTime, OD.intFeedbackStatus from t_ms_outbound_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) where OD.bitDeletedFlag=0 and intBookmark=0') ;
     
      
    SET @P_SQL=CONCAT(@P_SQL,'  AND OD.intAssignedTo=',@p_user_Id,'  LIMIT ',@p_numberofrec );
    
         #select @P_SQL;
		PREPARE STMT FROM @P_SQL;
	    EXECUTE STMT;
     
	COMMIT;
	END IF;
  
   IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='select intOutboundDataId, intDepartmentId,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime,dtmCreatedOn from t_ms_outbound_data A where bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='V') THEN
	SET @P_SQL='select intOutboundDataId, intDepartmentId,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime,dtmCreatedOn from t_ms_outbound_data A where bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
	
    IF(P_ACTION='PGI') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='select intInboundDataId,intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmCreatedOn from t_ms_inbound_data A where bitDeletedFlag=0';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='VI') THEN
	SET @P_SQL='select intInboundDataId,intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values B where A.intDistrictId=B.INT_SUBNODEVAL_ID and INT_PARENT_NODE=1) as vchDistrict, vchName, intMobile,dtmCreatedOn from t_ms_inbound_data A where bitDeletedFlag=0';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',@p_district);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
	
    IF(P_ACTION='PGF') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT A.intOutboundDataId,A.dtmCreatedOn, A.dtmFeedbackRcvTime,A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.bitDeletedFlag=0';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_intFeedbackCollectedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
     IF(P_ACTION='VF') THEN
	SET @P_SQL='SELECT A.intOutboundDataId,A.dtmCreatedOn, A.dtmFeedbackRcvTime,A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.bitDeletedFlag=0';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(@p_intFeedbackCollectedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
    
    IF(P_ACTION='PGC') THEN
    SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
	SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
    SET @CURR_DATE=curdate();
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT A.intOutboundDataId, A.dtmFeedbackRcvTime, A.intFeedbackStatus, A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile, B.intAge, B.intGender from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy!=1';
    
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    #IF(@p_intFeedbackCollectedBy>0)THEN
      #SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
   # END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_status=1)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@CURR_DATE,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=2)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_WEEK,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=3)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_MONTH,'" AND "',@CURR_DATE,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF; 
    
  IF(P_ACTION='VC') THEN
	SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
	SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
    SET @CURR_DATE=curdate();
	SET @P_SQL='SELECT A.intOutboundDataId, A.dtmFeedbackRcvTime, A.intFeedbackStatus, A.intFeedbackReceivedBy, A.intByDesignationId, A.intCallBackRequest, A.intRequestedById, B.intDepartmentId,(select vchDeptName from m_department C where B.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, B.intServiceId,(select vchServiceName from m_ms_service_registration D where B.intDepartmentId=D.intDepartmentId and B.intServiceId=D.intServiceRegistrationId) as vchService, B.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where B.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict, B.vchName, B.intMobile, B.intAge, B.intGender from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy!=1';
    IF(@p_district>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDistrictId=',@p_district);
    END IF;
    IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_vchDepartmentId);
    END IF;
    #IF(@p_intFeedbackCollectedBy>0)THEN
      #SET @P_SQL=CONCAT(@P_SQL,' AND A.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
    #END IF;
    IF(@p_intServiceId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_status=1)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@CURR_DATE,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=2)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_WEEK,'" AND "',@CURR_DATE,'"');
    END IF;
    IF(@p_status=3)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmFeedbackRcvTime) between "',@FIRST_DATE_MONTH,'" AND "',@CURR_DATE,'"');
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.dtmCreatedOn DESC');
	PREPARE STMT FROM @P_SQL;
    #select @P_SQL;
	 EXECUTE STMT;
    END IF; 
    
    IF(P_ACTION='FPS') THEN
       SELECT 1;
     END IF; 


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_QUESTIONNAIRE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_QUESTIONNAIRE`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN


    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
       
    
    
    
    IF(P_ACTION='CD') THEN
		SELECT COUNT(1) FROM t_ms_survey_questionnaire WHERE bitDeletedFlag = 0 AND vchQuestionEnglish = @p_vchQuestionEnglish;		
	END IF;
    
    
    IF(P_ACTION = 'A')THEN
		INSERT INTO t_ms_survey_questionnaire (intDepartmentId, intServicesId, intType, vchQuestionEnglish, vchQuestionOdia, vchShortName, intOptionSelection, vchDescription, intCreatedBy) VALUES (@p_intDepartmentId, @p_intServicesId, @p_intType, @p_vchQuestionEnglish, @p_vchQuestionOdia, @p_vchShortName, @p_intOptionSelection, @p_vchDescription, @p_intCreatedBy);
        set @p_intSurveyQuestId = LAST_INSERT_ID();
        IF(@p_vchQuery != '')THEN
			SET @P_SQL_QRY = CONCAT('INSERT INTO t_ms_survey_questionnaire_option (intSurveyQuestId, vchOptionEnglish, vchOptionOdia, intOptionValue, intCreatedBy) VALUES ', @p_vchQuery);
            PREPARE STMT FROM @P_SQL_QRY;
			EXECUTE STMT;
        END IF;
    END IF;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_SERVICE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_SERVICE`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/   
    
    IF(P_ACTION='CD') THEN
	SET @FLAG   	= 0;
	SET @CTR    	= 1;
	SET @P_ORG 		= '';
	SET @COMMA  	= (SELECT LENGTH(@p_allservices)- LENGTH(REPLACE(@p_allservices, ',', '')));
	SET @COMMANXT 	= @COMMA+1;
    #SELECT @COMMANXT;
	WHILE(@CTR<=@COMMANXT)
	DO
		IF(@COMMA>0) THEN
			SET @COUNT_FLAG = (SELECT COUNT(1) FROM m_ms_service_registration WHERE bitDeletedFlag=0 AND intDepartmentId=@p_intDepartmentId AND intServiceRegistrationId NOT IN(SPLIT_STR((@p_allservicesId), ',', @CTR)) AND vchServiceName=SPLIT_STR((@p_allservices), ',', @CTR));
		ELSE
			SET @COUNT_FLAG = (SELECT COUNT(1) FROM m_ms_service_registration WHERE bitDeletedFlag=0 AND intDepartmentId=@p_intDepartmentId AND vchServiceName=@p_allservices AND intServiceRegistrationId NOT IN (@p_allservicesId));
		END IF;       
		IF(@COUNT_FLAG > 0) THEN
			SET @FLAG= @FLAG+1;
		END IF;
		SET @CTR   = @CTR+1;
		SET @P_ORG = CONCAT(@P_ORG,',',@ORG_IDS);
	END WHILE;
	SELECT @FLAG;
END IF;


IF(P_ACTION='AU') THEN   
SET SQL_SAFE_UPDATES = 0;
    DROP TEMPORARY TABLE IF EXISTS TEMPTBL;
    CREATE TEMPORARY TABLE TEMPTBL (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,intServiceRegistrationId INT, intDepartmentId INT, vchServiceName varchar(128) , intCreatedBy INT);
    SET @P_SQL=CONCAT('INSERT INTO TEMPTBL (intServiceRegistrationId,intDepartmentId, vchServiceName, intCreatedBy) VALUES ',@p_query);
    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
    SET @ROWCOUNT= (SELECT COUNT(ID) FROM TEMPTBL);
    DROP TEMPORARY TABLE IF EXISTS TEMPP;
     CREATE TEMPORARY TABLE TEMPP (intServiceRegistrationId INT);
       INSERT TEMPP SELECT intServiceRegistrationId FROM m_ms_service_registration WHERE  bitDeletedFlag=0 AND intDepartmentId= @p_intDepartmentId ;
	   UPDATE m_ms_service_registration SET  bitDeletedFlag =1,
		  dtmUpdatedOn       = NOW(),
		  intUpdatedBy       = @p_intCreatedBy
		WHERE intServiceRegistrationId  IN(SELECT intServiceRegistrationId FROM TEMPP WHERE  intServiceRegistrationId NOT IN (SELECT intServiceRegistrationId FROM TEMPTBL));
		SET @INTCOUNTER=1;
		WHILE(@INTCOUNTER<=@ROWCOUNT)
		DO
		SET @PID					       = (SELECT intServiceRegistrationId  FROM TEMPTBL WHERE ID=@INTCOUNTER );
		SET @intDepartmentId      	       = (SELECT intDepartmentId  FROM TEMPTBL WHERE ID=@INTCOUNTER );
		SET @vchServiceName                = (SELECT vchServiceName  FROM TEMPTBL WHERE ID=@INTCOUNTER ); 
		SET @intCreatedBy    		       = (SELECT intCreatedBy  FROM TEMPTBL WHERE ID=@INTCOUNTER ); 
		  IF(@PID IS NULL OR @PID=0) THEN
				INSERT INTO m_ms_service_registration(intDepartmentId,vchServiceName,intCreatedBy) VALUES(@intDepartmentId,@vchServiceName,@intCreatedBy);
		  ELSE
			   UPDATE m_ms_service_registration SET
					intDepartmentId			     = @intDepartmentId,
					vchServiceName               = @vchServiceName,
					intUpdatedBy                 = @intCreatedBy,
					dtmUpdatedOn          	     = NOW() WHERE intServiceRegistrationId= @PID;
			END IF;
		  SET @INTCOUNTER= @INTCOUNTER+1;
	   END WHILE;
		COMMIT;
      
    
PREPARE STMT FROM @P_SQL;
EXECUTE STMT;
SET SQL_SAFE_UPDATES = 1;
END IF;

 
 IF(P_ACTION='FAS') THEN
 
 SET @P_SQL = 'SELECT intServiceRegistrationId, intDepartmentId, vchServiceName, intCreatedBy, stmCreatedOn, intUpdatedBy, dtmUpdatedOn, bitDeletedFlag FROM m_ms_service_registration WHERE bitDeletedFlag=0';
        IF(@p_intServiceRegistrationId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServiceRegistrationId=',@p_intServiceRegistrationId);
        END IF;
        IF(@p_intDepartmentId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
        END IF;
        SET @P_SQL = CONCAT(@P_SQL,' Order by vchServiceName ASC ');
        
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
 END IF;
 
 /*Action to get department list by:Puja kumari on dt:23-09-2019*/
 
IF(P_ACTION='GDL') THEN
	SELECT intDeptId, vchDeptName FROM m_department WHERE bitDeletedFlag=0;
END IF;

/*Action To get Requested by Names by:Rudra Satpathy  */
IF(P_ACTION='GRB') THEN
	select VCH_FULL_NAME,INT_USER_ID from m_admin_user where INT_EMP_TYPE=1 and INT_USER_ID != 1;
END IF;
IF(P_ACTION='GDM') THEN
	if(@p_intDistrictId>0)THEN
		SELECT INT_SUBNODEVAL_ID, VCH_VALUE_NAME FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=1 AND INT_SUBNODEVAL_ID=@p_intDistrictId;
	else
		SELECT INT_SUBNODEVAL_ID, VCH_VALUE_NAME FROM m_admin_subnode_values WHERE BIT_DELETED_FLAG=0 AND INT_PARENT_NODE=1;
    END IF;
END IF;
 /*Action to view Services by:Puja kumari on dt:23-09-2019*/
IF(P_ACTION='V') THEN
      SET @P_SQL='SELECT intServiceRegistrationId,intDepartmentId,tinPublishStatus,(select vchDeptName from m_department where intDeptId=intDepartmentId and bitDeletedFlag=0) as deptName,vchServiceName,stmCreatedOn FROM m_ms_service_registration WHERE bitDeletedFlag=0';
	 IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(CHAR_LENGTH(@p_vchServiceName)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchServiceName ="',@p_vchServiceName,'"');
	END IF;
     SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC ');
	PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
     #select @P_SQL;
END IF;

 /*Action to view Services by:Puja kumari on dt:23-09-2019*/
IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='SELECT intServiceRegistrationId,intDepartmentId,tinPublishStatus,(select vchDeptName from m_department where intDeptId=intDepartmentId and bitDeletedFlag=0) as deptName,vchServiceName,stmCreatedOn FROM m_ms_service_registration WHERE bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    IF(CHAR_LENGTH(@p_vchServiceName)>0) THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND vchServiceName ="',@p_vchServiceName,'"');
	END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT USING @START_REC;
    END IF;  
 /*Action to view services by:Puja kumari on dt:23-09-2019*/
IF(P_ACTION='SDL') THEN
	SELECT intServiceRegistrationId,intDepartmentId,vchServiceName,stmCreatedOn FROM m_ms_service_registration WHERE intDepartmentId=@p_deptId AND bitDeletedFlag=0;
    END IF; 
IF(P_ACTION='R') THEN
	SELECT intServiceRegistrationId,intDepartmentId,vchServiceName,stmCreatedOn FROM m_ms_service_registration WHERE intServiceRegistrationId=@p_intId AND bitDeletedFlag=0;
    END IF;
 /*Action to delete services by:Puja kumari on dt:24-09-2019*/
 IF(P_ACTION='D')THEN
     SET @P_SQL=CONCAT('UPDATE m_ms_service_registration SET bitDeletedFlag=1 WHERE intServiceRegistrationId IN(',@p_ids,')');
    PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT;
  END IF;
IF(P_ACTION='P')THEN
    SET @P_SQL=CONCAT('UPDATE m_ms_service_registration SET tinPublishStatus=2,dtmUpdatedOn=NOW() WHERE intServiceRegistrationId IN(',@p_ids,')');
    PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT;
  END IF;
   IF(P_ACTION='UP')THEN
    SET @P_SQL=CONCAT('UPDATE m_ms_service_registration SET tinPublishStatus=1,dtmUpdatedOn=NOW() WHERE intServiceRegistrationId IN(',@p_ids,')');
    PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT;
       END IF;

#For Map Data
  IF(P_ACTION='GD')THEN
   SET @P_SQL= 'SELECT A.INT_SUBNODEVAL_ID as intDistrictId,A.VCH_VALUE_NAME as districtName,
(select count(*) from t_ms_feedback_received B left join t_ms_outbound_data D ON(B.intOutboundDataId=D.intOutboundDataId) WHERE D.intDistrictId = A.INT_SUBNODEVAL_ID and B.intFeedbackStatus = 1 AND D.bitDeletedFlag=0 AND B.bitDeletedFlag= 0 ';
	SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")'); 
    IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
    IF(LENGTH( @p_deptFilter)>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
	END IF;   
  SET @P_SQL=CONCAT(@P_SQL,' ) as outBoundCall,(SELECT count(*) FROM vw_ms_pull_data C where C.intDistrictId = A.INT_SUBNODEVAL_ID and A.INT_PARENT_NODE = 1');

   #IF(LENGTH( @p_deptFilter)>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
   #END IF; 
   #IF(@p_deptSel1>0 AND @p_deptSel1=2)THEN
      #SET @P_SQL=CONCAT(@P_SQL,' AND C.dataType=',@p_deptSel1);
      #SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"12,14")');  
	#ELSEIF (@p_deptSel1>0 AND @p_deptSel1=1)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND C.dataType=1');
      SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
      IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
       SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(C.int_hs_ps_id,"',@p_intPolicestationId,'")');
	  END IF;
	#ELSE 
      #SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
    #END IF;
	 SET @P_SQL=CONCAT(@P_SQL,' ) as inBoundCall FROM m_admin_subnode_values A where A.INT_PARENT_NODE = 1');
	#SELECT  @P_SQL;
    PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT; 
  END IF;
IF(P_ACTION='GDC')THEN
  SET @P_SQL= 'SELECT A.INT_SUBNODEVAL_ID as intDistrictId,A.VCH_VALUE_NAME as districtName,';
	#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")');   
    #IF(LENGTH( @p_deptFilter)>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(intDepartmentId,"',@p_deptFilter,'")');
	#END IF;   
  SET @P_SQL=CONCAT(@P_SQL,'(SELECT count(*) FROM vw_ms_pull_data C where C.intDistrictId = A.INT_SUBNODEVAL_ID and A.INT_PARENT_NODE = 1');
  IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
   SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(C.int_hs_ps_id,"',@p_intPolicestationId,'")');
  END IF;
   #IF(LENGTH( @p_deptFilter)>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
   #END IF; 
   IF(@p_deptSel1>0 AND @p_deptSel1=2)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND C.dataType=2');
      #SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"12,14")');
      IF(@p_deptFilter>0) THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
	  ELSE 
		SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"12,14")');
      END IF;
	ELSEIF (@p_deptSel1=0 )THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND C.dataType=2');
     # SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
	#ELSE 
       IF(@p_deptFilter>0) THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"',@p_deptFilter,'")');
	  ELSE 
		SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(C.intDepartmentId,"12,14")');
      END IF;
    END IF;
	 SET @P_SQL=CONCAT(@P_SQL,' ) as inBoundCall FROM m_admin_subnode_values A where A.INT_PARENT_NODE = 1');
	#SELECT  @P_SQL;
    PREPARE STMT FROM @P_SQL;
	 EXECUTE STMT; 
	
    END IF;
#MAP DAta End    
    
#For Inbound Summary    
IF(P_ACTION='GIC')THEN
  SET @P_SQL= 'select ifnull(count(*),0) as calls,date(dtmCreatedOn) as dtmDate from t_ms_feedback_received where bitDeletedFlag=0   AND intFeedbackCollectedBy=3  and intFeedbackStatus>0 and  date(dtmCreatedOn) BETWEEN @p_fromDate AND @p_toDate ';
	IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
     /*IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
    END IF;*/
    IF(@p_intCreatedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intRequestedById=',@p_intCreatedBy);
    END IF;
  
  SET @P_SQL=CONCAT(@P_SQL,' group by date(dtmCreatedOn) ORDER BY dtmDate ASC ');
  -- select @P_SQL;
  PREPARE STMT FROM @P_SQL;
EXECUTE STMT; 
    END IF;
#For Total Outbound call details
IF(P_ACTION='GTO')THEN

   SET @P_SQL= 'select (select count(*) from t_ms_feedback_received A left join  t_ms_outbound_data B on (B.intOutboundDataId=A.intOutboundDataId) where A.intFeedbackCollectedBy=1 AND B.intFeedbackStatus=1';
   IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
     IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
    IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
   SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
  END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ) as totalDepartment,(select count(*) from t_ms_feedback_received A left join  t_ms_outbound_data B on (B.intOutboundDataId=A.intOutboundDataId) where A.intFeedbackCollectedBy=2 AND B.intFeedbackStatus=1 ');
   IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
     IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
    IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
    SET @P_SQL=CONCAT(@P_SQL,' )  as totalContactCenter from t_ms_feedback_received FA LIMIT 1');
    #SELECT @P_SQL;
PREPARE STMT FROM @P_SQL;
EXECUTE STMT; 

END IF;

#For OutBound Call Summary
IF(P_ACTION='GOC')THEN
   SET @P_SQL= 'SELECT COUNT(*) AS Total,(SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 1 AND intFeedbackCollectedBy != 1';
    IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
   SET @P_SQL=CONCAT(@P_SQL,' ) AS callRecieved, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 2 AND intFeedbackCollectedBy != 1 ');
   IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
   SET @P_SQL=CONCAT(@P_SQL,' ) AS notRechable, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 3 AND intFeedbackCollectedBy != 1 '); 
   IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ) AS invalidNo, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 4 AND intFeedbackCollectedBy != 1 ');
     IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ) AS notPicked, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus in (5,6) AND intFeedbackCollectedBy != 1 ');
     IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
     SET @P_SQL=CONCAT(@P_SQL,' ) AS notIntrested, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 12 AND intFeedbackCollectedBy != 1 ');
    IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
      SET @P_SQL=CONCAT(@P_SQL,' ) AS govServant, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 0 AND intFeedbackCollectedBy != 1 ');
	IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
      SET @P_SQL=CONCAT(@P_SQL,' ) AS notCalled, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 7 AND intFeedbackCollectedBy != 1 ');
     IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
      SET @P_SQL=CONCAT(@P_SQL,' ) AS CallLetter, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 8 AND intFeedbackCollectedBy != 1 ');
	IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
      SET @P_SQL=CONCAT(@P_SQL,' ) AS NoIncomFacility, (SELECT COUNT(*) FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON (A.intOutboundDataId = B.intOutboundDataId) WHERE A.intFeedbackStatus = 9 AND intFeedbackCollectedBy != 1 ');
     IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
     SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
   END IF;
     SET @P_SQL=CONCAT(@P_SQL,' ) AS switchedOff FROM t_ms_feedback_received MSO WHERE DATE(MSO.dtmCreatedOn) BETWEEN ',@p_fromDate,' AND ',@p_toDate,' LIMIT 1');
PREPARE STMT FROM @P_SQL;
EXECUTE STMT; 

END IF;
IF(P_ACTION='GLD')THEN
  SELECT MSSR.intServiceRegistrationId,MSSR.vchServiceName,MD.vchDeptName,(SELECT count(*) FROM t_ms_outbound_data B where B.bitDeletedFlag=0 and MSSR.intServiceRegistrationId=B.intServiceId) as srvcTransaction,(select count(*) from t_ms_feedback_received C left join  t_ms_outbound_data B on (B.intOutboundDataId=C.intOutboundDataId) where MSSR.intServiceRegistrationId=B.intServiceId) as calls FROM m_ms_service_registration AS MSSR LEFT JOIN m_department AS MD ON MSSR.intDepartmentId=MD.intDeptId WHERE MSSR.bitDeletedFlag=0;

END IF;
IF(P_ACTION='GPD')THEN
  SET @P_SQL = 'SELECT  A.intServiceId, count(*) as totalDepart from t_ms_outbound_data A WHERE 1=1 ';
	/*IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;*/
    
    IF(@p_intDistrictId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND A.intDistrictId=',@p_intDistrictId);
    END IF;
    IF(@p_intCreatedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intCreatedBy=',@p_intCreatedBy);
    END IF;
	/*IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
	ELSE 
	 SET @P_SQL=CONCAT(@P_SQL,' AND A.intServiceId in(1,2)');
    END IF;*/
    SET @P_SQL=CONCAT(@P_SQL,' group by A.intServiceId');
	#SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
END IF;
IF(P_ACTION='GPI')THEN
  SET @P_SQL = 'SELECT count(*) as totalCalls from vw_ms_pull_data as A  WHERE dataType=2 ';
  IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
   IF(@p_intCreatedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intCreatedBy=',@p_intCreatedBy);
    END IF;
	IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
    ELSE 
	 SET @P_SQL=CONCAT(@P_SQL,' AND A.intDepartmentId in(12,14)');  
    END IF;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
  
END IF;
IF(P_ACTION='GCS')THEN
	SET @P_SQL = 'SELECT (CASE WHEN A.intCallThrough=1 THEN "callCenter" ELSE "auth" END) As callSent ,count(*) as totalCallSent from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where A.intFeedbackStatus = 1 and  A.intFeedbackCollectedBy IN(3) AND A.bitDeletedFlag= 0';
	/*IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;*/
   IF(@p_intCreatedBy>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	/*IF(@p_intDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;*/
     SET @P_SQL=CONCAT(@P_SQL,' Group By A.intCallThrough');
     #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;

	
  
END IF;
IF(P_ACTION='DVC')THEN
 SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
 SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
 SET @P_FIRST_DATA_DATE_SQL = '(SELECT date(A.dtmCreatedOn) as dtmCreatedOn into @FIRST_DATA_DATE FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) WHERE  A.intFeedbackCollectedBy=3 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1';
 /*IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;*/
  IF(@p_intCreatedBy>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	/*IF(@p_intDepartmentId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;*/
    
    SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' ORDER BY dtmCreatedOn ASC LIMIT 1)');
    PREPARE FIRST_DATA_DATE_STMT FROM @P_FIRST_DATA_DATE_SQL;
	EXECUTE FIRST_DATA_DATE_STMT;
	SET @NOOF_DAYS =(select DATEDIFF(curdate() ,@FIRST_DATA_DATE))+1;
	
 SET @P_TODAYCNT_SQL = 'SELECT count(*) INTO @TODAYCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0)  where date(A.dtmCreatedOn) =curdate()  AND A.intFeedbackCollectedBy=3 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_WEEKCNT_SQL = 'SELECT count(*) INTO @WEEKCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0)  where date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_WEEK and curdate()  AND A.intFeedbackCollectedBy=3 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_MONTHCNT_SQL = 'SELECT count(*) INTO @MONTHCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_MONTH and curdate()  AND A.intFeedbackCollectedBy=3 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_TOTALCNT_SQL = 'SELECT count(*) INTO @TOTALCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy=3 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
	IF(@p_intCreatedBy>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	IF(@p_intDepartmentId>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
    PREPARE TODAYCNT_STMT FROM @P_TODAYCNT_SQL;
	EXECUTE TODAYCNT_STMT;
	PREPARE WEEKCNT_STMT FROM @P_WEEKCNT_SQL;
	EXECUTE WEEKCNT_STMT;   
    PREPARE MONTHCNT_STMT FROM @P_MONTHCNT_SQL;
	EXECUTE MONTHCNT_STMT; 
    PREPARE TOTALCNT_STMT FROM @P_TOTALCNT_SQL;
	EXECUTE TOTALCNT_STMT;
   #SELECT  @P_MONTHCNT_SQL;
	SET @P_AVGCNT_SQL = 'SELECT ROUND(CAST(@TOTALCNT AS decimal) / CAST(@NOOF_DAYS  AS decimal),2) INTO @AVGCNT';
	PREPARE AVGCNT_STMT FROM @P_AVGCNT_SQL;
	EXECUTE AVGCNT_STMT;
	SELECT  @TODAYCNT AS TODAYCNT,@WEEKCNT AS WEEKCNT,@MONTHCNT AS MONTHCNT,@AVGCNT as AVGCNT;
END IF;
IF(P_ACTION='DVCC')THEN
 SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
 SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
 SET @P_FIRST_DATA_DATE_SQL = '(SELECT date(A.dtmCreatedOn) as dtmCreatedOn into @FIRST_DATA_DATE FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) WHERE  A.intFeedbackCollectedBy=2 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1';
 /*IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;*/
    IF(@p_intDistrictId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND B.intDistrictId=',@p_intDistrictId);
    END IF; 
    
   /* IF(@p_intDepartmentId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;
    */
    IF(@p_intCreatedBy>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	/*IF(@p_intDepartmentId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;*/
    
    SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' ORDER BY dtmCreatedOn ASC LIMIT 1)');
    PREPARE FIRST_DATA_DATE_STMT FROM @P_FIRST_DATA_DATE_SQL;
	EXECUTE FIRST_DATA_DATE_STMT;
	SET @NOOF_DAYS =(select DATEDIFF(curdate() ,@FIRST_DATA_DATE))+1;
	
 SET @P_TODAYCNT_SQL = 'SELECT count(*) INTO @TODAYCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0)  where date(A.dtmCreatedOn) =curdate()  AND A.intFeedbackCollectedBy=2 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_WEEKCNT_SQL = 'SELECT count(*) INTO @WEEKCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0)  where date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_WEEK and curdate()  AND A.intFeedbackCollectedBy=2 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_MONTHCNT_SQL = 'SELECT count(*) INTO @MONTHCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_MONTH and curdate()  AND A.intFeedbackCollectedBy=2 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 SET @P_TOTALCNT_SQL = 'SELECT count(*) INTO @TOTALCNT from t_ms_feedback_received A LEFT JOIN t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId AND B.bitDeletedFlag=0) where  A.intFeedbackCollectedBy=2 AND  A.bitDeletedFlag=0 AND A.intFeedbackStatus=1 ';
 IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
	/*IF(@p_intCreatedBy>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;*/
	/*IF(@p_intDepartmentId>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
    END IF;*/
    PREPARE TODAYCNT_STMT FROM @P_TODAYCNT_SQL;
	EXECUTE TODAYCNT_STMT;
	PREPARE WEEKCNT_STMT FROM @P_WEEKCNT_SQL;
	EXECUTE WEEKCNT_STMT;   
    PREPARE MONTHCNT_STMT FROM @P_MONTHCNT_SQL;
	EXECUTE MONTHCNT_STMT; 
    PREPARE TOTALCNT_STMT FROM @P_TOTALCNT_SQL;
	EXECUTE TOTALCNT_STMT;
   -- SELECT  @P_MONTHCNT_SQL;
	SET @P_AVGCNT_SQL = 'SELECT ROUND(CAST(@TOTALCNT AS decimal) / CAST(@NOOF_DAYS  AS decimal),2) INTO @AVGCNT';
	PREPARE AVGCNT_STMT FROM @P_AVGCNT_SQL;
	EXECUTE AVGCNT_STMT;
	SELECT  @TODAYCNT AS TODAYCNT,@WEEKCNT AS WEEKCNT,@MONTHCNT AS MONTHCNT,@AVGCNT as AVGCNT;
END IF;
IF(P_ACTION='DVI')THEN
  SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
 SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
 SET @P_FIRST_DATA_DATE_SQL = '(SELECT date(dtmCreatedOn) as dtmCreatedOn  into @FIRST_DATA_DATE FROM t_ms_outbound_data WHERE bitDeletedFlag=0 ';
  IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,'  AND FIND_IN_SET(int_hs_ps_id,"',@p_intPolicestationId,'")');
  END IF;
   # IF(@p_intDepartmentId>0)THEN
     #SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND intDepartmentId=',@p_intDepartmentId);
  #END IF;
  IF(@p_intCreatedBy>0)THEN
      SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	SET @P_FIRST_DATA_DATE_SQL=CONCAT(@P_FIRST_DATA_DATE_SQL,' ORDER BY dtmCreatedOn ASC LIMIT 1)');
    PREPARE FIRST_DATA_DATE_STMT FROM @P_FIRST_DATA_DATE_SQL;
	EXECUTE FIRST_DATA_DATE_STMT; 
 SET @NOOF_DAYS =(select DATEDIFF(curdate() ,@FIRST_DATA_DATE))+1;
 
  SET @P_TODAYCNT_SQL ='SELECT count(*) INTO @TODAYCNT from t_ms_outbound_data A  where   date(A.dtmCreatedOn) =curdate()  AND A.bitDeletedFlag=0';
  SET @P_WEEKCNT_SQL = 'SELECT count(*) INTO @WEEKCNT from t_ms_outbound_data A  where   date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_WEEK and curdate()  AND A.bitDeletedFlag=0';

SET @P_MONTHCNT_SQL = 'SELECT count(*) INTO @MONTHCNT from t_ms_inbound_data A  where   date(A.dtmCreatedOn)  BETWEEN @FIRST_DATE_MONTH and curdate()  AND A.bitDeletedFlag=0';
SET @P_TOTALCNT_SQL = 'SELECT count(*) INTO @TOTALCNT from t_ms_outbound_data A  where A.bitDeletedFlag=0';
 IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
  SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
  SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
  SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
  SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,'  AND FIND_IN_SET(A.int_hs_ps_id,"',@p_intPolicestationId,'")');
END IF;
IF(@p_intCreatedBy>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND A.intRequestedById=',@p_intCreatedBy);
    END IF;
	IF(@p_intDepartmentId>0)THEN
      SET @P_TODAYCNT_SQL=CONCAT(@P_TODAYCNT_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
      SET @P_WEEKCNT_SQL=CONCAT(@P_WEEKCNT_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
      SET @P_MONTHCNT_SQL=CONCAT(@P_MONTHCNT_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
      SET @P_TOTALCNT_SQL=CONCAT(@P_TOTALCNT_SQL,' AND A.intDepartmentId=',@p_intDepartmentId);
    END IF;
#SELECT @P_MONTHCNT_SQL;
	PREPARE TODAYCNT_STMT FROM @P_TODAYCNT_SQL;
	EXECUTE TODAYCNT_STMT;
	PREPARE WEEKCNT_STMT FROM @P_WEEKCNT_SQL;
	EXECUTE WEEKCNT_STMT;   
	PREPARE MONTHCNT_STMT FROM @P_MONTHCNT_SQL;
	EXECUTE MONTHCNT_STMT; 
	PREPARE TOTALCNT_STMT FROM @P_TOTALCNT_SQL;
	EXECUTE TOTALCNT_STMT;
	SET @P_AVGCNT_SQL = 'SELECT ROUND(CAST(@TOTALCNT AS decimal) / CAST(@NOOF_DAYS  AS decimal),2) INTO @AVGCNT';
	PREPARE AVGCNT_STMT FROM @P_AVGCNT_SQL;
	EXECUTE AVGCNT_STMT;
	SELECT  @TODAYCNT AS TODAYCNT,@WEEKCNT AS WEEKCNT,@MONTHCNT AS MONTHCNT,@AVGCNT as AVGCNT;
END IF;
IF(P_ACTION='VR')THEN
 SET @FIRST_DATE_WEEK  = (SELECT SUBDATE(curdate(), dayofweek(curdate()) - 1));
 SET @FIRST_DATE_MONTH = (SELECT last_day(curdate() - interval 1 month) + interval 1 day);
 SET @NOOF_DAYS =(select DATEDIFF(curdate() ,@FIRST_DATE_MONTH));
 
 SELECT ROUND(AVG(intOverallRating),1) INTO @TODAYCNT from t_ms_feedback_received A  where  A.intFeedbackCollectedBy!=1 AND A.intFeedbackStatus=1 AND A.intOverallRating>0 AND date(A.dtmFeedbackRcvTime) =curdate();
 SELECT ROUND(AVG(intOverallRating),1)  INTO @WEEKCNT from t_ms_feedback_received A  where  A.intFeedbackCollectedBy!=1 AND A.intFeedbackStatus=1 AND A.intOverallRating>0 AND date(A.dtmFeedbackRcvTime)  BETWEEN @FIRST_DATE_WEEK and curdate();

SELECT ROUND(AVG(intOverallRating),1)  INTO @MONTHCNT from t_ms_feedback_received A  where  A.intFeedbackCollectedBy!=1 AND A.intFeedbackStatus=1  AND A.intOverallRating>0 AND date(A.dtmFeedbackRcvTime)  BETWEEN @FIRST_DATE_MONTH and curdate();

SELECT ROUND(AVG(intOverallRating),1)  INTO @AVGCNT from t_ms_feedback_received A  where  A.intFeedbackCollectedBy!=1 AND A.intFeedbackStatus=1 AND A.intOverallRating>0;

 SELECT @TODAYCNT AS TODAYCNT,@WEEKCNT AS WEEKCNT,@MONTHCNT AS MONTHCNT, @AVGCNT as AVGCNT ;
END IF;
 IF(P_ACTION='GMH') THEN
 
 SET @P_SQL = 'SELECT intHospitalId, vchHospitalName, intDistrictId, vchEmail, bigContactNo, intBlockId, intGPId, bitDeletedFlag, intCreatedBy, dtmCreatedOn FROM m_ms_hospital WHERE bitDeletedFlag=0';
        IF(@p_intHospitalId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intHospitalId=',@p_intHospitalId);
        END IF;
        IF(@p_intDistrictId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDistrictId=',@p_intDistrictId);
        END IF;
        SET @P_SQL = CONCAT(@P_SQL,' Order by vchHospitalName ASC ');
        
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
 END IF;
  IF(P_ACTION='GMP') THEN
 
 SET @P_SQL = 'SELECT intPolicestationId, vchPolicestationName, vchPSCode, dtmCreatedOn, intCreatedBy, bitDeletedFlag, intDistrictId, intConsoleDistId, intBlockId, intGPId FROM m_ms_police_station WHERE bitDeletedFlag=0';
        IF(@p_intPolicestationId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intPolicestationId=',@p_intPolicestationId);
        END IF;
        IF(@p_intDistrictId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intConsoleDistId=',@p_intDistrictId);
        END IF;
        SET @P_SQL = CONCAT(@P_SQL,' Order by vchPolicestationName ASC ');
        
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
 END IF;
 
 IF(P_ACTION='GCC')THEN
	SET @P_OUT_SQL = 'select count(*) into @outbound from t_ms_feedback_received A left join t_ms_outbound_data B ON(A.intOutboundDataId=B.intOutboundDataId) WHERE A.intFeedbackStatus = 1 AND A.intFeedbackCollectedBy IN(2) AND A.intCallThrough=1 ';
  #SET @P_IN_SQL = 'SELECT count(*) into @inbound FROM vw_ms_pull_data C WHERE C.dataType=2 ';
	IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_OUT_SQL=CONCAT(@P_OUT_SQL,'  AND FIND_IN_SET(B.int_hs_ps_id,"',@p_intPolicestationId,'")');
      #SET @P_IN_SQL=CONCAT(@P_IN_SQL,'  AND FIND_IN_SET(C.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
   IF(@p_intCreatedBy>0)THEN
      SET @P_OUT_SQL=CONCAT(@P_OUT_SQL,' AND B.intRequestedById=',@p_intCreatedBy);
      #SET @P_IN_SQL=CONCAT(@P_IN_SQL,' AND C.intRequestedById=',@p_intCreatedBy);
    END IF;
	IF(@p_intDepartmentId>0)THEN
      SET @P_OUT_SQL=CONCAT(@P_OUT_SQL,' AND B.intDepartmentId=',@p_intDepartmentId);
      #SET @P_IN_SQL=CONCAT(@P_IN_SQL,' AND C.intDepartmentId=',@p_intDepartmentId);
    END IF;
    IF(@p_intDistrictId>0)THEN
      SET @P_OUT_SQL=CONCAT(@P_OUT_SQL,' AND B.intDistrictId=',@p_intDistrictId);      
    END IF;
    
     SET @P_OUT_SQL=CONCAT(@P_OUT_SQL,' Group By A.intCallThrough');
     #SELECT @P_OUT_SQL;
     PREPARE OUT_STMT FROM @P_OUT_SQL;
	 EXECUTE OUT_STMT;
     #SELECT @P_IN_SQL;
     #PREPARE IN_STMT FROM @P_IN_SQL;
	 #EXECUTE IN_STMT;
	SET @P_SQL = 'SELECT @outbound as outbound';
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;

	
  
END IF;
 IF(P_ACTION='PGM')THEN
	SET @START_REC=@p_intRecno;
	SET @P_SQL = 'select D.intDepartmentId,B.dtmCreatedOn as calledDate,D.int_hs_ps_id,B.intFeedbackRecId,B.intOutboundDataId,B.dtmFeedbackRcvTime,B.intFeedbackStatus,B.intFeedbackReceivedBy,B.intByDesignationId,B.intByDesignationId,B.intCallBackRequest,B.intFeedbackCollectedBy,B.dtmCreatedOn,B.intCreatedBy,B.intCallType,B.intCallThrough,B.intDirectCallFeedbackStatus,D.intOutboundDataId,D.dataType,D.intDepartmentId,D.intServiceId,D.intDistrictId,D.vchName,D.intMobile,D.int_hs_ps_id,D.intFeedbackStatus,D.intRequestStatus,E.vchDeptName,E.vchDeptName,F.VCH_VALUE_NAME as districtName,G.vchServiceName,D.dataType,D.jsonRelatedInfo,D.dtmRegdDateTime,D.vchRegdNo,D.intGender,D.intAge,CASE WHEN (D.dataType=1 ) THEN "Outbound" ELSE "Outbound" END as vchType,(SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=B.intOutboundDataId)totalCalls,(CASE WHEN (D.intDepartmentId=12) THEN (SELECT vchHospitalName FROM m_ms_hospital as H WHERE H.intHospitalId=D.int_hs_ps_id) ELSE (SELECT vchPolicestationName FROM m_ms_police_station as P WHERE P.intPolicestationId=D.int_hs_ps_id) END)institutionName FROM t_ms_feedback_received B left join vw_ms_pull_data D ON(B.intOutboundDataId=D.intOutboundDataId) LEFT JOIN m_department E ON E.intDeptId=D.intDepartmentId LEFT JOIN m_admin_subnode_values F ON D.intDistrictId = F.INT_SUBNODEVAL_ID LEFT JOIN m_ms_service_registration G ON D.intServiceId = G.intServiceRegistrationId where B.intFeedbackStatus = 1  AND B.bitDeletedFlag=0 ';
     IF(@p_deptFilter>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
    END IF;
	IF(@p_outBoundId>0)THEN
		IF(@p_deptCC>0 AND @p_deptCC='14545') THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"2")');
        ELSEIF(@p_deptCC>0 AND @p_deptCC!='14545' && @p_outBoundId!='2,3' AND @p_outBoundId!='3,2')THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"3")');
        ELSE
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")');
        END IF;
    END IF;
    IF(@p_district_Id>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intDistrictId=',@p_district_Id);
    END IF;
	IF(@p_callType>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=',@p_callType);
    END IF;
    IF(@p_intCallThrough>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND B.intCallThrough=',@p_intCallThrough);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
   IF(@p_fromDate>0 AND @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
	ELSEIF(@p_fromDate>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) >="',@p_fromDate,'"');
	ELSEIF(@p_toDate>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) <="',@p_toDate,'"');
    END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY B.dtmCreatedOn DESC LIMIT ?,50');
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT USING @START_REC;
 END IF;
  IF(P_ACTION='VM')THEN
	SET @P_SQL = 'select D.intDepartmentId,B.dtmCreatedOn as calledDate,D.int_hs_ps_id,B.intFeedbackRecId,B.intOutboundDataId,B.dtmFeedbackRcvTime,B.intFeedbackStatus,B.intFeedbackReceivedBy,B.intByDesignationId,B.intByDesignationId,B.intCallBackRequest,B.intFeedbackCollectedBy,B.dtmCreatedOn,B.intCreatedBy,B.intCallType,B.intCallThrough,B.intDirectCallFeedbackStatus,D.intOutboundDataId,D.dataType,D.intDepartmentId,D.intServiceId,D.intDistrictId,D.vchName,D.intMobile,D.int_hs_ps_id,D.intFeedbackStatus,D.intRequestStatus,E.vchDeptName,E.vchDeptName,F.VCH_VALUE_NAME as districtName,G.vchServiceName,D.dataType,D.jsonRelatedInfo,D.dtmRegdDateTime,D.vchRegdNo,D.intGender,D.intAge,CASE WHEN (D.dataType=1 ) THEN "Outbound" ELSE "Outbound" END as vchType,(SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=B.intOutboundDataId)totalCalls,(CASE WHEN (D.intDepartmentId=12) THEN (SELECT vchHospitalName FROM m_ms_hospital as H WHERE H.intHospitalId=D.int_hs_ps_id) ELSE (SELECT vchPolicestationName FROM m_ms_police_station as P WHERE P.intPolicestationId=D.int_hs_ps_id) END)institutionName FROM t_ms_feedback_received B left join vw_ms_pull_data D ON(B.intOutboundDataId=D.intOutboundDataId) LEFT JOIN m_department E ON E.intDeptId=D.intDepartmentId LEFT JOIN m_admin_subnode_values F ON D.intDistrictId = F.INT_SUBNODEVAL_ID LEFT JOIN m_ms_service_registration G ON D.intServiceId = G.intServiceRegistrationId where B.intFeedbackStatus = 1 AND B.bitDeletedFlag=0 ';
    IF(@p_deptFilter>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
    END IF;
	IF(@p_outBoundId>0)THEN
		IF(@p_deptCC>0 AND @p_deptCC='14545') THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"2")');
        ELSEIF(@p_deptCC>0 AND @p_deptCC!='14545' && @p_outBoundId!='2,3' AND @p_outBoundId!='3,2')THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"3")');
        ELSE
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")');
        END IF;
    END IF;
	IF(@p_district_Id>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intDistrictId=',@p_district_Id);
    END IF;
    IF(@p_callType>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=',@p_callType);
		#SET @P_SQL=CONCAT(@P_SQL,' AND B.intCallType=',@p_callType);
    END IF;
     IF(@p_intCallThrough>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND B.intCallThrough=',@p_intCallThrough);
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
    IF(@p_fromDate>0 AND @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
	ELSEIF(@p_fromDate>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) >="',@p_fromDate,'"');
	ELSEIF(@p_toDate>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) <="',@p_toDate,'"');
    END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY B.dtmCreatedOn DESC');
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
 END IF;
IF(P_ACTION='PGI')THEN
	SET @START_REC=@p_intRecno;
	SET @P_SQL = 'SELECT D.*,E.vchDeptName,E.vchDeptName,F.VCH_VALUE_NAME as districtName,G.vchServiceName,CASE WHEN (D.dataType=1 ) THEN "Inbound" ELSE "Inbound" END as vchType,(SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2)totalCalls,(SELECT H.dtmCreatedOn FROM t_ms_feedback_received as H WHERE H.intOutboundDataId=D.intOutboundDataId AND H.intCallType=2 ORDER BY H.dtmCreatedOn DESC LIMIT 1)calledDate,(CASE WHEN (D.intDepartmentId=12) THEN (SELECT vchHospitalName FROM m_ms_hospital as H WHERE H.intHospitalId=D.int_hs_ps_id) ELSE (SELECT vchPolicestationName FROM m_ms_police_station as P WHERE P.intPolicestationId=D.int_hs_ps_id) END)institutionName FROM vw_ms_pull_data D LEFT JOIN m_department E ON E.intDeptId=D.intDepartmentId LEFT JOIN m_admin_subnode_values F ON D.intDistrictId = F.INT_SUBNODEVAL_ID LEFT JOIN m_ms_service_registration G ON D.intServiceId = G.intServiceRegistrationId WHERE 1=1';
     #IF(@p_deptFilter>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
    #END IF;
	#IF(@p_outBoundId>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")');
    #END IF;
    IF(@p_district_Id>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intDistrictId=',@p_district_Id);
    END IF;
    IF(@p_intServiceId>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intServiceId=',@p_intServiceId);
    END IF;
     IF(@p_intCalledId>0)THEN
		IF(@p_intCalledId=1) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND (SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2) >=1');
		ELSEIF(@p_intCalledId=2)THEN
        SET @P_SQL=CONCAT(@P_SQL,' AND (SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2) =0');
		END IF;
    END IF;
    IF(@p_deptSel1>0 AND @p_deptSel1=2)THEN
      IF(@p_deptFilter=0) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
            SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"12,14")');  
		else
			IF(@p_deptCC>0 && @p_deptCC='14545')THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
			ELSEIF(@p_deptSel1>0 AND @p_deptSel1=2 && @p_deptFilter>0) THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType IN(1,2)');
			ELSEIF (@p_deptCC>0 && @p_deptCC!='14545')THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=1');
             ELSE
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
			 END IF;
			 SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
        END IF;    
	ELSEIF (@p_deptSel1=0 )THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=1');
      IF(@p_deptFilter>0) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
		END IF;
    END IF;
	#IF(@p_callType>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=',@p_callType);
    #END IF;
    IF(@p_fromDate>0 OR @p_toDate>0)THEN
		IF(@p_callType=2 AND @p_deptCC='14545') THEN
			 SET @P_SQL=CONCAT(@P_SQL,' AND date(D.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
	    ELSE 
			SET @P_SQL=CONCAT(@P_SQL,' AND date(D.dtmRegdDateTime) between "',@p_fromDate,'" AND "',@p_toDate,'"');
        END IF;
    END IF;
     IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY D.dtmCreatedOn DESC LIMIT ?,50');
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT USING @START_REC;
 END IF;
  IF(P_ACTION='VI')THEN
	SET @P_SQL = 'SELECT D.*,E.vchDeptName,E.vchDeptName,F.VCH_VALUE_NAME as districtName,G.vchServiceName,CASE WHEN (D.dataType=1 ) THEN "Inbound" ELSE "Inbound" END as vchType,(SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2)totalCalls,(SELECT H.dtmCreatedOn FROM t_ms_feedback_received as H WHERE H.intOutboundDataId=D.intOutboundDataId AND H.intCallType=2 ORDER BY H.dtmCreatedOn DESC LIMIT 1)calledDate,(CASE WHEN (D.intDepartmentId=12) THEN (SELECT vchHospitalName FROM m_ms_hospital as H WHERE H.intHospitalId=D.int_hs_ps_id) ELSE (SELECT vchPolicestationName FROM m_ms_police_station as P WHERE P.intPolicestationId=D.int_hs_ps_id) END)institutionName FROM vw_ms_pull_data D LEFT JOIN m_department E ON E.intDeptId=D.intDepartmentId LEFT JOIN m_admin_subnode_values F ON D.intDistrictId = F.INT_SUBNODEVAL_ID LEFT JOIN m_ms_service_registration G ON D.intServiceId = G.intServiceRegistrationId WHERE 1=1 ';
    #IF(@p_deptFilter>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
    #END IF;
	#IF(@p_outBoundId>0)THEN
		#SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(B.intFeedbackCollectedBy,"',@p_outBoundId,'")');
    #END IF;
	IF(@p_district_Id>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intDistrictId=',@p_district_Id);
    END IF;
    IF(@p_intServiceId>0)THEN
		SET @P_SQL=CONCAT(@P_SQL,' AND D.intServiceId=',@p_intServiceId);
    END IF;
    IF(@p_intCalledId>0)THEN
		IF(@p_intCalledId=1) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND (SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2) >=1');
		ELSEIF(@p_intCalledId=2)THEN
        SET @P_SQL=CONCAT(@P_SQL,' AND (SELECT count(*) FROM t_ms_feedback_received as G WHERE G.intOutboundDataId=D.intOutboundDataId AND G.intCallType=2) =0');
		END IF;
    END IF;
	IF((@p_deptSel1>0 AND @p_deptSel1=2) OR @p_deptCC>0)THEN
		 IF(@p_deptFilter=0) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
            SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"12,14")');  
		else
			 IF(@p_deptCC>0 && @p_deptCC='14545')THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
            ELSEIF(@p_deptSel1>0 AND @p_deptSel1=2 && @p_deptFilter>0) THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType IN(1,2)');
			ELSEIF (@p_deptCC>0 && @p_deptCC!='14545')THEN
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=1');
             ELSE
				SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=2');
			 END IF;
			 SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
        END IF;
	ELSEIF (@p_deptSel1=0 )THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND D.dataType=1');
       IF(@p_deptFilter>0) THEN
			SET @P_SQL=CONCAT(@P_SQL,' AND FIND_IN_SET(D.intDepartmentId,"',@p_deptFilter,'")');
		END IF;
    END IF;
      IF(@p_fromDate>0 OR @p_toDate>0)THEN
		IF(@p_callType=2 AND @p_deptCC='14545') THEN
			 SET @P_SQL=CONCAT(@P_SQL,' AND date(D.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
	    ELSE 
			SET @P_SQL=CONCAT(@P_SQL,' AND date(D.dtmRegdDateTime) between "',@p_fromDate,'" AND "',@p_toDate,'"');
        END IF;
    END IF;
    IF(@p_int_hs_ps_id>0 AND @p_intPolicestationId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,'  AND FIND_IN_SET(D.int_hs_ps_id,"',@p_intPolicestationId,'")');
    END IF;
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY D.dtmCreatedOn DESC');
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
 END IF;
 
 IF(P_ACTION='GFD')THEN
  SELECT A.intOutboundDataId,date(A.dtmCreatedOn) as dtmCreatedOn, CASE WHEN A.intFeedbackCollectedBy=1 THEN 'Department' WHEN A.intFeedbackCollectedBy=1 THEN 'Contact Center' ELSE 'Authority' END as vchCallect, CASE WHEN A.intCallType=1 THEN 'Outbound' ELSE 'Inbound' END as vchType, CASE WHEN A.intCallThrough=1 THEN 'Contact Center' ELSE 'Self' END as vchCall ,B.VCH_FULL_NAME FROM mosarkardev_DB.t_ms_feedback_received as A LEFT JOIN m_admin_user B ON A.intRequestedById=B.INT_USER_ID where A.bitDeletedFlag=0 AND A.intOutboundDataId=@p_intOutboundDataId ORDER BY date(A.dtmCreatedOn) DESC;
END IF;
 IF(P_ACTION='FAI')THEN
	IF(@p_intDepartmentId=14)THEN
		SELECT intPolicestationId as intInstitutionId,vchPolicestationName as vchInstitutionName FROM m_ms_police_station WHERE bitDeletedFlag=0;
    ELSE
		SELECT intHospitalId as intInstitutionId,vchHospitalName as vchInstitutionName FROM m_ms_hospital WHERE bitDeletedFlag=0;
    END IF;
END IF;
IF(P_ACTION='GN')THEN
	SELECT A.*,B.VCH_FULL_NAME FROM t_ms_notification_logs AS A LEFT JOIN m_admin_user AS B ON A.intCreatedBy=B.INT_USER_ID  WHERE intStatus=0 LIMIT 1;
	SELECT B.intNotificationLogId INTO @ID FROM t_ms_notification_logs AS B WHERE B.intStatus=0 LIMIT 1;
	UPDATE t_ms_notification_logs SET intStatus=1 WHERE intNotificationLogId=  @ID;
END IF;

 IF(P_ACTION='FAST') THEN
 
 SET @P_SQL = 'SELECT intSchemeTypeId, intDepartmentId, intServiceId, vchSchemeTypeName, intCreatedBy, stmCreatedOn, intUpdatedBy, dtmUpdatedOn, bitDeletedFlag, tinPublishStatus FROM m_fs_scheme_type WHERE bitDeletedFlag=0';
        IF(@p_intSchemeTypeId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intSchemeTypeId=',@p_intSchemeTypeId);
        END IF;
        IF(@p_intServiceId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServiceId);
        END IF;
        SET @P_SQL = CONCAT(@P_SQL,' Order by vchSchemeTypeName ASC ');
        
        PREPARE STMT FROM @P_SQL;
        EXECUTE STMT;
 END IF;
 
 
 
 IF(P_ACTION='PGCS') THEN
                    SET @START_REC=@p_intRecno;
					SET @P_SQL = CONCAT('SELECT intOutboundDataId, intDepartmentId, intServiceId, intSchemeTypeId, intCardTypeId, intDistrictId, intBlockId, intGPId, intVillageId, vchName, intMobile, intAge, intGender, int_hs_ps_id, dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime, dtmFeedbackRcvTime, intFeedbackStatus, dtmCreatedOn, intCreatedThrough, bitDeletedFlag, intRequestStatus, vchRegdNo, intMoSarkarRegistrationStatus, vchRationCardNo, intNoFamily, vchTokenNo, dtmPaddyDeposite,(select vchServiceName from m_ms_service_registration A where A.bitDeletedFlag=0 and A.intServiceRegistrationId =T.intServiceId) As vchServiceName,
                    (select VCH_VALUE_NAME from m_admin_subnode_values A where A.BIT_DELETED_FLAG=0 and A.INT_SUBNODEVAL_ID =T.intDistrictId) As vchDistrictName,
                    (select vchSchemeTypeName from m_fs_scheme_type A where A.bitDeletedFlag=0 and A.intSchemeTypeId =T.intSchemeTypeId) As vchSchemeTypeName
                    FROM t_ms_outbound_data T where bitDeletedFlag=0 ') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC   LIMIT ?,',@p_intPgSize);
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT USING @START_REC;
					END IF; 

 
 IF(P_ACTION='VCS') THEN
                   
					SET @P_SQL = CONCAT('SELECT intOutboundDataId, intDepartmentId, intServiceId, intSchemeTypeId, intCardTypeId, intDistrictId, intBlockId, intGPId, intVillageId, vchName, intMobile, intAge, intGender, int_hs_ps_id, dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime, dtmFeedbackRcvTime, intFeedbackStatus, dtmCreatedOn, intCreatedThrough, bitDeletedFlag, intRequestStatus, vchRegdNo, intMoSarkarRegistrationStatus, vchRationCardNo, intNoFamily, vchTokenNo, dtmPaddyDeposite, (select vchServiceName from m_ms_service_registration A where A.bitDeletedFlag=0 and A.intServiceRegistrationId =T.intServiceId) As vchServiceName,
                    (select VCH_VALUE_NAME from m_admin_subnode_values A where A.BIT_DELETED_FLAG=0 and A.INT_SUBNODEVAL_ID =T.intDistrictId) As vchDistrictName,
                    (select vchSchemeTypeName from m_fs_scheme_type A where A.bitDeletedFlag=0 and A.intSchemeTypeId =T.intSchemeTypeId) As vchSchemeTypeName  FROM t_ms_outbound_data where bitDeletedFlag=0 ') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC ');
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT ;
					END IF; 

  IF(P_ACTION='CTCS') THEN
                   
					SET @P_SQL = CONCAT('SELECT count(1) FROM t_ms_outbound_data where bitDeletedFlag=0 ') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC ');
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT ;
					END IF; 

 IF(P_ACTION='PGCA') THEN
                    SET @START_REC=@p_intRecno;
					SET @P_SQL = CONCAT('SELECT C.intFeedbackRecId, C.intFeedbackReceivedBy, C.intByDesignationId, C.intRequestedById, C.intCallBackRequest, C.intFeedbackCollectedBy, C.intCallType, C.intCallThrough,T.intOutboundDataId, T.intDepartmentId, T.intServiceId, T.intSchemeTypeId, T.intCardTypeId, T.intDistrictId, T.intBlockId, T.intGPId, T.intVillageId, T.vchName, T.intMobile, T.intAge, T.intGender, T.int_hs_ps_id, T.dtmRegdDateTime, T.jsonRelatedInfo, T.intBookmark, T.intAssignedTo, T.dtmAssignedTime, T.dtmFeedbackRcvTime, T.intFeedbackStatus, C.dtmCreatedOn, T.intCreatedThrough, T.bitDeletedFlag, T.intRequestStatus, T.vchRegdNo, T.intMoSarkarRegistrationStatus, T.vchRationCardNo, T.intNoFamily, T.vchTokenNo, T.dtmPaddyDeposite, (select vchServiceName from m_ms_service_registration A where A.bitDeletedFlag=0 and A.intServiceRegistrationId =T.intServiceId) As vchServiceName,
                    (select VCH_VALUE_NAME from m_admin_subnode_values A where A.BIT_DELETED_FLAG=0 and A.INT_SUBNODEVAL_ID =T.intDistrictId) As vchDistrictName,
                    (select vchSchemeTypeName from m_fs_scheme_type A where A.bitDeletedFlag=0 and A.intSchemeTypeId =T.intSchemeTypeId) As vchSchemeTypeName from t_ms_feedback_received C Join t_ms_outbound_data T ON(T.intOutboundDataId=C.intOutboundDataId) where 1=1  AND C.intFeedbackStatus=1') ;  
                    
					IF(@p_intfeedbackCollectedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intFeedbackCollectedBy=',@p_intfeedbackCollectedBy);
					END IF;
                    IF(@p_intCallThrough >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intCallThrough=',@p_intCallThrough);
					END IF; -- 2 self 1 cc
                    IF(@p_AuthId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intRequestedById=',@p_AuthId);
					END IF;
                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY C.dtmCreatedOn DESC   LIMIT ?,',@p_intPgSize);
                   -- select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT USING @START_REC;
					END IF; 

 
 IF(P_ACTION='VCA') THEN
                   
					SET @P_SQL = CONCAT('SELECT C.intFeedbackRecId, C.intFeedbackReceivedBy, C.intByDesignationId, C.intRequestedById, C.intCallBackRequest, C.intFeedbackCollectedBy, C.intCallType, C.intCallThrough,T.intOutboundDataId, T.intDepartmentId, T.intServiceId, T.intSchemeTypeId, T.intCardTypeId, T.intDistrictId, T.intBlockId, T.intGPId, T.intVillageId, T.vchName, T.intMobile, T.intAge, T.intGender, T.int_hs_ps_id, T.dtmRegdDateTime, T.jsonRelatedInfo, T.intBookmark, T.intAssignedTo, T.dtmAssignedTime, T.dtmFeedbackRcvTime, T.intFeedbackStatus, C.dtmCreatedOn, T.intCreatedThrough, T.bitDeletedFlag, T.intRequestStatus, T.vchRegdNo, T.intMoSarkarRegistrationStatus, T.vchRationCardNo, T.intNoFamily, T.vchTokenNo, T.dtmPaddyDeposite, (select vchServiceName from m_ms_service_registration A where A.bitDeletedFlag=0 and A.intServiceRegistrationId =T.intServiceId) As vchServiceName,
                    (select VCH_VALUE_NAME from m_admin_subnode_values A where A.BIT_DELETED_FLAG=0 and A.INT_SUBNODEVAL_ID =T.intDistrictId) As vchDistrictName,
                    (select vchSchemeTypeName from m_fs_scheme_type A where A.bitDeletedFlag=0 and A.intSchemeTypeId =T.intSchemeTypeId) As vchSchemeTypeName from t_ms_feedback_received C Join t_ms_outbound_data T ON(T.intOutboundDataId=C.intOutboundDataId) where 1=1 AND C.intFeedbackStatus=1') ;  
                    
					IF(@p_intfeedbackCollectedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intFeedbackCollectedBy=',@p_intfeedbackCollectedBy);
					END IF;
                    IF(@p_intCallThrough >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intCallThrough=',@p_intCallThrough);
					END IF; -- 2 self 1 cc
                    IF(@p_AuthId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intRequestedById=',@p_AuthId);
					END IF;
                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY C.dtmCreatedOn DESC ');
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT ;
					END IF; 

  IF(P_ACTION='CTCA') THEN
                   
					SET @P_SQL = CONCAT('SELECT count(1) FROM  t_ms_feedback_received C Join t_ms_outbound_data T ON(T.intOutboundDataId=C.intOutboundDataId) where 1=1  AND C.intFeedbackStatus=1 ') ;                    
					IF(@p_intfeedbackCollectedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intFeedbackCollectedBy=',@p_intfeedbackCollectedBy);
					END IF;
                    IF(@p_intCallThrough >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intCallThrough=',@p_intCallThrough);
					END IF; -- 2 self 1 cc
                    IF(@p_AuthId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND C.intRequestedById=',@p_AuthId);
					END IF;
                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intServicesId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intServiceId=',@p_intServicesId);
					END IF;
                    IF(@p_intSchemeTypeId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intSchemeTypeId=',@p_intSchemeTypeId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(C.dtmCreatedOn) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					
                   
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY C.dtmCreatedOn DESC ');
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT ;
					END IF; 
 
 
 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MG_SERVICE_TRANSACTION_IMPORT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MG_SERVICE_TRANSACTION_IMPORT`(IN `P_ACTION` CHAR(4), IN `P_VALUES` mediumtext)
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
        
		SET @P_SQL = 'SELECT intSurveyQuestId FROM t_ms_survey_questionnaire where  bitDeletedFlag=0';
		IF(@p_intServiceId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intServicesId=',@p_intServiceId);
		END IF;
		IF(@p_intDepartmentId>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND intDepartmentId=',@p_intDepartmentId);
		END IF;
        IF(@p_question>0)THEN
			SET @P_SQL = CONCAT(@P_SQL,' AND vchQuestionEnglish=',@p_question);
		END IF;
		
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
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
        #IF(@p_questionSlno>0)THEN
			#SET @P_SQL = CONCAT(@P_SQL,' AND intQuestionSlNo=',@p_questionSlno);
		#END IF;
		Select @P_SQL;
		PREPARE STMT FROM @P_SQL;
		EXECUTE STMT;
        
        
        SET @M_SQL = 'SELECT GROUP_CONCAT(intSurveyOptionId) INTO @ANSWERID FROM t_ms_survey_questionnaire_option where  bitDeletedFlag=0';		
        #IF(char_length(@p_answerSlno)>0)THEN
			#SET @M_SQL = CONCAT(@M_SQL,' AND intOptionSlNo IN(',@p_answerSlno,')');
		#END IF;
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
        
        
        
        
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MOBILE_DATA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MOBILE_DATA`(
		IN	P_ACTION		VARCHAR(3),
        IN	P_STATUS		INT(11),
        IN	P_MOBILE_NO		VARCHAR(45),
        IN	P_OTP			INT(10),
        IN	P_USER_ID		INT(10),
        IN  P_ATR1          INT(11),
		IN  P_ATR2          INT(11),
		IN  P_ATR3          VARCHAR(64),
		IN  P_ATR4          VARCHAR(64)
     )
BEGIN        
        
         IF(P_ACTION='A')THEN
			INSERT INTO m_mobille_data(INT_VALID_STATUS,VCH_MOBILE_NO,INT_OTP_GEN,INT_USER_ID)
			VALUES(P_STATUS,P_MOBILE_NO,P_OTP,P_USER_ID);
            END IF;
            
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_AGENT_DASHBOARD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_AGENT_DASHBOARD`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/   
 
/*Action to read faq by:Puja kumari on dt:24-09-2019*/
  IF(P_ACTION='R') THEN
     SELECT mso.dtmRegdDateTime,mso.intAge,mso.intGender,mso.intOutboundDataId,1 as dataType,mso.vchName,mso.intMobile,mso.intDepartmentId,mso.intServiceId,dm.vchDeptName,mss.vchServiceName,ST.vchSchemeTypeName,CT.vchCardName,MSU.VCH_FULL_NAME,MSU.VCH_MOBILE_NO,MDDM.VCH_DESG_NAME,MSU.INT_DESIGNATION_ID,MSU.INT_USER_ID, mso.dtmAssignedTime, mso.vchRationCardNo, mso.intNoFamily, mso.vchTokenNo, mso.dtmPaddyDeposite,DT.VCH_VALUE_NAME AS vchDistrict FROM t_ms_outbound_data as mso LEFT JOIN m_admin_user AS MSU ON mso.intAssignedTo = MSU.INT_USER_ID LEFT JOIN m_admin_desg_master AS MDDM ON MSU.INT_DESIGNATION_ID= MDDM.INT_DESG_ID LEFT JOIN m_department as dm ON mso.intDepartmentId=dm.intDeptId LEFT JOIN m_ms_service_registration as mss ON mso.intServiceId=mss.intServiceRegistrationId LEFT JOIN m_fs_scheme_type as ST ON mso.intSchemeTypeId=ST.intSchemeTypeId LEFT JOIN m_fs_card_type as CT ON mso.intCardTypeId=CT.intCardTypeId JOIN m_admin_subnode_values DT ON(DT.INT_SUBNODEVAL_ID = mso.intDistrictId)  WHERE mso.intAssignedTo IN(SELECT INT_USER_ID FROM m_admin_user WHERE mso.bitDeletedFlag=0 AND FIND_IN_SET(INT_DESIGNATION_ID,@p_INT_DESIGNATION_ID) AND BIT_DELETED_FLAG=0 ORDER BY INT_USER_ID DESC) AND intRequestStatus=1;
    END IF;
 IF(P_ACTION='RA') THEN
	SET @P_SQL= 'select distinct(A.intOutboundDataId),A.dtmRegdDateTime,A.intAge,A.intGender, A.intDepartmentId, A.intServiceId, A.intDistrictId, A.vchName,A.intMobile,A.intAssignedTo, A.intFeedbackStatus, A.intRequestStatus,B.intRequestedById,B.intFeedbackStatus,mss.vchServiceName,ST.vchSchemeTypeName,CT.vchCardName,dm.vchDeptName,MSU.VCH_FULL_NAME,MDDM.VCH_DESG_NAME,MSU.VCH_MOBILE_NO,B.dtmCreatedOn, MSU.INT_DESIGNATION_ID,MSU.INT_USER_ID , A.dtmAssignedTime, A.vchRationCardNo, A.intNoFamily, A.vchTokenNo, A.dtmPaddyDeposite,DT.VCH_VALUE_NAME AS vchDistrict from t_ms_outbound_data A LEFT JOIN m_ms_service_registration as mss ON A.intServiceId=mss.intServiceRegistrationId  LEFT JOIN m_fs_scheme_type as ST ON A.intSchemeTypeId=ST.intSchemeTypeId LEFT JOIN m_fs_card_type as CT ON A.intCardTypeId=CT.intCardTypeId JOIN m_admin_subnode_values DT ON(DT.INT_SUBNODEVAL_ID = A.intDistrictId)  LEFT JOIN m_department as dm ON A.intDepartmentId=dm.intDeptId left join t_ms_feedback_received B ON (B.intOutboundDataId = A.intOutboundDataId) LEFT JOIN m_admin_user AS MSU ON CASE WHEN A.intAssignedTo = 0 THEN B.intRequestedById = MSU.INT_USER_ID WHEN A.intAssignedTo <> 0 THEN A.intAssignedTo = MSU.INT_USER_ID END LEFT JOIN m_admin_desg_master AS MDDM ON MSU.INT_DESIGNATION_ID= MDDM.INT_DESG_ID where A.intRequestStatus in (2,3,4) AND A.bitDeletedFlag=0 AND (B.intRequestedById IN(SELECT INT_USER_ID FROM m_admin_user WHERE FIND_IN_SET(INT_DESIGNATION_ID,@p_INT_DESIGNATION_ID) AND BIT_DELETED_FLAG=0 ORDER BY INT_USER_ID DESC) OR A.intAssignedTo IN(SELECT INT_USER_ID FROM m_admin_user WHERE FIND_IN_SET(INT_DESIGNATION_ID,@p_INT_DESIGNATION_ID) AND BIT_DELETED_FLAG=0 ORDER BY INT_USER_ID DESC)) ';
    IF(@p_fromDate>0 OR @p_toDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(B.dtmCreatedOn) between "',@p_fromDate,'" AND "',@p_toDate,'"');
    END IF;
    SET @P_SQL=CONCAT(@P_SQL,' order by A.intRequestStatus ASC');
    
	PREPARE STMT FROM @P_SQL;
	EXECUTE STMT; 
    END IF;
     IF(P_ACTION='RAC') THEN
	select A.intOutboundDataId, A.intDepartmentId, A.intServiceId, A.intDistrictId, A.vchName,  A.intAssignedTo, A.intFeedbackStatus, A.intRequestStatus,B.intRequestedById,mss.vchServiceName,dm.vchDeptName,MSU.VCH_FULL_NAME,MDDM.VCH_DESG_NAME,date(B.dtmCreatedOn) as dtmCreatedOn from t_ms_outbound_data A LEFT JOIN m_ms_service_registration as mss ON A.intServiceId=mss.intServiceRegistrationId LEFT JOIN m_department as dm ON A.intDepartmentId=dm.intDeptId left join t_ms_feedback_received B ON (B.intOutboundDataId = A.intOutboundDataId) LEFT JOIN m_admin_user AS MSU ON CASE WHEN A.intAssignedTo = 0 THEN B.intRequestedById = MSU.INT_USER_ID WHEN A.intAssignedTo <> 0 THEN A.intAssignedTo = MSU.INT_USER_ID END LEFT JOIN m_admin_desg_master AS MDDM ON MSU.INT_DESIGNATION_ID= MDDM.INT_DESG_ID where A.intRequestStatus in (4) AND (B.intRequestedById IN(SELECT INT_USER_ID FROM m_admin_user WHERE FIND_IN_SET(INT_DESIGNATION_ID,@p_INT_DESIGNATION_ID) AND BIT_DELETED_FLAG=0 ORDER BY INT_USER_ID DESC) OR A.intAssignedTo IN(SELECT INT_USER_ID FROM m_admin_user WHERE FIND_IN_SET(INT_DESIGNATION_ID,@p_INT_DESIGNATION_ID) AND BIT_DELETED_FLAG=0 ORDER BY INT_USER_ID DESC)) AND date(B.dtmCreatedOn) >= DATE(NOW()) - INTERVAL 7 DAY order by A.intRequestStatus;

    END IF;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_CRON_CONFIG` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_CRON_CONFIG`(
  P_ACTION             VARCHAR(3),
  P_ID                 INT,
  P_JOB_TYPE           INT,
  P_JOB_NAME           VARCHAR(128),
  P_ACCOUNT_ID         INT,
  P_DURATION           VARCHAR(32),
  P_LAST_MESSAGE       TEXT,
  P_ATTR1  			   INT,
  P_ATTR2              INT,
  P_ATTR3              VARCHAR(64),
  P_ATTR4              VARCHAR(64),
  P_ATTR5              DATE
)
BEGIN

	SET @BLANK_DATE='1000-01-01';	
    	
	IF(P_ACTION = 'CD') THEN
			
            
             SET @P_SQL= CONCAT('SELECT COUNT(1) AS total FROM t_ms_corn_job WHERE bitDeletedFlag=0 AND IntJobType=',P_JOB_TYPE,' AND intAccountId=', P_ACCOUNT_ID);       
  
			  IF(P_ID>0)THEN        
			   SET @P_SQL=CONCAT(@P_SQL,' AND intJobId!=',P_ID);  
			  END IF;  
              
			SELECT @P_SQL;
			 PREPARE STMT FROM @P_SQL;       
			 EXECUTE STMT;  
 
 
	END IF;
    
	
	IF(P_ACTION = 'A') THEN
		START TRANSACTION;
		INSERT INTO t_ms_corn_job SET  IntJobType=P_JOB_TYPE, intAccountId=P_ACCOUNT_ID, vchDuration=P_DURATION, bitActive=1, vchJobName=P_JOB_NAME,dtmLastExcution=NOW();
        SET @P_STATUS = 2;
		SELECT @P_STATUS;
		COMMIT;
	END IF;
    
    
	IF(P_ACTION = 'U') THEN
		START TRANSACTION;
		UPDATE t_ms_corn_job SET IntJobType=P_JOB_TYPE, intAccountId=P_ACCOUNT_ID, vchDuration=P_DURATION, bitActive=1, vchJobName=P_JOB_NAME WHERE intJobId=P_ID;
		
        SET @P_STATUS = 2;
        
		SELECT @P_STATUS;
		COMMIT;
	END IF;
    
     
	IF(P_ACTION = 'R') THEN
		
		SELECt A.intJobId,A. IntJobType, A.intAccountId, A.vchDuration, A.bitActive, A.dtmLastExcution, A.vchJobName, A.vchlastMessage,C.intJobTypeId, C.vchJobName AS JobType, C.vchJobDesc, C.intAccountType,CASE WHEN(C.intAccountType=1) THEN "Twitter" WHEN(C.intAccountType=2) THEN "Facebook" END AS accountType FROM t_ms_corn_job A INNER JOIN m_ms_cronjob_type C ON (A.IntJobType=C.intJobTypeId) WHERE intJobId=P_ID;
		
	END IF;


	 
	IF(P_ACTION = 'PG') THEN
		 SET @START_REC	= P_ID;
		SET @P_SQL = CONCAT('SELECT intJobId, IntJobType, intAccountId, vchDuration, bitActive, dtmLastExcution, A.vchJobName,intMode, vchlastMessage,B.intId, B.vchAccountType, B.vchAccountName, B.vchScreenName, B.vchUserName, B.vchPhoto, B.tinDisplayStatus, B.tinReplyStatus, B.vchAccessToken, B.vchAccessSecret,C.intJobTypeId, C.vchJobName AS JobType, C.vchJobDesc, C.intAccountType,CASE WHEN(C.intAccountType=1) THEN "Twitter" WHEN(C.intAccountType=2) THEN "Facebook" END AS accountType, CASE WHEN(ADDTIME(A.dtmLastExcution,A.vchDuration)> NOW()) THEN "1" WHEN(ADDTIME(A.dtmLastExcution,A.vchDuration)< NOW()) THEN "2" END AS background FROM (t_ms_corn_job A LEFT JOIN m_ms_cronjob_type C ON (A.IntJobType=C.intJobTypeId)) LEFT JOIN m_ms_api_account B ON (A.intAccountId=B.intId) WHERE A.bitDeletedFlag=0') ;
    
    
    IF(P_JOB_TYPE>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType=',P_JOB_TYPE);
    END IF;
    
    IF((P_ACCOUNT_ID)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intAccountId=',P_ACCOUNT_ID);
    END IF;
    
    IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.stmCreatedOn DESC  LIMIT ?,10');
    
      PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;
		
	END IF;


	 
	IF(P_ACTION = 'V') THEN
		
		SET @P_SQL = CONCAT('SELECT intJobId, IntJobType, intAccountId, vchDuration, bitActive, dtmLastExcution, A.vchJobName,intMode, vchlastMessage,B.intId, B.vchAccountType, B.vchAccountName, B.vchScreenName, B.vchUserName, B.vchPhoto, B.tinDisplayStatus, B.tinReplyStatus, B.vchAccessToken, B.vchAccessSecret,C.intJobTypeId, C.vchJobName AS JobType, C.vchJobDesc, C.intAccountType,CASE WHEN(C.intAccountType=1) THEN "Twitter" WHEN(C.intAccountType=2) THEN "Facebook" END AS accountType FROM (t_ms_corn_job A LEFT JOIN m_ms_cronjob_type C ON (A.IntJobType=C.intJobTypeId)) LEFT JOIN m_ms_api_account B ON (A.intAccountId=B.intId) WHERE A.bitDeletedFlag=0') ;
    
    IF(P_ID>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobId=',P_ID);
    END IF;
    IF(P_JOB_TYPE>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType=',P_JOB_TYPE);
    END IF;
    
    IF((P_ACCOUNT_ID)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intAccountId=',P_ACCOUNT_ID);
    END IF;
    
    IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.stmCreatedOn DESC');
   
    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
		
	END IF;
    
     
	IF(P_ACTION = 'CT') THEN
		
		SET @P_SQL = CONCAT('SELECT COUNT(1) FROM (t_ms_corn_job A LEFT JOIN m_ms_cronjob_type C ON (A.IntJobType=C.intJobTypeId)) LEFT JOIN m_ms_api_account B ON (A.intAccountId=B.intId) WHERE A.bitDeletedFlag=0') ;
    
    IF(P_ID>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobId=',P_ID);
    END IF;
    IF(P_JOB_TYPE>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType=',P_JOB_TYPE);
    END IF;
    
    IF((P_ACCOUNT_ID)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intAccountId=',P_ACCOUNT_ID);
    END IF;
    
    IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.stmCreatedOn DESC');
       PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
		
	END IF;
    
    IF(P_ACTION='P')THEN
		START TRANSACTION;  
			UPDATE t_ms_corn_job SET bitActive=1,dtmUpdatedOn=NOW() WHERE  intJobId=P_ID;
			SELECT 'Record published Successfully';
		COMMIT;
	END IF;
    
    
    IF(P_ACTION='IN')THEN
		START TRANSACTION;  
			UPDATE t_ms_corn_job SET bitActive=0,dtmUpdatedOn=NOW() WHERE  intJobId=P_ID;
			SELECT 'Record unpublished Successfully';
		COMMIT;
	END IF;
    
    
	IF(P_ACTION='D')THEN
		START TRANSACTION;  
			UPDATE t_ms_corn_job SET bitDeletedFlag=1,dtmUpdatedOn=NOW() WHERE  intJobId=P_ID;
			SELECT 'Record deleted Successfully';
		COMMIT;
	END IF;
	
    IF(P_ACTION='VJT')THEN
		SET @P_SQL = 'SELECT intJobId, IntJobType, intAccountId, vchDuration, bitActive, dtmLastExcution, vchJobName,intMode, vchlastMessage,B.intId, B.vchAccountType, B.vchAccountName, B.vchScreenName, B.vchUserName, B.vchPhoto, CASE WHEN(A.IntJobType=1) THEN "Twitter" WHEN(A.IntJobType=2) THEN "Facebook" END AS JobType FROM t_ms_corn_job A LEFT JOIN m_ms_api_account B ON (A.intAccountId=B.intId) WHERE A.bitDeletedFlag=0';
        
	IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
		SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
	PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
    END IF;
    
    
    
    
   
	 
	IF(P_ACTION = 'PGH') THEN
		 SET @START_REC	= P_ID;
		SET @P_SQL = CONCAT('select A.intcronHistoryId, A.intcronjobId, A.IntJobType, A.dtmUpdatedOn, A.intTotalFetched, A.intValidRec, A.intInvalidRec, A.intDuplicateCnt, A.intAddedThrough, A.intAccountId, A.vchlastMessage, A.dtmExcecutionStart, A.dtmExceutionEnd,(select B.vchJobName from m_ms_cronjob_type B where B.intJobTypeId=A.IntJobType) AS vchJobType,(SELECT C.vchJobName FROM t_ms_corn_job C
JOIN m_ms_api_account D ON(C.intAccountId=D.intId AND D.tinDisplayStatus=1 AND D.bitDeletedFlag=0)
where C.bitDeletedFlag=0 and C.intJobId= A.intcronjobId) AS vchJobName ,(SELECT D.vchScreenName FROM t_ms_corn_job C
JOIN m_ms_api_account D ON(C.intAccountId=D.intId AND D.tinDisplayStatus=1 AND D.bitDeletedFlag=0) 
where C.bitDeletedFlag=0 and C.intJobId= A.intcronjobId) AS vchScreenName from t_ms_cron_history A where 1=1 ') ;
    
 
    IF((P_JOB_TYPE)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intcronjobId=',P_JOB_TYPE);
    END IF;    
    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.dtmUpdatedOn DESC  LIMIT ?,10');
    -- select @P_SQL;
      PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;
		
	END IF;
 
    
    
    	IF(P_ACTION = 'VH') THEN
		
		SET @P_SQL = CONCAT('select A.intcronHistoryId, A.intcronjobId, A.IntJobType, A.dtmUpdatedOn, A.intTotalFetched, A.intValidRec, A.intInvalidRec, A.intDuplicateCnt, A.intAddedThrough, A.intAccountId, A.vchlastMessage, A.dtmExcecutionStart, A.dtmExceutionEnd,(select B.vchJobName from m_ms_cronjob_type B where B.intJobTypeId=A.IntJobType) AS vchJobType,(SELECT C.vchJobName FROM t_ms_corn_job C
JOIN m_ms_api_account D ON(C.intAccountId=D.intId AND D.tinDisplayStatus=1 AND D.bitDeletedFlag=0)
where C.bitDeletedFlag=0 and C.intJobId= A.intcronjobId) AS vchJobName ,(SELECT D.vchScreenName FROM t_ms_corn_job C
JOIN m_ms_api_account D ON(C.intAccountId=D.intId AND D.tinDisplayStatus=1 AND D.bitDeletedFlag=0) 
where C.bitDeletedFlag=0 and C.intJobId= A.intcronjobId) AS vchScreenName
 from t_ms_cron_history A where 1=1') ;
    
    
    IF((P_JOB_TYPE)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intcronjobId=',P_JOB_TYPE);
    END IF; 
    
    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.dtmUpdatedOn DESC');
   
    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
		
	END IF;
    
     
	IF(P_ACTION = 'CTH') THEN
		
		SET @P_SQL = CONCAT('SELECT COUNT(1) FROM  t_ms_cron_history A where 1=1 ') ;
    
    IF(P_JOB_TYPE>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intcronjobId=',P_JOB_TYPE);
    END IF; 
    
     SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY A.dtmUpdatedOn DESC');
    -- select @P_SQL;
       PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
		
	END IF;
    
    
    
    
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_INBOUND` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_INBOUND`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

/** Start of params building block **/
   
   
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MS_INBOUND("',P_ACTION, '","',P_VALUES,'")');
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
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MS_INBOUND("',P_ACTION, '","',P_VALUES,'")');
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
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MS_INBOUND("',P_ACTION, '","',P_VALUES,'")');
      
END; /** Error handling code ends **/


   
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
	INSERT INTO t_ms_inbound_data (intInboundDataId, intCreatedBy, vchName, intMobile, intGender, intDistrictId, intBlockId, intGPId, intVillageId, vchAddress, intServiceId, vchComplain, varReferenceNo, intAge, intLocation,intDepartmentId,int_hs_ps_id,intAnonymousStatus) VALUES (@p_intInboundDataId, @p_intCreatedBy, @p_vchName, @p_intMobile, @p_intGender,@p_intDistrictId,@p_intBlockId,@p_intGPId,@p_intVillageId,@p_vchAddress,@p_intServiceId,@p_vchComplain, @p_varReferenceNo, @p_intAge, @p_intLocation,@p_intDepartmentId,@p_int_hs_ps_id,@p_intAnonymousStatus);
     SELECT LAST_INSERT_ID() as intInboundDataId;
    INSERT INTO t_ms_call_information (intMobile, intType, intCreatedBy, dtmCallStart, dtmCallEnd, intOutboundDataId) VALUES (@p_intMobile, @p_intType, @p_intCreatedBy, @p_dtmCallStart, @p_dtmCallEnd, LAST_INSERT_ID());
   
    ELSE
    UPDATE t_ms_inbound_data SET intDepartmentId=@p_intCreatedBy, intCreatedBy=@p_intCreatedBy, vchName=@p_vchName, intMobile=@p_intMobile, intGender=@p_intGender, intGender=@p_intGender, intDistrictId=@p_intDistrictId, intBlockId=@p_intBlockId, intGPId=@p_intGPId, intVillageId=@p_intVillageId, vchAddress=@p_vchAddress, intServiceId=@p_intServiceId, vchComplain=@p_vchComplain, varReferenceNo=@p_varReferenceNo, intAge=@p_intAge , intLocation=@p_intLocation , intDepartmentId = @p_intDepartmentId,int_hs_ps_id = @p_int_hs_ps_id where p_intInboundDataId=@p_intInboundDataId ;
    SELECT @p_intInboundDataId as intInboundDataId;
    END IF;
    
END IF;

/** Action for Register Not Registerd In Bound **/
IF(P_ACTION = 'AR')THEN
	INSERT INTO t_ms_inbound_not_registered (intMobile, intDistrictId, vchComplain, intCreatedBy) VALUES(@p_intMobile, @p_intDistrictId, @p_vchComplain, @p_intCreatedBy);
    SELECT LAST_INSERT_ID() as intNotRegInboundId;
END IF;

  /*Action to view FAQ by:Puja kumari on dt:24-09-2019*/
IF(P_ACTION='V') THEN
      SET @P_SQL='SELECT tmsi.intRequestStatus,tmsi.intInboundDataId, tmsi.varReferenceNo, tmsi.intMobile, tmsi.intCreatedBy, tmsi.vchName, tmsi.intDistrictId, tmsi.vchAddress, tmsi.intGender, tmsi.intDepartmentId,tmsi.vchOther,tmsi.vchServiceDate,(SELECT vchDeptName FROM m_department C WHERE tmsi.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, tmsi.intServiceId, (SELECT vchServiceName FROM m_ms_service_registration D WHERE tmsi.intDepartmentId = D.intDepartmentId AND tmsi.intServiceId = D.intServiceRegistrationId) AS vchService, (SELECT IF(tmsi.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = tmsi.intDistrictId AND H.intHospitalId = tmsi.int_hs_ps_id), IF(tmsi.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = tmsi.intDistrictId AND P.intPolicestationId = tmsi.int_hs_ps_id), "--"))) AS complaintAgainst, tmsi.int_hs_ps_id, DATE(tmsi.dtmCreatedOn) AS dtmCreatedOn, tmsi.vchComplain, tmsi.intAge, asv.VCH_VALUE_NAME AS vchDisttrictName, (SELECT IF(tmsi.intGender = "2", "Female", IF(tmsi.intGender = "3", "Transgender", "Male")) ) AS vchGender, mdu.VCH_FULL_NAME AS vchFullName FROM t_ms_inbound_data tmsi LEFT JOIN m_admin_subnode_values asv ON (asv.INT_SUBNODEVAL_ID = tmsi.intDistrictId) LEFT JOIN m_admin_user mdu ON (mdu.INT_USER_ID = tmsi.intCreatedBy) WHERE tmsi.bitDeletedFlag = 0';
	 IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(tmsi.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
  IF(@p_intCreatedBy>0)THEN
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
	SET @P_SQL='SELECT tmsi.intRequestStatus,tmsi.intInboundDataId, tmsi.varReferenceNo, tmsi.intMobile, tmsi.intCreatedBy, tmsi.vchName, tmsi.intDistrictId, tmsi.vchAddress, tmsi.intGender, tmsi.intDepartmentId,tmsi.vchOther,tmsi.vchServiceDate,(SELECT vchDeptName FROM m_department C WHERE tmsi.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, tmsi.intServiceId, (SELECT vchServiceName FROM m_ms_service_registration D WHERE tmsi.intDepartmentId = D.intDepartmentId AND tmsi.intServiceId = D.intServiceRegistrationId) AS vchService, (SELECT IF(tmsi.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = tmsi.intDistrictId AND H.intHospitalId = tmsi.int_hs_ps_id), IF(tmsi.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = tmsi.intDistrictId AND P.intPolicestationId = tmsi.int_hs_ps_id), "--"))) AS complaintAgainst, tmsi.int_hs_ps_id, DATE(tmsi.dtmCreatedOn) AS dtmCreatedOn, tmsi.vchComplain, tmsi.intAge, asv.VCH_VALUE_NAME AS vchDisttrictName, (SELECT IF(tmsi.intGender = "2", "Female", IF(tmsi.intGender = "3", "Transgender", "Male")) ) AS vchGender, mdu.VCH_FULL_NAME AS vchFullName FROM t_ms_inbound_data tmsi LEFT JOIN m_admin_subnode_values asv ON (asv.INT_SUBNODEVAL_ID = tmsi.intDistrictId) LEFT JOIN m_admin_user mdu ON (mdu.INT_USER_ID = tmsi.intCreatedBy) WHERE tmsi.bitDeletedFlag = 0';
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
	IF(P_ACTION='GTYA') THEN
		SET @P_TODAYSQL = 'SELECT count(*) INTO @TODAYCNT from t_ms_inbound_data A  where  A.bitDeletedFlag=0 AND date(A.dtmCreatedOn) =curdate()';
		SET @P_YESTERDAYSQL = 'SELECT count(*) INTO @YESTERDAYTCNT from t_ms_inbound_data A  where  A.bitDeletedFlag=0 AND date(A.dtmCreatedOn) =SUBDATE(CURDATE(),1)';
		SET @P_ALLSQL = 'SELECT count(*) INTO @TOTALCNT from t_ms_inbound_data A  where  A.bitDeletedFlag=0' ;
        
      IF(@p_intCreatedBy>0)THEN
      SET @P_TODAYSQL=CONCAT(@P_TODAYSQL,' AND A.intCreatedBy=',@p_intCreatedBy);
      SET @P_YESTERDAYSQL=CONCAT(@P_YESTERDAYSQL,' AND A.intCreatedBy=',@p_intCreatedBy);
      SET @P_ALLSQL=CONCAT(@P_ALLSQL,' AND A.intCreatedBy=',@p_intCreatedBy);
    END IF;
     IF(@p_intDepartmentId>0)THEN
      SET @P_TODAYSQL=CONCAT(@P_TODAYSQL,' AND A.intDepartmentId=',@p_intDepartmentId);
      SET @P_YESTERDAYSQL=CONCAT(@P_YESTERDAYSQL,' AND A.intDepartmentId=',@p_intDepartmentId);
      SET @P_ALLSQL=CONCAT(@P_ALLSQL,' AND A.intDepartmentId=',@p_intDepartmentId);
    END IF;
    #SELECT @P_ALLSQL;
    PREPARE STMT_TOTAL FROM @P_TODAYSQL;
    EXECUTE STMT_TOTAL ;
    PREPARE STMT_YESTERDAY FROM @P_YESTERDAYSQL;
    EXECUTE STMT_YESTERDAY ;
    PREPARE STMT_ALL FROM @P_ALLSQL;
	EXECUTE STMT_ALL ;
	SELECT @TODAYCNT AS TODAYCNT,@YESTERDAYTCNT AS YESTERDAYTCNT,@TOTALCNT AS  TOTALCNT;
  END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_JOB_TYPE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_JOB_TYPE`(
  P_ACTION             VARCHAR(3),
  P_ID                 INT,
  P_JOB_TYPE           INT,
  P_JOB_NAME           VARCHAR(32),
  P_ACCOUNT_ID         INT,
  P_DURATION           VARCHAR(32),
  P_LAST_MESSAGE       TEXT,
  P_ATTR1  			   INT,
  P_ATTR2              INT,
  P_ATTR3              VARCHAR(64),
  P_ATTR4              VARCHAR(64),
  P_ATTR5              DATE
)
BEGIN




	 
	IF(P_ACTION = 'PG') THEN
		 SET @START_REC	= P_ID;
		SET @P_SQL = CONCAT('SELECT intJobTypeId, vchJobName, vchJobDesc, intAccountType, stmCreatedOn, intCreatedBy, dtmUpdatedOn FROM m_ms_cronjob_type A  WHERE A.bitDeletedFlag=0') ;

    IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.stmCreatedOn DESC  LIMIT ?,10');
      PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;
		
	END IF;


	 
	IF(P_ACTION = 'V') THEN
		
		SET @P_SQL = CONCAT('SELECT intJobTypeId, vchJobName, vchJobDesc, intAccountType, stmCreatedOn, intCreatedBy, dtmUpdatedOn FROM m_ms_cronjob_type A  WHERE A.bitDeletedFlag=0') ;
    
    IF(P_ID>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobTypeId=',P_ID);
    END IF;
    
    IF(CHAR_LENGTH(P_JOB_NAME)>0)THEN
    SET @P_SQL = CONCAT(@P_SQL,' AND A.vchJobName LIKE "%',P_JOB_NAME,'%"');
    END IF;
    
    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY A.stmCreatedOn DESC');
   
    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
		
	END IF;
    
    
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_MISREPORT_OUTBOUND` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_MISREPORT_OUTBOUND`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN


		DECLARE continue HANDLER FOR NOT FOUND
		BEGIN
		GET DIAGNOSTICS CONDITION 1
		@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
		@sqlstate = RETURNED_SQLSTATE, 
		@errno = MYSQL_ERRNO,
		@text = MESSAGE_TEXT; 
		SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text); 
		SET @P_STATUS=4;
		SET @P_MSG=('Error: Table or column not found');

		ROLLBACK;
		INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='social scanning',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MISREPORT_OUTBOUND';
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
		INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_ms_outbound_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MISREPORT_OUTBOUND';
		END;


		DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN

		GET DIAGNOSTICS CONDITION 1
		@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
		@sqlstate = RETURNED_SQLSTATE, 
		@errno = MYSQL_ERRNO,
		@text = MESSAGE_TEXT; 
		SET @full_error = CONCAT("SQLEXCEPTION ", @errno, " (", @sqlstate, "): ", @text); 



		#SET @P_STATUS=4;
		#SET @P_MSG=('ERROR: Unable to process your request in DATABASE'); 

		SELECT  @P_STATUS,@P_MSG;
		ROLLBACK;

		INSERT INTO `error_log` SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_ms_outbound_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MISREPORT_OUTBOUND';
		END;


/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;

	

/** Action for Outbound MIS Report:: By: Niranjan **/
IF(P_ACTION = 'VOMR')THEN
	select B.INT_DESG_ID, B.INT_RANK_ID, A.INT_PH_LOCATION into @P_INT_DESG_ID, @P_INT_RANK_ID, @P_INT_PH_LOCATION from m_admin_user A left join m_admin_desg_master B ON (B.INT_DESG_ID = A.INT_DESIGNATION_ID) where A.INT_USER_ID = @p_intAuthId;
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, A.INT_DESIGNATION_ID as intDesignationId, A.INT_PH_LOCATION as intDepartmentId, B.vchDeptName, C.VCH_DESG_NAME as vchDescName,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 ',@p_date_filte,') as vchTotal,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 ',@p_date_filte,') as vchReceived,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 0 ',@p_date_filte,') as vchNotUpdate,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 2 ',@p_date_filte,') as vchNotRechable,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 3 ',@p_date_filte,') as vchInvalidNo,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 4 ',@p_date_filte,') as vchDidNotPick,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus in (5,6) ',@p_date_filte,') as vchNotIntrested,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 12 ',@p_date_filte,') as vchGovtServant,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 8 ',@p_date_filte,') as vchNotIncFacility,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 9 ',@p_date_filte,') as vchSwitchOff,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 11 ',@p_date_filte,') as vchNotVisited,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 7 ',@p_date_filte,') as vchOther
	from m_admin_user A
	left join m_department B on (B.intDeptId = A.INT_PH_LOCATION and B.bitDeletedFlag = 0)
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where 1=1 AND INT_DESIGNATION_ID not in (3)'); -- 6,20,16,19,8,18,17,14 INT_DESIGNATION_ID not in (13,15)
    IF(@P_INT_DESG_ID > 0 AND @P_INT_RANK_ID > 1)THEN
		set @P_SQLS = CONCAT(@P_SQLS, ' AND (C.INT_RANK_ID > ',@P_INT_RANK_ID,' OR A.INT_USER_ID = ',@p_intAuthId,' )');
    END IF;
    IF(@P_INT_PH_LOCATION > 0)THEN
		set @P_SQLS = CONCAT(@P_SQLS, ' AND A.INT_PH_LOCATION = ',@P_INT_PH_LOCATION);
    END IF;
    set @P_SQLS = CONCAT(@P_SQLS, ' ORDER BY C.INT_RANK_ID ASC');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;


/** Action for Outbound BPO MIS Report:: By: Niranjan **/
IF(P_ACTION = 'VOBR')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, A.INT_DESIGNATION_ID as intDesignationId, A.INT_PH_LOCATION as intDepartmentId, B.vchDeptName, C.VCH_DESG_NAME as vchDescName,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 ',@p_date_filte,') as vchTotal,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 1 ',@p_date_filte,') as vchReceived,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 2 ',@p_date_filte,') as vchNotRechable,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 3 ',@p_date_filte,') as vchInvalidNo,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 4 ',@p_date_filte,') as vchDidNotPick,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus in (5,6) ',@p_date_filte,') as vchNotWantToTalk,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 12 ',@p_date_filte,') as vchGovtServant,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 8 ',@p_date_filte,') as vchNotIncFacility,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 9 ',@p_date_filte,') as vchSwitchOff,
    (select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 11 ',@p_date_filte,') as vchNotVisited,
	(select count(1) from t_ms_feedback_received B where B.intFeedbackReceivedBy = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackCollectedBy = 2 and B.intFeedbackStatus = 7 ',@p_date_filte,') as vchCallLeter
	from m_admin_user A
	left join m_department B on (B.intDeptId = A.INT_PH_LOCATION and B.bitDeletedFlag = 0)
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where INT_DESIGNATION_ID in (13)');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;


/** Action for Inbound BPO MIS Report:: By: Niranjan **/
IF(P_ACTION = 'VIBR')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select intUserId, vchFullName, intDepartmentId, vchDescName, vchRegisterCalls, vchNotRegisterCalls, (vchRegisterCalls + vchNotRegisterCalls) as vchTotal, FORMAT(((vchRegisterCalls + vchNotRegisterCalls)*100/vchTotalCalls), 2) as vchPercentage
	from (select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, A.INT_PH_LOCATION as intDepartmentId, C.VCH_DESG_NAME as vchDescName,
	(select count(1) from t_ms_inbound_data B where B.intCreatedBy = A.INT_USER_ID and B.bitDeletedFlag = 0  ',@p_date_filte,') as vchRegisterCalls,
	(select count(1) from t_ms_inbound_not_registered B where B.intCreatedBy = A.INT_USER_ID and B.bitDeletedFlag = 0  ',@p_date_filte,') as vchNotRegisterCalls,
	((select count(1) from t_ms_inbound_data B where B.bitDeletedFlag = 0  ',@p_date_filte,') + (select count(1) from t_ms_inbound_not_registered B where B.bitDeletedFlag = 0  ',@p_date_filte,')) as vchTotalCalls
	from m_admin_user A
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where INT_DESIGNATION_ID in (13)) as t');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;


/** Action for Outbound MIS Report Total:: By: Niranjan **/
IF(P_ACTION = 'VOT')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select 0 as intUserId, "Contact Center" as vchFullName, 13 as intDesignationId, 0 as intDepartmentId, "--" as vchDeptName, "Operator" as vchDescName, 
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 ',@p_date_filte,') as vchTotal,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 ',@p_date_filte,') as vchReceived,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 0 ',@p_date_filte,') as vchNotUpdate,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 2 ',@p_date_filte,') as vchNotRechable,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 3 ',@p_date_filte,') as vchInvalidNo,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 4 ',@p_date_filte,') as vchDidNotPick,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 5 ',@p_date_filte,') as vchNotIntrested,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 6 ',@p_date_filte,') as vchDND,
	(select count(1) from t_ms_feedback_received B where B.intByDesignationId in (6,20,16,19,8,18,17,14,13) and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 7 ',@p_date_filte,') as vchOther');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;

/** Action for Outbound Authority MIS Report for Good, Average, Poor:: By: Niranjan **/
IF(P_ACTION = 'VOAR')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, A.INT_DESIGNATION_ID as intDesignationId, A.INT_PH_LOCATION as intDepartmentId, B.vchDeptName, C.VCH_DESG_NAME as vchDescName,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 ',@p_date_filte,') as vchReceived,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 4 ',@p_date_filte,') as vchBad,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 1 ',@p_date_filte,') as vchPoor,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 2 ',@p_date_filte,') as vchAverage,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 3 ',@p_date_filte,') as vchGood,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 5 ',@p_date_filte,') as vchOutstanding,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 0 ',@p_date_filte,') as vchToBeUpdated
	from m_admin_user A
	left join m_department B on (B.intDeptId = A.INT_PH_LOCATION and B.bitDeletedFlag = 0)
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where 1=1'); #INT_DESIGNATION_ID in (8,20)
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;


/** Action for Outbound Institution MIS Report  for Good, Average, Poor:: By: Niranjan **/
IF(P_ACTION = 'VOIR')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
    set @p_date_filte = '';
    if(@p_intDepartmentId > 0)then
		set @p_date_filte = concat(@p_date_filte, ' AND A.intDepartmentId = ',@p_intDepartmentId);
    end if;
    if(@p_intDistrictId > 0)then
		set @p_date_filte = concat(@p_date_filte, ' AND A.intDistrictId = ',@p_intDistrictId);
    end if;
	set @P_SQLS = '';
    /*
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.*, B.VCH_VALUE_NAME as vchDestrictName, C.vchDeptName as vchDepartmentName,
(select count(1) from t_ms_feedback_received N join vw_ms_pull_data M ON(M.intOutboundDataId = N.intOutboundDataId and M.dataType = N.intCallType and N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4) where M.int_hs_ps_id = A.int_hs_ps_id AND M.intDepartmentId = A.intDepartmentId) as vchBad,
(select count(1) from t_ms_feedback_received N join vw_ms_pull_data M ON(M.intOutboundDataId = N.intOutboundDataId and M.dataType = N.intCallType and N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1) where M.int_hs_ps_id = A.int_hs_ps_id AND M.intDepartmentId = A.intDepartmentId) as vchPoor,
(select count(1) from t_ms_feedback_received N join vw_ms_pull_data M ON(M.intOutboundDataId = N.intOutboundDataId and M.dataType = N.intCallType and N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2) where M.int_hs_ps_id = A.int_hs_ps_id AND M.intDepartmentId = A.intDepartmentId) as vchAverage,
(select count(1) from t_ms_feedback_received N join vw_ms_pull_data M ON(M.intOutboundDataId = N.intOutboundDataId and M.dataType = N.intCallType and N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3) where M.int_hs_ps_id = A.int_hs_ps_id AND M.intDepartmentId = A.intDepartmentId) as vchGood,
(select count(1) from t_ms_feedback_received N join vw_ms_pull_data M ON(M.intOutboundDataId = N.intOutboundDataId and M.dataType = N.intCallType and N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5) where M.int_hs_ps_id = A.int_hs_ps_id AND M.intDepartmentId = A.intDepartmentId) as vchOutstanding
from (select A.intHospitalId as int_hs_ps_id, A.vchHospitalName as vchInstitutionName, A.intDistrictId, 12 as intDepartmentId from m_ms_hospital A where A.bitDeletedFlag = 0
union all
select A.intPolicestationId as int_hs_ps_id, A.vchPolicestationName as vchInstitutionName, A.intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station A where A.bitDeletedFlag = 0) as A
left join m_admin_subnode_values B on (B.INT_SUBNODEVAL_ID = A.intDistrictId)
left join m_department C on (C.intDeptId = A.intDepartmentId)
where 1=1 ',@p_date_filte,' order by A.vchInstitutionName asc');
*/
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.*, B.VCH_VALUE_NAME as vchDestrictName, C.vchDeptName as vchDepartmentName,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchCallConnected,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchBad,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchPoor,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchAverage,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchGood,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchOutstanding
from (select A.intHospitalId as int_hs_ps_id, A.vchHospitalName as vchInstitutionName, A.intDistrictId, 12 as intDepartmentId from m_ms_hospital A where A.bitDeletedFlag = 0
union all
select A.intPolicestationId as int_hs_ps_id, A.vchPolicestationName as vchInstitutionName, A.intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station A where A.bitDeletedFlag = 0) as A
left join m_admin_subnode_values B on (B.INT_SUBNODEVAL_ID = A.intDistrictId)
left join m_department C on (C.intDeptId = A.intDepartmentId)
where 1=1 ',@p_date_filte,' having vchCallConnected > 0 ');
	if(@p_vchScoring = 1)then
		set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
	elseif(@p_vchScoring = 2)then
		set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
	elseif(@p_vchScoring = 3)then
		set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
	elseif(@p_vchScoring = 4)then
		set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76');
    end if;
    set @P_SQLS = concat(@P_SQLS, ' order by vchCallConnected desc, A.vchInstitutionName asc');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;



					IF(P_ACTION='V') THEN
					SET @P_SQL = CONCAT('SELECT T.* FROM (SELECT  A.intDepartmentId,B.vchDeptName, A.intServiceId,C.vchServiceName, A.intDistrictId, date(A.dtmCreatedOn)AS RecDate, count(1) AS TotalCnt FROM t_ms_outbound_data A JOIN m_department B ON (B.intDeptId=A.intDepartmentId) join m_ms_service_registration C ON (C.intServiceRegistrationId=A.intServiceId AND C.intDepartmentId=A.intDepartmentId AND C.bitDeletedFlag=0) where A.bitDeletedFlag=0 group by A.intDepartmentId, A.intServiceId , date(A.dtmCreatedOn)) T WHERE 1=1') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
                    
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY T.vchDeptName ASC  , T.vchServiceName ASC, T.RecDate DESC ');
                    PREPARE STMT FROM @P_SQL;
					EXECUTE STMT;
                    
                    END IF;
                    
                    
                    IF(P_ACTION='PG') THEN
                    SET @START_REC=@p_intRecno;
					SET @P_SQL = CONCAT('SELECT T.* FROM (SELECT  A.intDepartmentId,B.vchDeptName, A.intServiceId,C.vchServiceName, A.intDistrictId, date(A.dtmCreatedOn)AS RecDate, count(1) AS TotalCnt FROM t_ms_outbound_data A JOIN m_department B ON (B.intDeptId=A.intDepartmentId) join m_ms_service_registration C ON (C.intServiceRegistrationId=A.intServiceId AND C.intDepartmentId=A.intDepartmentId AND C.bitDeletedFlag=0) where A.bitDeletedFlag=0 group by A.intDepartmentId, A.intServiceId , date(A.dtmCreatedOn)) T WHERE 1=1') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND T.RecDate BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY T.vchDeptName ASC  , T.vchServiceName ASC, T.RecDate DESC   LIMIT ?,5');
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT USING @START_REC;
					END IF; 
  

IF(P_ACTION='VCS') THEN
					/*SET @P_SQL = CONCAT('SELECT T.*, D.VCH_VALUE_NAME, S.vchServiceName , U.VCH_FULL_NAME  From (SELECT CASE
        WHEN A.intCallType = 1 THEN (select B.vchName from t_ms_outbound_data B where B.intOutboundDataId=A.intOutboundDataId ) 
        WHEN A.intCallType = 2 THEN (select B.vchName from t_ms_inbound_data B where B.intInboundDataId=A.intOutboundDataId )
    END AS "vchName",
    
    
    CASE
        WHEN A.intCallType = 1 THEN (select B.intMobile from t_ms_outbound_data B where B.intOutboundDataId=A.intOutboundDataId ) 
        WHEN A.intCallType = 2 THEN (select B.intMobile from t_ms_inbound_data B where B.intInboundDataId=A.intOutboundDataId )
    END AS "intMobile",
    
     CASE
        WHEN A.intCallType = 1 THEN (select B.intServiceId from t_ms_outbound_data B where B.intOutboundDataId=A.intOutboundDataId ) 
        WHEN A.intCallType = 2 THEN (select B.intServiceId from t_ms_inbound_data B where B.intInboundDataId=A.intOutboundDataId )
    END AS "intServiceId",
    
    CASE
        WHEN A.intCallType = 1 THEN (select B.intDistrictId from t_ms_outbound_data B where B.intOutboundDataId=A.intOutboundDataId ) 
        WHEN A.intCallType = 2 THEN (select B.intDistrictId from t_ms_inbound_data B where B.intInboundDataId=A.intOutboundDataId )
    END AS "intDistrictId",
    
    A.intCallType, A.intFeedbackStatus ,A.intOutboundDataId , A.intCallBackRequest,A.dtmFeedbackRcvTime, A.intRequestedById , A.intCallThrough , A.intFeedbackRecId from t_ms_feedback_received A  where A.bitDeletedFlag=0 and A.intFeedbackCollectedBy!=1 ) T LEFT JOIN m_admin_subnode_values D ON (D.INT_SUBNODEVAL_ID=T.intDistrictId) LEFT JOIN  m_ms_service_registration S ON (S.intServiceRegistrationId=T.intServiceId) Left join m_admin_user U ON(U.INT_USER_ID=T.intRequestedById)  where 1=1 ') ;    */
    
    
    SET @P_SQL = CONCAT('SELECT T.*, D.VCH_VALUE_NAME, S.vchServiceName , U.VCH_FULL_NAME, (select count(1) from t_ms_feedback_ans_submited N where N.intOutboundDataId = T.intFeedbackRecId) as intCountFeedbackAns  From (SELECT V.intOutboundDataId, V.dataType, V.intDepartmentId,(SELECT vchDeptName FROM m_department C WHERE V.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, V.intServiceId,(SELECT IF(V.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = V.intDistrictId AND H.intHospitalId = V.int_hs_ps_id), IF(V.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = V.intDistrictId AND P.intPolicestationId = V.int_hs_ps_id), "--"))) AS complaintAgainst, V.intDistrictId, V.vchName, V.intMobile, V.intAge, V.intGender, V.int_hs_ps_id, 
    V.dtmRegdDateTime,V.jsonRelatedInfo,V.vchRegdNo,
    A.intCallType, A.intFeedbackStatus , A.intCallBackRequest,A.dtmFeedbackRcvTime, A.intRequestedById , A.intCallThrough , A.intFeedbackRecId,A.intFeedbackCollectedBy, A.intDirectCallFeedbackStatus, A.dtmCreatedOn from t_ms_feedback_received A  LEFT JOIN vw_ms_pull_data V ON(V.intOutboundDataId=A.intOutboundDataId AND V.dataType =A.intCallType) where A.bitDeletedFlag=0 and A.intFeedbackCollectedBy!=1 ) T LEFT JOIN m_admin_subnode_values D ON (D.INT_SUBNODEVAL_ID=T.intDistrictId) LEFT JOIN  m_ms_service_registration S ON (S.intServiceRegistrationId=T.intServiceId) Left join m_admin_user U ON(U.INT_USER_ID=T.intRequestedById)  where 1=1 ') ; 
    
    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intRequestedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intRequestedById=',@p_intRequestedBy);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
                    
                    if(@p_vchMobile != '')then
						set @P_SQL = concat(@P_SQL, ' and T.intMobile LIKE "%',@p_vchMobile,'%"');
                    end if;
                    
                    IF(@p_intUserId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intRequestedById=',@p_intUserId);
					END IF;
                     IF(@p_intFeedbackCollectedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
					END IF;
                    IF(@p_intCallStatus >0)THEN
                        IF(@p_intCallStatus =100)THEN
					      SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackStatus=0');
                          else 
                          
                          SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackStatus=',@p_intCallStatus);
                        END IF;
					END IF;
                    
                    
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY T.dtmFeedbackRcvTime DESC  ');
                    PREPARE STMT FROM @P_SQL;
					EXECUTE STMT;
                    
                    END IF;
                    
                    
                    IF(P_ACTION='PGCS') THEN
                    SET @START_REC=@p_intRecno;
					SET @P_SQL = CONCAT('SELECT T.*, S.vchServiceName, U.VCH_FULL_NAME, (SELECT COUNT(1) FROM t_ms_feedback_ans_submited N WHERE N.intOutboundDataId = T.intFeedbackRecId) AS intCountFeedbackAns FROM (SELECT V.intOutboundDataId, V.intDepartmentId, (SELECT vchDeptName FROM m_department C WHERE V.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, V.intServiceId, V.intSchemeTypeId, ST.vchSchemeTypeName, V.intCardTypeId, CT.vchCardName, V.intDistrictId, DS.VCH_VALUE_NAME as vchDistrict, V.intBlockId, BK.VCH_VALUE_NAME as vchBlock, V.intGPId, GP.VCH_VALUE_NAME as vchGP, V.intVillageId, VG.VCH_VALUE_NAME as vchVillage, V.vchName, V.intMobile, V.intAge, V.intGender, V.int_hs_ps_id, V.dtmRegdDateTime, V.jsonRelatedInfo,V.vchRationCardNo,V.intNoFamily,V.vchTokenNo,V.dtmPaddyDeposite, V.vchRegdNo, A.intCallType, A.intFeedbackStatus, A.intCallBackRequest, A.dtmFeedbackRcvTime, A.intRequestedById, A.intCallThrough, A.intFeedbackRecId, A.intFeedbackCollectedBy, A.intDirectCallFeedbackStatus,A.dtmCreatedOn FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data V ON (V.intOutboundDataId = A.intOutboundDataId) LEFT JOIN m_admin_subnode_values DS ON (DS.INT_SUBNODEVAL_ID = V.intDistrictId) LEFT JOIN m_admin_subnode_values BK ON (BK.INT_SUBNODEVAL_ID = V.intBlockId) LEFT JOIN m_admin_subnode_values GP ON (GP.INT_SUBNODEVAL_ID = V.intGPId) LEFT JOIN m_admin_subnode_values VG ON (VG.INT_SUBNODEVAL_ID = V.intVillageId) LEFT JOIN m_fs_scheme_type ST ON (ST.intSchemeTypeId = V.intSchemeTypeId) LEFT JOIN m_fs_card_type CT ON (CT.intCardTypeId = V.intCardTypeId) WHERE A.bitDeletedFlag = 0 AND A.intFeedbackCollectedBy != 1) T LEFT JOIN m_ms_service_registration S ON (S.intServiceRegistrationId = T.intServiceId) LEFT JOIN m_admin_user U ON (U.INT_USER_ID = T.intRequestedById) WHERE 1 = 1') ;                    
					IF(@p_intDistrictId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intDistrictId=',@p_intDistrictId);
					END IF;
                    IF(@p_intRequestedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intRequestedById=',@p_intRequestedBy);
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)=0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) >= "',@p_p_from_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)=0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) <= "',@p_to_date,'"');
					END IF;
					IF(CHAR_LENGTH(@p_from_date)>0 AND CHAR_LENGTH(@p_to_date)>0 ) THEN
					SET @P_SQL=CONCAT(@P_SQL,' AND date(T.dtmFeedbackRcvTime) BETWEEN "',@p_from_date,'" AND "',@p_to_date,'"');
					END IF;
					#select @P_SQL;
                    if(@p_vchMobile != '')then
						set @P_SQL = concat(@P_SQL, ' and T.intMobile LIKE "%',@p_vchMobile,'%"');
                    end if;
                    
                    IF(@p_intUserId >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intRequestedById=',@p_intUserId);
					END IF;
                     IF(@p_intFeedbackCollectedBy >0)THEN
					SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackCollectedBy=',@p_intFeedbackCollectedBy);
					END IF;
                    IF(@p_intCallStatus >0)THEN
                        IF(@p_intCallStatus =100)THEN
					      SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackStatus=0');
                          else 
                          
                          SET @P_SQL = CONCAT(@P_SQL,' AND T.intFeedbackStatus=',@p_intCallStatus);
                        END IF;
					END IF;
                    
                    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY T.dtmFeedbackRcvTime DESC   LIMIT ?,',@p_intPgSize);
                    #select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					 EXECUTE STMT USING @START_REC;
					END IF; 





IF(P_ACTION='VCR') THEN
	/* Start transaction;
	SET @CTR    	= 1;
	
	SET @COMMA  	= (SELECT LENGTH(@p_intFeedbackRecId)- LENGTH(REPLACE(@p_intFeedbackRecId, ',', '')));
    
	SET @COMMANXT 	= @COMMA+1; 
    # select @COMMANXT;
     DROP TEMPORARY TABLE IF EXISTS TEMPTBL;
     CREATE TEMPORARY TABLE TEMPTBL (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,intOutboundDataId INT , dataType INT , intDepartmentId INT , intServiceId INT, intDistrictId INT , vchName varchar(200) , intMobile bigint, intAge INT, intGender INT, int_hs_ps_id INT, intFeedbackStatus INT, intRequestStatus INT, intBookmark INT, intAssignedTo INT, dtmAssignedTime DATETIME, dtmCreatedOn DATETIME , dtmRegdDateTime DATETIME, jsonRelatedInfo TEXT,vchRegdNo varchar(128) );
     
   WHILE(@CTR<=@COMMANXT)
	DO
		
        SET @FeedbackRecId = (SELECT SPLIT_STR((@p_intFeedbackRecId), ',', @CTR));
        SET @outboundId = (SELECT SPLIT_STR((@FeedbackRecId), '_',1));
        SET @datatype   = (SELECT SPLIT_STR((@FeedbackRecId), '_',2));*/
        
       
        /* INSERT INTO TEMPTBL (intOutboundDataId, dataType, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, dtmRegdDateTime,jsonRelatedInfo,vchRegdNo) SELECT intOutboundDataId, dataType, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, dtmRegdDateTime,jsonRelatedInfo,vchRegdNo  FROM vw_ms_pull_data where intOutboundDataId= @outboundId and dataType=@datatype;
         */
           /*IFINSERT INTO TEMPTBL (intOutboundDataId, dataType, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, dtmRegdDateTime,jsonRelatedInfo,vchRegdNo) SELECT intOutboundDataId, 1, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, dtmRegdDateTime,jsonRelatedInfo,vchRegdNo  FROM t_ms_outbound_data where intOutboundDataId= @outboundId ;
       (@datatype =1)THEN
        
         END  IF;
         IF(@datatype =2)THEN
         INSERT INTO TEMPTBL (intOutboundDataId, dataType, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, dtmRegdDateTime,jsonRelatedInfo,vchRegdNo) SELECT intInboundDataId, 2, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile, intAge, intGender, int_hs_ps_id, intFeedbackStatus, intRequestStatus, intBookmark, intAssignedTo, dtmAssignedTime, dtmCreatedOn, vchServiceDate,NULL,NULL  FROM t_ms_inbound_data where intInboundDataId= @outboundId ;
         END  IF;
			
		
		
        SET @CTR   = @CTR+1;
	END WHILE;*/
    
    SELECT OD.*,SR.vchServiceName, ST.vchSchemeTypeName, CT.vchCardName,DP.VCH_VALUE_NAME AS DistrictName,BK.VCH_VALUE_NAME AS BlockName,GP.VCH_VALUE_NAME AS GPName, VG.VCH_VALUE_NAME AS VillageName, DPT.vchDeptName from t_ms_outbound_data OD LEFT JOIN m_fs_card_type CT ON (CT.intCardTypeId=OD.intCardTypeId AND CT.bitDeletedFlag=0) LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_fs_scheme_type ST ON (ST.intSchemeTypeId=OD.intSchemeTypeId AND ST.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_admin_subnode_values BK ON (BK.BIT_DELETED_FLAG=0  AND BK.INT_SUBNODEVAL_ID=OD.intBlockId) LEFT JOIN m_admin_subnode_values GP ON (GP.BIT_DELETED_FLAG=0  AND GP.INT_SUBNODEVAL_ID=OD.intGPId) LEFT JOIN m_admin_subnode_values VG ON (VG.BIT_DELETED_FLAG=0  AND VG.INT_SUBNODEVAL_ID=OD.intVillageId)LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) WHERE  FIND_IN_SET(OD.intOutboundDataId,@p_intFeedbackRecId) ;
    
    #commit;
END IF; 

IF(P_ACTION='URI') THEN
	select VCH_FULL_NAME,INT_USER_ID,INT_EMP_TYPE from m_admin_user where INT_USER_ID= @p_intAuthId;
END IF;

IF(P_ACTION='VODP') THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(dtmFeedbackRcvTime) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(dtmFeedbackRcvTime) <= "',@p_to_date,'"');
    end if;
	SET @START_REC=@p_intRecno;
    /*
	SET @P_SQLS = CONCAT(@P_SQLS,'select B.dtmCreatedOn,(select U.VCH_FULL_NAME from m_admin_user U where B.intRequestedById=U.INT_USER_ID) as RequestedBy,B.intFeedbackStatus,vchName,intMobile,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, A.intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, A.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where A.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict,(SELECT IF(A.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = A.intDistrictId AND H.intHospitalId = A.int_hs_ps_id), IF(A.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = A.intDistrictId AND P.intPolicestationId = A.int_hs_ps_id), "--"))) AS complaintAgainst from t_ms_outbound_data A left join t_ms_feedback_received B on(B.intOutboundDataId=A.intOutboundDataId) where B.bitDeletedFlag = 0',@p_date_filte) ; 
	*/

		/*SET @P_SQLS = CONCAT('SELECT * FROM (SELECT T.*, S.vchServiceName, U.VCH_FULL_NAME, (SELECT COUNT(1) FROM t_ms_feedback_ans_submited N WHERE N.intOutboundDataId = T.intFeedbackRecId) AS intCountFeedbackAns FROM (SELECT V.intOutboundDataId, V.intDepartmentId, (SELECT vchDeptName FROM m_department C WHERE V.intDepartmentId = C.intDeptId AND C.bitDeletedFlag = 0) AS vchDepartment, (SELECT vchSchemeTypeName FROM m_fs_scheme_type ST WHERE ST.intSchemeTypeId = V.intSchemeTypeId AND ST.bitDeletedFlag = 0) AS vchSchemeTypeName, (SELECT vchCardName FROM m_fs_card_type CT WHERE CT.intCardTypeId = V.intCardTypeId AND CT.bitDeletedFlag = 0) AS vchCardName, (SELECT D.VCH_VALUE_NAME FROM m_admin_subnode_values D WHERE D.INT_SUBNODEVAL_ID = V.intDistrictId) AS vchDistrict, (SELECT BK.VCH_VALUE_NAME FROM m_admin_subnode_values BK WHERE BK.INT_SUBNODEVAL_ID = V.intBlockId) AS vchBlock, (SELECT GP.VCH_VALUE_NAME FROM m_admin_subnode_values GP WHERE GP.INT_SUBNODEVAL_ID = V.intGPId) AS vchGP, (SELECT VG.VCH_VALUE_NAME FROM m_admin_subnode_values VG WHERE VG.INT_SUBNODEVAL_ID = V.intVillageId) AS vchVillage, V.intServiceId, V.intDistrictId, V.vchName, V.intMobile, V.intAge, V.intGender, V.dtmRegdDateTime, V.vchRationCardNo, V.intNoFamily, V.vchTokenNo, V.dtmPaddyDeposite, A.intCallType, A.intFeedbackStatus, A.intCallBackRequest, A.dtmFeedbackRcvTime, A.intRequestedById, A.intCallThrough, A.intFeedbackRecId, A.intFeedbackCollectedBy FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data V ON (V.intOutboundDataId = A.intOutboundDataId) WHERE A.bitDeletedFlag = 0) T LEFT JOIN m_ms_service_registration S ON (S.intServiceRegistrationId = T.intServiceId) LEFT JOIN m_admin_user U ON (U.INT_USER_ID = T.intRequestedById)) AS T  where 1=1 ',@p_date_filte) ; */
        SET @P_SQLS = CONCAT('SELECT * FROM (SELECT T.*, S.vchServiceName, U.VCH_FULL_NAME, (SELECT COUNT(1) FROM t_ms_feedback_ans_submited N WHERE N.intOutboundDataId = T.intFeedbackRecId) AS intCountFeedbackAns FROM (SELECT V.intOutboundDataId, V.intDepartmentId, (SELECT vchSchemeTypeName FROM m_fs_scheme_type ST WHERE ST.intSchemeTypeId = V.intSchemeTypeId AND ST.bitDeletedFlag = 0) AS vchSchemeTypeName, (SELECT vchCardName FROM m_fs_card_type CT WHERE CT.intCardTypeId = V.intCardTypeId AND CT.bitDeletedFlag = 0) AS vchCardName, (SELECT D.VCH_VALUE_NAME FROM m_admin_subnode_values D WHERE D.INT_SUBNODEVAL_ID = V.intDistrictId) AS vchDistrict, V.intServiceId, V.intDistrictId, V.vchName, V.intMobile, V.intAge, V.intGender, V.dtmRegdDateTime, V.vchRationCardNo, V.intNoFamily, V.vchTokenNo, V.dtmPaddyDeposite, A.intCallType, A.intFeedbackStatus, A.intCallBackRequest, A.dtmFeedbackRcvTime, A.intRequestedById, A.intCallThrough, A.intFeedbackRecId, A.intFeedbackCollectedBy, V.jsonRelatedInfo FROM t_ms_feedback_received A LEFT JOIN t_ms_outbound_data V ON (V.intOutboundDataId = A.intOutboundDataId) WHERE A.bitDeletedFlag = 0) T LEFT JOIN m_ms_service_registration S ON (S.intServiceRegistrationId = T.intServiceId) LEFT JOIN m_admin_user U ON (U.INT_USER_ID = T.intRequestedById)) AS T  where 1=1 ',@p_date_filte) ; 
/*IF(@p_intDesignationId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intCallBackRequest=',@p_intDesignationId);
END IF; */
		IF(LENGTH(@p_vchMobile) >0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intMobile=',@p_vchMobile);
		END IF;
		IF(@p_intServiceId >0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intServiceId=',@p_intServiceId);
		END IF;
		IF(@p_intDistrictId >0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intDistrictId=',@p_intDistrictId);
		END IF;
		/*IF(@p_vchDepartmentId >0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intDepartmentId=',@p_vchDepartmentId);
		END IF; */
		IF(@p_intRequestedById >0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intRequestedById=',@p_intRequestedById);
		END IF;
		IF(LENGTH(@p_intFeedbackStatus) > 0)THEN
		SET @P_SQLS = CONCAT(@P_SQLS,' and intFeedbackStatus=',@p_intFeedbackStatus);
		END IF;
        IF(@p_intPgSize > 0)THEN
			SET @P_SQLS=CONCAT(@P_SQLS,' ORDER BY dtmFeedbackRcvTime DESC   LIMIT ?,50');
			PREPARE STMT FROM @P_SQLS;
			#select @P_SQLS;
			EXECUTE STMT USING @START_REC;
        ELSE
			SET @P_SQLS=CONCAT(@P_SQLS,' ORDER BY dtmFeedbackRcvTime DESC');
			PREPARE STMT FROM @P_SQLS;
			#select @P_SQLS;
			EXECUTE STMT;
        END IF;
END IF; 

IF(P_ACTION='VAFP') THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
set @P_SQLS = '';
SET @START_REC=@p_intRecno;
SET @P_SQLS = CONCAT(@P_SQLS,'select B.dtmCreatedOn,(select U.VCH_FULL_NAME from m_admin_user U where B.intRequestedById=U.INT_USER_ID) as RequestedBy,B.intFeedbackStatus,B.intDirectCallFeedbackStatus,vchName,intMobile,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, A.intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService,(select vchSchemeTypeName from m_fs_scheme_type ST where A.intDepartmentId=ST.intDepartmentId and A.intSchemeTypeId=ST.intSchemeTypeId) as vchSchemeTypeName,(select vchCardName from m_fs_card_type CT where A.intSchemeTypeId=CT.intCardTypeId) as vchSchemeTypeName, A.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where A.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict,(select VCH_VALUE_NAME from m_admin_subnode_values BK where A.intBlockId=BK.INT_SUBNODEVAL_ID) as vchBlock,(select VCH_VALUE_NAME from m_admin_subnode_values GP where A.intGPId=GP.INT_SUBNODEVAL_ID) as vchGP,(select VCH_VALUE_NAME from m_admin_subnode_values VG where A.intVillageId=VG.INT_SUBNODEVAL_ID) as vchVillage from t_ms_outbound_data A left join t_ms_feedback_received B on(B.intOutboundDataId=A.intOutboundDataId) where B.bitDeletedFlag = 0',@p_date_filte) ;                    
/*IF(@p_intDesignationId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intCallBackRequest=',@p_intDesignationId);
END IF; */
 IF(LENGTH(@p_vchMobile) >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intMobile=',@p_vchMobile);
END IF;
IF(@p_vchDepartmentId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intDepartmentId=',@p_vchDepartmentId);
END IF; 
IF(@p_intDistrictId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intDistrictId=',@p_intDistrictId);
END IF;
IF(@p_intDirectFeedbackStatus >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intDirectCallFeedbackStatus=',@p_intDirectFeedbackStatus);
END IF;  
IF(@p_intRequestedById >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intRequestedById=',@p_intRequestedById);
END IF;
IF(LENGTH(@p_intFeedbackStatus) > 0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intFeedbackStatus=',@p_intFeedbackStatus);
END IF;
SET @P_SQLS=CONCAT(@P_SQLS,' ORDER BY A.dtmCreatedOn DESC LIMIT ?,50');
PREPARE STMT FROM @P_SQLS;
#select @P_SQLS;
 EXECUTE STMT USING @START_REC;
END IF;

IF(P_ACTION='VAFV') THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
set @P_SQLS = '';
#SET @START_REC=@p_intRecno;
SET @P_SQLS = CONCAT(@P_SQLS,'select B.dtmCreatedOn,(select U.VCH_FULL_NAME from m_admin_user U where B.intRequestedById=U.INT_USER_ID) as RequestedBy,B.intFeedbackStatus,B.intDirectCallFeedbackStatus,vchName,intMobile,(select vchDeptName from m_department C where A.intDepartmentId=C.intDeptId and C.bitDeletedFlag=0) as vchDepartment, A.intServiceId,(select vchServiceName from m_ms_service_registration D where A.intDepartmentId=D.intDepartmentId and A.intServiceId=D.intServiceRegistrationId) as vchService, A.intDistrictId,(select VCH_VALUE_NAME from m_admin_subnode_values E where A.intDistrictId=E.INT_SUBNODEVAL_ID and E.INT_PARENT_NODE=1) as vchDistrict,(SELECT IF(A.intDepartmentId = "12", (SELECT vchHospitalName FROM m_ms_hospital H WHERE H.intDistrictId = A.intDistrictId AND H.intHospitalId = A.int_hs_ps_id), IF(A.intDepartmentId = "14", (SELECT vchPolicestationName FROM m_ms_police_station P WHERE P.intConsoleDistId = A.intDistrictId AND P.intPolicestationId = A.int_hs_ps_id), "--"))) AS complaintAgainst from t_ms_outbound_data A left join t_ms_feedback_received B on(B.intOutboundDataId=A.intOutboundDataId) where B.bitDeletedFlag = 0',@p_date_filte) ;                    
/*IF(@p_intDesignationId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intCallBackRequest=',@p_intDesignationId);
END IF; */
 IF(LENGTH(@p_vchMobile) >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intMobile=',@p_vchMobile);
END IF;
IF(@p_vchDepartmentId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intDepartmentId=',@p_vchDepartmentId);
END IF;
IF(@p_intDistrictId >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and A.intDistrictId=',@p_intDistrictId);
END IF;
IF(@p_intDirectFeedbackStatus >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intDirectCallFeedbackStatus=',@p_intDirectFeedbackStatus);
END IF;  
IF(@p_intRequestedById >0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intRequestedById=',@p_intRequestedById);
END IF;
IF(LENGTH(@p_intFeedbackStatus) > 0)THEN
SET @P_SQLS = CONCAT(@P_SQLS,' and B.intFeedbackStatus=',@p_intFeedbackStatus); 
END IF; 
SET @P_SQLS=CONCAT(@P_SQLS,' ORDER BY A.dtmCreatedOn DESC');
PREPARE STMT FROM @P_SQLS;
#select @P_SQLS;
 EXECUTE STMT;
END IF; 
IF(P_ACTION='DWR')THEN
  SET @P_SQL = 'SELECT A.INT_SUBNODEVAL_ID,A.VCH_VALUE_NAME,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHomeCallConnected,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHomeGood,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHomestanding,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHealthCallConnected,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHealthGood,(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchHealthstanding from m_admin_subnode_values A WHERE A.INT_PARENT_NODE=1 AND A.BIT_DELETED_FLAG=0 ';

   IF(@p_intDistrictId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND A.INT_SUBNODEVAL_ID=',@p_intDistrictId);
   END IF;
   IF(@p_vchScoring = 1)THEN
		set @P_SQL = concat(@P_SQL, '  and (round(((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 0 AND 25) OR (round((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)  + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 0 AND 25) ');
   ELSEIF(@p_vchScoring = 2)THEN
		set @P_SQL = concat(@P_SQL, '  and (round(((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 26 AND 50) OR (round((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)  + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 26 AND 50) ');
	ELSEIF(@p_vchScoring = 3)THEN
		set @P_SQL = concat(@P_SQL, '  and (round(((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 51 AND 75) OR (round((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)  + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 51 AND 75) ');
	ELSEIF(@p_vchScoring = 4)THEN
		set @P_SQL = concat(@P_SQL, '  and (round(((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 14 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 76 AND 100) OR (round((select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)  + (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId)) / (select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 AND N.intDepartmentId = 12 AND A.INT_SUBNODEVAL_ID=N.intDistrictId) * 100) BETWEEN 76 AND 100) ');
    END IF;    
	SET @P_SQL=CONCAT(@P_SQL,' group by A.INT_SUBNODEVAL_ID'); 
    #SELECT @P_SQL;
    PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
  
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_MIS_REPORT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_MIS_REPORT`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

		DECLARE continue HANDLER FOR NOT FOUND
		BEGIN
			GET DIAGNOSTICS CONDITION 1
			@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
			@sqlstate = RETURNED_SQLSTATE, 
			@errno = MYSQL_ERRNO,
			@text = MESSAGE_TEXT; 
			SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text); 
			SET @P_STATUS=4;
			SET @P_MSG=('Error: Table or column not found');

			ROLLBACK;
			INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='social scanning',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MIS_REPORT';
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
			INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_ms_outbound_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MIS_REPORT';
		END;


		DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			GET DIAGNOSTICS CONDITION 1
			@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
			@sqlstate = RETURNED_SQLSTATE, 
			@errno = MYSQL_ERRNO,
			@text = MESSAGE_TEXT; 
			SET @full_error = CONCAT("SQLEXCEPTION ", @errno, " (", @sqlstate, "): ", @text); 
			SELECT  @P_STATUS,@P_MSG;
            
			ROLLBACK;
			INSERT INTO `error_log` SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_ms_outbound_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_MS_MIS_REPORT';
		END;

	/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;

	
	/** Action for Outbound Institution MIS Report  for Good, Average, Poor:: By: Niranjan **/
	IF(P_ACTION = 'VOIR')THEN
		set @p_date_filte = '';
		if(@p_from_date != '')then
			set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
		end if;
		if(@p_to_date != '')then
			set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
		end if;
		set @p_date_filte = '';
		if(@p_intDepartmentId > 0)then
			set @p_date_filte = concat(@p_date_filte, ' AND A.intDepartmentId = ',@p_intDepartmentId);
		end if;
		if(@p_intDistrictId > 0)then
			set @p_date_filte = concat(@p_date_filte, ' AND A.intDistrictId = ',@p_intDistrictId);
		end if;
		set @P_SQLS = '';
		
		set @P_SQLS = CONCAT(@P_SQLS, 'select A.*, B.VCH_VALUE_NAME as vchDestrictName, C.vchDeptName as vchDepartmentName,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchCallConnected,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchBad,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchPoor,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchAverage,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchGood,
	(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchOutstanding
	from (select A.intHospitalId as int_hs_ps_id, A.vchHospitalName as vchInstitutionName, A.intDistrictId, 12 as intDepartmentId from m_ms_hospital A where A.bitDeletedFlag = 0
	union all
	select A.intPolicestationId as int_hs_ps_id, A.vchPolicestationName as vchInstitutionName, A.intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station A where A.bitDeletedFlag = 0) as A
	left join m_admin_subnode_values B on (B.INT_SUBNODEVAL_ID = A.intDistrictId)
	left join m_department C on (C.intDeptId = A.intDepartmentId)
	where 1=1 ',@p_date_filte,' having vchCallConnected > 0 ');
		if(@p_vchScoring = 1)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
		elseif(@p_vchScoring = 2)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
		elseif(@p_vchScoring = 3)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
		elseif(@p_vchScoring = 4)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76');
		end if;
		set @P_SQLS = concat(@P_SQLS, ' order by vchCallConnected desc, A.vchInstitutionName asc');
		#SELECT @P_SQLS;
		PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;
	END IF;

	/** Action for Get Institution Wise Report for Authority **/
	IF(P_ACTION = 'VIAR')THEN
		set @P_SQLS = '';
		set @P_SQLS = CONCAT(@P_SQLS, 'select count(1) as vchCallConnected, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, institution,
		sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
		sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
		sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
		sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
		sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding,
        (select Z.vchDeptName from m_department Z where Z.intDeptId = intDepartment) as vchDepartmentName,
		VCH_VALUE_NAME as vchDestrictName, ');
        IF(@p_intDepartmentId = 14)THEN
			set @P_SQLS = CONCAT(@P_SQLS, ' T1.vchPolicestationName as vchInstitutionName ');
		ELSE
			set @P_SQLS = CONCAT(@P_SQLS, ' T1.vchHospitalName as vchInstitutionName ');
        END IF;
		set @P_SQLS = CONCAT(@P_SQLS, 'from (select ', @p_intDepartmentId ,' as intDepartment,T5.totalQuestion,T5.posative,T5.int_hs_ps_id AS institution,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
		join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.int_hs_ps_id from t_ms_feedback_ans_submited A
		join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
		where B.intDepartmentId=', @p_intDepartmentId);
        IF(@p_intDistrictId > 0)then
			set @P_SQLS = concat(@P_SQLS, ' AND B.intDistrictId = ',@p_intDistrictId);
		END IF;
        set @P_SQLS = CONCAT(@P_SQLS, ' and B.intFeedbackCollectedBy=3 group by A.intOutboundDataId)T5)T6 ');
        IF(@p_intDepartmentId = 14)THEN
			set @P_SQLS = CONCAT(@P_SQLS, 'join m_ms_police_station T1 ON (T6.institution = T1.intPolicestationId)
			join m_admin_subnode_values T2 ON (T1.intConsoleDistId = T2.INT_SUBNODEVAL_ID)');
		ELSE
			set @P_SQLS = CONCAT(@P_SQLS, 'join m_ms_hospital T1 ON (T6.institution = T1.intHospitalId)
			join m_admin_subnode_values T2 ON (T1.intDistrictId = T2.INT_SUBNODEVAL_ID)');
        END IF;
		set @P_SQLS = CONCAT(@P_SQLS, ' group by institution having vchCallConnected > 0 ');
        if(@p_vchScoring = 1)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
		elseif(@p_vchScoring = 2)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
		elseif(@p_vchScoring = 3)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
		elseif(@p_vchScoring = 4)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76');
		end if;
		set @P_SQLS = concat(@P_SQLS, ' order by vchCallConnected desc, vchInstitutionName asc');
        #select @P_SQLS;
        PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;
    END IF;
    
    /** Action for Get Institution Wise Report for Combine **/
	IF(P_ACTION = 'VICR')THEN
		set @p_date_filte = '';
		if(@p_from_date != '')then
			set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
		end if;
		if(@p_to_date != '')then
			set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
		end if;
		set @p_date_filte = '';
		if(@p_intDepartmentId > 0)then
			set @p_date_filte = concat(@p_date_filte, ' AND A.intDepartmentId = ',@p_intDepartmentId);
		end if;
		if(@p_intDistrictId > 0)then
			set @p_date_filte = concat(@p_date_filte, ' AND A.intDistrictId = ',@p_intDistrictId);
		end if;
        
		set @P_SQLS = '';
        
		set @P_SQLS = CONCAT(@P_SQLS, 'SELECT T1.int_hs_ps_id, T1.vchInstitutionName, T1.intDistrictId, T1.intDepartmentId, T1.vchDestrictName, T1.vchDepartmentName, (T1.vchCallConnected + case when T2.vchCallConnected > 0 then T2.vchCallConnected else 0 end) AS vchCallConnected, (T1.vchBad + case when T2.vchBad > 0 then T2.vchBad else 0 end) AS vchBad, (T1.vchPoor + case when T2.vchPoor > 0 then T2.vchPoor else 0 end) AS vchPoor, (T1.vchAverage + case when T2.vchAverage > 0 then T2.vchAverage else 0 end) AS vchAverage, (T1.vchGood + case when T2.vchGood > 0 then T2.vchGood else 0 end) AS vchGood, (T1.vchOutstanding + case when T2.vchOutstanding > 0 then T2.vchOutstanding else 0 end) AS vchOutstanding FROM (select A.*, B.VCH_VALUE_NAME as vchDestrictName, C.vchDeptName as vchDepartmentName,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchCallConnected,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchBad,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchPoor,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchAverage,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchGood,
(select count(1) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 and N.int_hs_ps_id = A.int_hs_ps_id AND N.intDepartmentId = A.intDepartmentId) as vchOutstanding
from (select A.intHospitalId as int_hs_ps_id, A.vchHospitalName as vchInstitutionName, A.intDistrictId, 12 as intDepartmentId from m_ms_hospital A where A.bitDeletedFlag = 0
union all
select A.intPolicestationId as int_hs_ps_id, A.vchPolicestationName as vchInstitutionName, A.intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station A where A.bitDeletedFlag = 0) as A
left join m_admin_subnode_values B on (B.INT_SUBNODEVAL_ID = A.intDistrictId)
left join m_department C on (C.intDeptId = A.intDepartmentId)
where 1=1 ',@p_date_filte,') AS T1
LEFT JOIN 
(select count(1) as vchCallConnected, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, institution,
sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding,
(select Z.vchDeptName from m_department Z where Z.intDeptId = intDepartment) as vchDepartmentName,
VCH_VALUE_NAME as vchDestrictName,  ');
        IF(@p_intDepartmentId = 14)THEN
			set @P_SQLS = CONCAT(@P_SQLS, ' T1.vchPolicestationName as vchInstitutionName ');
		ELSE
			set @P_SQLS = CONCAT(@P_SQLS, ' T1.vchHospitalName as vchInstitutionName ');
        END IF;
		set @P_SQLS = CONCAT(@P_SQLS, 'from (select ', @p_intDepartmentId ,' as intDepartment,T5.totalQuestion,T5.posative,T5.int_hs_ps_id AS institution,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
		join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.int_hs_ps_id from t_ms_feedback_ans_submited A
		join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
		where B.intDepartmentId=', @p_intDepartmentId);
        IF(@p_intDistrictId > 0)then
			set @P_SQLS = concat(@P_SQLS, ' AND B.intDistrictId = ',@p_intDistrictId);
		END IF;
        set @P_SQLS = CONCAT(@P_SQLS, ' and B.intFeedbackCollectedBy=3 group by A.intOutboundDataId)T5)T6 ');
        IF(@p_intDepartmentId = 14)THEN
			set @P_SQLS = CONCAT(@P_SQLS, 'join m_ms_police_station T1 ON (T6.institution = T1.intPolicestationId)
			join m_admin_subnode_values T2 ON (T1.intConsoleDistId = T2.INT_SUBNODEVAL_ID)');
		ELSE
			set @P_SQLS = CONCAT(@P_SQLS, 'join m_ms_hospital T1 ON (T6.institution = T1.intHospitalId)
			join m_admin_subnode_values T2 ON (T1.intDistrictId = T2.INT_SUBNODEVAL_ID)');
        END IF;
		set @P_SQLS = CONCAT(@P_SQLS, '  group by institution) AS T2 ON(T2.institution = T1.int_hs_ps_id) HAVING vchCallConnected > 0 ');
        if(@p_vchScoring = 1)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
		elseif(@p_vchScoring = 2)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
		elseif(@p_vchScoring = 3)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
		elseif(@p_vchScoring = 4)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76');
		end if;
		set @P_SQLS = concat(@P_SQLS, ' order by vchCallConnected desc, vchInstitutionName asc');
        #select @P_SQLS;
        PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;
    END IF;
    
    
    
    /*
		Action For View District Wise Feedback Report For HCM / CMO
        By: Niranjan
        On: 31-10-2019
    */
    IF(P_ACTION = 'VODR')THEN
		set @p_date_filte = '';
		if(@p_intDepartmentId > 0)then
			set @p_date_filte = concat(@p_date_filte, ' AND N.intDepartmentId = ',@p_intDepartmentId);
		end if;
		set @P_SQLS = '';
        
		set @P_SQLS = CONCAT(@P_SQLS, 'SELECT A.INT_SUBNODEVAL_ID,A.VCH_VALUE_NAME AS vchDestrictName,
        (select Z.vchDeptName from m_department Z where Z.intDeptId = ',@p_intDepartmentId,') as vchDepartmentName,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchCallConnected,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchBad,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchPoor,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchAverage,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchGood,
		(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchOutstanding
		from m_admin_subnode_values A WHERE A.INT_PARENT_NODE=1 AND A.BIT_DELETED_FLAG=0 having vchCallConnected > 0 '); 
        if(@p_vchScoring = 1)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
		elseif(@p_vchScoring = 2)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
		elseif(@p_vchScoring = 3)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
		elseif(@p_vchScoring = 4)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76 ');
		end if;
        set @P_SQLS = CONCAT(@P_SQLS, ' ORDER BY vchCallConnected DESC, vchDestrictName asc');
        #select @P_SQLS;
        PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;
    END IF;
    
	/*
		Action For View District Wise Feedback Report For Other Authority
        By: Niranjan
        On: 31-10-2019
    */
    IF(P_ACTION = 'VDAR')THEN
		set @P_SQLS = '';
		set @P_SQLS = CONCAT(@P_SQLS, 'select count(1) as vchCallConnected, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, intDistrictId,
		sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
		sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
		sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
		sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
		sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding,
		(select Z.vchDeptName from m_department Z where Z.intDeptId = intDepartment) as vchDepartmentName,
		VCH_VALUE_NAME as vchDestrictName from (select ', @p_intDepartmentId ,' as intDepartment,T5.totalQuestion,T5.posative,T5.intDistrictId AS intDistrictId,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
		join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.intDistrictId from t_ms_feedback_ans_submited A
		join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
		where B.intDepartmentId=',@p_intDepartmentId,' and B.intFeedbackCollectedBy=3 group by A.intOutboundDataId)T5)T6 join m_admin_subnode_values T2 ON (T6.intDistrictId = T2.INT_SUBNODEVAL_ID) group by intDistrictId having vchCallConnected > 0 ');
        if(@p_vchScoring = 1)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
		elseif(@p_vchScoring = 2)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
		elseif(@p_vchScoring = 3)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
		elseif(@p_vchScoring = 4)then
			set @P_SQLS = concat(@P_SQLS, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76');
		end if;
		set @P_SQLS = concat(@P_SQLS, '   order by vchCallConnected desc, vchDestrictName asc');
        PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;
    END IF;
    
    /*
		Action For View District Wise Feedback Report For Inbound vs Outbound
        By: Niranjan
        On: 01-11-2019
    */
    IF(P_ACTION = 'DIB')THEN
		/*
		select T1.intDistrictId, T1.totalInboundData, T2.totalOutbound, D.VCH_VALUE_NAME as vchDistrictName from (select intDistrictId, count(1) as totalInboundData from 
(SELECT intOutboundDataId, 1 AS dataType, intDepartmentId, intDistrictId, dtmRegdDateTime FROM t_ms_outbound_data WHERE bitDeletedFlag = 0 
UNION ALL
SELECT intInboundDataId AS intOutboundDataId, 2 AS dataType, intDepartmentId, intDistrictId, vchServiceDate AS dtmRegdDateTime FROM t_ms_inbound_data WHERE bitDeletedFlag = 0) as T where 1=1 and T.intDepartmentId = 12 and T.dataType = 1 and date(T.dtmRegdDateTime) =  '2019-10-10'
group by intDistrictId) T1 
left join (select T.intDistrictId, count(1) as totalOutbound from (select B.intDistrictId, B.intOutboundDataId from t_ms_feedback_received B where B.bitDeletedFlag = 0 and B.intFeedbackStatus > 0 and 1=1 and B.intDepartmentId = 12 and B.intCallType = 1 and date(B.dtmCreatedOn) =  '2019-10-10'  group by B.intDistrictId,B.intOutboundDataId) T group by T.intDistrictId) T2 ON(T1.intDistrictId = T2.intDistrictId) join m_admin_subnode_values D ON (D.INT_SUBNODEVAL_ID = T1.intDistrictId and D.INT_PARENT_NODE = 1);

		*/
        set @P_SQLS = '';
		set @P_SQLS = CONCAT(@P_SQLS, 'select T1.intDistrictId, T1.totalInboundData, T2.totalOutbound, D.VCH_VALUE_NAME as vchDistrictName from (select intDistrictId, count(1) as totalInboundData from 
(SELECT intOutboundDataId, 1 AS dataType, intDepartmentId, intDistrictId, dtmRegdDateTime FROM t_ms_outbound_data WHERE bitDeletedFlag = 0 
UNION ALL
SELECT intInboundDataId AS intOutboundDataId, 2 AS dataType, intDepartmentId, intDistrictId, vchServiceDate AS dtmRegdDateTime FROM t_ms_inbound_data WHERE bitDeletedFlag = 0) as T where 1=1 ');
		if(@p_from_date != '')then
			set @P_SQLS = concat(@P_SQLS, ' AND DATE(T.dtmRegdDateTime) >= "',@p_from_date,'"');
		end if;
		if(@p_to_date != '')then
			set @P_SQLS = concat(@P_SQLS, ' AND DATE(T.dtmRegdDateTime) <= "',@p_to_date,'"');
		end if;
        if(@p_intDepartmentId != '' and @p_intDepartmentId = 'CC')then
			set @P_SQLS = concat(@P_SQLS, 'and T.dataType = 2 ');
		elseif(@p_intDepartmentId != '' and @p_intDepartmentId > 0)then
			set @P_SQLS = concat(@P_SQLS, 'and T.dataType = 1 and T.intDepartmentId = ',@p_intDepartmentId);
        end if;
set @P_SQLS = CONCAT(@P_SQLS, ' group by intDistrictId) T1 
left join (select T.intDistrictId, count(1) as totalOutbound from (select B.intDistrictId, B.intOutboundDataId from t_ms_feedback_received B where B.bitDeletedFlag = 0 and B.intFeedbackStatus > 0 and 1=1 '); 
		if(@p_from_date != '')then
			set @P_SQLS = concat(@P_SQLS, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
		end if;
		if(@p_to_date != '')then
			set @P_SQLS = concat(@P_SQLS, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
		end if;
        if(@p_intDepartmentId != '' and @p_intDepartmentId = 'CC')then
			set @P_SQLS = concat(@P_SQLS, 'and B.intCallType = 2 ');
		elseif(@p_intDepartmentId != '' and @p_intDepartmentId > 0)then
			set @P_SQLS = concat(@P_SQLS, 'and B.intCallType = 1 and B.intDepartmentId = ',@p_intDepartmentId);
        end if;
set @P_SQLS = CONCAT(@P_SQLS, ' group by B.intDistrictId,B.intOutboundDataId) T group by T.intDistrictId) T2 ON(T1.intDistrictId = T2.intDistrictId) join m_admin_subnode_values D ON (D.INT_SUBNODEVAL_ID = T1.intDistrictId and D.INT_PARENT_NODE = 1) order by vchDistrictName asc');
		PREPARE STMT FROM @P_SQLS;
		EXECUTE STMT;

    END IF;
    
    /** Action for Authority Call Attempted MIS Report:: By: Niranjan **/
IF(P_ACTION = 'VACR')THEN
	select B.INT_DESG_ID, B.INT_RANK_ID, A.INT_PH_LOCATION into @P_INT_DESG_ID, @P_INT_RANK_ID, @P_INT_PH_LOCATION from m_admin_user A left join m_admin_desg_master B ON (B.INT_DESG_ID = A.INT_DESIGNATION_ID) where A.INT_USER_ID = @p_intAuthId;
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	set @P_SQLS = CONCAT(@P_SQLS, 'select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, A.INT_DESIGNATION_ID as intDesignationId, A.INT_PH_LOCATION as intDepartmentId, B.vchDeptName, C.VCH_DESG_NAME as vchDescName,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 ',@p_date_filte,') as vchTotal,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus in (1,12,11,7) ',@p_date_filte,') as vchConnected,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 0 ',@p_date_filte,') as vchNotUpdate,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus in (2,3,4,5,8,9) ',@p_date_filte,') as vchNotConnected
	from m_admin_user A
	left join m_department B on (B.intDeptId = A.INT_PH_LOCATION and B.bitDeletedFlag = 0)
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where A.BIT_DELETED_FLAG = 0 and INT_DESIGNATION_ID not in (13,15, 0) '); -- 6,20,16,19,8,18,17,14
    IF(@P_INT_DESG_ID > 0 AND @P_INT_RANK_ID > 1)THEN
		set @P_SQLS = CONCAT(@P_SQLS, ' AND (C.INT_RANK_ID > ',@P_INT_RANK_ID,' OR A.INT_USER_ID = ',@p_intAuthId,' )');
    END IF;
    IF(@P_INT_PH_LOCATION > 0)THEN
		set @P_SQLS = CONCAT(@P_SQLS, ' AND A.INT_PH_LOCATION = ',@P_INT_PH_LOCATION);
    END IF;
    set @P_SQLS = CONCAT(@P_SQLS, ' ORDER BY C.INT_RANK_ID ASC,A.INT_USER_ID asc, A.VCH_FULL_NAME asc');
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;

/** Action for Outbound Authority MIS Report for Good, Average, Poor:: By: Niranjan **/
IF(P_ACTION = 'VOAR')THEN
	set @p_date_filte = '';
    if(@p_from_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) >= "',@p_from_date,'"');
    end if;
    if(@p_to_date != '')then
		set @p_date_filte = concat(@p_date_filte, ' AND DATE(B.dtmCreatedOn) <= "',@p_to_date,'"');
    end if;
	set @P_SQLS = '';
	/*set @P_SQLS = CONCAT(@P_SQLS, 'select A.INT_USER_ID as intUserId, A.VCH_FULL_NAME as vchFullName, B.vchDeptName,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 ',@p_date_filte,') as vchReceived,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 4 ',@p_date_filte,') as vchBad,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 1 ',@p_date_filte,') as vchPoor,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 2 ',@p_date_filte,') as vchAverage,
	(select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 3 ',@p_date_filte,') as vchGood,
    (select count(1) from t_ms_feedback_received B where B.intRequestedById = A.INT_USER_ID and B.bitDeletedFlag = 0 and B.intFeedbackStatus = 1 and B.intDirectCallFeedbackStatus = 5 ',@p_date_filte,') as vchOutstanding, 0 as vchTotalQuestion, 0 as vchPosative, 0 as intRequestedById
	from m_admin_user A
	left join m_department B on (B.intDeptId = A.INT_PH_LOCATION and B.bitDeletedFlag = 0)
	left join m_admin_desg_master C on (C.INT_DESG_ID = A.INT_DESIGNATION_ID and C.BIT_DELETED_FLAG = 0)
	where INT_DESIGNATION_ID in (8,20) union all');*/
    set @P_SQLS = CONCAT(@P_SQLS, ' select * from (select intRequestedById as intUserId, VCH_FULL_NAME as vchFullName, (select Z.vchDeptName from m_department Z where Z.intDeptId = T2.INT_PH_LOCATION) as vchDeptName, count(1) as vchReceived,
		sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
		sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
		sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
		sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
		sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, intRequestedById from (select T5.totalQuestion,T5.posative, T5.intRequestedById,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
		join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.intRequestedById from t_ms_feedback_ans_submited A
		join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
		where B.intFeedbackCollectedBy=3 ',@p_date_filte,' group by A.intOutboundDataId)T5)T6 
        join m_admin_user T2 ON (T6.intRequestedById = T2.INT_USER_ID) where T2.INT_USER_ID !=1 group by intRequestedById, intUserId order by vchReceived desc) as t ');  
    #SELECT @P_SQLS;
    PREPARE STMT FROM @P_SQLS;
	EXECUTE STMT;
END IF;


/** Action for View District Wise Call Report For Combine (HCM/CMO and Authority) **/
IF(P_ACTION = 'VDCR')THEN
	set @p_date_filte = '';
	if(@p_intDepartmentId > 0)then
		set @p_date_filte = concat(@p_date_filte, ' AND N.intDepartmentId = ',@p_intDepartmentId);
	end if;
	SET @P_SQL = '';
    SET @P_SQL = CONCAT('select t1.vchDestrictName, t1.vchDepartmentName, (t1.vchCallConnected + case when t2.vchCallConnected > 0 then t2.vchCallConnected else 0 end) as vchCallConnected, (t1.vchBad + case when t2.vchBad > 0 then t2.vchBad else 0 end) as vchBad, (t1.vchPoor + case when t2.vchPoor > 0 then t2.vchPoor else 0 end) as vchPoor, (t1.vchAverage + case when t2.vchAverage > 0 then t2.vchAverage else 0 end) as vchAverage, (t1.vchGood + case when t2.vchGood > 0 then t2.vchGood else 0 end) as vchGood, (t1.vchOutstanding + case when t2.vchOutstanding > 0 then t2.vchOutstanding else 0 end) as vchOutstanding from (SELECT A.INT_SUBNODEVAL_ID,A.VCH_VALUE_NAME AS vchDestrictName,
(select Z.vchDeptName from m_department Z where Z.intDeptId = ',@p_intDepartmentId,') as vchDepartmentName,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchCallConnected,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchBad,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1  ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchPoor,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchAverage,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchGood,
(select count(*) from t_ms_feedback_received N where N.intRequestedById in (200,270) and N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchOutstanding
from m_admin_subnode_values A WHERE A.INT_PARENT_NODE=1 AND A.BIT_DELETED_FLAG=0) as t1
left join
(select count(1) as vchCallConnected, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, intDistrictId,
sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding,
(select Z.vchDeptName from m_department Z where Z.intDeptId = intDepartment) as vchDepartmentName,
VCH_VALUE_NAME as vchDestrictName from (select ', @p_intDepartmentId ,' as intDepartment,T5.totalQuestion,T5.posative,T5.intDistrictId AS intDistrictId,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.intDistrictId from t_ms_feedback_ans_submited A
join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
where B.intDepartmentId=', @p_intDepartmentId ,' and B.intFeedbackCollectedBy=3 group by A.intOutboundDataId)T5)T6 join m_admin_subnode_values T2 ON (T6.intDistrictId = T2.INT_SUBNODEVAL_ID) group by intDistrictId)as t2 ON (t2.intDistrictId = t1.INT_SUBNODEVAL_ID) having vchCallConnected > 0 ');

	if(@p_vchScoring = 1)then
		set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
	elseif(@p_vchScoring = 2)then
		set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
	elseif(@p_vchScoring = 3)then
		set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
	elseif(@p_vchScoring = 4)then
		set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76 ');
	end if;
	set @P_SQL = CONCAT(@P_SQL, ' ORDER BY vchCallConnected DESC, vchDestrictName asc');

	PREPARE STMT FROM @P_SQL;
	EXECUTE STMT;
END IF;




IF(P_ACTION = 'VDCN')THEN
					set @p_date_filte = '';
					if(@p_intServiceId > 0)then
						set @p_date_filte = concat(@p_date_filte, ' AND N.intServiceId = ',@p_intServiceId);
					end if;
					SET @P_SQL = '';
					SET @P_SQL = CONCAT('select t1.vchDestrictName, t1.vchServiceName, (t1.vchCallConnected + case when t2.vchCallConnected > 0 then t2.vchCallConnected else 0 end) as vchCallConnected, (t1.vchBad + case when t2.vchBad > 0 then t2.vchBad else 0 end) as vchBad, (t1.vchPoor + case when t2.vchPoor > 0 then t2.vchPoor else 0 end) as vchPoor, (t1.vchAverage + case when t2.vchAverage > 0 then t2.vchAverage else 0 end) as vchAverage, (t1.vchGood + case when t2.vchGood > 0 then t2.vchGood else 0 end) as vchGood, (t1.vchOutstanding + case when t2.vchOutstanding > 0 then t2.vchOutstanding else 0 end) as vchOutstanding  from (SELECT A.INT_SUBNODEVAL_ID,A.VCH_VALUE_NAME AS vchDestrictName,
				(SELECT 
                    Z.vchServiceName
                FROM
                    m_ms_service_registration Z
                WHERE
                    Z.intServiceRegistrationId = ',@p_intServiceId,') as vchServiceName,
				(select count(*) from t_ms_feedback_received N where  N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchCallConnected,
				(select count(*) from t_ms_feedback_received N where  N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 4 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchBad,
				(select count(*) from t_ms_feedback_received N where  N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 1  ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchPoor,
				(select count(*) from t_ms_feedback_received N where N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 2 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchAverage,
				(select count(*) from t_ms_feedback_received N where  N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 3 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchGood,
				(select count(*) from t_ms_feedback_received N where  N.bitDeletedFlag = 0 and N.intFeedbackStatus = 1 and N.intDirectCallFeedbackStatus = 5 ', @p_date_filte ,' AND A.INT_SUBNODEVAL_ID=N.intDistrictId) vchOutstanding
				from m_admin_subnode_values A WHERE A.INT_PARENT_NODE=1 AND A.BIT_DELETED_FLAG=0) as t1
				left join
				(select count(1) as vchCallConnected, sum(totalQuestion) as vchTotalQuestion, sum(posative) as vchPosative, intDistrictId,
				sum(case when T6.FeedbackStatus <= 20 then 1 else 0 end) as vchBad,
				sum(case when T6.FeedbackStatus >= 21 and T6.FeedbackStatus <= 40 then 1 else 0 end) as vchPoor,
				sum(case when T6.FeedbackStatus >= 41 and T6.FeedbackStatus <= 60 then 1 else 0 end) as vchAverage,
				sum(case when T6.FeedbackStatus >= 61 and T6.FeedbackStatus <= 80 then 1 else 0 end) as vchGood,
				sum(case when T6.FeedbackStatus >= 81 then 1 else 0 end) as vchOutstanding,
				(SELECT 
                    Z.vchServiceName
                FROM
                    m_ms_service_registration Z
                WHERE
                    Z.intServiceRegistrationId = intService) AS vchServiceName,
				VCH_VALUE_NAME as vchDestrictName from (select ', @p_intServiceId ,' as intService,T5.totalQuestion,T5.posative,T5.intDistrictId AS intDistrictId,T5.intOutboundDataId, round((T5.posative/T5.totalQuestion*100),2) AS FeedbackStatus from (select count(1) As totalQuestion, (select count(1) from (select A.intOutboundDataId,A.intQuestionId,A.intAnswerId,B.intOptionValue from t_ms_feedback_ans_submited A
				join t_ms_survey_questionnaire_option B on (A.intAnswerId=B.intSurveyOptionId))t3 where t3.intOptionValue=1 and t3.intOutboundDataId = A.intOutboundDataId) as posative, A.intOutboundDataId,B.intDepartmentId, B.intDistrictId from t_ms_feedback_ans_submited A
				join t_ms_feedback_received B ON(A.intOutboundDataId=B.intFeedbackRecId)
				where B.intServiceId=', @p_intServiceId ,' and B.intFeedbackCollectedBy=3 group by A.intOutboundDataId)T5)T6 join m_admin_subnode_values T2 ON (T6.intDistrictId = T2.INT_SUBNODEVAL_ID) group by intDistrictId)as t2 ON (t2.intDistrictId = t1.INT_SUBNODEVAL_ID) having vchCallConnected > 0 ');

					if(@p_vchScoring = 1)then
						set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 25');
					elseif(@p_vchScoring = 2)then
						set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 26 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 50');
					elseif(@p_vchScoring = 3)then
						set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 51 and round((vchGood + vchOutstanding) / vchCallConnected * 100) <= 75');
					elseif(@p_vchScoring = 4)then
						set @P_SQL = concat(@P_SQL, '  and round((vchGood + vchOutstanding) / vchCallConnected * 100) >= 76 ');
					end if;
					set @P_SQL = CONCAT(@P_SQL, ' ORDER BY vchCallConnected DESC, vchDestrictName asc');
 -- select @P_SQL;
					PREPARE STMT FROM @P_SQL;
					EXECUTE STMT;
END IF;









END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_OFFLINE_FEEDBACK` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_OFFLINE_FEEDBACK`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN

	/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
    /** End of params building block **/   
	/**
    Action for Fetch Offline Data from Mobile Number
    By: Niranjan Pandit
    On: 17-10-2019
    **/
    IF(P_ACTION = 'GOF')THEN
		SELECT OD.intOutboundDataId, OD.intDepartmentId, OD.intServiceId,SR.vchServiceName,DP.VCH_VALUE_NAME AS DistrictName, DPT.vchDeptName, OD.intDistrictId, OD.vchName, OD.intMobile, OD.intAge, OD.intGender,  OD.intBookmark, OD.intAssignedTo, OD.dtmAssignedTime,  OD.intFeedbackStatus,OD.dataType, OD.dtmCreatedOn, OD.int_hs_ps_id, OD.jsonRelatedInfo, OD.vchRegdNo, (select count(1) from t_ms_call_information N where N.intMobile = OD.intMobile and N.intOutboundDataId = OD.intOutboundDataId and N.intType = OD.dataType) as vchCountCallHistory, OD.dtmRegdDateTime, case when OD.intDepartmentId = 12 then 
(select Z.vchHospitalName from m_ms_hospital Z where Z.intHospitalId = OD.int_hs_ps_id)
when OD.intDepartmentId = 14 then
(select Z.vchPolicestationName from m_ms_police_station Z where Z.intPolicestationId = OD.int_hs_ps_id)
end as PO_Hospital, OD.vchOther, (select count(1) from t_ms_feedback_received CS where CS.intOutboundDataId = OD.intOutboundDataId and CS.intCallType = OD.dataType and CS.intCallThrough = 2 and CS.intRequestedById = @p_intUserId) as vchCallStatus from vw_ms_pull_data OD LEFT JOIN m_ms_service_registration SR ON (SR.intServiceRegistrationId=OD.intServiceId AND SR.bitDeletedFlag=0) LEFT JOIN m_admin_subnode_values DP ON (DP.BIT_DELETED_FLAG=0 AND DP.INT_PARENT_NODE=1 AND DP.INT_SUBNODEVAL_ID=OD.intDistrictId) LEFT JOIN m_department DPT ON (DPT.intDeptId=OD.intDepartmentId AND DPT.bitDeletedFlag=0) where 0=0 and OD.intMobile = @p_intMobile;
    END IF;
    
     /** Action for Submit Feedback For Offline Feedback Submit **/
	IF(P_ACTION = 'SOFA')THEN
		IF(@p_intCallType = 1)then
			UPDATE t_ms_outbound_data SET intFeedbackStatus = @p_intFeedbackStatus, dtmFeedbackRcvTime = now() where intOutboundDataId = @p_intOutboundDataId;
            select intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id into @intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id from t_ms_outbound_data WHERE intOutboundDataId = @p_intOutboundDataId;
        elseif(@p_intCallType = 2)then
			UPDATE t_ms_inbound_data SET intFeedbackStatus = @p_intFeedbackStatus, dtmFeedbackRcvTime = now() where intInboundDataId = @p_intOutboundDataId;
            select intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id into @intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id from t_ms_inbound_data WHERE intInboundDataId = @p_intOutboundDataId;
        end if;
        
        INSERT INTO t_ms_feedback_received (intOutboundDataId, intFeedbackStatus, intRequestedById, intCallBackRequest, intFeedbackCollectedBy, intCreatedBy, intCallType, intCallThrough, dtmFeedbackRcvTime,intDepartmentId, intServiceId, intDistrictId, int_hs_ps_id) VALUES (@p_intOutboundDataId, @p_intFeedbackStatus, @p_intRequestedById, @p_intCallBackRequest, @p_intFeedbackCollectedBy, @p_intCreatedBy, @p_intCallType, @p_intCallThrough, now(),@intDepartmentId, @intServiceId, @intDistrictId, @int_hs_ps_id);
        set @p_intFeedbackRecId = LAST_INSERT_ID();
		
        INSERT INTO t_ms_call_information (intOutboundDataId,intFeedbackRecId,intMobile, intType, intFeedbackStatus, intCreatedBy) VALUES (@p_intOutboundDataId, @p_intFeedbackRecId,@p_vchMobileNo, @p_intCallType, @p_intFeedbackStatus, @p_intCreatedBy);
		DELETE FROM t_ms_feedback_ans_submited WHERE intOutboundDataId = @p_intFeedbackRecId and intType = 0;
		IF(@p_FeedbackAnsQry != '')THEN
			SET @P_SQL_QRY = CONCAT('INSERT INTO t_ms_feedback_ans_submited(intOutboundDataId, intQuestionId, intAnswerId, vchRemarks, intCreatedBy) VALUES ', @p_FeedbackAnsQry);
			PREPARE STMT FROM @P_SQL_QRY;
			EXECUTE STMT;
		END IF;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_OUTBOUND` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_OUTBOUND`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
BEGIN


    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
       
IF(P_ACTION='PG') THEN
    SET @START_REC=@p_intRecno;
	SET @P_SQL='select intOutboundDataId, intDepartmentId, intServiceId, intDistrictId, vchName, intMobile,dtmRegdDateTime, jsonRelatedInfo, intBookmark, intAssignedTo, dtmAssignedTime,dtmCreatedOn, vchQuery from t_ms_outbound_data A where bitDeletedFlag=0';
     IF(@p_vchDepartmentId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intDepartmentId=',@p_vchDepartmentId);
    END IF;
    
    IF(@p_vchFromDate>0 OR @p_vchToDate>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND date(A.dtmCreatedOn) between "',@p_vchFromDate,'" AND "',@p_vchToDate,'"');
    END IF;
     IF(@p_vchServicesId>0)THEN
      SET @P_SQL=CONCAT(@P_SQL,' AND intServiceId=',@p_vchServicesId);
    END IF;
	SET @P_SQL=CONCAT(@P_SQL,' ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	PREPARE STMT FROM @P_SQL;
    
	 EXECUTE STMT USING @START_REC;
    END IF; 



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_RANGE_TAGGING` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_RANGE_TAGGING`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
 
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
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
      
      INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_table_name',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`=CONCAT('CALL USP_MG_PULL_DATA("',P_ACTION, '","',P_VALUES,'")');
      
END;





/** Start of params building block **/
    
	SET @vsql = CONCAT('SET ',P_VALUES); 
    PREPARE PARAMSTMT from @vsql; 
    EXECUTE PARAMSTMT;
    DEALLOCATE PREPARE PARAMSTMT;
    
	IF(P_ACTION='RP') THEN    
			SET @P_SQL='select intRangeId, vchRangeName, bitDeletedFlag, dtmCreatedOn from m_ms_admin_range A where bitDeletedFlag=0';
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;    
    END IF;
    IF(P_ACTION='FP') THEN    
			SET @P_SQL = CONCAT('select intPolicestationId, vchPolicestationName, vchPSCode, dtmCreatedOn, intCreatedBy, bitDeletedFlag, intDistrictId, intConsoleDistId,(SELECT B.VCH_VALUE_NAME  from m_admin_subnode_values B where B.INT_PARENT_NODE=1 AND B.BIT_DELETED_FLAG=0 and B.INT_SUBNODEVAL_ID=A.intConsoleDistId )AS districtName, intBlockId, intGPId from m_ms_police_station A where bitDeletedFlag=0 ');
            
             IF(char_length(@p_exceptId)>0)THEN
	          SET @P_SQL=CONCAT(@P_SQL,' AND A.intPolicestationId NOT IN (',@p_exceptId,')');
             END IF;
             IF(@p_districtId>0)THEN
	          SET @P_SQL=CONCAT(@P_SQL,' AND A.intConsoleDistId =',@p_districtId);
             END IF;
             SET @P_SQL=CONCAT(@P_SQL,' order by vchPolicestationName');
            
            
            
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;    
    END IF;
    
    
    IF(P_ACTION='A') THEN 
    start transaction;
			Update   m_ms_policestation_tagging SET  bitDeletedFlag=1 where  intRangeId=@p_selRange;
            SET @P_SQL=CONCAT('INSERT INTO m_ms_policestation_tagging (intPolicestationId,intRangeId,intCreatedBy) VALUES ',@p_query);
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;
            commit;
    END IF;
    
    IF(P_ACTION='FT') THEN    
			SET @P_SQL = CONCAT('select A.inttaggingId, A.intRangeId, A.intPolicestationId,B.vchPolicestationName,B.intConsoleDistId, 
            (SELECT C.VCH_VALUE_NAME  from m_admin_subnode_values C where C.INT_PARENT_NODE=1 AND C.BIT_DELETED_FLAG=0 and C.INT_SUBNODEVAL_ID=B.intConsoleDistId )AS districtName
             from m_ms_policestation_tagging A LEFT JOIN m_ms_police_station B ON (B.intPolicestationId=A.intPolicestationId)   where A.bitDeletedFlag=0 and B.bitDeletedFlag=0 ');
             IF(@p_rangeId>0)THEN
	          SET @P_SQL=CONCAT(@P_SQL,' AND A.intRangeId=',@p_rangeId);
             END IF; 
             IF(@p_districtId>0)THEN
	          SET @P_SQL=CONCAT(@P_SQL,' AND B.intConsoleDistId=',@p_districtId);
             END IF; 
             
             SET @P_SQL=CONCAT(@P_SQL,' order by A.inttaggingId');
           
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;    
    END IF;
    
     IF(P_ACTION='AD') THEN    
			SET @P_SQL = CONCAT('SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME  from m_admin_subnode_values where INT_PARENT_NODE=1 AND BIT_DELETED_FLAG=0'); 
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;    
    END IF;
    
    
    IF(P_ACTION='FD') THEN    
			SET @P_SQL = CONCAT('SELECT DISTINCT(B.intConsoleDistId), 
            (SELECT C.VCH_VALUE_NAME  from m_admin_subnode_values C where C.INT_PARENT_NODE=1 AND C.BIT_DELETED_FLAG=0 and C.INT_SUBNODEVAL_ID=B.intConsoleDistId )AS districtName
             from m_ms_policestation_tagging A LEFT JOIN m_ms_police_station B ON (B.intPolicestationId=A.intPolicestationId)   where A.bitDeletedFlag=0 and B.bitDeletedFlag=0  ');
             IF(@p_rangeId>0)THEN
	          SET @P_SQL=CONCAT(@P_SQL,' AND A.intRangeId=',@p_rangeId);
             END IF; 
             SET @P_SQL=CONCAT(@P_SQL,' order by districtName');
           
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;    
    END IF;
    
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_SMS_LOG` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_SMS_LOG`(IN `P_ACTION` CHAR(4), IN `P_VALUES` TEXT)
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
	UPDATE t_ms_outbound_data SET intMoSarkarRegistrationStatus=1 where intOutboundDataId=@p_intInOutboundId ;
    ELSE
    UPDATE t_ms_inbound_data SET intDepartmentId=@p_intCreatedBy, intCreatedBy=@p_intCreatedBy, vchName=@p_vchName, intMobile=@p_intMobile, intGender=@p_intGender, intGender=@p_intGender, intDistrictId=@p_intDistrictId, intBlockId=@p_intBlockId, intGPId=@p_intGPId, intVillageId=@p_intVillageId, vchAddress=@p_vchAddress, intServiceId=@p_intServiceId, vchComplain=@p_vchComplain, varReferenceNo=@p_varReferenceNo, intAge=@p_intAge , intLocation=@p_intLocation , intDepartmentId = @p_intDepartmentId,int_hs_ps_id = @p_int_hs_ps_id where p_intInboundDataId=@p_intInboundDataId ;
    END IF;
    
END IF;

IF(P_ACTION='GOD') THEN  
 SELECT * FROM t_ms_outbound_data WHERE intMoSarkarRegistrationStatus=@p_intMoSarkarRegistrationStatus AND bitDeletedFlag =0;
    
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_SOCIAL_ACCOUNT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_SOCIAL_ACCOUNT`(
  P_ACTION             VARCHAR(3),
  P_ID                 INT,
  P_ACOUNT_TYPE        VARCHAR(16),
  P_ACOUNT_NAME        VARCHAR(32),
  P_SCREEN_NAME        VARCHAR(32),
  P_USER_NAME          VARCHAR(32),
  P_ACCESS_TOKEN       TEXT,
  P_ACCESS_SECRET      TEXT,
  P_CREATED_BY         INT,
  P_PHOTO              TEXT,
  P_DISPLAY_STATUS               TINYINT(2),
  P_REPLY_STATUS               TINYINT(2),
  P_SC_QRY              TEXT
)
BEGIN


IF(P_ACTION = 'C') THEN

SELECT COUNT(1) INTO @TOTAL FROM m_ms_api_account WHERE vchAccountType = P_ACOUNT_TYPE AND vchUserName = P_USER_NAME AND bitDeletedFlag=0;

SELECT @TOTAL AS TOTAL;

END IF;

IF(P_ACTION = 'A') THEN


	IF(P_ACOUNT_TYPE = 'Twitter')THEN

	INSERT INTO m_ms_api_account(vchAccountType, vchAccountName, vchScreenName, vchUserName, vchPhoto,vchAccessToken, vchAccessSecret, intCreatedBy)
	VALUES(P_ACOUNT_TYPE,P_ACOUNT_NAME,P_SCREEN_NAME,P_USER_NAME,P_PHOTO,P_ACCESS_TOKEN,P_ACCESS_SECRET,P_CREATED_BY);

	END IF;

	IF(P_ACOUNT_TYPE = 'Facebook')THEN
    
    SELECT COUNT(1) INTO @TOTAL FROM m_ms_api_account WHERE vchAccountType = P_ACOUNT_TYPE AND vchUserName = P_USER_NAME AND bitDeletedFlag=0;
    IF(@TOTAL=0)THEN
		INSERT INTO m_ms_api_account(vchAccountType, vchScreenName, vchUserName, vchPhoto,vchAccessToken, vchAccessSecret, intCreatedBy,vchAccountName)
		VALUES(P_ACOUNT_TYPE,P_SCREEN_NAME,P_USER_NAME,P_PHOTO,P_ACCESS_TOKEN,P_ACCESS_SECRET,P_CREATED_BY,P_ACOUNT_NAME);
	ELSE
    UPDATE m_ms_api_account SET vchScreenName=P_SCREEN_NAME, vchUserName=P_USER_NAME, vchPhoto=P_PHOTO,vchAccessToken=P_ACCESS_TOKEN,intCreatedBy=P_CREATED_BY WHERE vchUserName=P_USER_NAME;
    END IF;
    
	END IF;
END IF;
IF(P_ACTION = 'PG') THEN

SET @START_REC=P_ID;

SET @P_SQL='SELECT intId, vchAccountType, vchAccountName, vchScreenName, vchUserName,vchPhoto,tinDisplayStatus, tinReplyStatus,
vchAccessToken, vchAccessSecret, intCreatedBy, dtmCreatedOn
FROM m_ms_api_account WHERE bitDeletedFlag=0';

IF(CHAR_LENGTH(P_ACOUNT_TYPE)>0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND vchAccountType = "',P_ACOUNT_TYPE,'"');

END IF;

IF(P_DISPLAY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinDisplayStatus = ',P_DISPLAY_STATUS);

END IF;

IF(P_REPLY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinReplyStatus = ',P_REPLY_STATUS);

END IF;

    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY dtmCreatedOn DESC LIMIT ?,10');
	  PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;

END IF;

IF(P_ACTION = 'V') THEN


SET @P_SQL='SELECT intId, vchAccountType, vchAccountName, vchScreenName, vchUserName,vchPhoto,tinDisplayStatus, tinReplyStatus,
vchAccessToken, vchAccessSecret, intCreatedBy, dtmCreatedOn
FROM m_ms_api_account WHERE bitDeletedFlag=0';

IF(CHAR_LENGTH(P_ACOUNT_TYPE)>0)THEN
	IF(P_ACOUNT_TYPE='Facebook')THEN
		SET @P_SQL=CONCAT(@P_SQL,'  AND vchAccountType = "',P_ACOUNT_TYPE,'" AND vchAccountName="FB Page"');
	ELSE
		SET @P_SQL=CONCAT(@P_SQL,'  AND vchAccountType = "',P_ACOUNT_TYPE,'"');
	END IF;

END IF;

IF(P_DISPLAY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinDisplayStatus = ',P_DISPLAY_STATUS);

END IF;

IF(P_REPLY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinReplyStatus = ',P_REPLY_STATUS);

END IF;

    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY dtmCreatedOn DESC');
    -- select @P_SQL;
	 PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;

END IF;


IF(P_ACTION = 'VR') THEN


SET @P_SQL='SELECT intId, vchAccountType, vchAccountName, vchScreenName, vchUserName,vchPhoto,tinDisplayStatus, tinReplyStatus,
vchAccessToken, vchAccessSecret, intCreatedBy, dtmCreatedOn
FROM m_ms_api_account WHERE bitDeletedFlag=0';

IF(CHAR_LENGTH(P_ACOUNT_TYPE)>0)THEN
	IF(P_ACOUNT_TYPE='Facebook')THEN
		SET @P_SQL=CONCAT(@P_SQL,'  AND vchAccountType = "',P_ACOUNT_TYPE,'"');
	ELSE
		SET @P_SQL=CONCAT(@P_SQL,'  AND vchAccountType = "',P_ACOUNT_TYPE,'"');
	END IF;

END IF;

IF(P_DISPLAY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinDisplayStatus = ',P_DISPLAY_STATUS);

END IF;

IF(P_REPLY_STATUS > 0)THEN

SET @P_SQL=CONCAT(@P_SQL,'  AND tinReplyStatus = ',P_REPLY_STATUS);

END IF;

    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY dtmCreatedOn DESC');
    	  PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;

END IF;



IF(P_ACTION = 'D') THEN

SELECT vchAccountType,vchUserName INTO @acc_type,@user_name FROM m_ms_api_account WHERE intId = P_ID;
DELETE FROM m_ms_api_account WHERE intId = P_ID;
IF(@acc_type = 'Facebook')THEN

DELETE FROM m_social_fb_page WHERE vchAccountName = @user_name;

END IF;

END IF;

IF(P_ACTION = 'AC') THEN

UPDATE m_ms_api_account SET tinDisplayStatus = 1 WHERE intId = P_ID;


END IF;

IF(P_ACTION = 'IN') THEN

UPDATE m_ms_api_account SET tinDisplayStatus = 0 WHERE intId = P_ID;


END IF;

IF(P_ACTION = 'AC1') THEN

UPDATE m_ms_api_account SET tinReplyStatus = 1 WHERE intId = P_ID;


END IF;

IF(P_ACTION = 'IN1') THEN

UPDATE m_ms_api_account SET tinReplyStatus = 0 WHERE intId = P_ID;


END IF;


IF(P_ACTION = 'AC2') THEN

UPDATE m_social_fb_page SET tinDisplayStatus = 1 WHERE intId = P_ID;


END IF;

IF(P_ACTION = 'IN2') THEN

UPDATE m_social_fb_page SET tinDisplayStatus = 0 WHERE intId = P_ID;


END IF;

IF(P_ACTION = 'F1') THEN

SET @START_REC=P_ID;

SET @P_SQL='SELECT intId, vchAccountName, vchPageId, vchPageName, vchAccessToken, tinDisplayStatus, intCreatedBy, dtmCreatedOn, bitDeletedFlag,
(SELECT vchScreenName FROM m_ms_api_account sa WHERE sa.vchUserName = sfp.vchAccountName) AS accountName
FROM m_social_fb_page sfp WHERE bitDeletedFlag = 0';



    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY intId DESC LIMIT ?,10');
	  PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;

END IF;

IF(P_ACTION = 'F2') THEN


SET @P_SQL='SELECT intId, vchAccountName, vchPageId, vchPageName, vchAccessToken, tinDisplayStatus, intCreatedBy, dtmCreatedOn, bitDeletedFlag,
(SELECT vchScreenName FROM m_ms_api_account sa WHERE sa.vchUserName = sfp.vchAccountName) AS accountName
FROM m_social_fb_page sfp WHERE bitDeletedFlag = 0';


    SET @P_SQL=CONCAT(@P_SQL,'  ORDER BY intId DESC');
	  PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;

END IF;

IF(P_ACTION = 'FPD') THEN

    SET @P_SQL=CONCAT('SELECT
SPLIT_STR(vchAccountName,"_",2) as parentAN,
vchUserName as vchPageId, vchScreenName as vchPageName, vchAccessToken

FROM m_ms_api_account WHERE bitDeletedFlag=0 AND tinDisplayStatus = 1 AND vchAccountType = "Facebook"');


    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchScreenName ASC');
    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT;
END IF;


IF(P_ACTION = 'PT') THEN

	SET @HANDLES	= '',@H_ID='';
    SELECT INT_SUBNODEVAL_ID,INT_PH_LOCATION,INT_DESIGNATION_ID,INT_GROUP_ID INTO @INT_SUBNODEVAL_ID,@INT_PH_LOCATION,
    @INT_DESIGNATION_ID,@INT_GROUP_ID from m_admin_user where INT_USER_ID=P_ACOUNT_NAME;

	    IF(CHAR_LENGTH(@INT_GROUP_ID)>0 AND @INT_GROUP_ID > 0)THEN
    
    SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=4 and intsocioOfficerefId=@INT_GROUP_ID;	
    SET @HANDLES = @H_ID;
    
    
	    ELSE IF(CHAR_LENGTH(@INT_PH_LOCATION)>0 AND @INT_PH_LOCATION > 0)THEN
    
	SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=1 and intsocioDeptrefId=@INT_PH_LOCATION;
	SET @HANDLES = @H_ID;
    
    
	    ELSE
    
	SELECT coalesce(group_concat(vchTwhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype in(2,3) and intsocioDistrefId=@INT_SUBNODEVAL_ID 
    and intsocioDesigrefId=@INT_DESIGNATION_ID;
    SET @HANDLES = @H_ID;
    SET @HANDLES = REPLACE(@HANDLES,' ','');
    
    END IF;
    END IF;
    
    if(char_length(@HANDLES)>0 and @HANDLES != '0')then   
    
		if((select count(1) from m_ms_api_account where vchUserName = replace(@HANDLES,'@','')) = 0)then
        
			select 1 as rep_status,@HANDLES,
            (replace(FN_GET_HANDLES((select vchAllEscUsers from t_grivance_suggestion where intGrivanceId = P_ACOUNT_TYPE)),'@','')) as authenticated_acc;
        else   
			select 3 as rep_status,@HANDLES,vchAccessToken as twAccToken,vchAccessSecret as twAccSecret,
            (select vchReplyMessage from t_sm_reply_detail where intGrievanceId = P_ACOUNT_TYPE and intReplyUsertype = 2 and vchReplyMessage is not null limit 1) as replyMsg,
            (select vchAttachment from t_sm_reply_detail where intGrievanceId = P_ACOUNT_TYPE and intReplyUsertype = 2 and vchReplyMessage is not null limit 1) as replyMsgAttach,
            (select vchMessageId from t_grivance_suggestion where intGrivanceId = P_ACOUNT_TYPE) as socialId,
            (select concat(concat('@',SPLIT_STR(g.vchGrivanceFrom,'~::~',1),','),group_concat(concat('@',d.vchScreenName))) 
             from t_grivance_suggestion g,t_twitter_data_user_mentions d 
            where g.vchMessageId = d.vchTwitterId and g.intGrivanceId = P_ACOUNT_TYPE) as twMentions
            from m_ms_api_account where vchUserName = replace(@HANDLES,'@','');
            
        end if;
        
        
    else
		select 2 as rep_status;
    end if;
    
    
END IF;


IF(P_ACTION = 'PF') THEN

	SET @HANDLES	= '',@H_ID='';
    SELECT INT_SUBNODEVAL_ID,INT_PH_LOCATION,INT_DESIGNATION_ID,INT_GROUP_ID INTO @INT_SUBNODEVAL_ID,@INT_PH_LOCATION,
    @INT_DESIGNATION_ID,@INT_GROUP_ID from m_admin_user where INT_USER_ID=P_ACOUNT_NAME;

	    IF(CHAR_LENGTH(@INT_GROUP_ID)>0 AND @INT_GROUP_ID > 0)THEN
    
    SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=4 and intsocioOfficerefId=@INT_GROUP_ID;	
    SET @HANDLES = @H_ID;
    
    
	    ELSE IF(CHAR_LENGTH(@INT_PH_LOCATION)>0 AND @INT_PH_LOCATION > 0)THEN
    
	SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype=1 and intsocioDeptrefId=@INT_PH_LOCATION;
	SET @HANDLES = @H_ID;
    
    
	    ELSE
    
	SELECT coalesce(group_concat(vchFbhandler),0) INTO @H_ID FROM m_office WHERE intOfficetype in(2,3) and intsocioDistrefId=@INT_SUBNODEVAL_ID 
    and intsocioDesigrefId=@INT_DESIGNATION_ID;
    SET @HANDLES = @H_ID;
    SET @HANDLES = REPLACE(@HANDLES,' ','');
    SET @HANDLES = REPLACE(@HANDLES,'@','');
    
    END IF;
    END IF;
    
    if(char_length(@HANDLES)>0 and @HANDLES != '0')then   
    
		if((select count(1) from m_ms_api_account where vchUserName = @HANDLES) = 0)then
        
			select 1 as rep_status,@HANDLES,
            (FN_GET_HANDLES_FB((select vchAllEscUsers from t_grivance_suggestion where intGrivanceId = P_ACOUNT_TYPE))) as authenticated_acc;
        else   
			select 3 as rep_status,@HANDLES,vchAccessToken as fbAccToken,vchScreenName,
            (select vchReplyMessage from t_sm_reply_detail where intGrievanceId = P_ACOUNT_TYPE and intReplyUsertype = 2 and vchReplyMessage is not null limit 1) as replyMsg,
            (select vchAttachment from t_sm_reply_detail where intGrievanceId = P_ACOUNT_TYPE and intReplyUsertype = 2 and vchReplyMessage is not null limit 1) as replyMsgAttach,
            (select vchMessageId from t_grivance_suggestion where intGrivanceId = P_ACOUNT_TYPE) as socialId
            from m_ms_api_account where vchUserName = @HANDLES;
            
        end if;
        
        
    else
		select 2 as rep_status;
    end if;
    
    
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_MS_SOCIAL_SCHEDULER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_MS_SOCIAL_SCHEDULER`(

  P_ACTION        VARCHAR(3),
  P_ID            INT,
  P_ACOUNT        VARCHAR(16),
  P_TW_ID         VARCHAR(128),
  P_TW_REF_ID     VARCHAR(128),
  P_SCREEN_NAME   VARCHAR(128),
  P_TW_TEXT       longtext charset utf8,
  P_TW_TIME       VARCHAR(64),
  P_QUERY         longtext charset utf8mb4 ,
  P_ATR1          INT,
  P_ATR2          INT,
  P_ATR3          INT,
  P_QUERY2        longtext charset utf8mb4,
  P_QUERY3        longtext charset utf8mb4,
  P_QUERY4        longtext charset utf8mb4,
  P_QUERY5        longtext charset utf8mb4,
  P_QUERY6        longtext charset utf8mb4,
  P_QUERY7        longtext charset utf8mb4
)
BEGIN

DECLARE continue HANDLER FOR NOT FOUND
 BEGIN
 
	GET DIAGNOSTICS CONDITION 1
	@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
	@sqlstate = RETURNED_SQLSTATE, 
	@errno = MYSQL_ERRNO,
	@text = MESSAGE_TEXT; 
	SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text); 
    
	
   
    SET @P_STATUS=4;
    SET @P_MSG=('Error: Table or column not found');
	
 ROLLBACK;
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_twitter_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_SOCIAL_SCHEDULER';
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
 INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_twitter_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_SOCIAL_SCHEDULER';
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
      
      INSERT INTO `error_log` SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_twitter_data',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_SOCIAL_SCHEDULER';
      
END;


IF(P_ACTION = 'IT') THEN
select P_QUERY2;
START TRANSACTION;
  SET @RESPONSE_QRY = CONCAT('INSERT INTO t_twitter_data_mining (vchAccount,intAccountId,vchTweetId,vchTweetRefId,txtUserPhoto,vchUserScreenName,vchUserName,vchTweetText,dtmTweetCreatedTime,vchUserId,tinQuoteStatus,vchQuoteStatusId,txtQuoteStatusText,txtQuoteStatusUser,txtQuoteStatusName,txtQuoteStatusScreenName,txtQuoteStatusEntitiesMediaUrl,txtQuoteStatusEntitiesMediaExpanded_url,vchGeo,vchCoordinates,vchPlaceId,vchPlaceType,vchPlaceName,vchPlaceFullName,vchCountry) VALUES ', P_QUERY);
  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  
 
    IF(CHAR_LENGTH(P_QUERY2)>0)THEN
  SET @HASHTAGS_QRY = CONCAT('INSERT INTO t_twitter_data_hastag_mining (intAccountId,vchTweetId,vchHsahTag) VALUES ', P_QUERY2);
  PREPARE HASHTAGS_STMT FROM @HASHTAGS_QRY;
  select @HASHTAGS_QRY;
  
  END IF;
  
  IF(CHAR_LENGTH(P_QUERY3)>0)THEN
  SET @USERMENTIONS_QRY = CONCAT('INSERT INTO t_twitter_data_user_mentions_mining (intAccountId,vchTwitterId,vchTwitterUserId,vchName,vchScreenName) VALUES ', P_QUERY3);
    PREPARE USERMENTIONS_STMT FROM @USERMENTIONS_QRY;
  
  
  END IF;
  IF(CHAR_LENGTH(P_QUERY4)>0)THEN
  SET @MEDIA_QRY = CONCAT('INSERT INTO t_twitter_data_media_mining (intAccountId,vchTwitterId,vchTwitterMediaId,vchTwitterMediaType,vchTwitterMediaUrl,vchVedioInfoUrl) VALUES ', P_QUERY4);
  PREPARE MEDIA_STMT FROM @MEDIA_QRY;
  
  END IF;
   COMMIT;
    SET @P_STATUS=0;
    SELECT @P_STATUS;
END IF;


IF(P_ACTION = 'GLT') THEN

  SET @RESPONSE_QRY = CONCAT('SELECT vchTweetId FROM t_twitter_data_mining WHERE 1=1');

  IF(CHAR_LENGTH(P_ACOUNT)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND vchAccount = "',P_ACOUNT,'"');

  END IF;
  IF(CHAR_LENGTH(P_TW_ID)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND intAccountId = ',P_TW_ID);

  END IF;

  SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' ORDER BY intId DESC LIMIT 1');

  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  EXECUTE RESPONSE_STMT;

END IF;

IF(P_ACTION = 'PG')THEN

    SET @P_SQL = '';
    SET @START_REC	= P_ID;

		SET @P_SQL = CONCAT(@P_SQL,'SELECT intId,vchAccount,tweetId,tweetRefId,userPhoto,userName,userScreenName,tweetText,tweetCreatedTime,
    (SELECT COUNT(1) FROM t_grivance_suggestion gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = tweetId AND gs.vchAccount = vchAccount) AS grivanceExist,
    (SELECT COUNT(1) FROM t_griv_sugg_ask_dtls gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = tweetId AND gs.vchAccount = vchAccount) AS grivanceExistNext,
    (SELECT tinStatus FROM t_grivance_suggestion gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = tweetId AND gs.vchAccount = vchAccount) AS tinStatus
    FROM t_twitter_data WHERE 1=1');

    IF(CHAR_LENGTH(P_ACOUNT)>0) THEN

        SET @P_SQL = CONCAT(@P_SQL,' AND vchAccount = "',P_ACOUNT,'"');

    END IF;

    IF(CHAR_LENGTH(P_TW_TIME)>0) THEN

        SET @P_SQL  = CONCAT(@P_SQL,' AND DATE_FORMAT(tweetCreatedTime,"%Y-%m-%d") = "',P_TW_TIME,'"');

    END IF;

    IF(CHAR_LENGTH(P_TW_TEXT)>0) THEN

        SET @P_SQL = CONCAT(@P_SQL,' AND userName LIKE "%',P_TW_TEXT,'%" OR tweetText LIKE "%',P_TW_TEXT,'%"');

    END IF;

    SET @P_SQL = CONCAT(@P_SQL,' ORDER BY intId DESC LIMIT ?,20');

    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;

    END IF;


IF(P_ACTION = 'IVP') THEN
 START TRANSACTION;
  SET @RESPONSE_QRY = CONCAT('INSERT INTO t_facebook_data_mining (vchAccount,intAccountId,vchFbId,vchFbRefId,vchUserPhoto,vchUserName,vchUserId,blobFbText,vchFbTextPic,dtmFbCreatedTime,vchFbLink,vchVideoSource) VALUES ', P_QUERY);
  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  EXECUTE RESPONSE_STMT;
  
  IF(CHAR_LENGTH(P_QUERY4)>0)THEN
  SET @MEDIA_QRY = CONCAT('INSERT INTO t_facebook_data_media_mining (intAccountId,vchFacebookId,vchFacebookMediaId,vchFacebookMediaType,vchFacebookMediaUrl,vchVedioInfoUrl) VALUES ', P_QUERY4);
  PREPARE MEDIA_STMT FROM @MEDIA_QRY;
  EXECUTE MEDIA_STMT;
    END IF;
  
  COMMIT;
  SET @P_STATUS=0;
  SELECT @P_STATUS;
END IF;


IF(P_ACTION = 'ICM') THEN
 START TRANSACTION;
  SET @RESPONSE_QRY = CONCAT('INSERT INTO t_facebook_data_mining (vchAccount,intAccountId,vchFbId,vchFbRefId,vchUserPhoto,vchUserName,vchUserId,blobFbText,vchFbTextPic,dtmFbCreatedTime,vchMediaType,vchVideoSource) VALUES ', P_QUERY);
  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  EXECUTE RESPONSE_STMT;
  COMMIT;
  SET @P_STATUS=0;
  SELECT @P_STATUS;
END IF;

IF(P_ACTION = 'IPP') THEN
   SET @RESPONSE_QRY1 = CONCAT('INSERT INTO t_fb_page_post_data (vchAccountType,intAccountId,vchUserId,vchUserName,vchUserPhoto,vchFbId,vchFbRefId,vchFbLink,blobFbText,dtmFbCreatedTime,vchFbTextPic,vchVideoSource) VALUES ', P_QUERY);
  PREPARE RESPONSE_STMT1 FROM @RESPONSE_QRY1;
  EXECUTE RESPONSE_STMT1;
   SET @P_STATUS=0;
  SELECT @P_STATUS;
  END IF;

IF(P_ACTION = 'GLP') THEN

  
  SET @RESPONSE_QRY = CONCAT('SELECT dtmFbCreatedTime FROM t_facebook_data_mining WHERE 1=1');

  IF(CHAR_LENGTH(P_ACOUNT)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND vchAccount = "',P_ACOUNT,'"');

  END IF;
  IF(CHAR_LENGTH(P_TW_ID)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND intAccountId = ',P_TW_ID);

  END IF;

  SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' ORDER BY intId DESC LIMIT 1');

  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  EXECUTE RESPONSE_STMT;

END IF;

IF(P_ACTION = 'PPD') THEN

  
  SET @RESPONSE_QRY = CONCAT('SELECT dtmFbCreatedTime FROM t_fb_page_post_data WHERE 1=1');

  IF(CHAR_LENGTH(P_ACOUNT)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND vchAccountType = "',P_ACOUNT,'"');

  END IF;
  IF(CHAR_LENGTH(P_TW_ID)>0) THEN

    SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' AND intAccountId = ',P_TW_ID);

  END IF;

  SET @RESPONSE_QRY = CONCAT(@RESPONSE_QRY,' ORDER BY intId DESC LIMIT 1');

  PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
  EXECUTE RESPONSE_STMT;

END IF;
IF(P_ACTION = 'VP')THEN

    SET @P_SQL = '';
    SET @START_REC	= P_ID;

		SET @P_SQL = CONCAT(@P_SQL,'SELECT intId,vchAccount,fbId,fbRefId,userPhoto,userName,userScreenName,fbText,fbTextCm,fbTextPic,fbCreatedTime,fbCreatedTimeCm,
    (SELECT COUNT(1) FROM t_grivance_suggestion gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = fbId AND gs.vchAccount = vchAccount) AS grivanceExist,
    (SELECT COUNT(1) FROM t_griv_sugg_ask_dtls gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = fbId AND gs.vchAccount = vchAccount) AS grivanceExistNext,
    (SELECT tinStatus FROM t_grivance_suggestion gs WHERE gs.bitDeletedFlag=0 AND gs.vchMessageId = fbId AND gs.vchAccount = vchAccount) AS tinStatus
    FROM t_facebook_data WHERE 1=1');

    IF(CHAR_LENGTH(P_ACOUNT)>0) THEN

        SET @P_SQL = CONCAT(@P_SQL,' AND vchAccount = "',P_ACOUNT,'"');

    END IF;

    IF(CHAR_LENGTH(P_TW_TIME)>0) THEN

        SET @P_SQL  = CONCAT(@P_SQL,' AND DATE_FORMAT(fbCreatedTime,"%Y-%m-%d") = "',P_TW_TIME,'"');

    END IF;

    IF(CHAR_LENGTH(P_TW_TEXT)>0) THEN

        SET @P_SQL = CONCAT(@P_SQL,' AND userName LIKE "%',P_TW_TEXT,'%" OR fbText LIKE "%',P_TW_TEXT,'%"');

    END IF;

    SET @P_SQL = CONCAT(@P_SQL,' ORDER BY intId DESC LIMIT ?,20');

    PREPARE STMT FROM @P_SQL;
    EXECUTE STMT USING @START_REC;

    END IF;
IF(P_ACTION='TAD') THEN
     SELECT vchScreenName,vchUserName,vchAccessToken,vchAccessSecret FROM m_ms_api_account WHERE bitDeletedFlag=0 AND tinDisplayStatus =1 AND vchAccountType='Twitter';
    END IF;
    
    
    IF(P_ACTION='FCJ') THEN
     SET @P_SQL = CONCAT('SELECT A.intJobId,A.IntJobType,B.vchAccountType,A.intAccountId,A.vchJobName,B.vchScreenName,B.vchUserName,B.vchAccessToken,B.vchAccessSecret,A.vchDuration,A.dtmLastExcution FROM t_ms_corn_job A
JOIN m_ms_api_account B ON(A.intAccountId=B.intId AND B.tinDisplayStatus=1 AND B.bitDeletedFlag=0)
where A.bitDeletedFlag=0 AND A.bitActive=1 AND ADDTIME(A.dtmLastExcution,A.vchDuration)< NOW() AND A.IntJobType=1');
	
    IF(P_ATR1>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND IntJobType = ',P_ATR1);
    END IF;
     PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
    END IF;
    
     
    IF(P_ACTION='FCF') THEN
     SET @P_SQL = CONCAT('SELECT A.intJobId,A.IntJobType,B.vchAccountType,A.intAccountId,A.vchJobName,B.vchScreenName,B.vchUserName,B.vchAccessToken,B.vchAccessSecret,A.vchDuration,A.dtmLastExcution FROM t_ms_corn_job A
JOIN m_ms_api_account B ON(A.intAccountId=B.intId AND B.tinDisplayStatus=1 AND B.bitDeletedFlag=0)
where A.bitDeletedFlag=0 AND A.bitActive=1 AND ADDTIME(A.dtmLastExcution,A.vchDuration)< NOW() AND A.IntJobType=2');
	
    IF(P_ATR1>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND IntJobType = ',P_ATR1);
    END IF;
     PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
    END IF;
    
        
    IF(P_ACTION='ULT') THEN
	  START TRANSACTION;
      
      (SELECT COUNT(1) INTO @P_COUNT FROM t_ms_corn_job WHERE IntJobType=P_ATR1 AND intAccountId=P_ATR2  AND bitDeletedFlag=0 AND bitActive=1); 
      
      -- select @P_COUNT;
		  IF(@P_COUNT>0)THEN
				UPDATE t_ms_corn_job SET dtmLastExcution=NOW(), intMode=P_ATR3,vchlastMessage=P_QUERY2,intTotalFeatchedcnt=P_QUERY3,intValidRecCnt= P_QUERY4,intInvalidRecCnt= P_QUERY5,intduplicateRecCnt=P_QUERY6 WHERE intJobId=P_ID AND IntJobType=P_ATR1 AND intAccountId=P_ATR2 AND bitDeletedFlag=0 AND bitActive=1 ;
                
                INSERT INTO t_ms_cron_history SET intcronjobId=P_ID,
                IntJobType=P_ATR1,
                intAccountId=P_ATR2,
                intAddedThrough=P_ATR3,
                vchlastMessage=P_QUERY2,
                intTotalFetched=P_QUERY3,
                intValidRec= P_QUERY4,
                intInvalidRec= P_QUERY5,
                intDuplicateCnt=P_QUERY6 ,
                dtmUpdatedOn= now(),
                dtmExcecutionStart=P_QUERY,
                dtmExceutionEnd=P_TW_TIME;
                
                
				SET @P_STATUS=1;
				SELECT @P_STATUS;
           
                        
		   END IF;
	  COMMIT;
    END IF;
    
    IF(P_ACTION='FDE')THEN
     SET @P_SQL = CONCAT('SELECT COUNT(1) AS isExit from t_facebook_data_mining where vchFbId = "',P_TW_ID,'" and bitDeletedFlag=0');
     PREPARE STMT FROM @P_SQL;
    EXECUTE STMT ;
    END IF;
    
    IF(P_ACTION='FAN')THEN
    START TRANSACTION;
    
    SET @RESPONSE_QRY = CONCAT('INSERT INTO t_fb_analytics (intAccountId,intMetricId,DecValue,dtmDate) VALUES ', P_QUERY);
    PREPARE RESPONSE_STMT FROM @RESPONSE_QRY;
    EXECUTE RESPONSE_STMT;
    
    SET @RESPONSE_QRY2 = CONCAT('INSERT INTO t_fb_analytics_location (intAccountId,intMetricId,vchKey,DecValue,dtmDate) VALUES ', P_QUERY2);
    PREPARE RESPONSE_STMT2 FROM @RESPONSE_QRY2;
    EXECUTE RESPONSE_STMT2;
    
    SET @RESPONSE_QRY3 = CONCAT('INSERT INTO t_fb_analytics_gender (intAccountId,intMetricId,vchGender,vchAgeGroup,DecValue,dtmDate) VALUES ', P_QUERY3);
    PREPARE RESPONSE_STMT3 FROM @RESPONSE_QRY3;
    EXECUTE RESPONSE_STMT3;
    
    
    COMMIT;
    SET @P_STATUS=0;
    SELECT @P_STATUS;
    END IF;
    
      
    IF(P_ACTION='FCA') THEN
     SET @P_SQL = CONCAT('SELECT A.intJobId,A.IntJobType,B.vchAccountType,A.intAccountId,A.vchJobName,B.vchScreenName,B.vchUserName,B.vchAccessToken,B.vchAccessSecret,A.vchDuration,A.dtmLastExcution, B.vchPhoto, B.vchUsedMethod FROM t_ms_corn_job A
JOIN m_ms_api_account B ON(A.intAccountId=B.intId AND B.tinDisplayStatus=1 AND B.bitDeletedFlag=0)
where A.bitDeletedFlag=0 AND A.bitActive=1 AND ADDTIME(A.dtmLastExcution,A.vchDuration)< NOW() ');
	
    IF(P_ATR1>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType = ',P_ATR1);
    END IF;
    
     IF(P_ID>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobId = ',P_ID);
    END IF;
    
     PREPARE STMT FROM @P_SQL;
     EXECUTE STMT ;
      END IF;
      
      
      IF(P_ACTION='GFI') THEN
      SET SESSION group_concat_max_len = 100000000000000000;
     SET @P_SQL = CONCAT('SELECT A.intJobId,A.IntJobType,B.vchAccountType,A.intAccountId,A.vchJobName,B.vchScreenName,B.vchUserName,B.vchAccessToken,B.vchAccessSecret,A.vchDuration,A.dtmLastExcution,(SELECT group_concat(vchFbId) FROM t_facebook_data WHERE intAccountId = A.intAccountId AND vchAccount = "CM_FB" ORDER BY dtmFbCreatedTime DESC LIMIT 200) AS aryIds  FROM t_ms_corn_job A
JOIN m_ms_api_account B ON(A.intAccountId=B.intId AND B.tinDisplayStatus=1 AND B.bitDeletedFlag=0)
where A.bitDeletedFlag=0 AND A.bitActive=1');
	
    IF(P_ATR1>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType = ',P_ATR1);
    END IF;
    
     IF(P_ID>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobId = ',P_ID);
    END IF;
    
     PREPARE STMT FROM @P_SQL;
     EXECUTE STMT ;
      END IF;
      
      
      IF(P_ACTION='MCA') THEN
     SET @P_SQL = CONCAT('SELECT A.intJobId,A.IntJobType,B.vchAccountType,A.intAccountId,A.vchJobName,B.vchScreenName,B.vchUserName,B.vchAccessToken,B.vchAccessSecret,A.vchDuration,A.dtmLastExcution, B.vchPhoto, B.vchUsedMethod FROM t_ms_corn_job A
JOIN m_ms_api_account B ON(A.intAccountId=B.intId AND B.tinDisplayStatus=1 AND B.bitDeletedFlag=0)
where A.bitDeletedFlag=0 AND A.bitActive=1  ');
	
    IF(P_ATR1>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.IntJobType = ',P_ATR1);
    END IF;
    
     IF(P_ID>0) THEN
        SET @P_SQL = CONCAT(@P_SQL,' AND A.intJobId = ',P_ID);
    END IF;
    
     PREPARE STMT FROM @P_SQL;
     EXECUTE STMT ;
      END IF;
      
      
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_PACKAGED_LINK` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_PACKAGED_LINK`(
				IN    P_ACTION		VARCHAR(2),
				IN    P_ID			INT,
				IN    P_GL_ID		INT
			)
BEGIN
			
				IF(P_ACTION='CT')THEN
					SELECT COUNT(1) AS PL_EXIST FROM m_package_pl WHERE INT_P_GL_ID=P_GL_ID AND BIT_DELETED_FLAG=0 ;
				END IF;
			
				IF(P_ACTION='GL')THEN
					SELECT INT_P_GL_ID,VCH_P_GL_NAME,VCH_IMAGE_NAME FROM m_package_gl WHERE INT_STATUS=1;
				END IF;
			
				IF(P_ACTION='PL')THEN
					SELECT INT_P_PL_ID,INT_P_GL_ID,VCH_P_PL_NAME,VCH_URL_NAME FROM m_package_pl WHERE INT_P_GL_ID=P_GL_ID AND BIT_DELETED_FLAG=0 ORDER BY INT_SL_NO ASC;
				END IF;
			
			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_RESET_PASSWORD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_RESET_PASSWORD`(
  IN P_ACTION   VARCHAR(3),
  IN P_ID       INT,
  IN P_MOBILE   VARCHAR(16),
  IN P_DEVICE   VARCHAR(128),
  IN P_PASSWORD VARCHAR(64),
  IN P_ATR4     TINYINT(1),
  IN P_ATR5     TINYINT(1)
)
BEGIN



IF(P_ACTION='CM') THEN

	select INT_USER_ID,VCH_FULL_NAME,VCH_MOBILE_NO,INT_PH_LOCATION,INT_DESIGNATION_ID,INT_SUBNODEVAL_ID,INT_GROUP_ID    
    from m_admin_user where VCH_MOBILE_NO = P_MOBILE;		
    
END IF;

IF(P_ACTION='RP') THEN

	update m_admin_user set VCH_TEMP_PASSWORD = P_PASSWORD,DTM_PASSWORD_CHANGE = DATE_SUB(NOW(), INTERVAL 30 DAY) where INT_USER_ID = P_ID;	        
    insert into t_password_reset_log(intUserId, vchMobile, vchDeviceId) values(P_ID,P_MOBILE,P_DEVICE);
    select VCH_USER_NAME from m_admin_user where INT_USER_ID = P_ID;
    
END IF;

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USP_THEME_MASTER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`fscwdevu`@`%` PROCEDURE `USP_THEME_MASTER`(
			  IN  P_ACTION         VARCHAR(5),
			  IN  P_THEME_ID       INT,
			  IN  P_THEME_NAME     VARCHAR(50),
			  IN  P_FILE_NAME      VARCHAR(50),
			  IN  P_CREATED_BY     INT,
			  OUT P_OUT            VARCHAR(200)
			)
BEGIN
			
			IF(P_ACTION='A') THEN
			  INSERT INTO m_theme_master(VCH_THEME_NAME,VCH_FILE_NAME,INT_CREATED_BY)VALUES(P_THEME_NAME,P_FILE_NAME,P_CREATED_BY);
			END IF;
			
			

			IF(P_ACTION='U')THEN
			  UPDATE m_theme_master SET VCH_THEME_NAME=P_THEME_NAME,INT_UPDATED_BY=P_CREATED_BY,DTM_UPDATED_ON=NOW() WHERE INT_THEME_ID=P_THEME_ID;
			END IF;
			
			
			 IF(P_ACTION='R') THEN
			
				  SELECT INT_THEME_ID,VCH_THEME_NAME,VCH_FILE_NAME,INT_CREATED_BY,DTM_CREATED_ON FROM m_theme_master WHERE INT_THEME_ID=P_THEME_ID AND BIT_DELETED_FLAG=0;
			
				END IF;
			
			 IF(P_ACTION='V') THEN
			
				  SELECT INT_THEME_ID,VCH_THEME_NAME,VCH_FILE_NAME,INT_CREATED_BY,DTM_CREATED_ON FROM m_theme_master WHERE BIT_DELETED_FLAG=0;
			
				END IF;
			
			END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:26
