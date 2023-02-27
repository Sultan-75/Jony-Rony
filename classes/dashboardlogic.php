<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Dashboardlogic
{
    private $db;
    private $fm;
    private $qu;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
        $this->qu = new Query();
    }

    // Sum of Product Total  ->----//
    public function logic_total_product()
    {
        foreach ($this->qu->select('SELECT SUM(product_total) 
        FROM tbl_product') as $row) {
            $product_total = $row['SUM(product_total)'];
            return (float)$product_total;
        }
    }
    // Sum of Product Total Due  ->----//
    public function logic_total_due()
    {
        foreach ($this->qu->select('SELECT SUM(due) 
        FROM tbl_sale') as $row) {
            $due_total = $row['SUM(due)'];
            return (float)$due_total;
        }
    }
    // Sum of Product Total expence->----//
    public function logic_total_expence()
    {
        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }
        foreach ($this->qu->select('SELECT SUM(ex_amount) 
        FROM tbl_expance') as $row) {
            $total_amount = $row['SUM(ex_amount)'];
        }
        $ex_amount = (float)$ser_ex_amount + (float)$total_amount;
        return (float)$ex_amount;
    }
    // Sum of Profit Total  ->----//
    public function logic_total_profit()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }

        foreach ($this->qu->select('SELECT SUM(ex_amount) 
        FROM tbl_expance') as $row) {
            $total_amount = $row['SUM(ex_amount)'];
        }
        $ex_amount = (float)$ser_ex_amount + (float)$total_amount;

        foreach ($this->qu->select('SELECT SUM(profit) 
        FROM tbl_sale') as $row) {
            $profit = $row['SUM(profit)'];
        }
        $total_profit = ((float)$profit + (float)$ser_price) - (float)$ex_amount;
        return (float)$total_profit;
    }
    // Today sale  ->----total Amount//
    public function logic_today_sale_totalAmount()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE DATE(date) = DATE(NOW())') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(total_amount) FROM tbl_sale WHERE DATE(date) = DATE(NOW()) ORDER BY sale_id DESC') as $row) {
            $t_s_T_m_ = $row['SUM(total_amount)'];
        }
        $t_s_T_m = (float)$t_s_T_m_ + (float)$ser_price;
        return (float)$t_s_T_m;
    }
    // Today sale  ->----due//
    public function logic_today_sale_due()
    {
        foreach ($this->qu->select('SELECT SUM(due) FROM tbl_sale WHERE DATE(date) = DATE(NOW()) ORDER BY sale_id DESC') as $row) {
            $t_s_d = $row['SUM(due)'];
            return (float)$t_s_d;
        }
    }
    // Today Sale expence  ->----//
    public function logic_today_expence()
    {
        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE DATE(date) = DATE(NOW())') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }
        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE DATE(date) = DATE(NOW()) ORDER BY ex_id DESC') as $row) {
            $t_ex_d_ = $row['SUM(ex_amount)'];
        }

        $t_ex_d = (float) $ser_ex_amount + (float) $t_ex_d_;
        return $t_ex_d;
    }
    // Today sale  ->----profit//
    public function logic_today_sale_profit()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE DATE(date) = DATE(NOW())') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE DATE(date) = DATE(NOW())') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }

        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE DATE(date) = DATE(NOW()) ORDER BY ex_id DESC') as $row) {
            $t_ex_d = $row['SUM(ex_amount)'];
        }

        foreach ($this->qu->select('SELECT SUM(profit) FROM tbl_sale WHERE DATE(date) = DATE(NOW()) ORDER BY sale_id DESC') as $row) {
            $t_s_p = $row['SUM(profit)'];
        }
        $f_t_p =  ((float)$t_s_p + (float)$ser_price) - ((float)$t_ex_d + (float)$ser_ex_amount);
        return (float)$f_t_p;
    }
    // week  ->----Total Amount//
    public function logic_week_sale_totalAmount()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(total_amount) FROM tbl_sale WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY sale_id DESC ') as $row) {
            $w_s_t_a_ = $row['SUM(total_amount)'];
        }
        $w_s_t_a = (float)$w_s_t_a_ + (float)$ser_price;
        return (float)$w_s_t_a;
    }
    /* public function logic_week_sale_totalAmount()
    {
        foreach ($this->qu->select('SELECT SUM(total_amount) FROM tbl_sale WHERE date > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY sale_id DESC ') as $row) {
            $w_s_t_a = $row['SUM(total_amount)'];
            return (float)$w_s_t_a;
        }
    } */
    // Weekly sale  ->----due//
    public function logic_Week_sale_due()
    {
        foreach ($this->qu->select('SELECT SUM(due) FROM tbl_sale WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY sale_id DESC') as $row) {
            $w_s_d = $row['SUM(due)'];
            return (float)$w_s_d;
        }
    }
    // Weekly expence  ->----//
    public function logic_week_expence()
    {
        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }
        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY ex_id DESC') as $row) {
            $w_ex_d_ = $row['SUM(ex_amount)'];
        }
        $w_ex_d = (float) $ser_ex_amount + (float) $w_ex_d_;
        return  $w_ex_d;
    }
    // Weekly sale  ->----profit//
    public function logic_week_sale_profit()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }

        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY ex_id DESC') as $row) {
            $w_ex_d = $row['SUM(ex_amount)'];
        }
        foreach ($this->qu->select('SELECT SUM(profit) FROM tbl_sale WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY sale_id DESC') as $row) {
            $w_s_p = $row['SUM(profit)'];
        }
        $weekly_profit = ((float)$w_s_p + (float)$ser_price) - ((float)$w_ex_d + (float)$ser_ex_amount);
        return (float)$weekly_profit;
    }
    // mothly sale  ->----Total amount//
    public function logic_mothly_sale_totalAmount()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }

        foreach ($this->qu->select('SELECT SUM(total_amount) FROM tbl_sale WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY sale_id DESC ') as $row) {
            $m_s_t_a_ = $row['SUM(total_amount)'];
        }
        $m_s_t_a = (float)$m_s_t_a_ + (float)$ser_price;
        return (float)$m_s_t_a;
    }
    // mothly sale  ->----Due//
    public function logic_month_sale_due()
    {
        foreach ($this->qu->select('SELECT SUM(due) FROM tbl_sale WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY sale_id DESC ') as $row) {
            $m_s_d = $row['SUM(due)'];
            return (float)$m_s_d;
        }
    }
    // mothly sale  ->----Expence//
    public function logic_month_expence()
    {
        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }

        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY ex_id DESC ') as $row) {
            $m_ex_ = $row['SUM(ex_amount)'];
        }
        $m_ex = (float)$ser_ex_amount + (float) $m_ex_;
        return $m_ex;
    }
    // mothly sale  ->----Profit//
    public function logic_month_sale_profit()
    {
        foreach ($this->qu->select('SELECT SUM(service_price) 
        FROM tbl_sale_services WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_price = $row['SUM(service_price)'];
        }
        foreach ($this->qu->select('SELECT SUM(service_exp) 
        FROM tbl_sale_services WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY service_id DESC ') as $row) {
            $ser_ex_amount = $row['SUM(service_exp)'];
        }
        foreach ($this->qu->select('SELECT SUM(ex_amount) FROM tbl_expance WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY ex_id DESC ') as $row) {
            $m_ex = $row['SUM(ex_amount)'];
        }
        foreach ($this->qu->select('SELECT SUM(profit) FROM tbl_sale WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY sale_id DESC ') as $row) {
            $m_p = $row['SUM(profit)'];
        }
        $monthly_total = ((float)$m_p + (float)$ser_price) - ((float)$m_ex + (float)$ser_ex_amount);
        return $monthly_total;
    }

    /* Its all Each months */
    // mothly sale  ->----Total amount//
    /*  public function logic_July_mothly_sale_totalAmount()
    {
        
        foreach ($this->qu->select('SELECT SUM(total_amount) FROM tbl_sale WHERE YEAR(date) = date("Y") AND MONTH(date) = 7 ') as $row) {
            $j_m_s_t_a = $row['SUM(total_amount)'];
            return (float)$j_m_s_t_a;
        }
    } */

    /* full data search today */
    public function datewisetodaysale()
    {
        $datequery = "SELECT * FROM tbl_sale WHERE DATE(date) = DATE(NOW()) ORDER BY sale_id DESC";
        $result = $this->qu->select($datequery);
        return $result;
    }
    /* full data search today */
    public function datewiseweeklysale()
    {
        $datequery2 = "SELECT * FROM tbl_sale WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY sale_id DESC";
        $result = $this->qu->select($datequery2);
        return $result;
    }
    /* full data search today */
    public function datewisemonthlysale()
    {
        $datequery3 = "SELECT * FROM tbl_sale WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY sale_id DESC";
        $result = $this->qu->select($datequery3);
        return $result;
    }
}

//SELECT * FROM jokes WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW());
//WHERE YEAR(Date) = 2011 AND MONTH(Date) = 5
