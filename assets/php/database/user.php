<?php
    require_once('assets/php/database/db.php');
    require_once('assets/php/functions/cleanParams.php');

    class User extends DB {
        public function __construct() {
            DB::__construct();
        }

        public function emailCheck($email) {
            $sql = 'SELECT `EMAIL` FROM `student_reg` WHERE `EMAIL` = ?';
            $params = [clean($email, 1)];
            
            return (DB::selectRow($sql, $params)) ? (true) : (false);
        }

        public function usernameCheck($username) {
            $sql = 'SELECT `USERNAME` FROM `student_reg` WHERE `USERNAME` = ?';
            $params = [clean($username, 1)];
            
            return (DB::selectRow($sql, $params)) ? (true) : (false);
        }

        public function passwordCheck($credential, $pass) {
            $sql = 'SELECT `STID`, `FIRSTNAME` FROM `student_reg` WHERE `USERNAME` = :cred AND `PASSWORD` = :pass';
            $params = ["cred" => clean($credential, 1), "pass" => md5($pass)];

            $details = DB::selectRow($sql, $params);
            
            return ($details) ? ($details) : (false);
        }

        public function createAccount($user, $pass, $fName, $lName, $email, $quali, $cell, $gender, $nationality) {
            $sql = 'INSERT INTO `student_reg` (`USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `QUALIFICATION`, `CELLNUMBER`, `GENDER`, `NATIONALITY`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = [clean($user, 1), md5($pass), clean($fName, 1), clean($lName, 1), clean($email, 1), 
                       clean($quali, 1), clean($cell, 1), clean($gender, 1), clean($nationality, 1)];

            DB::query($sql, $params);
        }

        public function lockOut($credential) {
            $lock = new DateTime();
            $lock->add(new DateInterval('PT5M'));

            $sql = 'INSERT INTO `block_login` (`CREDENTIAL`, `UNBLOCK_TIME`) VALUES (?, ?)';
            $params = [clean($credential, 1), $lock->format('Y-m-d H:i:s')];

            DB::query($sql, $params);
        }

        public function isLockedOut($credential) {
            $sql = 'SELECT `UNBLOCK_TIME` FROM `block_login` WHERE `CREDENTIAL` = ?';
            $params = [clean($credential, 1)];
            
            return (DB::selectRow($sql, $params)) ? (true) : (false);
        }

        public function unlockUser($credential) {
            $now = new DateTime();

            $sql = 'DELETE FROM `block_login` WHERE `CREDENTIAL` = ? AND `UNBLOCK_TIME` < ?';
            $params = [clean($credential, 1), $now->format('Y-m-d H:i:s')];

            DB::query($sql, $params);

            return $this->isLockedOut($credential);
        }

        public function addAttendance($id) {
            $attendance = rand(0, 100);

            $sql = 'INSERT INTO `student_attendance` (`STID`, `ATTENDANCE`) VALUES (?, ?)';

            $params = [$id, $attendance];

            DB::query($sql, $params);
        }

        public function addFees($id) {
            $fees = rand(0, 30000);
            $date = new DateTime();

            $sql = 'INSERT INTO `student_fees` (`STID`, `BALANCE`, `DUEDATE`) VALUES (?, ?, ?)';

            $params = [$id, $fees, $date->format('Y-m-d H:i:s')];

            DB::query($sql, $params);
        }

        public function getSTID($credential) {
            $sql = 'SELECT `STID` FROM `student_reg` WHERE `EMAIL` = :c OR `USERNAME` = :c';
            $params = ["c" => $credential];
            
            return DB::selectRow($sql, $params);
        }

        public function getFees($id) {
            $sql = 'SELECT `BALANCE`, `DUEDATE` FROM `student_fees` WHERE `STID` = ?';
            $params = [$id];
            
            return DB::selectRow($sql, $params);
        }

        public function getAttendance($id) {
            $sql = 'SELECT `ATTENDANCE` FROM `student_attendance` WHERE `STID` = ?';
            $params = [$id];
            
            return DB::selectRow($sql, $params);
        }

        public function addModules($id, $course) {
            switch ($course) {
                case 'BSc IT':
                    $modules = [1, 2, 3, 4, 5];
                    break;
                case 'DIT':
                    $modules = [1, 2, 5, 6, 7];
                    break;
                case 'HCIT':
                    $modules = [8, 9, 10, 11, 12];
                    break;
            }

            foreach ($modules as $m) {
                $mark = rand(50, 100);

                $sql = 'INSERT INTO `student_results` (`STID`, `MODULEID`, `FINAL_MARK`) VALUES (?, ?, ?)';

                $params = [$id, $m, $mark];

                DB::query($sql, $params);
            }
        }

        public function getMarks($id) {
            $sql = 'SELECT `MODULENAME`, `FINAL_MARK` FROM `modules`, `student_results` WHERE `modules`.`MODULEID` = `student_results`.`MODULEID` AND `student_results`.`STID` = ?';
            $params = [$id];
            
            return DB::selectAllRows($sql, $params);
        }

        public function __destruct() {}
    }
?>