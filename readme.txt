<h2>A undergraduate computing conference website in PHP, Mysql, CSS and HTML</h2>

Assumption

1. Committee members cannot be attendees, so they are not qualified to hold a session. Also, they don’t need to pay the conference fee.
2. There is no duplicate sub-committee name, session name, and company name.
3. It’s likely to have duplicate attendee names, so the system will assign a 3-digit ID to professionals, 4-digit ID to students, 6-digit to sponsor attendees.
4. Students live in the same hotel, so hotel rooms can be identified only by the room number.
5. Hotel room number is a 4-digit number.
6. Num_students stands for the number of students who live in this room. Each room can live 3 students at most.
7. A sponsor attendee must be on behalf of one and only one sponsoring company.
8. All sponsoring companies have to have at least one employee to attend the conference.
9. A session can only be held by the professional(s). A speaker can hold multiple sessions.
10. The system will assign a 5-digit ID to identify each posting job.
11. There is only one committee with serveral subcommittees.
