CREATE TABLE feedback
(
feedback_id bigint(20) NOT NULL AUTO_INCREMENT,
tack_id bigint(20) NOT NULL,
owner_id bigint(20) NOT NULL,
PRIMARY KEY (feedback_id),
FOREIGN KEY (owner_id) REFERENCES tbl_user(userID)
)
