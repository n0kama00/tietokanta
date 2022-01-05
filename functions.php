<?php

    function createNameAndRoleDropDown() {
        // db-yhteys
        require_once('database.php'); 
        $conn = createDbConnection(); // avataan db-yhteys
        // SQL-lause muuttujaan
        $sql = 'SELECT role_, name_ FROM `had_role` INNER JOIN names_ 
        ON had_role.name_id=names_.name_id LIMIT 40;
        ';
       // Kysely db
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="role">';
        // Aja db saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li
            $html .= '<option>' . $row['role_'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    function createRatingDropDown() {
        // db-yhteys
        require_once('database.php'); 
        $conn = createDbConnection(); // avataan db-yhteys
        // SQL-lause muuttujaan
        $sql = 'SELECT primary_title, title_ratings.average_rating 
        FROM titles INNER JOIN title_ratings ON titles.title_id=title_ratings.title_id 
        LIMIT 40;
        ';
       // Kysely db
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="rating">';
        // Looppaa db saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li
            $html .= '<option>' . $row['average_rating'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }