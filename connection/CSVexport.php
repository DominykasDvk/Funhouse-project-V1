<?php
    if (isset($_SESSION['csvButton']))
{
   session_start();
   require_once 'connect.php';

    $sql = mysql_query("SELECT * FROM projects") or die(mysql_error());
    $number_rows = mysql_num_rows($sql);

    if ($number_rows >= 1)
    {
        $filename = "exported_final_projects" . date("m-d-Y_hia") . ".csv"; // filenme with date appended
        $fp = fopen($filename, "w"); // open file

        $rowcvs = mysql_fetch_assoc($sql);

        $seperator = "";
        $comma = "";

        foreach ($rowcvs as $name => $value)
        {
            $seperator .= $comma . $name; // write first value without a comma
            $comma = ","; // add comma in front of each following value
        }
        $seperator .= "\n";

        echo "Database has been exported to $filename";

        fputs($fp, $seperator);

        mysql_data_seek($sql, 0); // use previous query leaving out first row

        while($rowcvs = mysql_fetch_assoc($sql))
        {
            $seperator = "";
            $comma = "";

            foreach ($rowcvs as $name => $value)
            {
                $seperator .= $comma . $value; // write first value without a comma
                $comma = ","; // add comma in front of each following value 
            }

            $seperator .= "\n";

            fputs($fp, $seperator);
        } 

        fclose($fp);
    }
    else
        echo "There are no records in the database to export.";
    mysql_close();   
}