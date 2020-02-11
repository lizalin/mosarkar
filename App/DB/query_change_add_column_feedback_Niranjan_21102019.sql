ALTER TABLE `t_ms_feedback_received` 
ADD COLUMN `intDepartmentId` INT(11) NULL DEFAULT 0,
ADD COLUMN `intServiceId` INT(11) NULL DEFAULT 0,
ADD COLUMN `intDistrictId` INT(11) NULL DEFAULT 0,
ADD COLUMN `int_hs_ps_id` INT(11) NULL DEFAULT 0;


update t_ms_feedback_received a join t_ms_inbound_data b on (a.intOutboundDataId=b.intInboundDataId and a.intCallType = 2)
set a.intDepartmentId=b.intDepartmentId,
a.intServiceId=b.intServiceId,
a.intDistrictId = b.intDistrictId,
a.int_hs_ps_id=b.int_hs_ps_id;

update t_ms_feedback_received a join t_ms_outbound_data b on (a.intOutboundDataId=b.intOutboundDataId and a.intCallType = 1)
set a.intDepartmentId=b.intDepartmentId,
a.intServiceId=b.intServiceId,
a.intDistrictId = b.intDistrictId,
a.int_hs_ps_id=b.int_hs_ps_id;



USP_MS_OFFLINE_FEEDBACK
USP_MG_FEEDBACK_RECEIVE





set @p_from_date = '2019-10-05';
set @p_to_date 	 = '2019-10-21';

select count(1) from(select intId, t_institution.intDepartmentId, C.dtmFeedbackRcvTime from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus > 0 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = 14 and date(t.dtmFeedbackRcvTime) >= '2019-10-05' and date(t.dtmFeedbackRcvTime) <= '2019-10-19';

select D.intDeptId, D.vchDeptName,
(select count(1) from(select intId, t_institution.intDepartmentId from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus = 4 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = D.intDeptId) as vchBad,
(select count(1) from(select intId, t_institution.intDepartmentId from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus = 1 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = D.intDeptId) as vchPoor,
(select count(1) from(select intId, t_institution.intDepartmentId from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus = 2 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = D.intDeptId) as vchAverage,
(select count(1) from(select intId, t_institution.intDepartmentId from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus = 3 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = D.intDeptId) as vchGood,
(select count(1) from(select intId, t_institution.intDepartmentId from (select intPolicestationId as intId, vchPolicestationName as vchInstitutionName, intConsoleDistId as intDistrictId, 14 as intDepartmentId from m_ms_police_station
union all
select intHospitalId as intId, vchHospitalName as vchInstitutionName, intDistrictId, 12 as intDepartmentId from m_ms_hospital) as t_institution
join t_ms_feedback_received C ON (C.int_hs_ps_id = t_institution.intId and C.bitDeletedFlag = 0 and C.intFeedbackStatus = 1 and C.intDepartmentId = t_institution.intDepartmentId) where C.intDirectCallFeedbackStatus = 5 and C.intRequestedById in (200,270) group by t_institution.intId, t_institution.intDepartmentId) as t where t.intDepartmentId = D.intDeptId) as vchOutstanding
 from m_department D where D.bitDeletedFlag = 0;
 
