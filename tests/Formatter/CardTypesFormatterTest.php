<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Test\Formatter;

use MagicLegacy\Component\MtgJson\Formatter\CardTypesFormatter;
use PHPUnit\Framework\TestCase;
use Safe\Exceptions\JsonException;

use function Safe\json_decode;

/**
 * Class CardTypesFormatterTest
 */
class CardTypesFormatterTest extends TestCase
{
    /**
     * @return void
     * @throws JsonException
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {
        $result = $this->getResponseObject();
        $data   = $result->data;
        $entity = (new CardTypesFormatter())->format($result);

        $this->assertEquals($data->artifact->subTypes, $entity->getArtifact()->getSubTypes());
        $this->assertEquals($data->artifact->superTypes, $entity->getArtifact()->getSuperTypes());

        $this->assertEquals($data->conspiracy->subTypes, $entity->getConspiracy()->getSubTypes());
        $this->assertEquals($data->conspiracy->superTypes, $entity->getConspiracy()->getSuperTypes());

        $this->assertEquals($data->creature->subTypes, $entity->getCreature()->getSubTypes());
        $this->assertEquals($data->creature->superTypes, $entity->getCreature()->getSuperTypes());

        $this->assertEquals($data->enchantment->subTypes, $entity->getEnchantment()->getSubTypes());
        $this->assertEquals($data->enchantment->superTypes, $entity->getEnchantment()->getSuperTypes());

        $this->assertEquals($data->instant->subTypes, $entity->getInstant()->getSubTypes());
        $this->assertEquals($data->instant->superTypes, $entity->getInstant()->getSuperTypes());

        $this->assertEquals($data->land->subTypes, $entity->getLand()->getSubTypes());
        $this->assertEquals($data->land->superTypes, $entity->getLand()->getSuperTypes());

        $this->assertEquals($data->phenomenon->subTypes, $entity->getPhenomenon()->getSubTypes());
        $this->assertEquals($data->phenomenon->superTypes, $entity->getPhenomenon()->getSuperTypes());

        $this->assertEquals($data->plane->subTypes, $entity->getPlane()->getSubTypes());
        $this->assertEquals($data->plane->superTypes, $entity->getPlane()->getSuperTypes());

        $this->assertEquals($data->planeswalker->subTypes, $entity->getPlaneswalker()->getSubTypes());
        $this->assertEquals($data->planeswalker->superTypes, $entity->getPlaneswalker()->getSuperTypes());

        $this->assertEquals($data->scheme->subTypes, $entity->getScheme()->getSubTypes());
        $this->assertEquals($data->scheme->superTypes, $entity->getScheme()->getSuperTypes());

        $this->assertEquals($data->sorcery->subTypes, $entity->getSorcery()->getSubTypes());
        $this->assertEquals($data->sorcery->superTypes, $entity->getSorcery()->getSuperTypes());

        $this->assertEquals($data->tribal->subTypes, $entity->getTribal()->getSubTypes());
        $this->assertEquals($data->tribal->superTypes, $entity->getTribal()->getSuperTypes());

        $this->assertEquals($data->vanguard->subTypes, $entity->getVanguard()->getSubTypes());
        $this->assertEquals($data->vanguard->superTypes, $entity->getVanguard()->getSuperTypes());
    }

    /**
     * @return \stdClass
     * @throws JsonException
     */
    private function getResponseObject(): \stdClass
    {
        return json_decode(
            '{"data": {"artifact": {"subTypes": ["Clue", "Contraption", "Equipment", "Food", "Fortification", "Gold", "Treasure", "Vehicle"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "conspiracy": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "creature": {"subTypes": ["Advisor", "Aetherborn", "Ally", "Angel", "Antelope", "Ape", "Archer", "Archon", "Army", "Artificer", "Assassin", "Assembly-Worker", "Atog", "Aurochs", "Avatar", "Azra", "Badger", "Barbarian", "Basilisk", "Bat", "Bear", "Beast", "Beeble", "Berserker", "Bird", "Blinkmoth", "Boar", "Bringer", "Brushwagg", "Camarid", "Camel", "Caribou", "Carrier", "Cat", "Centaur", "Cephalid", "Chicken", "Chimera", "Citizen", "Cleric", "Cockatrice", "Construct", "Coward", "Crab", "Crocodile", "Cyclops", "Dauthi", "Demigod", "Demon", "Deserter", "Devil", "Dinosaur", "Djinn", "Dog", "Dragon", "Drake", "Dreadnought", "Drone", "Druid", "Dryad", "Dwarf", "Efreet", "Egg", "Elder", "Eldrazi", "Elemental", "Elephant", "Elf", "Elk", "Eye", "Faerie", "Ferret", "Fish", "Flagbearer", "Fox", "Frog", "Fungus", "Gargoyle", "Germ", "Giant", "Gnome", "Goat", "Goblin", "God", "Golem", "Gorgon", "Graveborn", "Gremlin", "Griffin", "Hag", "Harpy", "Head", "Hellion", "Hippo", "Hippogriff", "Homarid", "Homunculus", "Hornet", "Horror", "Horse", "Human", "Hydra", "Hyena", "Illusion", "Imp", "Incarnation", "Insect", "Jackal", "Jellyfish", "Juggernaut", "Kavu", "Kirin", "Kithkin", "Knight", "Kobold", "Kor", "Kraken", "Lamia", "Lammasu", "Leech", "Leviathan", "Lhurgoyf", "Licid", "Lizard", "Manticore", "Masticore", "Mercenary", "Merfolk", "Metathran", "Minion", "Minotaur", "Mole", "Monger", "Mongoose", "Monk", "Monkey", "Moonfolk", "Mouse", "Mutant", "Myr", "Mystic", "Naga", "Nautilus", "Nephilim", "Nightmare", "Nightstalker", "Ninja", "Noble", "Noggle", "Nomad", "Nymph", "Octopus", "Ogre", "Ooze", "Orb", "Orc", "Orgg", "Otter", "Ouphe", "Ox", "Oyster", "Pangolin", "Peasant", "Pegasus", "Pentavite", "Pest", "Phelddagrif", "Phoenix", "Pilot", "Pincher", "Pirate", "Plant", "Praetor", "Prism", "Processor", "Rabbit", "Rat", "Rebel", "Reflection", "Reveler", "Rhino", "Rigger", "Rogue", "Rukh", "Sable", "Salamander", "Samurai", "Sand", "Saproling", "Satyr", "Scarecrow", "Scion", "Scorpion", "Scout", "Sculpture", "Serf", "Serpent", "Servo", "Shade", "Shaman", "Shapeshifter", "Shark", "Sheep", "Siren", "Skeleton", "Slith", "Sliver", "Slug", "Snake", "Soldier", "Soltari", "Spawn", "Specter", "Spellshaper", "Sphinx", "Spider", "Spike", "Spirit", "Splinter", "Sponge", "Squid", "Squirrel", "Starfish", "Surrakar", "Survivor", "Teddy", "Tentacle", "Tetravite", "Thalakos", "Thopter", "Thrull", "Treefolk", "Trilobite", "Triskelavite", "Troll", "Turtle", "Unicorn", "Vampire", "Vedalken", "Viashino", "Volver", "Wall", "Warlock", "Warrior", "Wasp", "Weird", "Werewolf", "Whale", "Wizard", "Wolf", "Wolverine", "Wombat", "Worm", "Wraith", "Wurm", "Yeti", "Zombie", "Zubera"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "enchantment": {"subTypes": ["Aura", "Cartouche", "Curse", "Saga", "Shrine"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "instant": {"subTypes": ["Adventure", "Arcane", "Trap"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "land": {"subTypes": ["Desert", "Forest", "Gate", "Island", "Lair", "Locus", "Mine", "Mountain", "Plains", "Power-Plant", "Swamp", "Tower", "Urza’s"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "phenomenon": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "plane": {"subTypes": ["Alara", "Arkhos", "Azgol", "Belenon", "Bolas’s Meditation Realm", "Dominaria", "Equilor", "Ergamon", "Fabacin", "Innistrad", "Iquatana", "Ir", "Kaldheim", "Kamigawa", "Karsus", "Kephalai", "Kinshala", "Kolbahan", "Kyneth", "Lorwyn", "Luvion", "Mercadia", "Mirrodin", "Moag", "Mongseng", "Muraganda", "New Phyrexia", "Phyrexia", "Pyrulea", "Rabiah", "Rath", "Ravnica", "Regatha", "Segovia", "Serra’s Realm", "Shadowmoor", "Shandalar", "Ulgrotha", "Valla", "Vryn", "Wildfire", "Xerex", "Zendikar"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "planeswalker": {"subTypes": ["Abian", "Ajani", "Aminatou", "Angrath", "Arlinn", "Ashiok", "B.O.B.", "Basri", "Bolas", "Calix", "Chandra", "Dack", "Daretti", "Davriel", "Domri", "Dovin", "Duck", "Dungeon", "Elspeth", "Estrid", "Freyalise", "Garruk", "Gideon", "Huatli", "Inzerva", "Jace", "Jaya", "Karn", "Kasmina", "Kaya", "Kiora", "Koth", "Liliana", "Lukka", "Master", "Nahiri", "Narset", "Nissa", "Nixilis", "Oko", "Ral", "Rowan", "Saheeli", "Samut", "Sarkhan", "Serra", "Sorin", "Tamiyo", "Teferi", "Teyo", "Tezzeret", "Tibalt", "Ugin", "Urza", "Venser", "Vivien", "Vraska", "Will", "Windgrace", "Wrenn", "Xenagos", "Yanggu", "Yanling"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "scheme": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "sorcery": {"subTypes": ["Adventure", "Arcane", "Trap"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "tribal": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "vanguard": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}}, "meta": {"date": "2020-09-01", "version": "5.0.1+20200901"}}'
        );
    }
}
