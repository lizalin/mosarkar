ALTER TABLE `t_ms_feedback_received` 
ADD COLUMN `intDirectCallFeedbackStatus` INT NULL DEFAULT 0 COMMENT '1. Bad\n2. Average\n3. Good' AFTER `intCallThrough`;

