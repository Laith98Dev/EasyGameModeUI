<?php 

declare(strict_types=1);

namespace LaithYT;

use pocketmine\plugin\PluginBase as P;
use pocketmine\event\Listener as L;
use pocketmine\utils\TextFormat as TF; 

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\item\Item;
use pocketmine\inventory\Inventory;

class Main extends P implements L {
	
	public function onEnable() : void{
		$this->getLogger()->notice(base64_decode("VGhlIFBsdWdpbiBDcmVhdGUgQnkgTGFpdGhZb3V0dWJlciBDb3B5cmlnaHQgMjAxOSBMYWl0aFlU"));
		$this->getLogger()->info(" Enabled ");
		$this->getLogger()->info(" Plugin By Laith Youtuber ");
	}
	
	public function onDisable() {
		$this->getLogger()->info(" Disabled ");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
			case "egm":
				if($sender instanceof Player){
					$this->OpenUI($sender);
				}
			break;
		}
		return true;
	}
	
	public function GM0($player){
		$player->setGamemode(0);
		$player->sendMessage(TF::GREEN . "Now GameMode Survival");
	}
	
	public function GM1($player){
		$player->setGamemode(1);
		$player->sendMessage(TF::YELLOW . "Now GameMode Creative");
	}
	
	public function GM3($player){
		$player->setGamemode(3);
		$player->sendMessage(TF::BLUE . "Now GameMode Spactate");
	}
	
	public function OpenUI($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
		$result = $data;
		if($result === null){
			return true;
			}
			 switch($result){
				case 0:
					$this->GM0($player);
				break;
				
				case 1:
					$this->GM1($player);
				break;
				
				case 2:
					$this->GM3($player);
				break;
				}
		});
		$form->setTitle("EasyGamemodeUI");
		$form->setContent("Please Select Gamemode");
		$form->addButton("Survival");
		$form->addButton("Creative");
		$form->addButton("Spactate");
		$form->sendToPlayer($player);
		return $form;
	 }
}
