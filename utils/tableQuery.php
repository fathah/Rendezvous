<?php




$createPrograTable = "
CREATE TABLE program (
    id int(11) NOT NULL,
    name varchar(255) NOT NULL,
    section varchar(5) NOT NULL,
    addedOn timestamp NOT NULL DEFAULT current_timestamp(),
    type varchar(5) DEFAULT NULL,
    isCompleted int(1) DEFAULT NULL,
    resultDeclared int(1) DEFAULT NULL,
    rules longtext DEFAULT NULL,
    topics longtext DEFAULT NULL) 
";

$createProgramListTable = "
CREATE TABLE programlist (
    id int(11) NOT NULL,
    studentid int(11) NOT NULL,
    programid int(11) NOT NULL,
    grade varchar(10) NOT NULL,
    rank int(1) NOT NULL,
    addedOn timestamp NOT NULL DEFAULT current_timestamp(),
    groupId varchar(10) DEFAULT NULL,
    point int(5) DEFAULT NULL,
    type varchar(5) DEFAULT NULL
  )";

$scoreTable = "
CREATE TABLE scores (
    id int(11) NOT NULL,
    level int(5) NOT NULL,
    team1 int(11) NOT NULL,
    team2 int(11) NOT NULL,
    team3 int(11) NOT NULL
  )
";
$studentTable = "
CREATE TABLE students (
    id int(11) NOT NULL,
    name varchar(255) NOT NULL,
    campus varchar(10) NOT NULL,
    team varchar(10) NOT NULL,
    chest int(5) NOT NULL,
    card_no varchar(255) DEFAULT NULL,
    section varchar(5) NOT NULL,
    point int(11) NOT NULL
  )";
$teamTable = "CREATE TABLE team (
    id int(11) NOT NULL,
    name varchar(255) NOT NULL,
    code varchar(10) NOT NULL,
    point int(11) NOT NULL,
    floor int(1) DEFAULT NULL
  ) ";

$programsSQL = "INSERT INTO program(name, section, type) VALUES
('Elocution Malayalam', 'pr', 's'),
('Talkmaster  English', 'pr', 's'),
('Elocution Arabic', 'pr', 's'),
('Quiz', 'pr', 'g'),
('Essay English', 'pr', 's'),
('Story Malayalam', 'pr', 's'),
('Diary writing Arabic', 'pr', 's'),
('Note Making Urdu', 'pr', 's'),
('Poem Malayalam', 'pr', 's'),
('Haiku English', 'pr', 's'),
('Pencil Drawing', 'pr', 's'),
('Translation (E-M)', 'pr', 's'),
('Caption writing', 'pr', 's'),
('Dictionary Making', 'pr', 's'),
('Elocution Malayalam', 'sc', 's'),
('Elocution English', 'sc', 's'),
('Elocution Urdu', 'sc', 's'),
('Talk Master Arabic', 'sc', 'g'),
('Quiz', 'sc', 's'),
('Essay Malayalam', 'sc', 's'),
('Essay English', 'sc', 's'),
('Letter Writing Arabic', 'sc', 's'),
('Dairy Writing Urdu', 'sc', 's'),
('Poem English', 'sc', 's'),
('Poem Malayalam', 'sc', 's'),
('Poem Urdu', 'sc', 's'),
('Ad Quote Making', 'sc', 's'),
('Slogan Writing Malayal', 'sc', 's'),
('Elocution Malayalam', 'jr', 's'),
('Public talk', 'jr', 's'),
('Translation (A-M)', 'jr', 'g'),
('Elocution Urdu', 'jr', 's'),
('Qawwali', 'jr', 'g'),
('Tweeting', 'jr', 's'),
('Quiz', 'jr', 's'),
('Travalogue writing Eng', 'jr', 's'),
('Sudoku', 'jr', 's'),
('Poem English', 'jr', 's'),
('Poem Arabic', 'jr', 's'),
('Story urdu', 'jr', 's'),
('Naming', 'jr', 's'),
('Feature writing malayalam', 'jr', 's'),
('Elocution English', 'sj', 's'),
('Translation M- E', 'sj', 'g'),
('Elocution Arabic ', 'sj', 's'),
('Elocution Urdu', 'sj', 's'),
('Group song', 'sj', 'g'),
('Fb Post', 'sj', 's'),
('Quiz', 'sj', 's'),
('Essay Malayalam', 'sj', 's'),
('Essay English', 'sj', 's'),
('Story Malayalam', 'sj', 's'),
('Story Urdu', 'sj', 's'),
('Poem Malayalam', 'sj', 's'),
('Poem English', 'sj', 's'),
('Sudoku', 'sj', 's'),
('Poem arabic', 'sj', 's'),
('Tarteel', 'sn', 's'),
('Madh Song', 'sn', 's'),
('Calligraphy', 'sn', 's'),
('Elocution Malayalam', 'sn', 's'),
('Public talk', 'sn', 's'),
(' Jalsa Arabic', 'sn', 'g'),
('Elocution Urdu', 'sn', 's'),
('Sharia talk', 'sn', 's'),
('Sufi virutham', 'sn', 's'),
(' Malappatt', 'sn', 's'),
('PPT', 'sn', 's'),
('Quiz ', 'sn', 's'),
(' Vaalu', 'sn', 's'),
('Solution Design ', 'sn', 's'),
(' Feature Malayalam', 'sn', 's'),
('Travelogue Arabic', 'sn', 's'),
('Charithrakhyanam', 'sn', 's'),
('Essay English', 'sn', 's'),
('Story Malayalam', 'sn', 's'),
('Story Urdu', 'sn', 's'),
('Poem Arabic', 'sn', 's'),
('Poem English', 'sn', 's'),
('Poem Malayalam', 'sn', 's'),
('Translation A-E', 'sn', 's'),
('Translation E-U', 'sn', 's'),
('Translation M-A', 'sn', 's'),
('Reasearch paper', 'sn', 's'),
('Photo Essay', 'sn', 's'),
('Tarteel', 'gn', 's'),
('Naat', 'gn', 'g'),
('Group song', 'gn', 'g'),
('Mappilappatt', 'gn', 's'),
('Gazal', 'gn', 's'),
('Tarteel', 'gn', 's'),
('Mappilappatt ', 'gn', 's'),
('Water Coloring', 'gn', 's'),
('Cartoon Scape', 'gn', 's'),
('Calligraphy', 'gn', 's'),
('Madh song Composing', 'gn', 's'),
('Reel creation', 'gn', 's'),
('Photography', 'gn', 's'),
('Digital illustration', 'gn', 's'),
('Flash fiction English', 'gn', 's'),
('Essay kannada', 'gn', 's'),
('Elocution Kannada', 'gn', 's'),
('Vlogging', 'gn', 's'),
('Web designing ', 'gn', 's'),
('Documentary', 'gn', 'g'),
('Burda', 'gn', 'g'),
('Campus Song', 'gn', 'g'),
('Nasheeda', 'gn', 'g'),
(' Kadha prasangam', 'gn', 'g'),
('Masala Shura', 'gn', 'g'),
('Case study', 'gn', 'g'),
('Hot pot', 'gn', 'g'),
('Munalara', 'gn', 'g'),
('Master Plan', 'gn', 'g'),
('Gardening', 'gn', 'g'),
('Tug of War', 'gn', 'g'),
('Shot put', 'gn', 's'),
('Interview', 'gn', 'g'),
('Lecturing', 'gn', 's') 

";


$createAllTables = '


CREATE TABLE program (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  section varchar(5) NOT NULL,
  addedOn timestamp NOT NULL DEFAULT current_timestamp(),
  type varchar(5) DEFAULT NULL,
  isCompleted int(1) DEFAULT NULL,
  resultDeclared int(1) DEFAULT NULL,
  rules longtext DEFAULT NULL,
  topics longtext DEFAULT NULL
) ;


CREATE TABLE programlist (
  id int(11) NOT NULL,
  studentid int(11) NOT NULL,
  programid int(11) NOT NULL,
  grade varchar(10) NOT NULL,
  rank int(1) NOT NULL,
  addedOn timestamp NOT NULL DEFAULT current_timestamp(),
  groupId varchar(10) DEFAULT NULL,
  point int(5) DEFAULT NULL,
  type varchar(5) DEFAULT NULL
) ;

CREATE TABLE scores (
  id int(11) NOT NULL,
  level int(5) NOT NULL,
  team1 int(11) NOT NULL,
  team2 int(11) NOT NULL,
  team3 int(11) NOT NULL
) ;

CREATE TABLE students (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  campus varchar(10) NOT NULL,
  team varchar(10) NOT NULL,
  chest int(5) NOT NULL,
  card_no varchar(255) DEFAULT NULL,
  section varchar(5) NOT NULL,
  point int(11) NOT NULL
) ;

CREATE TABLE team (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  code varchar(10) NOT NULL,
  point int(11) NOT NULL,
  floor int(1) DEFAULT NULL
) ;

ALTER TABLE program
  ADD PRIMARY KEY (id);

ALTER TABLE programlist
  ADD PRIMARY KEY (id);

ALTER TABLE scores
  ADD PRIMARY KEY (id);

ALTER TABLE students
  ADD PRIMARY KEY (id);

ALTER TABLE team
  ADD PRIMARY KEY (id);


ALTER TABLE program
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

ALTER TABLE programlist
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

ALTER TABLE scores
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE students
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

ALTER TABLE team
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;



';
